<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignar Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="container mx-auto max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl shadow-md dark:shadow-white py-4 px-6 sm:px-10 bg-white dark:bg-white border-emerald-500 rounded-md">


                <div class="my-3">
                    <!-- Form title -->
                    <h1 class="text-center text-2xl sm:text-3xl font-bold text-black dark:text-black">Asignar Proyecto
                    </h1>
                    <form action="{{ route('projects.assign', $project->id) }}" method="POST">
                        @csrf
                        <!-- Campo oculto para el ID del proyecto -->
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <!-- Input field for 'Name' -->
                        <div class="my-2">
                            <label for="name"
                                class="text-sm sm:text-md font-bold text-gray-800 dark:text-black">Nombre del
                                proyecto</label>
                            <input type="text" name="name_project"
                                value="{{ old('name_project', $project->name_project) }}"
                                class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-white text-gray-900 dark:text-black"
                                id="name">
                        </div>

                        <div class="my-2">
                            <label for="Participantes"
                                class="text-sm sm:text-md font-bold text-gray-800 dark:text-black">Añadir
                                participantes</label>
                            <select
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                id="role" name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Save button -->
                        <button type="submit"
                            class="px-4 py-1 bg-emerald-500 rounded-md text-black text-sm sm:text-lg shadow-md">Asignar</button>
                        <!-- Back button -->
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-2 bg-red-500 rounded-md text-white text-sm sm:text-lg shadow-md">
                            Regresar</a>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
