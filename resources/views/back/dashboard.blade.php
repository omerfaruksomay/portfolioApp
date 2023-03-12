@extends('back.layouts.master')
@section('content')
    <h1>Messages</h1>
    <hr>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->phoneNum}}</td>
                <td>{{$message->message}}</td>
            </tr>

        @endforeach
        </tbody>

    </table>
@endsection
