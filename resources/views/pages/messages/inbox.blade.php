@extends ('layouts.default')

@section ('content')

    @foreach($mails as $mail)
        <a href="{{ route('mail.show', $mail->id) }}">
            <div class="panel {{ (($mail->unread) ? 'callout' : '') }}">
                <p>{{ $US->getName($mail->from) }} <small>&lt;{{ $US->getUsername($mail->from) }}&gt;</small></p>
                <p>{{ $mail->message }}</p>
            </div>
        </a>
    @endforeach

@endsection
