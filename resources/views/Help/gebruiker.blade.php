@extends('layouts.template')

@section('main')
    <div class="container">
        <h2 id="lineupBekijken">Line-up bekijken</h2>
        <p>Klik bovenaan in de navigatie balk op “Line-up”. U ziet nu een lijst met artiesten die komen optreden op het festival. Bij elke artiest staat de naam, een korte beschrijving en een foto. Wilt u meer weten klik dan op “meer info”. U ziet nu een pagina met meer informatie over de artiest. Hier stat informatie over wanner de artiest optreed, waar de artiest optreed en een Spotify link om muziek van de artiest te beluisteren. U kunt de artiest ook toevoegen aan uw persoonlijke timetable met de plus knop langs de naam van de artiest.</p>
    </div>
    <div class="container">
        <h2>Info over het festival</h2>
        <p>Klik bovenaan in de navigatie balk op “Info”. U komt nu op een pagina waar alle informatie over het festival staat. Hier staan de openingstijden, info over de camping, contact gegevens en het grondplan.</p>
    </div>
    <div class="container">
        <h2 id="personalTimetable">Jouw persoonlijke timetable</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/VdOA6ta0YBY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="row justify-content-center">
            <img src="/storage/images/personalTimetable.PNG" width="50%" height="50%">
        </div>
        <p>Klik bovenaan in de navigatie balk op “My line-up”. Kies bij selecteer een datum op een datum van het festival. Klik dan op “Search”. U ziet nu uw persoonlijke timetable. indien hier nog niets staat
            volg dan de uitleg hier onder<br>

            Om een artiest toe te voegen aan je persoonlijke timetable , ga naar line up.
            Klik op meer info bij de artiest die je wenst toe te voegen.
            Op deze pagina klik op de groene + knop naast de naam van de artiest
        <div class="row justify-content-center">
            <img src="/storage/images/add_personal.PNG" width="50%" height="50%">
        </div>
        </p>
    </div>
@endsection
