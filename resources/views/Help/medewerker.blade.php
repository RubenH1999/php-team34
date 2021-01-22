@extends('layouts.template')

@section('main')
    <h1>Help</h1>
    <div class="container">
        <h2 id="afwezigheidMelden">Afwezigheid melden</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/rtupuBsgoIk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <p>
            Om je als medewerker afwezig te melden voor een shift klik bovenaan op het pijltje naast je account naam en kies Afwezigheid melden
            <br>
            Kies hier de shift waarvoor je je afwezig wenst te melden en  voeg een reden toe.<br>
            Als alles is ingevult klik op de knop "afwezigheid melden" dan wordt de coach ingelicht over je afwezigheid
        </p>
    </div>
    <div class="container">
        <h2 id="uurroosterBekijken">Uurrooster bekijken</h2>
        <div class="row justify-content-center">
            <img src="/storage/images/bekijkShift.PNG" width="50%" height="50%">
        </div>
        <p>
            Hier kan u per dag de shift regeling bekijken, wenst u meer infomatie te verkrijgen over een shift klik op de shift en er zal een pop up verschijnen
            met alle informatie van de shift.
        </p>
    </div>
@endsection
