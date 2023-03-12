@extends('back.layouts.master')
@section('content')
    <h1>Update Project ID: {{$project->id}}</h1>
    <hr>
    <form method="post" action="{{route('projeler.update',$project->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- Name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="name" >Project name</label>
            <input type="text" id="name" class="form-control" name="name" value="{{$project->name}}" />
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="repoLink">Repository Link</label>
            <input type="text" id="repoLink" class="form-control" name="repoLink" value="{{$project->repoLink}}" />
        </div>
        <!-- İmage -->
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="context">Content</label>
            <textarea class="form-control" id="context" rows="4" name="context"></textarea>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
    </form>
@endsection
