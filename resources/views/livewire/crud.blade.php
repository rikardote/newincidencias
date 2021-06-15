<div wire:init="loadPost">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="flex flex-col py-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        @if (session()->has('message'))
                            <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                                role="alert">
                                <div class="flex">
                                    <div>
                                        <p class="text-sm">{{ session('message') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="px-2 py-2 ml-4">
                            <button wire:click="create()"
                                class="px-4 py-2 text-sm font-bold text-white transition-colors duration-150 ease-linear bg-green-500 border rounded-xl focus:outline-none focus:ring-0 hover:bg-green-600 focus:bg-green-600 focus:text-indigo"><i
                                    class="fas fa-user-plus"></i> Create Student</button>
                            <x-jet-input class="flex-1 mx-4" placeholder="Que buscas?" type="text" wire:model="search" />
                            @if ($isModalOpen)
                                @include('livewire.create')
                            @endif
                        </div>
                        @if (count($students))
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                                                                <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('name')">
                                            Name
                                            @if ($sort == 'name')
                                                @if ($direction == 'asc')
                                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"> </i>
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"> </i>
                                                @endif

                                            @else
                                                <i class="float-right mt-1 fas fa-sort"> </i>
                                            @endif
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('email')">
                                            Email

                                            @if ($sort == 'email')
                                                @if ($direction == 'asc')
                                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"> </i>
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"> </i>
                                                @endif

                                            @else
                                                <i class="float-right mt-1 fas fa-sort"> </i>
                                            @endif

                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('mobile')">
                                            Mobile

                                            @if ($sort == 'mobile')
                                                @if ($direction == 'asc')
                                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"> </i>
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"> </i>
                                                @endif

                                            @else
                                                <i class="float-right mt-1 fas fa-sort"> </i>
                                            @endif

                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($students as $item)
                                        <tr>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $item->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $item->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $item->mobile }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-2 border">

                                                <button wire:click="edit({{ $item->id }})"
                                                    class="px-4 py-2 text-sm font-bold text-white transition-colors duration-150 ease-linear bg-green-500 border rounded-xl focus:outline-none focus:ring-0 hover:bg-green-600 focus:bg-green-600 focus:text-indigo"><i
                                                        class="fas fa-edit"></i></button>
                                                <button wire:click="delete({{ $item->id }})"
                                                    class="px-4 py-2 text-sm font-bold text-white transition-colors duration-150 ease-linear bg-red-500 border rounded-xl focus:outline-none focus:ring-0 hover:bg-red-600 focus:bg-red-600 focus:text-indigo"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $students->links() }}

                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
