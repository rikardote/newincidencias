<x-jet-dialog-modal maxWidth="md">

    <x-slot name="title">
        <p class="text-2xl font-bold text-gray-500">{{ $titulo }}</p>
    </x-slot>

    <x-slot name="content">
        <form class="w-full">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="text-gray-600 text-md">Name</label>
                    <x-jet-input type="text" autocomplete="ñoff"
                        class="w-full h-3 p-6 mb-5 border-2 border-gray-300 rounded-md" placeholder="Ejemplo. John Doe"
                        wire:model="name" />
                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput2" class="text-gray-600 text-md">Email:</label>
                    <x-jet-input type="text" autocomplete="ñoff"
                        class="w-full h-3 p-6 mb-5 border-2 border-gray-300 rounded-md"
                        placeholder="Ejemplo. john@email.com" wire:model="email" />
                    @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput2" class="text-gray-600 text-md">Mobile:</label>
                    <x-jet-input type="text" autocomplete="ñoff"
                        class="w-full h-3 p-6 mb-5 border-2 border-gray-300 rounded-md"
                        placeholder="Ejemplo. 6862884596" wire:model="mobile" />
                    @error('mobile') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

            </div>

        </form>
    </x-slot>

    <x-slot name="footer">
        <button wire:click.prevent="store()" type="button"
            class="px-4 py-2 text-sm font-bold text-white transition-colors duration-150 ease-linear bg-green-500 border rounded-xl focus:outline-none focus:ring-0 hover:bg-green-600 focus:bg-green-600 focus:text-indigo">
            Guardar
        </button>

        <button wire:click="closeModalPopover()" type="button"
            class="px-4 py-2 text-sm font-bold text-white transition-colors duration-150 ease-linear bg-red-500 border rounded-xl focus:outline-none focus:ring-0 hover:bg-red-600 focus:bg-red-600 focus:text-indigo">
            Cerrar
        </button>
    </x-slot>

</x-jet-dialog-modal>
