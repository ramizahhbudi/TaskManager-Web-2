<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Menampilkan semua tugas
    public function index(Request $request)
    {
        $userId = Auth::id();  // Mendapatkan ID pengguna yang sedang login
        $query = Task::where('user_id', $userId);
    
        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status != '') {
            $query->status($request->status);
        }
    
        // Paginate hasil filter
        $tasks = $query->paginate(10);
    
        // Mengirim tasks dan userId ke view
        return view('tasks.index', compact('tasks', 'userId'));
    }
    

    // Menampilkan form pembuatan tugas
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    // Menampilkan detail tugas
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Menampilkan form edit tugas
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui tugas
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
