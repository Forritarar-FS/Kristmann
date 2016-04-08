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
    <h1>{{ $verktakar->title }}</h1>

    <div class="modal" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Veldu Starfmann i Verkefnið</p>
            <form action="/verktakar/veljamann/{username}" method="POST" enctype="multipart/form-data" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="post_id" value="{{ $verktakar->id}}">
              <input type="text"  class="form-control" placeholder="Notendarnafnið" name="post_user">
              <input type="hidden" name="post_title" value="{{ $verktakar->title }}">
              <input type="submit" value="Staðfesta Starfsmann" class="btn btn-orimary btn-lg">
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div></h1>

    @foreach ($verkcomments as $comments)
      @if($comments->post_name == $verktakar->id)
    <div class="modal" id="comment{{ $comments->id }}" role="dialog">
      <div class="modal-dialog{{ $comments->id}} col-md-6 col-md-offset-3">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit comment</h4>
          </div>
          <div class="modal-body">
            <form action="/verktakar/breytacomment" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="current_user" value="{{ $user->username }}">
            <input type="hidden" name="post_name" value="{{ $verktakar->id }}">
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
      {{ $verktakar->body}}

      <h6>
      <a href="{{ url('index', $verktakar->hofundur)}}" style="font-size:100%;color:black;">
        Written By:  {{$verktakar->hofundur}}
        <img src="../{{$verktakar->current_photo}}"  height="30" style="display:inline" >
      </a>

    </h6>
      <p>Views : {{ $verktakar->viewcount }}</p>


    </article>
  </div>
  @if($user->username == $verktakar->hofundur)
  <div id="vefposts">

    <form class="form-horizontal" role="form" method="POST" action="{{url('/verktakar/Edit', $verktakar->id)}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary btn-lg">Edit</a></button>
    </form>
    <br>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Velja Starfsmann</button>
</form>
<div>
  @if($verktakar->starfsmadur !== 'none')
          <p>Starfsmaður: <b>{{$verktakar->starfsmadur}}</b></p>

        @else
        <p>Óvalinn</p>
        @endif
</div>

  @endif

  @stop
  @section('section')
  <div class="col-md-6 col-md-offset-4">
    <h1>Myndir og Önnur Verkefni</h1>
    <div class="row-fluid" id="divmyndir">
      <?php $i=1 ?>
      @foreach ($uphlada as $uploads)
        @if($uploads->id_verk == $verktakar->id)
        @if($uploads->uphlada_img == "null")
        <div class="upload_div">
          <?php echo('<img data-url="..' . $uploads->uphlada_file . '" src="../uploads/standard_file.png" class="uploads" id="upload_myndir' . $i . '">') ?>
          <?php $i += 1 ?>
        </div>
        @endif
        @if($uploads->uphlada_file == "null")
        <div class="upload_div">
          <?php echo('<img src="..' . $uploads->uphlada_img . '" class="uploads" id="upload_myndir' . $i . '">') ?>
          <?php $i += 1 ?>
        </div>
        @endif
        @endif
      @endforeach
      <script>
        $(document).ready(function(){
          $("#divmyndir .uploads").mouseover(function(){
            console.log("going in");
            $(this).animate( { height:"250px", width:"250px" }, { queue:false, duration:500 });

          }).mouseout(function() {
            console.log("going out");
            $(this).animate( { height:"100px", width:"100px"}, { queue:true, duration:500 });
          }).click(function(e){
            e.preventDefault();

            if($(this).data("url"))
            {
              window.location.href = $(this).data("url");
            }
            else
            {
              window.location.href = this.src;
            }
          })
        });
      </script>
    </div>

  </div>
  @stop
    @section('hello')
    @foreach ($verkcomments as $comments)
      @if($comments->post_name == $verktakar->id)
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
  <form class="form-horizontal" role="form" method="POST" action="/VerksaveComment">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="post_name" value="{{ $verktakar->id }}">
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

</body>
@stop
