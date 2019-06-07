<html>
    <body>
        @if($user->isUser('voter'))
            Beste stemmer,<br><br>
        @else
            Geachte {{$user->profile->first_name}},<br><br>
        @endif
        Bedankt voor het invullen van de stemapp!<br>

        Hieronder zie je een lijst van de door jouw beantwoorde stellingen:<br>
        <ul>
            @foreach($answers as $answer)
                <li>
                    <ul>
                        <li style="list-style: None">{{$answer->proposition}}</li>
                        <li style="list-style: None">Jouw antwoord:
                            @if($answer->answers[0]->answer)
                                Eens
                            @else
                                Oneens
                            @endif
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
        <br><br>

        @if($user->isUser('voter'))
            Hieronder zie je een lijst van de top 5 politici waar je het meest mee overeen kwam:<br>
            <ul>
                @foreach($user->getMatches() as $match)
                    <li>
                        {{$match['profile']->first_name}}
                        {{$match['profile']->last_name}}
                        {{$match['profile']->party}}
                        :
                        {{$match['percentage']}}%
                    </li>
                @endforeach
            </ul>
        @endif

        We hopen dat je het leuk vond om de stemapp in te vullen, en zien je graag terug bij een volgende peiling!<br><br>

        Met vriendelijke groet,<br>

        Stichting F6
    </body>
</html>
