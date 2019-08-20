@extends('layout')

@section('content')

    <h1 class="title">Create a new project</h1>

    <form method="POST" action="/projects">

        @csrf
        
        <div class="field">

            <div class="control">

                <label class="label" for="title">Title</label>
                <input type="text" 
                class="input {{ $errors->has('title') ? 'is-danger' : '' }}" 
                name="title" placeholder="Project Title" required 
                value="{{ old('title') }}"
                >

            </div>

        </div>

        <div class="field">
            <div class="control">
                <textarea 
                class="input  {{ $errors->has('description') ? 'is-danger' : '' }}" 
                name="description" placeholder="Project Description" required>{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
            </div>
        </div>

    @include ('errors')

    </form>

@endsection