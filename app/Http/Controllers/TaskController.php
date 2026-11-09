<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Rules\MaxTasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function store(Request $request)
    {
    
       //validaciones
       $validated = $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:255',
        'user_id' => ['required', 'exists:users,id', new MaxTasks()],
        'company_id' => 'required|exists:companies,id',
       ]);

       //registro de informacion
       $task = Task::create($validated);

       //cargar las relaciones de la tabla, para usar los datos de company y user relacionados
       $task->load([
            'user:id,name',
            'company:id,name'
       ]);

       // armar la respuesta como me la estan pidiendo
       $response = [
          'id' => $task->id,
          'name' => $task->name,
          'description' => $task->description,
          'user' => $task->user->name,
          'company' => [
                'id' => $task->company->id,
                'name' => $task->company->name,
           ],
          ];

       //retornar respuesta.
       return response()->json($response, 201);
    
    }

}
