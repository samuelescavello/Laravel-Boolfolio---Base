@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
    <div>
        <h2 class="text-center text-uppercase">modifica un progetto</h2>
    </div>
    <section class="container">
    
    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">contenuto</label>
            <textarea class="form-control" id="content" name="content"  required col="30"
                rows="10">{{$project->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">modifica</button>
    </form>
</section>
@endSection