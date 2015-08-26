@if (count($errors) > 0)
    <div data-alert class="alert-box alert">
        @foreach ($errors->all() as $error)
            <span class="error-listing">{{ $error }}</span>
        @endforeach
        <a href="#" class="close">&times;</a>
    </div>
@endif
