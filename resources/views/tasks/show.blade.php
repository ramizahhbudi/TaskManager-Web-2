@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600">
                <th class="py-2 px-4 border-b">Detail</th>
                <th class="py-2 px-4 border-b">Informasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b font-medium">Deskripsi</td>
                <td class="py-2 px-4 border-b">{{ $task->description }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b font-medium">Status</td>
                <td class="py-2 px-4 border-b">{{ $task->status }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b font-medium">Batas Waktu</td>
                <td class="py-2 px-4 border-b">{{ $task->due_date }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
