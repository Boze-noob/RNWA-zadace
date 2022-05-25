@extends('layouts.app')

@section('content')
    <div class="row">
        <a class="btn btn-block btn-primary" href="/posts/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Sadržaj</th>
            <th>Autor</th>
            <th>Datum</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($posts as $row)
            <tr>
                <td>{{$row->pid}} </td>
                <td> {{$row->pcontent}}</td>
                <td> {{$row->author->fname}} {{$row->author->lname}}</td>
                <td> {{$row->time}}</td>
                <td><a href="/posts/{{$row->pid}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/posts/{{$row->pid}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
