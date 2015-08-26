@extends ('layouts.default')

@section ('content')

    <section class="row">

        <article class="large-4 columns">
            <img src="{{ $user->avatar }}" alt="" />
        </article>

        <article class="large-8 columns">

            <h1>{{ $user->name }}</h1>
            <h4>{{ $user->email }}</h4>

            <p>
                Followers {{ count($user->followers()) }}
            </p>
            <p>
                Following {{ count($user->following()) }}
            </p>

            {{--
            <section class="row">
                <article class="column">
                    <ul>
                        @foreach($user->tweets() as $tweet)
                        <li>
                            {{ $tweet->message }}
                            <small>{{ date("F j, Y, g:i a", strtotime($tweet->created_at)) }}</small>
                        </li>
                        @endforeach
                    </ul>

                    {!! $user->tweets()->render() !!}

                </article>
            </section>
            --}}

        </article>

    </section>

@endsection
