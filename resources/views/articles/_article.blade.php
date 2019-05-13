<div class="article">
        <div class="flex space-between">
            <h3 class="uk-card-title inline uk-margin-remove uk-heading-small truncate flex-1"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h3>
            <div>
                <a href="{{ route('articles.edit', $article->id) }}" class="uk-icon-button" uk-icon="pencil"></a>
                <form class="inline" action="{{ route('articles.destroy', $article->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="uk-icon-button uk-button-danger" type="submit" uk-icon="trash"></button>
                </form>
            </div>
        </div>
        <p class="article-excerpt">{{$article->excerpt}}</p>
        <div class="flex">
            <div class="flex center-items uk-margin-right">
                <span class="uk-margin-small-right" uk-icon="calendar"></span>{!! $article->created_at->toFormattedDateString() !!}
            </div>
            <div class="flex center-items">
                <span class="uk-margin-small-right" uk-icon="clock"></span>{!! $article->created_at->format('H:i') !!}
            </div>
        </div>
    </div>