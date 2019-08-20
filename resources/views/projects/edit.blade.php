@extends('layout')

@section('content')

    <div style="display: flex; flex-direction: row;">
        <h1 class="title">Edit project</h1>
        <a href="/projects" style="padding-top: 14px; margin-left: auto; position: relative; margin-right: 0;">Back to Projects</a>
    </div>

    <form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1em;">

    @method('PATCH')
    @csrf

        <div class="field">

            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title"
                value="{{ $project->title }}">
            </div>

        </div>

        <div class="field">

            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{ $project->description }}</textarea>
            </div>

        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>

    </form>

    <form method="POST" action="/projects/{{ $project->id }}">
    
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>

    </form>
@endsection