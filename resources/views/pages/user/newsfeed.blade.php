@extends ('layouts.default')

@section ('content')

<section class="row">

    <article class="large-4 columns">

        <ul class="no-bullet">
            <li><img src="{{ $user->avatar }}" alt="" /></li>
            <li><a href="{{ route('users.show', $user->id) }}"><h3>{{ $user->name }}</h3></a></li>
            <li><h5>{{ $user->email }}</h5></li>
        </ul>

        <ul class="no-bullet">
            <li><h3>Followers: {{ count($user->followers()) }}</h3></li>
            @foreach ($user->followersInfo() as $follower)
            <li>{{ $follower->name }}</li>
            @endforeach
        </ul>

        <ul class="no-bullet">
            <li><h3>Following: {{ count($user->following()) }}</h3></li>
            @foreach ($user->followingInfo() as $following)
            <li>{{ $following->name }}</li>
            @endforeach
        </ul>
    </article>

    <article class="large-8 columns">

        <section class="row">
            <article class="column">

                    <form method="POST" action="{{ route('tweet.store') }}">

                        {!! csrf_field() !!}

                        @include ('errors.list')

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <label for="message">Tweet</label>
                        <textarea name="message" value="{{ old('message') }}"  rows="8"></textarea>

                        <button type="submit">Submit</button>

                    </form>

            </article>
        </section>

        <ul class="no-bullet">
            @foreach ($newsfeed as $news)
            <li class="panel">

                <form action="/retweet" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="tweet_id" value="{{ $news->id }}">
                    <button type="submit" class="radius tiny">Retweet</button>
                </form>

                <a style="display:block;" href="{{ route('users.show', $news->user_id) }}">
                    <strong>{{ $userService->getName($news->user_id) }}</strong>
                    <small class="right">{{ $news->created_at }}</small>
                    <br />
                    <span>{{ $news->message }}</span>
                </a>
            </li>
            @endforeach
        </ul>

        {!! $newsfeed->render() !!}

    </article>

</section>


@endsection
