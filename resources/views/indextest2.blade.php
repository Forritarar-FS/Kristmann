@extends('app')

@section('hello')
      <h2>Vefsíður top3</h2><br>
      @foreach ($verktakar as $verktakar)

      @endforeach
      <div class="col-md-6">
        <ul class="nav">
                <li><h1>Verktakar</h1></li>

        @if(count($verktakar->all()) > 3)
            @for($i = 0;$i < 3;$i++)
            <li><h2>
            <a href="{{url('/verktakar',  $verktakar->all()[$i]->id)}}">{{ $verktakar->all()[$i]->title }}</a>
          </h2></li>
            @if(strlen($verktakar->all()[$i]->body) > 250) <li>{{
              substr($verktakar->all()[$i]->body,0,249) }}...</li>
            @else
            <li> {{$verktakar->all()[$i]->body}} </li>
            @endif
      @endfor
      @else
      @for($i = 0; $i < count($verktakar->all());$i++)
                <li><h2>
                  <a href="{{url('/verktakar',  $verktakar->all()[$i]->id)}}">{{ $verktakar->all()[$i]->title }}</a>
                </h2></li>
                  @if(strlen($verktakar->all()[$i]->body) > 250)<li> {{
                    substr($verktakar->all()[$i]->body,0,249) }}... </li>
                  @else
                  <li> {{$verktakar->all()[$i]->body}} </li>
                  @endif
          @endfor

      @endif
      </ul>

    </div>
      @foreach ($vefsida as $vefsida)

      @endforeach
      <div class="col-md-6" >
      <ul class="nav">
              <li><h1>Vefsíður</h1></li>
      @if(count($vefsida) > 3)
      @for($i = 0; $i < 3;$i++)
      <li><h2>
          <a href="{{url('/vefsida',  $vefsida->all()[$i]->id)}}">{{ $vefsida->all()[$i]->title }}</a>
        </h2></li>
          @if(strlen($vefsida->all()[$i]->body) > 250)<li>{{
          substr($vefsida->all()[$i]->body,0,249) }}...</li>
          @else
          <li>{{$vefsida->all()[$i]->body}}</li>
          @endif
    @endfor
    @else
    @for($i = 0; $i < count($vefsida->all());$i++)
              <li><h2>
                <a href="{{url('/vefsida',  $vefsida->all()[$i]->id)}}">{{ $vefsida->all()[$i]->title }}</a>
              </h2></li>
                @if(strlen($vefsida->all()[$i]->body) > 250)<li>{{
                  substr($vefsida->all()[$i]->body,0,249) }}...</li>
                @else
                <li>{{$vefsida->all()[$i]->body}}</li>
                @endif
        @endfor

   @endif
</ul>

 </div>





@stop
@section('content')
<div class="col-sm-13">
<!--
<h3>Eftir að gera:</h3>
<pre>
<del>Comments á profile</del>
<del>Bæta við post, þannig að hægt er að sjá hvort aðili hefur fundið aðila í vinnu.</del>
<del>Gera history, hvaða verkefni einn aðili hefur gert.</del>
<del>index - sína top 3 síðurnar (viewcount)</del>
comments - Hafa möguleikan a þvi að breyta eða eyða comments
<del>profile/logout- laga logout og profile takkan uppi inna öllum undirsíðunum (posts-profile... ect.)</del>
<del>footer - gera contact link a creators , gera linka a helga og kristmann (poppa up sma siða um hvorn aðilan)</del>
<del>alert - finna betra alert box (kanski einhvað sem skrifast sem error a siðuna i rauðum stöfum og hverfur siðan)</del>
>>>>>>> 0aff0bfdfd8456120faefe0e7ea6c5083d975591
css - laga allt sem þarf að laga og reyna gera hluti flottari ?
myndir - reyna laga þannig að þegar þu breytir um mynd uppfærist sjálfkrafa a post/comments.
Bæta við admin aðgang, getur postað posts á index síðu.
</pre>
</div>
<<<<<<< HEAD
=======
</div>
-->
<pre>
    {{$forsida->frettdagsins}}
</pre>
<div class="modal" id="editfrett" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit comment</h4>
      </div>
      <div class="modal-body">
        <p>Veldu Starfmann i Verkefnið</p>
        <form action="/frett" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="frettdagsins">
        <textarea class="form-control" placeholder="Ný Frétt" name="frettinn"></textarea>
        <input type="submit" value="Staðfesta frett" class="btn btn-orimary btn-lg">
        <br>
        <input type="submit" class="btn btn-orimary btn-lg" value="Staðfesta Mynd">
        <br>
        <input type="file" name="photo" accept="image/*">
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@if($user->id <= 2)
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editfrett">Edit</a>
@endif
@stop
