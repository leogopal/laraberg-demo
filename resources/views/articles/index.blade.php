@extends('layouts.app')

@section('title', 'Laraberg Demo')

@section('top-content')
  
@stop

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-small">
            @include('articles._errors')
            @if ($articles->count())
                @each('articles._article', $articles, 'article')
            @else
                @include('articles._no_article')
            @endif
            {{ $articles->links() }}
        </div>
    </div>
@stop