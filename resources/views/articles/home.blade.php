@extends('layouts.app')

@section('title', 'Laraberg Demo')

@section('top-content')
  
@stop

@section('content')
    @include('articles._welcome')
    <div class="uk-section">
        <div class="uk-container uk-container-small">
            @include('articles._errors')
            @if ($articles->count())
                @each('articles._article', $articles, 'article')
                @if ($articleCount > 5)
                    <div class="uk-text-center">
                        <a href="{{route('articles.index')}}" class="uk-button uk-button-default">Show more</a>
                    </div>
                @endif
            @else
                @include('articles._no_article')
            @endif
        </div>
    </div>
@stop