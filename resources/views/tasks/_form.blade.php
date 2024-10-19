<form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" class="space-y-4">
    @csrf
    @if(isset($task))
        @method('PUT')
    @endif

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Judul Tugas</label>
        <input type="text" name="title" value="{{ old('title', $task->title ?? '') }}" class="mt-1 block w-full h-12 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" class="mt-1 block w-full h-24 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $task->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" class="mt-1 block w-full h-12 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            <option value="" disabled {{ old('status', $task->status ?? '') ? '' : 'selected' }}>Pilih Status</option>
            <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        <label for="due_date" class="block text-sm font-medium text-gray-700">Tanggal Batas</label>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}" class="mt-1 block w-full h-12 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
</form>
