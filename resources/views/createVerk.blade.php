@extends('app')

@section('content')
  <h1>Write a new fyrirspurn</h1>

  <hr/>
  {!! Form::open(['url' => '/verktakar']) !!}
      <div Class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
      </div>

      <div Class="form-group">
        {!! Form::label('hofundur', 'Hofundur:') !!}
        {!! Form::text('hofundur', Auth::user()->username, ['class' => 'form-control']) !!}
      </div>

      <div Class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
      </div>



      <div Class="form-group">
        {!! Form::submit('Add Fyrirspurn', ['class' => 'btn btn-primary form-control']) !!}
      </div>
  {!! Form::close() !!}
@stop
