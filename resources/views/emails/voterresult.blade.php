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
        Beste stemmer,<br><br>

        Bedankt voor het invullen van de stemapp!<br>

        Hieronder zie je een lijst van de vragen met jouw antwoord:<br>
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
