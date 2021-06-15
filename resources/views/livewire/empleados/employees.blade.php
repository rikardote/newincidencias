<div wire:init="loadEmployees">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Empleados') }}
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
                                    class="fas fa-user-plus"></i> Agregar Empleado
                            </button>
                            <x-jet-input class="flex-1 w-1/4 mx-4" placeholder="Busqueda por numero, nombres o apellidos" type="text" wire:model="search" />

                        </div>
                        @if (count($empleados))
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('num_empleado')">
                                            Numero de Empleado
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('name')">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('deparment_id')">
                                            Adscripcion
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('condicion_id')">
                                            Tipo de contratacion
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('horario_id')">
                                            Horario
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $empleado->numero_empleado }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $empleado->nombre_completo }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $empleado->deparment->code }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $empleado->condicion->condicion ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $empleado->horario->horario }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $empleados->links() }}
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
