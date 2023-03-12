@extends('back.layouts.master')
@section('content')
    <h1>Projects</h1>
    <hr>
    <table class="table table-bordered data-table table-responsive-md">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Repository Link</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->repoLink}}</td>
                <td>
                    <img src="{{asset('project_images')}}/{{$project->image}}" width="120px" height="120px" class="img-thumbnail">
                </td>
                <td>
                    <a title="Edit" href="{{route('projeler.edit',$project->id)}}"  class="btn btn-sm btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('projeler.destroy',$project->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>

            </tr>

        @endforeach
        </tbody>

    </table>
@endsection
