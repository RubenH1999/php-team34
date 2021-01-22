@extends('layouts.template')

@section('main')
    <h1 >Help</h1>
    <div class="container">
    <h2 id="takenBeheren">Taken Beheren</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/7rZoISgfsMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/takenBeheren.PNG" width="50%" height="50%">
        </div>

    <p>Bij taken beheren is het mogelijk om taken toe te voegen, verwijderen & aan te passen</p>
    <ol>
        <li>
            <h4>Taak aanpassen</h4>
            <p>Om een taak aan te passen klik je op de edit knop (1)
                dit zal u naar een nieuwe pagina brengen</p>
            <p>
                Op deze pagina zal u de naam van de taak kunnen aanpassen, wanneer de naam goed
                is klik op de knop "Update"
            </p>
        </li>
        <li>
            <h4>Taak verwijderen</h4>
            <p>
                Om een taak te verwijderen druk op het vuilbak icoontje (2)
                naas de taak die u wents te verwijderen.</p>
            <p>Hierna zal er een popup opkomen die u vraagt of u zeker bent of u de taak wilt
                verwijderen klik op verwijder om de taak te verwijderen. Inien u
                toch wenst de taak te behouden druk op annuleren
            </p>
        </li>
        <li>
            <h4>Taak toevoegen</h4>
            <p>Om een taak toetevoegen klik onderaan op de + knop (3) onderaan de lijst</p>
            <p>Op het volgende scherm zal u de gewenste naam van de taak kunnen invoeren als u de naam hebt ingegeven
                klik dan op de taak toevoegen knop</p>
        </li>
    </ol>
    </div>
    <div class="container">
    <h2 id="artiestenBeheren">Artiesten beheren</h2>
        <div class="row justify-content-center">
        <iframe width="550" height="350" src="https://www.youtube.com/embed/wYRIkkS5_7o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
            <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/artiestenBeheren.png" width="50%" height="50%">
        </div>
    <ol>
        <li>
            <h4>Artiest aanpassen</h4>
            <p>Om een artiest aan te passen klik op de edit knop(1) naast de rapper zijn naam dit
                zal u naar een volgende pagina brengen waar alle gegevens aangepast kunnen worden</p>
            <p>Op deze pagina kunnen de gegevens van de artiest aangepast worden of de rider items bij aan toegevoegd worden
                Als u alles hebt aangepast dat u wenste aan te passen klik dan op de artiest updaten knop</p>

        </li>
        <li>
            <h4>Artiest verwijderen</h4>
            <p>Om een artiest te verwijderen kan je op het vuilbak icoontje(2) klikken naast de naam
                van de artiest die je wenst te verwijderen</p>
            <p>Hierna zal een pop up verschijnen die vraagt of je zeker bent of je de artiest wil verwijderen
                Druk op delete artiest om deze te verwijderen of op cancel om deze actie te annuleren</p>
        </li>
        <li>
            <h4>Nieuwe artiest aanmaken</h4>
            <p>Om een nieuwe artiest aan te maken klik onderaan op de + knop (3) dit
                zal u naar een volgende pagina brengen waar u de informatie van de artiest
                kan ingeven</p>
            <ol>
                <li>
                    <h5 id="spotifyURI">Spotify URI</h5>
                    <p>
                        om de Spotify URI toe te voegen volg deze stappen
                    </p>
                    <ol>
                        <li>
                            Open de Spotify Applicatie op uw computer of
                            open het in uw browser via <a href="https://open.spotify.com/">https://open.spotify.com/</a>
                        </li>
                        <li>
                            Zoek een nummer of album van de artiest dat u wenst te gebruiken
                        </li>


                        <li>
                            Klik met de rechter muisknop op het nummer of album en ga naar share
                            Selecteer hier "Copy spotify URI"
                            <div class="row">
                                <img src="/storage/images/spotifyURI_2.PNG" width="50%" height="50%">
                            </div>
                        </li>
                        <li>
                            Plak nu de Spotify URI in het invoer veld
                        </li>
                        <li>
                            Moest het nog niet duidelijk zijn ga dan naar <a href="https://newsroom.spotify.com/2018-09-04/how-to-embed-spotifys-play-button/">https://newsroom.spotify.com/2018-09-04/how-to-embed-spotifys-play-button/</a>
                        </li>
                    </ol>
                </li>
                <li>
                    <h5 id="afbeeldingLink">Afbeelding link</h5>
                    <p>Om een afbeelding van een artiest toe te voegen hoeft u
                        enkel de locatie url in te voegen om dit te doen volg deze stappen</p>
                    <ol>
                        <li>
                            Ga naar Google afbeeldingen en geef de naam van de gewenste artiest in.

                        </li>
                        <li>
                            Klik op de afbeelding die u wenst te gebruiken en klik daarna
                            met de rechtermuisknop op de afbeelding.
                            Selecteer kopieër afbeelding locatie
                            <div class="row">
                                <img src="/storage/images/images.PNG" width="50%" height="50%">
                            </div>
                        </li>
                        <li>
                            Plak dit dan in het invoer vak voor de afbeelding.
                        </li>
                    </ol>
                </li>
            </ol>

        </li>
    </ol>
    </div>
    <div class="container">
    <h2 id="lineUpBeheren">Line-up beheren</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/JuohTVVy7co" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/lineupBeheren.PNG" width="50%" height="50%">
        </div>
    <p>Bij line up beheren kan je de artiesten hun performance aanpassen/verwijderen/toevoegen</p>
    <ol>
        <li>
            <h4>Ariest performance aanpassen</h4>
            <p>Om het optreden van een artiest aan te passen klik op het edit icoontje (1) naast de naam van de medewerker</p>
            <p>Hierna zal je naar de pagina gebracht worden waar je de info van het performance kan aanpassen
                als alles naar wens is klik op de knop "artiest opslaan" en je zal terug
                naar het overzicht gebracht worden</p>
        </li>
        <li>
            <h4>Artiest performance verwijderen</h4>
            <p>
                om een performance te verwijderen druk op het vuilbak icoontje (2) naast de naam van de artiest
                hierna zal een pop up verschijnen om te bevestigen of je de performance echt wil verwijderen

            </p>
        </li>
        <li>
            <h4>Artiest + performance toevoegen</h4>
            <p>
                Om een artiest & zijn performance toe te voegen druk onderaan op de "+" (3) knop
                naast "nieuwe artiest toevoegen". Dit zal u naar een volgende pagina brengen.
            </p>
            <p>
                Op deze pagina kan u alle info van de artiest en het performance ingeven en op de knop "artiest opslaan" klikken
                Nu zal u terug naar het overzicht gebracht worden.
            </p>
        </li>
    </ol>
    </div>
    <div class="container">
    <h2 id="medewerkersBeheren">Medewerkers beheren</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/msj2b5mMAZs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/medewerkersBeheren.PNG" width="50%" height="50%">
        </div>
    <ol>
        <li>
            <h4>Medewerker aanpassen</h4>
            <p>Om een medewerker aan te passen klik op het edit icoontje (1) naast de naam van de medewerker</p>
            <p>Hierna zal je naar de pagina gebracht worden waar je de info van de medewerker kan aanpassen
                als alles naar wens is klik op de knop "medewerker opslaan" en je zal terug
                naar het overzicht gebracht worden</p>
        </li>
        <li>
            <h4>Medewerker verwijderen</h4>
            <p>
                om een medewerker te verwijderen druk op het vuilbak icoontje (2) naast de naam van de medewerker
                hierna zal een pop up verschijnen om te bevestigen of je de medewerker echt wil verwijderen

            </p>
        </li>
        <li>
            <h4>Medewerker toevoegen</h4>
            <p>
                Om een medewerker toe te voegen druk onderaan op de "+" (3) knop
                naast "nieuwe medewerker toevoegen". Dit zal u naar een volgende pagina brengen.
            </p>
            <p>
                Op deze pagina kan u alle info van de medewerker ingeven en op de knop "medewerker opslaan" klikken
                Nu zal u terug naar het overzicht gebracht worden.
            </p>
        </li>
    </ol>
    </div>
    <div class="container">
    <h2 id="nieuwsBeheren">Nieuws beheren</h2>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/nieuwsBeheren.PNG" width="50%" height="50%">
        </div>
    <ol>
        <li>
            <h4>Nieuws aanpassen</h4>
            <p>Om een nieuws item aan te passen druk op de "edit" knop (1) dit brengt u
            naar de volgende pagina waar u de titel en de tekst van het nieuws item kan aan passen</p>
            <p>
                Wanneer u klaarbent met aanpassen klik op nieuwsitem opslaan en u zal terug naar het overzicht gebracht worden.
            </p>
        </li>
        <li>
            <h4>Nieuws verwijderen</h4>
            <p>Om een nieuws item verwijderen druk op het vuilbak icoontje (2) en klik in de pop up
            </p>
        </li>
        <li>
            <h4>Nieuwsitem toevoegen</h4>
            <p>Om een nieuws item toe te voegen klik onderaan op de "+" knop dit
            zal u naar een volgende pagina brengen waar u het nieuws in kan geven. Klik op "Nieuwsitem opslaan"
            om het nieuws op te slaan en terug naar het overzicht te gaan</p>
        </li>
    </ol>
    </div>
    <div class="container">
    <h2 id="shiftsBeheren">Uurrooster beheren</h2>
        <div class="row justify-content-center">
        <iframe width="550" height="350" src="https://www.youtube.com/embed/PsL5DzTzRgg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
            <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/shiftenBeheren.PNG" width="50%" height="50%">
        </div>
    <ol>
        <li>
            <h4>Shift aanpassen</h4>
            <p>Om een shift aan te passen klik op het edit icoontje (1) op het einde van de kolom</p>
            <p>Hierna zal je naar de pagina gebracht worden waar je de info van de shift kan aanpassen
                als alles naar wens is klik op de knop "save shift" en je zal terug
                naar het overzicht gebracht worden</p>
        </li>
        <li>
            <h4>Shift verwijderen</h4>
            <p>
                om een shift te verwijderen druk op het vuilbak icoontje (2) op het einde van de kolom
                hierna zal een pop up verschijnen om te bevestigen of je de shift echt wil verwijderen

            </p>
        </li>
        <li>
            <h4>Shift toevoegen</h4>
            <p>Om een shift toe te voegen druk bovenaan op de "+ Nieuwe shift aanmaken" knop</p>
            <p>Hierna kom je op een pagina waar ja al de nodige info van de shift kan ingeven en daarna
                als je klaar bent op de knop "save shift" te klikken dit zal je dan terug naar het shiften overzicht brengen</p>
        </li>
    </ol>
    </div>
    <div class="container">
        <h2 id="festivalsBeheren">Festivals beheren</h2>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/j_5bEea20PQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="row justify-content-center">
            <img src="/storage/images/festivalsBeheren.PNG" width="50%" height="50%">
        </div>
        <ol>
            <li>
                <h4>Festival aanpassen</h4>
                <p>Om een festival aan te passen klik op de edit knop (1).
                    Dit zal u naar een pagina brengen waar u de info van het festival kan aanpassen. <br>
                    Klik op festival opslaan om terug te gaan naar het festival overzicht en de aanpassingen op te slaan
                </p>
            </li>
            <li>

                    <h4>Festival verwijderen</h4>

                    <p>Om een festival te verwijderen klik op het vuilbak icoontje (2) en het festival zal verwijderd worden</p>
            </li>
            <li>
                <h4>Nieuw festival aanmaken</h4>
                <p>
                    Om een nieuw festival toe te voegen klik onder aan op de + knop (3)
                    Dit zal u naar een pagina brengen waar u alle info van het festival kan ingeven.
                    <br>
                    Eens u alle informatie van het festival hebt ingegeven klik op festival opslaan en u zal terug naar het festival overzicht gebracht worden waar nu dan ook het nieuwe festival bij zal staan
                </p>
            </li>
        </ol>
    </div>
    <div class="container">
        <h2 id="ticketsBeheren">Tickets beheren</h2>
        <div class="row justify-content-center">
            <iframe width="550" height="350" src="https://www.youtube.com/embed/oLAL8R4NAQc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
        <h4>Stappenplan</h4>
        <div class="row justify-content-center">
            <img src="/storage/images/ticketsBeheren.PNG" width="50%" height="50%">
        </div>
        <ol>
            <li>
                <h4>Ticket aanpassen</h4>
                <p>
                    Om een ticket aan te passen klik op de edit knop (1) deze knop zal u dan naar de pagina brengen waar u de info van het ticket kan aanpassen.
                    <br>
                    Als u de info hebt aangepast klik onderaan op de knop ticket opslaan en u wordt terug gebracht naar het ticket overzicht.
                </p>
            </li>
            <li>
                <h4>Ticket verwijderen</h4>
                <p>
                    Om een ticket te verwijderen klik op de delete knop (2)
                </p>
            </li>
            <li>
                <h4>Nieuw ticket aanmaken</h4>
                <p>
                    Klik onderaan op de + knop (3) en je zal naar de pagina gebracht worden waar je alle informatie kan ingeven.  Als je alle informatie hebt ingegeven klik op ticket opslaan en je zal worden terug gebracht naar het ticket overzicht met het nieuwe ticket er bij
                </p>
            </li>
        </ol>
    </div>

@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection
