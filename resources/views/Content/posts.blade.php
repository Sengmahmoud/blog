@extends('master')


@section('content')

    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- First Blog Post -->
    @foreach($posts as $post)
    <h2>
        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
    </h2>
    @if($post->url)
    <p><img src="../upload/{{$post->url}} " height="500" width="500"></p>
    @endif
    <p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
    <hr>
    <p>{{$post->body}}</p>
    <a class="btn btn-primary" href="/posts/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

@endforeach



    <form method="post" action="posts/store" enctype="multipart/form-data">
        {{csrf_field()}}


    <div class="form-group"  >

            <label for="title">title</label>
            <input type="text" name="title" class="form-control" id="title">
    </div>
        <div class="form-group"  >
            <label for="body">Body</label>
            <textarea type="text" name="body" class="form-control" id="body"></textarea>
        </div>
        <div class="form-group"  >
            <label for="url">Image</label>
            <input type="file" name="url" id="url">
        </div>
        <div class="form-group"  >
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>


    </form>

    <!-- Pager
  <ul class="pager">
      <li class="previous">
          <a href="#">&larr; Older</a>
      </li>
      <li class="next">
          <a href="#">Newer &rarr;</a>
      </li>
  </ul>-->


@section('categ')
    @foreach($cats as $cat)
        <ul class="list-unstyled">
            <li><a href="../category/{{$cat->name}}">{{$cat->name}}</a>
            </li>

        </ul>
    @endforeach
@endsection
@stop