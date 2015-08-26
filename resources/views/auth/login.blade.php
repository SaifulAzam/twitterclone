@extends ('layouts.auth')

@section ('content')

<section class="row">
    <article class="column">

        <form method="POST" action="/auth/login">

            {!! csrf_field() !!}

            @include ('errors.list')

            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <input type="checkbox" name="remember"> Remember Me

            <button type="submit">Login</button>

        </form>

    </article>
</section>

@stop
