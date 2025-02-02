<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>{{ $project->name_project }}</h1>
            <p>{{ $project->description }}</p>
            @foreach (json_decode($project->file) as $index => $file)
                <div>
                    <!-- Aquí especificamos el nombre del archivo a descargar usando 'download' -->
                    <a href="{{ asset('storage/' . $file) }}"
                        download="{{ json_decode($project->original_file_name)[$index] }}">
                        Descargar {{ json_decode($project->original_file_name)[$index] }}
                    </a>
                </div>
            @endforeach





        </div>
    </div>


</x-app-layout>
