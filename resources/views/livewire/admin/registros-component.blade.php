<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Registros') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-md rounded-md border dark:border-indigo-800  border-indigo-500 ">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 pb-2">
                <div>
                    @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="cargarBase">




                        <div class="mt-2 grid grid-cols-7 gap-3">

                            <div class="form-group col-span-3 ">
                                <x-label for="nombre">Nombre</x-label>
                                <x-input type="text" wire:model="nombre" class="block mt-1 w-full" />
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-span-4">
                                <x-label for="descripcion">Descripción</x-label>
                                <x-input wire:model="descripcion" class="block mt-1 w-full"></x-input>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mt-2 grid grid-cols-12 flex items-center">

                            <div class="form-group col-span-2">
                                <x-label for="fecha_desde">Fecha Inicial</x-label>
                                <x-input type="date" wire:model="fecha_desde" class="form-control" />
                                @error('fecha_desde')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-span-2">
                                <x-label for="fecha_hasta">Fecha Final</x-label>
                                <x-input type="date" wire:model="fecha_hasta" class="form-control" />
                                @error('fecha_hasta')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-span-4">
                                <x-label for="archivo">Archivo XLSX</x-label>
                                <x-input type="file" wire:model="archivo" class="form-control-file" />
                                @error('archivo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-4 flex justify-center">

                                <x-button type="submit" class="mt-2">Cargar Base de Datos</x-button>

                            </div>
                        </div>


                        <div>


                            <div class="form-group mt-2">
                                <x-label for="registroId">Selecciona un Registro:</x-label>
                                <x-select wire:model="registroId" wire:change="contarMujeresAccidentadas"
                                    class="form-control">
                                    <option value="">Selecciona un registro</option>
                                    @foreach ($registros as $registro)
                                        <option value="{{ $registro->id }}">{{ $registro->nombre_registro }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            @if ($registroId)
                            <x-label> Conteo de mujeres accidentadas para el Registro seleccionado: {{ $conteoMujeres }}</x-label>
                                

                                <x-label>Conteo de mujeres accidentadas para el Registro seleccionado: {{ $conteoHombres }}
                                </x-label>
                            @endif
                        </div>

                        <h1>
                            EL NUMERO TOTAL DE MUJERES ACCIDENTADAS ES {{ $numeroMujeres }}
                        </h1>

                        <h1>
                            EL NUMERO TOTAL DE HOMBRES ACCIDENTADOS ES {{ $numeroHombres }}
                        </h1>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-md rounded-md border dark:border-indigo-800  border-indigo-500 ">

                <table class="w-full md:w-auto min-w-full ">
                    <thead class="border-b dark:border-indigo-800 border-indigo-500">
                        <tr>
                            <th
                                class=" px-6 py-3  bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                Nombre Registro</th>
                            <th
                                class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                Descripcion</th>
                            <th
                                class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                Fecha Inicial</th>
                            <th
                                class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                Fecha Final</th>
                            <th
                                class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>


                    <tbody class="dark:bg-gray-900 divide-y dark:divide-indigo-950 divide-indigo-50">
                        @foreach ($registros as $registro)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <p
                                                class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                                {{ $registro->nombre_registro }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="hidden sm:table-cell px-6 py-4 text-center">
                                    <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                        {{ $registro->descripcion }}</p>
                                </td>

                                <td class="px-6 py-4 text-center ">
                                    <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                        {{ $registro->fecha_inicial }}</p>
                                </td>

                                <td class="hidden sm:table-cell px-6 py-4 text-center">
                                    <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                        {{ $registro->fecha_final }}</p>
                                </td>

                                {{-- --> ICONOS - ACCIONES --}}

                                <td class="px-6 py-4 text-center dark:bg-gray-900 bg-white ">
                                    <!-- Iconos de ver, editar y eliminar -->
                                    <div class="flex justify-center">


                                        {{-- -->Ver User --}}
                                        <a href="#" class="icon-blue green-hover"
                                            wire:click="showUser({{ $registro->nombre_registro }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-10 h-6">
                                                <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                                <path fill-rule="evenodd"
                                                    d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>


                                        {{-- -->Eliminar User --}}

                                        <a href="#"
                                            wire:click="confirmUserDeletion({{ $registro->nombre_registro }})"
                                            class="red-hover icon-red">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-10 h-6">
                                                <path fill-rule="evenodd"
                                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>





                                    </div>



                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

    </div>




</div>
