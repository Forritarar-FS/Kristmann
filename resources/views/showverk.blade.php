@extends('app')

@section('content')

  <h1>{{ $verk->title }}</h1>
    <article>
      {{ $verk->body}}
    </article>
@stop
