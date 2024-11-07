<x-dialog-modal wire:model="isOpen">
    <x-slot name="title">
    <h3>Variables</h3>
    </x-slot>
    <x-slot name="content">
    <div class="flex justify-between mx-2 mb-6">
        <div class="mb-2 md:mr-2 md:mb-0 w-full">
            <x-label value="variable independiente" class="font-bold"/>
            <x-input wire:model="form.var_ind" type="text" class="w-full"/>
            <x-input-error for="form.var_ind"/>
        </div>
    </div>
    <div class="flex justify-between mx-2 mb-6">
        <div class="mb-2 md:mr-2 md:mb-0 w-full">
            <x-label value="variable dependiente" class="font-bold"/>
            <x-input wire:model="form.var_dep" type="text" class="w-full"/>
            <x-input-error for="form.var_dep"/>
        </div>
    </div>
    </x-slot>
        <x-slot name="footer">
        <x-secondary-button wire:click="$set('isOpen',false)" class="mx-2">Cancelar</x-secondary-button>
        <x-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store" class="disabled:opacity-25">
            finalizar
        </x-button>

    </x-slot>
</x-dialog-modal>
