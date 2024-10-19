@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto mt-8 text-center">
    <h1 class="text-3xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}</h1>
    <p class="text-gray-700 mb-6">Ini adalah dasbor manajemen tugas Anda. Anda dapat membuat, melihat, dan mengelola tugas Anda.</p>
    
    <div class="space-x-4">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Buat Tugas Baru
        </a>
        <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Lihat Semua Tugas
        </a>
    </div>
</div>
@endsection
