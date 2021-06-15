<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    public $isModalOpen = false;

    public $search = '';
    public $sort = 'deparment_id';
    public $direction = 'asc';

    public $open_edit = false;
    public $cant='20';
    public $readyToLoad = false;

    public function render()
    {
        //$empleados = Employe::with(['condicion','deparment','jornada','horario'])->orderBy('deparment_id')->paginate(10);


       if ($this->readyToLoad) {
            $empleados = Employe::with(['condicion','deparment','jornada','horario'])
            ->where('num_empleado', 'like', '%' . $this->search . '%')
            ->orWhere('father_lastname', 'like', '%' . $this->search . '%')
            ->orWhere('mother_lastname', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            //->where('active', '=', 1)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        }
        else{
            $empleados= [];
        }
        //dd($empleados);
        return view('livewire.empleados.employees', compact('empleados'));
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

    public function loadEmployees(){
        $this->readyToLoad = true;
    }
}
