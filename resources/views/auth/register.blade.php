@extends ('layouts.auth')

@section ('content')

    <section class="row">
        <article class="column">

            <form method="POST" action="/auth/register">

                {!! csrf_field() !!}
                
                @include ('errors.list')

                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">

                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}">

                <label for="password">Password</label>
                <input type="password" name="password">

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation">

                <button type="submit">Register</button>

            </form>

        </article>
    </section>

@stop
