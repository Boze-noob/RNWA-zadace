@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/posts" method="post">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="rid">Autor</label>
                </div>
                <div class="col-75">
                    <select id="rid" name="rid">
                        <option value="-1" selected disabled>Odaberite autora</option>
                        @foreach($authors as $author)
                        <option value="{{$author->rid}}">{{$author->fname}} {{$author->lname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-25">
                    <label for="pcontent">Sadržaj</label>
                </div>
                <div class="col-75">
                    <textarea id="pcontent" name="pcontent" placeholder="Write something.." style="height:200px"></textarea>
                </div>
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
