@extends('app')

@section('content')

  <h1>{{ $vefsida->title }}</h1>
    <article>
      {{ $vefsida->body}}
    </article>
@stop