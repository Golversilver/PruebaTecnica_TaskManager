<?php

namespace App\Rules;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxTasks implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
          // se usa para ver si existen registros de este usuarios, no terminados y contarlos para despues validarlo
          $pendingTasks = Task::where('user_id', $value)
            ->where('is_complete', false)
            ->count();

        // se valida si son mas de 5
        if ($pendingTasks >= 5) {
            $fail('El usuario ya cuenta con muchas tareas pendientes.');
        }
    }
}
