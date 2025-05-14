<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //// app/Http/Controllers/AdminController.php

public function dashboard()
{
    $users = User::with('tasks')->paginate(10);

    $data = $users->map(function ($user) {
        return [
            'user' => $user->only(['id', 'name', 'email']),
            'total_tasks' => $user->tasks->count(),
            'completed' => $user->tasks->where('status', 'completed')->count(),
            'pending' => $user->tasks->where('status', 'pending')->count(),
        ];
    });

    return response()->json($data);
}

}
