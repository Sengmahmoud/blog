@extends('master')
@section('content')
    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- First Blog Post -->

    <h2>
       {{$post->title}}
    </h2>
    @if($post->url)
        <p><img src="../upload/{{$post->url}} " height="500" width="500"></p>
    @endif
    <p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
    <hr>
    <p>{{$post->body}}</p>
<div >
@foreach($post->comments as $comment)
    <p class="comments">{{$comment->body}}</p>
    @endforeach
</div>
    <form method="post" action="/posts/{{$post->id}}/store">
        {{csrf_field()}}
        <div class="form-group"  >
            <label for="body">write somesing...</label>
            <textarea type="text" name="body" class="form-control" id="body"></textarea>
        </div>
    <div class="form-group"  >
        <button type="submit" class="btn btn-primary">ADD Comment</button>
    </div>
    </form>


@section('categ')
    @foreach($cats as $cat)
        <ul class="list-unstyled">
            <li><a href="category/{{$cat->name}}">{{$cat->name}}</a>
            </li>

        </ul>
    @endforeach
@endsection

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

@stop