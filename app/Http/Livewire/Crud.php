<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Crud extends Component
{
    use WithPagination;

    public $student, $name, $email, $mobile, $student_id, $titulo;
    public $isModalOpen = false;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $open_edit = false;
    public $cant='';
    public $readyToLoad = false;

    public function mount(){
        $this->student = new Student();
    }

    public function order($sort){

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }


        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }



    }


    public function render()
    {
        if ($this->readyToLoad) {
            $students = Student::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        }
        else{
            $students= [];
        }

        return view('livewire.crud', compact('students'));
    }
    public function loadPost(){
        $this->readyToLoad = true;
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->titulo = "Nuevo Usuario";
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->mobile = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        Student::updateOrCreate(['id' => $this->student_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        session()->flash('message', $this->student_id ? 'Student updated.' : 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->mobile = $student->mobile;

        $this->openModalPopover();
        $this->titulo = "Editar Usuario";
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted.');
    }
}
