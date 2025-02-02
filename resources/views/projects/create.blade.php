<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <!-- component -->
            <div class="my-5">
                <!-- Main container for the form, responsive to screen sizes -->
                <div
                    class="container mx-auto max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl shadow-md dark:shadow-white py-4 px-6 sm:px-10 bg-white dark:bg-white border-emerald-500 rounded-md">


                    <div class="my-3">
                        <!-- Form title -->
                        <h1 class="text-center text-2xl sm:text-3xl font-bold text-black dark:text-black">Crear Proyecto
                        </h1>
                        <form action="{{route('projects.store')}}" method="POST">
                            @csrf
                            <!-- Input field for 'Name' -->
                            <div class="my-2">
                                <label for="name"
                                    class="text-sm sm:text-md font-bold text-gray-800 dark:text-black">Nombre del
                                    proyecto</label>
                                <input type="text" name="name_project" value="{{ old('name_project') }}"
                                    class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-white text-gray-900 dark:text-black"
                                    id="name">
                            </div>

                            <!-- Input field for 'First Name' -->
                            <div class="my-2">
                                <label for="first_name"
                                    class="text-sm sm:text-md font-bold text-gray-700 dark:text-black">Descripción</label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-white text-gray-900 dark:text-black"
                                    id="first_name">
                            </div>

                            <!-- Input field for 'Class' -->
                            <div class="my-2">
                                <label for="class"
                                    class="text-sm sm:text-md font-bold text-gray-700 dark:text-black">Archivos</label>
                                <input type="file" name="file" value="{{ old('file') }}"
                                    class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-white text-gray-900 dark:text-black"
                                    id="class">
                            </div>

                            <!-- Save button -->
                            <button type="submit"
                                class="px-4 py-1 bg-emerald-500 rounded-md text-black text-sm sm:text-lg shadow-md">Crear</button>
                            <!-- Back button -->
                            <a href="{{ route('dashboard') }}"
                                class="px-4 py-2 bg-red-500 rounded-md text-white text-sm sm:text-lg shadow-md">
                                Regresar</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
