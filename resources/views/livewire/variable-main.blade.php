<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Analisis de correlacion
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 mb-2">
            {{-- <x-input placeholder="Buscar registro" wire:model.live="search"/> --}}
            <x-button wire:click="create()">Nuevo</x-button>
                @if($isOpen)
                    @include('livewire.variable-create')
                @endif
        </div>
        <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-gray-800 text-white ">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">variable independiente</td>
                  <td scope="col" class="px-6 py-3">variable dependiente</td>
                  <td scope="col" class="px-6 py-3">Producto de var</td>
                  <td scope="col" class="px-6 py-3">V. Independiente^2</td>
                  <td scope="col" class="px-6 py-3">V. Dependiente^2</td>
                  <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($variables as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{$item->var_ind}}</td>
                  <td class="px-6 py-4">{{$item->var_dep}}</td>
                  <td class="px-6 py-4">{{$item->var_ind_dep_product}}</td>
                  <td class="px-6 py-4">{{$item->var_ind_squared}}</td>
                  <td class="px-6 py-4">{{$item->var_dep_squared}}</td>
                  <td class="px-6 py-4 flex gap-1">

                    <button  wire:click="edit({{$item->id}})" class="bg-cyan-800 w-32 h-10 rounded text-white text-xl hover:bg-cyan-500 flex items-center justify-center">
                        <i class="fa-solid fa-file-pen mr-2"></i> Editar
                    </button>

                    <button wire:click="$dispatch('deleteItem',{{$item->id}})" class="bg-red-800 w-32 h-10 rounded text-white text-xl hover:bg-red-500 flex items-center justify-center">
                        <i class="fa-solid fa-trash-can mr-2"></i> Eliminar
                    </button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>


        <div class="mt-4 p-4 bg-gray-100 rounded-lg shadow">
            <h3 class="text-lg font-semibold">Resultados del Análisis</h3>
            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Descripción</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Valor</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">Suma de Variables Independientes</td>
                        <td class="px-6 py-4">{{ $this->totalVarInd() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Suma de Variables Dependientes</td>
                        <td class="px-6 py-4">{{ $this->totalVarDep() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Suma de Producto de Vars</td>
                        <td class="px-6 py-4">{{ $this->totalVarIndDepProduct() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Suma de V. Independiente²</td>
                        <td class="px-6 py-4">{{ $this->totalVarIndSquared() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Suma de V. Dependiente²</td>
                        <td class="px-6 py-4">{{ $this->totalVarDepSquared() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Coeficiente de Correlación</td>
                        <td class="px-6 py-4">{{ $this->correlationCoefficient() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Tipo de Asociación</td>
                        <td class="px-6 py-4">{{ $this->correlationAssociationType() }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">a (Intersección)</td>
                        <td class="px-6 py-4">{{ $this->regressionAnalysis()['a'] }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">b (Pendiente)</td>
                        <td class="px-6 py-4">{{ $this->regressionAnalysis()['b'] }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="text-lg font-semibold mt-4 text-center">Predicción de la Variable Dependiente:</h3>
        </div>
        <div class="flex flex-col items-center mt-2">
            <input type="number" wire:model="inputX" placeholder="Introduce el valor de X" class="border rounded p-2 w-1/2 text-center"/>
            <x-button wire:click="predictY" class="mt-2">Predecir Y</x-button>
            @if($predictedY)
                <h4 class="text-lg font-semibold mt-2 text-center">Valor Predicho de Y:
                    <span class="font-normal text-gray-800">{{ $predictedY }}</span>
                </h4>
            @endif
        </div>

        @if(!$variables->count())
            <p>No existe ningun registro conincidente</p>
        @endif
        @if($variables->hasPages())
        <div class="px-6 py-3">
            {{$variables->links()}}
        </div>
        @endif

        </div>

      </div>
</div>
