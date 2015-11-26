@extends('app')

@section('content')
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <title>Responsive 'Flat Profile' HTML Portfolio Template</title>
   <link href="css/demo.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/jqbar.css" />
   <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">


   <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="../css/style.css">

   <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/simpletextrotator.css" />

  <div class="container">
<body>


    <div class="col-md-6 col-md-offset-3">
      <h1>{{ $vefsida->title }}</h1>

      <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Veldu Starfmann i Verkefnið</p>
              <form action="/vefsida/veljamann/{username}" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="post_id" value="{{ $vefsida->id}}">
                <input type="text"  class="form-control" placeholder="Notendarnafnið" name="post_user">
                <input type="hidden" name="post_title" value="{{ $vefsida->title }}">
                <input type="submit" value="Staðfesta Starfsmann" class="btn btn-orimary btn-lg">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div></h1>

      @foreach ($vefcomments as $comments)
        @if($comments->post_name == $vefsida->id)
      <div class="modal" id="comment{{ $comments->id }}" role="dialog">
        <div class="modal-dialog{{ $comments->id}} col-md-6 col-md-offset-3">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit comment</h4>
            </div>
            <div class="modal-body">
              <form action="/vefsida/breytacomment" method="POST" enctype="multipart/form-data" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="current_user" value="{{ $user->username }}">
              <input type="hidden" name="post_name" value="{{ $vefsida->id }}">
              <input type="hidden" name="id" value="{{ $comments->id }}">
              <input type="hidden" name="current_userPhoto" value="{{ $user->profilephoto }}">
              <textarea class="form-control" name="comment" > {{ $comments->comment }}</textarea>
              <input type="submit" value="Saðfesta Comment" class="btn btn-orimary btn-lg">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      @endif
      @endforeach


      <article>
        {{ $vefsida->body}}

        <h6>
        <a href="{{ url('index', $vefsida->hofundur)}}" style="font-size:100%;color:black;">
          Written By:  {{$vefsida->hofundur}}
          <img src="../{{$vefsida->current_photo}}"  height="30" style="display:inline" >
        </a>

      </h6>
        <p>Views : {{ $vefsida->viewcount }}</p>


      </article>
    </div>
    @if($user->username == $vefsida->hofundur)
    <div id="vefposts">

      <form class="form-horizontal" role="form" method="POST" action="{{url('/Vefsida/Edit', $vefsida->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-primary btn-lg">Edit</a></button>
      </form>
      <br>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Velja Starfsmann</button>
  </form>
  <div>
    @if($vefsida->starfsmadur !== 'none')
            <p>Starfsmaður: <b>{{$vefsida->starfsmadur}}</b></p>

          @else
          <p>Óvalinn</p>
          @endif
  </div>

    @endif

    @stop
    @section('hello')
    @foreach ($vefcomments as $comments)
      @if($comments->post_name == $vefsida->id)
    <div class="col-md-6 col-md-offset-3">
      <input type="hidden" name="id" value=" {{ $comments->id }}">
      <a href="{{ url('index', $comments->current_user)}}" style="font-size:200%;color:black;">
        <img src="../{{$comments->current_userPhoto}}"  height="30" style="display:inline" >
        {{ $comments->current_user }}
      </a>

      <p>{{ $comments->comment }}</p>
      @if($user->username == $comments->current_user)
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#comment{{$comments->id}}">Edit</button>
      @endif
    </div>
  @else
  @endif

  @endforeach
  <form class="form-horizontal" role="form" method="POST" action="/VefsaveComment">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="post_name" value="{{ $vefsida->id }}">
          <input type="hidden" name="current_user" value="{{ $user->username }}">
          <input type="hidden" name="current_userPhoto" value="{{ $user->profilephoto }}">
      <div class=" navbar-bottom col-md-6 col-md-offset-3" id="comments">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" cols="3" name="comment"></textarea>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      </div>
    </form>
    </div>
  </body>
  </html>

@stop
