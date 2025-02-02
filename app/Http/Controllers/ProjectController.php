<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        // Proyectos creados por el usuario
        $createdProjects = Project::where('user_id', $userId)->get();

        // Proyectos asignados al usuario (a través de la tabla 'participants')
        $assignedProjects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        // Unimos ambos resultados (sin duplicar proyectos)
        $projects = $createdProjects->merge($assignedProjects)->unique('id');

        return view('projects.dashboard', ['projects' => $projects]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar que se han subido archivos
        if ($request->hasFile('files')) {
            $fileNames = [];
            $originalNames = [];

            // Procesar cada archivo cargado
            foreach ($request->file('files') as $file) {
                // Generar un nombre único para el archivo
                $filePath = $file->store('projects', 'public');

                // Almacenar el nombre original y la ruta
                $fileNames[] = $filePath;
                $originalNames[] = $file->getClientOriginalName();
            }
        }

        $project = new Project;
        $project->name_project = $request->input('name_project');
        $project->description = $request->input('description');
        $project->file = json_encode($fileNames); // Guardar las rutas de los archivos
        $project->original_file_name = json_encode($originalNames); // Guardar los nombres originales
        $project->user_id = Auth::user()->id;
        $project->save();

        session()->flash('status', 'Proyecto creado correctamente');

        return redirect()->route('dashboard');
    }



    /**
     * Display the specified resource.
     */
    public function show(Project $id)
    {


        return view('projects.show', ['project' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $id)
    {
        //
        return view('projects.edit', ['project' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name_project = $request->input('name_project');
        $project->description = $request->input('description');
        $project->file = $request->input('file');
        //$project->user_id = Auth::user()->id;
        $project->save();

        if (Auth::id() !== $project->user_id && !$project->users->contains(Auth::id())) {
            return redirect()->route('dashboard')->with('error', 'No tienes permiso para editar este proyecto.');
        }

        session()->flash('status', 'Proyecto actualizado correctamente');

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, $id)
    {
        //
        $project->destroy($id);
        session()->flash('status', 'Proyecto eliminado correctamente');
        return redirect()->route('dashboard');
    }

    // public function download(Project $project, $id)
    // {
    //     $project = Project::find($id);
    //     return Storage::download($project->file);
    // }

    public function assignView(Project $id)
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('projects.assign.view', ['project' => $id, 'users' => $users]);
    }


    public function assignProject(Request $request, Project $project)
    {
        // Recuperamos el ID del proyecto desde el formulario
        $projectId = $request->input('project_id');  // Ahora tenemos el ID del proyecto
        $userId = $request->input('user_id');         // Recuperamos el ID del usuario
        $assignedBy = Auth::id(); // Usuario que asigna el proyecto

        // Obtener el proyecto correspondiente usando el ID
        $project = Project::findOrFail($projectId);

        // Evitar duplicados
        if (!$project->users()->where('user_id', $userId)->exists()) {
            $project->users()->attach($userId, ['assigned_by' => $assignedBy]);
        }

        return redirect()->route('dashboard')->with('status', 'Proyecto asignado correctamente.');
    }
}
