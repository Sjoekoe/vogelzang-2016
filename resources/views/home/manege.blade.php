@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>De Manege</h1>
                                <div class="div-line"></div>
                                <p class="hero">Van uw eerste longe les, tot wedstrijdniveau...</p>
                            </div>
                        </div> <!-- end col-md-6 -->
                    </div> <!-- end row -->
                </div> <!-- End container -->
            </div> <!-- End hero-content -->
        </div> <!-- End hero-section -->
    </section>

    <section>
        <div id="about-team" class="pad-t-100">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title-section">
                            <h3>Rijlessen</h3>
                        </div>
                        <p>
                            Op woensdagmiddag, vrijdagavond en zaterdag geven wij groepslessen op verschillende niveaus, van beginneling tot gevorderde,
                            van jong tot oud. <br>
                            De lessen worden gegeven door onze eigen ervaren lesgevers.
                        </p>
                        <p>
                            Natuurlijk bestaat er ook de mogelijkheid tot het nemen van privelessen met een van onze lesgevers.
                        </p>
                        <p>
                            Deze kunnen plaatsvinden op tijdstippen buiten onze groepslessen.
                        </p>
                    </div> <!-- end col-md-6 -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>

    <section>
        <div id="prices-section" class="pad-sec">
            <div class="container">
                <div class="title-section text-center animated fadeInUp in" data-animation="fadeInUp" data-delay="0">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2>Onze prijzen</h2>
                            <hr>
                            <p>Bij al onze lessen krijgt u een lespony ter beschikking gesteld. <br>
                                Ook het gebruik van een tok is mogelijk. Mensen met een eigen paard of pony zijn natuurlijk ook welkom.
                            </p>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- end title-section -->

                <div class="row">
                    <div class="col-sm-4">
                        <ul class="price-table animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                            <li class="title-price">
                                <h3>Groepsles</h3>
                            </li>
                            <li class="price-box">
                                <p class="price"><span class="currency">&euro;</span>16</p>
                                <p class="months">per beurt</p>
                            </li>
                        </ul>
                    </div> <!-- end col-sm-4 -->

                    <div class="col-sm-4">
                        <ul class="price-table animated fadeInUp in" data-animation="fadeInUp" data-delay="0">
                            <li class="title-price">
                                <h3>Privé les</h3>
                            </li>
                            <li class="price-box">
                                <p class="price"><span class="currency">&euro;</span>20</p>
                                <p class="months">per half uur</p>
                            </li>
                        </ul>
                    </div> <!-- end col-sm-4 -->

                    <div class="col-sm-4">
                        <ul class="price-table animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                            <li class="title-price">
                                <h3>10-Beurtenkaart</h3>
                            </li>
                            <li class="price-box">
                                <p class="price"><span class="currency">&euro;</span>130</p>
                                <p class="months">per kaart</p>
                            </li>
                        </ul>
                    </div> <!-- end col-sm-4 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </section>

    <section>
        <div id="statistic-section" data-stellar-background-ratio="0" style="">
        </div> <!-- end statistic-section -->
    </section>

    <section id="kampen">
        <div id="about-team" class="pad-t-100">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title-section">
                            <h3>Ponykampen</h3>
                        </div>
                        <p>
                            Tijdens de schoolvakanties organiseren wij in samenwerking met de stad Lokeren ponykampen.
                            <br>
                            De duur van de kampen varieert van 2 dagen tot een hele week, waar er tal van activiteiten gepland staan voor de deelnemers.
                        </p>
                        <p>
                            De plaatsen voor deze kampen zijn beperkt, dus snel zijn is de boodschap. <br>
                            Contacteer ons om in te schrijven, of kom gerust eens langs.
                        </p>
                        <br>
                        <div class="title-section">
                            <h3>Kampen 2017</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <ul>
                                    <li>03-07-2017 - 07-07-2017 (Stad Lokeren, Inschrijven via sportdienst)</li>
                                    <li>10-07-2017 - 14-07-2017</li>
                                    <li>
                                        17-07-2017 - 20-07-2017 <br>
                                        Dressuur / Springkamp 4 dagen met buitenwandeling. <br>
                                        Brevet afname bekwaamheid, A en B brevet - examen op 20/07
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <ul>
                                    <li>07-08-2017 - 11-08-2017</li>
                                    <li>
                                        14-08-2017 - 18-08-2017 <br>
                                        Brevet afname bekwaamheid, A brevet - examen op 18/08
                                    </li>
                                    <li>21-08-2017 - 25-08-2017 (Stad Lokeren, Inschrijven via sportdienst)</li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="title-section">
                            <h3>Prijzen</h3>
                        </div>
                        <div class="col-md-6">
                            <p>
                                Leden €150 <br>
                                Niet leden €175 <br>
                                Paarden / Pony's gestald op vogekzang: €100
                            </p>
                        </div>
                    </div> <!-- end col-md-6 -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>
@stop
