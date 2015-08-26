@extends ('layouts.default')

@section ('content')

    <form action="{{ url('/mail/send') }}" method="post">

        {!! csrf_field() !!}
        @include ('errors.list')

        <label for="to">Send To</label>
        <input type="text" name="to" value="old('to')" placeholder="Username">

        <label for="message">Message</label>
        <textarea name="message" value="{{ old('message') }}" rows="8"></textarea>

    </form>

@endsection
