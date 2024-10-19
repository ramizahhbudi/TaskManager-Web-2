@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Tugas - ID Pengguna: {{ $userId }}</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Buat Tugas Baru
        </a>
    </div>

    <!-- Filter by status -->
    <div class="mb-4">
        <form action="{{ route('tasks.index') }}" method="GET" class="flex">
            <select name="status" class="border rounded py-2 px-3 mr-2">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            </select>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Filter</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Judul Tugas</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Batas</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">{{ $task->title }}</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mr-2">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $tasks->links() }} <!-- This will generate pagination links -->
    </div>
</div>
@endsection
