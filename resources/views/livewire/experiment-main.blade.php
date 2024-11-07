<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <form wire:submit.prevent="calculateBinomial" class="space-y-4">
        <div class="mb-4">
            <label for="n" class="block text-sm font-medium text-gray-700">Número de intentos (n)</label>
            <input type="number" wire:model="n" id="n" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="p" class="block text-sm font-medium text-gray-700">Probabilidad de éxito (p)</label>
            <input type="number" wire:model="p" step="0.01" min="0" max="1" id="p" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="k" class="block text-sm font-medium text-gray-700">Número de éxitos deseados (k)</label>
            <input type="number" wire:model="k" id="k" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <x-button class="w-full bg-gray-800" type="submit">Calcular</x-button>
        </div>
    </form>

    @if ($probability)
    <div class="mt-4">
        <h3 class="text-lg font-semibold">Resultado: </h3>
        <p class="text-xl text-gray-600">Probabilidad P(X = {{ $k }}) = {{ $probability }}</p>
    </div>
    @else
    <div>esperando datos</div>
    @endif

</div>
