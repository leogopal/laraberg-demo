@extends('layouts.app')

@section('title', 'Laraberg Demo')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            @include('articles._errors')
            <form action="{{route('articles.index')}}/{{$article->id}}" method="POST">
                @method('PUT')
                @csrf
                <fieldset class="uk-fieldset">
                <div class="laraberg-sidebar">
                <textarea name="excerpt" placeholder="Excerpt">{{ $article->excerpt }}</textarea>
                </div>
                <div class="uk-margin">
                    <input type="text" class="uk-input uk-form-large laraberg-sidebar {{ $errors->get('title') ? 'uk-form-danger' : '' }}" name="title" placeholder="Title" value="{{$article->title}}">
                </div>
                <div class="uk-margin">
                    <textarea name="content" id="content" hidden>{{ $article->lb_raw_content }}</textarea>
                </div>
                </fieldset>
                <a href="{{URL::previous()}}" class="uk-button uk-button-danger" type="submit">Cancel</a>
                <button class="uk-button uk-button-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

@stop

<script>
  window.addEventListener('DOMContentLoaded', () => {
    Laraberg.init('content', { laravelFilemanager: true, sidebar: true })
  })
</script>