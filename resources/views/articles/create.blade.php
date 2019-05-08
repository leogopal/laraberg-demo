@extends('layouts.app')

@section('title', 'Laraberg Demo')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            @include('articles._errors')
            <form action="{{route('articles.index')}}" method="POST">
                @csrf
                <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <input type="text" class="uk-input uk-form-large {{ $errors->get('title') ? 'uk-form-danger' : '' }}" name="title" placeholder="Title" value="{{old('title')}}">
                </div>
                <div class="uk-margin">
                    <textarea name="content" id="content" hidden>{{ old('content') }}</textarea>
                </div>
                </fieldset>
                <a href="/" class="uk-button uk-button-danger" type="submit">Cancel</a>
                <button class="uk-button uk-button-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop

<script>
  window.addEventListener('DOMContentLoaded', () => {
    Laraberg.init('content', { minHeight: '400px', laravelFilemanager: true })
  })
</script>