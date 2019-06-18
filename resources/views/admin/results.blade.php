@extends('admin.layout')

@section('title')
    {{ $survey->name }}
@endsection

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Resultaten</h2>
        <section class="card__content">
            <ul>
                <li>Aantal stemmers: {{ $survey->voters()->count() }}</li>
                <li>Aantal kandidaten: {{ $survey->candidates()->count() }}</li>
            </ul>
            <h3>Stellingen</h3>
        </section>
    </div>
@endsection
