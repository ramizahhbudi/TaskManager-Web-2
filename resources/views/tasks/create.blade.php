@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">{{ isset($task) ? 'Edit Tugas' : 'Buat Tugas Baru' }}</h1>
    @include('tasks._form')
</div>
@endsection
