@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h2 class="text-center mb-5">{{$project->title}}</h2>
    <p>{{$project->content}}</p>
    <p>{{$project->type?->technology}}</p>
    <p>{{$project->slug}}</p>
</div>
@endsection