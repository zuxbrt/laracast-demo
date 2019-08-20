@extends('layout')

@section('content')

    <div style="display: flex; flex-direction: row;">

        <h1 class="title">Projects</h1>

        <div style="border: 1px solid blue; border-radius: 5px; padding: 5px; margin-left: 20px; margin-top: 2px; width: auto; height: 38px; text-align: center;">
            <a href="/projects/create">Create a new project</a>
        </div>

    </div>


    <ul>
    @if($projects->count() < 1)
        <h1>No projects. Create one.</h1>
    @endif
    @foreach ($projects as $project)
        <li>
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>    
        </li>
    @endforeach
    </ul>

@endsection