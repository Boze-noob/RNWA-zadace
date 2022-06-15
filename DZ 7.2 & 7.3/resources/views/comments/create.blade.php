@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/comments" method="post">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="pid">Objava</label>
                </div>
                <div class="col-75">
                    <select id="pid" name="pid">
                        <option value="-1" selected disabled>Odaberite objavu</option>
                        @foreach($posts as $post)
                            <option value="{{$post->pid}}">{{$post->pcontent}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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
                    <label for="ccontent">Sadržaj</label>
                </div>
                <div class="col-75">
                    <textarea id="ccontent" name="ccontent" placeholder="Write something.." style="height:200px"></textarea>
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
