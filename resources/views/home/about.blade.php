@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>Over ons</h1>
                                <div class="div-line"></div>
                                <p class="hero">Onze historie en het team van VZW de vogelzang.</p>
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
                            <h3>Over Stal de vogelzang</h3>
                        </div>
                        <p>
                            De oprichter van Stal de Vogelzang - Peter Wauters - was van kleins af aan actief in de paardensport. <br>
                            Bij de LRV en op allerlei paardenmarkten was hij dan ook een vaak gezien gezicht.
                            <br>
                            Na enig zoeken kocht hij een boerderij met een aantal weiden in Lokeren. <br>
                            De koeienstallen maakten plaats voor ruime paardenstallen en werd er een piste aangelegd.
                            <br>
                            Een naam zoeken voor de paardenstal bleek niet zo moeilijk te zijn. De boerderij is gelegen in de vogelzangstraat en op de boerderij hangt er nog steeds een bord met het opschrift "De Vogelzang".
                            <br>
                            Recentelijk zijn er nog vernieuwingen aangebracht, en is er een grote binnenpiste gebouwd met ruime stallen.
                        </p>
                    </div> <!-- end col-md-6 -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>

    <section>
        <div id="statistic-section" data-stellar-background-ratio="0" style="">
            <div class="container">
                <div class="row">

                    <!-- countTo -->
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="statistic-percent" data-perc="{{ $ridersCount }}">
                            <div class="fact">
                                <span class="percentfactor">{{ $ridersCount }}</span>
                                <p>Geregistreerde ruiters</p>
                            </div> <!-- end fact -->
                        </div> <!-- end statistic-percent -->
                    </div> <!-- end col-xs-6 col-sm-3 col-md-3 -->

                    <!-- countTo -->
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="statistic-percent" data-perc="{{ $lessonCount }}">
                            <div class="fact">
                                <span class="percentfactor">{{ $lessonCount }}</span>
                                <p>Gegeven lessen</p>
                            </div> <!-- end fact -->
                        </div> <!-- end statistic-percent -->
                    </div> <!-- end col-xs-6 col-sm-3 col-md-3 -->

                    <!-- countTo -->
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="statistic-percent" data-perc="{{ $subscriptionCount }}">
                            <div class="fact">
                                <span class="percentfactor">{{ $subscriptionCount }}</span>
                                <p>Les inschrijvingen</p>
                            </div> <!-- end fact -->
                        </div> <!-- end statistic-percent -->
                    </div> <!-- end col-xs-6 col-sm-3 col-md-3 -->

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end statistic-section -->
    </section>
@stop
