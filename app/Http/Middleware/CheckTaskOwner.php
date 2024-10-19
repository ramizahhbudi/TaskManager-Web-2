<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTaskOwner
{
    public function handle(Request $request, Closure $next)
    {
        $task = $request->route('task');

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Tugas tidak ditemukan.');
        }

        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Anda tidak memiliki akses untuk mengedit atau menghapus tugas ini.');
        }

        return $next($request);
    }
}
