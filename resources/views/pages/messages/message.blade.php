@extends ('layouts.default')

@section ('content')

    <a href="/mail" class="button radius tiny">Back</a>
    
    <p>{{ $US->getName($mail->from) }} <small>{{ $US->getUsername($mail->from) }}</small></p>
    <p>{{ $mail->message }}</p>

    <form action="/mail" method="post">

        <fieldset>

            <legend>Reply</legend>

            {!! csrf_field() !!}

            <input type="hidden" name="from" value="{{ $user->id }}">
            <input type="hidden" name="to" value="{{ $mail->from }}">

            <label for="message">Message:</label>
            <textarea name="message" rows="8"></textarea>

        </fieldset>

    </form>

@endsection
