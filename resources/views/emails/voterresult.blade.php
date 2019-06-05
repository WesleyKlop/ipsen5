{{--<html>--}}
{{--<head>--}}
{{--    <title>App Name - @yield('title')</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    --}}
{{--</body>--}}
{{--</html>--}}

<html>
    <body>
        {{$voter}}
{{--        {{$voter->answers()->count()}}--}}

            @foreach($voter->answers as $answer)
                @if($answer->isTrue())
                    <li>Eens</li>
                @else
                    <li>Oneens</li>
                @endif
            @endforeach
    </body>
</html>
