<html lang="nl">
    <body>
        @if($user->isUser('voter'))
            Beste stemmer,<br><br>
        @else
            Geachte {{$user->profile->first_name}},<br><br>
        @endif
        Bedankt voor het invullen van de Stem!App<br>

        Hieronder zie je een lijst van de door jouw beantwoorde stellingen:<br>

        @if(isset($answers))
            <ul>
                @foreach($answers as $answer)
                    <li>
                        <ul>
                            <li style="list-style: none">{{$answer->proposition}}</li>
                            <li style="list-style: none">Jouw antwoord:
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
        @else
            Geen antwoorden.
        @endif
        <br><br>

        @if($user->isUser('voter'))
            Hieronder zie je een lijst van de top {{$user->getMatches()->count()}} politici waar je het meest mee overeen kwam:<br>
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

        We hopen dat je het leuk vond om de Stem!App in te vullen, en zien je graag terug bij een volgende peiling!<br><br>

        Met vriendelijke groet,<br>

        Stichting F6
    </body>
</html>
