<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $project->name_project }}</h1>
            <p class="text-lg text-gray-600 mb-6">{{ $project->description }}</p>

            <div class="space-y-4">
                @foreach (json_decode($project->file) as $index => $file)
                    <div class="flex items-center space-x-3">
                        <a href="{{ asset('storage/' . $file) }}"
                            download="{{ json_decode($project->original_file_name)[$index] }}"
                            class="inline-flex items-center space-x-2 text-emerald-600 hover:text-emerald-800 transition-colors">
                            <!-- Icono de descarga -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12l4-4m0 0l-4-4m4 4H3" />
                            </svg>
                            <span>Descargar {{ json_decode($project->original_file_name)[$index] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-9 py-6">

                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 bg-red-500 rounded-md text-white text-sm sm:text-lg shadow-md ">
                    Regresar</a>
            </div>


        </div>
    </div>


</x-app-layout>
