@extends('layouts.admin')

@section('content')
    <h1 class="mb-5 mt-2">Modifica il progetto</h1>
    <form action="{{route('admin.project.show',['project'=>$project->slug])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo</label>
            <select class="form-select" id="type_id" name="type_id">
                <option>Seleziona</option>
                @foreach ($types as $type)
                <option @selected($project->type?->id == $type->id) value="{{$type->id}}"> {{$type->technology}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Salva</button>
        </div>
    </form>
@endsection
