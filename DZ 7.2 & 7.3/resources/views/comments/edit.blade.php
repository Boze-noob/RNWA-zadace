@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/comments/{{$comment->cid}}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" id="cid" name="cid" value="{{$comment->cid}}" />
            <div class="row">
                <div class="col-25">
                    <label for="pid">Objava</label>
                </div>
                <div class="col-75">
                    <select id="pid" name="pid">
                        <option value="-1" selected disabled>Odaberite objavu</option>
                        @foreach($posts as $post)
                            <option value="{{$post->pid}}" {{$post->pid == $comment->pid ? 'selected' : ''}}>{{$post->pcontent}}</option>
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
                            <option value="{{$author->rid}}" {{$author->rid == $comment->rid ? 'selected' : ''}}>{{$author->fname}} {{$author->lname}}</option>
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
                    <textarea id="ccontent" name="ccontent" placeholder="Write something.." style="height:200px">{{$comment->ccontent}}</textarea>
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
