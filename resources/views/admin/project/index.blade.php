@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('admin.project.create') }}"><i class="fa-solid fa-plus"></i></a>
        </div>
        <h2>I miei progetti</h2>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Slug</th>
                    <th class="text-center" scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->content }}</td>
                        <td>{{$project->type?->technology}}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-info"
                                    href="{{ route('admin.project.show', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-circle-info text-white"></i></a>
                                <a class="btn btn-warning"
                                    href="{{ route('admin.project.edit', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-pen text-white"></i></a>
                                <form action="{{ route('admin.project.destroy', ['project' => $project->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash text-white"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
