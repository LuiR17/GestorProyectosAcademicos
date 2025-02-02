<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('status') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <main>
                    <table class="table-auto w-full mt-3">
                        <thead>

                            <tr class="bg-purple-800 text-center">
                                <th
                                    class="
                             w-1/6
                             min-w-[160px]
                             text-lg
                             font-semibold
                             text-white
                             py-4
                             lg:py-7
                             px-3
                             lg:px-4
                             border-l border-transparent
                             ">
                                    Titulo Proyecto
                                </th>
                                <th
                                    class="
                             w-1/6
                             min-w-[160px]
                             text-lg
                             font-semibold
                             text-white
                             py-4
                             lg:py-7
                             px-3
                             lg:px-4
                             ">
                                    Descripcion
                                </th>

                                <th
                                    class="w-1/6 min-w-[120px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Acciones
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($projects as $project)
                                <tr>
                                    <td
                                        class="
                             text-center text-dark
                             font-medium
                             text-base
                             py-5
                             px-2
                             bg-[#F3F6FF]
                             border-b border-l border-[#E8E8E8]
                             ">
                                        <p>{{ $project->name_project }}</p>

                                    </td>
                                    <td
                                        class="
                             text-center text-dark
                             font-medium
                             text-base
                             py-5
                             px-2
                             bg-white
                             border-b border-[#E8E8E8]
                             ">
                                        <p>{{ $project->description }}</p>
                                    </td>



                                    {{-- PONER AQUI EL ENDFOREACH --}}


                                    <td
                                        class="
                             text-center text-dark
                             font-medium
                             text-base
                             py-5
                             px-2
                             bg-[#F3F6FF]
                             border-b border-[#E8E8E8]
                             ">
                                        <div class="flex flex-wrap justify-center space-x-2">
                                            <a href="{{ route('projects.show', $project->id) }}" id="abrirModal"
                                                class="bg-blue-800 text-white px-2 py-1 text-sm rounded-md hover:bg-blue-700">
                                                Ver
                                            </a>
                                            <a href="{{ route('projects.edit', $project->id) }}" id="abrirModal"
                                                class="bg-blue-800 text-white px-2 py-1 text-sm rounded-md hover:bg-blue-700">
                                                Editar
                                            </a>



                                            
                                                @if (auth()->id() === $project->user_id || auth()->id() === $project->assigned_by)
                                                    <form action="{{ route('projects.destroy', $project->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-blue-800 text-white px-2 py-1 text-sm rounded-md hover:bg-blue-700">
                                                            Borrar
                                                        </button>
                                                    </form>
                                                @endif

                                                @if (auth()->id() === $project->user_id || auth()->id() === $project->assigned_by)
                                                    <a href="{{ route('projects.assign.view', $project->id) }}"
                                                        id="abrirModal"
                                                        class="assign-members-btn bg-blue-800 text-white px-2 py-1 text-sm rounded-md hover:bg-blue-700">
                                                        Asignar
                                                    </a>
                                                @endif
                                            








                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
