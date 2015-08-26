<!DOCTYPE html>
<html lang="en" ng-app="TwitterApp">

<head>

    <meta charset="utf-8">
    <title>Twitter Clone</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/package.js') }}" charset="utf-8"></script>

</head>

<body>

    <section class="row">
        <article class="column">
            <div ui-view=""></div>
        </article>
    </section>

</body>

</html>
