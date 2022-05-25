@extends('layouts.app')

@section('content')
    <div class="row">
        <a class="btn btn-block btn-primary" href="/comments/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Objava</th>
            <th scope="col">Sadržaj</th>
            <th scope="col">Autor</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        @foreach($comments as $row)
            <tr>
                <th scope="row">{{$row->cid}} </th>
                <td> {{$row->pid}}</td>
                <td> {{$row->ccontent}}</td>
                <td> {{$row->rid}}</td>
                <td><a href="/comments/{{$row->cid}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/comments/{{$row->cid}}" method="post">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
