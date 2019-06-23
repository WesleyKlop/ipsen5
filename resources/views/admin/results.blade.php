@extends('admin.layout')

@section('title')
    {{ $survey->name }}
@endsection

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Mijn Resultaten</h2>
        <section class="card__content">
            <ul>
                <li>Aantal stemmers: {{ $code->voters()->count() }}</li>
            </ul>
            <h3>Stellingen</h3>
            <table class="results-table">
                <thead>
                <tr class="results-table__row results-table__row--header">
                    <th class="results-table__cell--proposition">Stelling</th>
                    <th>Eens</th>
                    <th>Oneens</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr class="results-table__row">
                        <td>{{ $result->proposition->proposition }}</td>
                        <td>{{ $result->agree }}</td>
                        <td>{{ $result->disagree }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
