@extends('layouts.app')

@section('title', $article->title . ' - Laraberg Demo')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <div class="flex space-between center-items uk-margin-bottom">
                <h1 class="inline truncate flex-1 uk-margin-remove">{{$article->title}}</h1>
                    <div>
                        <a href="{{ route('articles.edit', $article->id) }}" class="uk-icon-button" uk-icon="pencil"></a>
                        <form class="inline" action="{{ route('articles.destroy', $article->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="uk-icon-button uk-button-danger" type="submit" uk-icon="trash"></button>
                        </form>
                    </div>
                </div>
            
                {!! $article->renderContent() !!}
        </div>
    </div>

@stop
