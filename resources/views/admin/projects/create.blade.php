@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<section class="container">
    <h2 class="text-center text-uppercase">crea il tuo progetto</h2>
    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="inserisci titolo" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">contenuto</label>
            <textarea class="form-control" id="content" name="content" placeholder="inserisci contenuto" required col="30"
                rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-success">crea</button>
        <button type="submit" class="btn btn-danger">ripristina</button>
    </form>
</section>
@endsection