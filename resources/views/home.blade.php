<!DOCTYPE html>
<html lang="en" ng-app="TwitterApp">

<head>

    <meta charset="utf-8">
    <title>Twitter Clone</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    <top-bar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Twitter Clone</a></h1>
            </li>
            <li toggle-top-bar class="menu-icon"><a href="#">Menu</a></li>
        </ul>

        <top-bar-section>
            <ul class="right">
                <li><a href="#">Logout</a></li>
            </ul>

            <ul class="left">
                <li><a href="/#/newsfeed">Newsfeed</a></li>
                <li><a href="/#/profile">Profile</a></li>
                <li><a href="/#/messages">Messages</a></li>
            </ul>
        </top-bar-section>
    </top-bar>

    <div id="main-content" ui-view=""></div>

    <script src="{{ asset('assets/js/package.js') }}" charset="utf-8"></script>

</body>

</html>
