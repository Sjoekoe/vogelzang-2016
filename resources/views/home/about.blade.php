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
                            Na enig zoeken kocht hij een boerderij met een aantal weiden in lokeren. <br>
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

    <section>
        <div id="team-section" class="pad-sec">
            <div class="container">
                <div class="title-section animated out" data-animation="fadeInUp" data-delay="0">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2>Ons geweldig team</h2>
                            <hr>
                            <p>Gedreven door een gezamelijke passie voor paarden, willen we u de beste ervaring brengen.</p>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- end title-section -->

                <div class="team-members">
                    <div class="row mb30">
                        <!-- member-team -->
                        <div class="col-sm-4 mb30">
                            <div class="member-team animated out" data-animation="fadeInLeft" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/14355693_1052531331512953_6978833390909970882_n.jpg?oh=268599828298bc8d52e162c51bf46962&oe=58834935" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Peter</h3>
                                        <p>Staleigenaar</p>
                                        <p>We’ll etch your brand onto tangible objects: business cards, ads, stickers, brochures, you name it. You won’t see business cards, ads, stickers, brochures anything until we’re done drooling at the result.</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                        <!-- member-team -->
                        <div class="col-sm-4">
                            <div class="member-team animated out" data-animation="fadeInUp" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/11824949_10206757748493990_5039102218625029560_n.jpg?oh=e765b479473b98392432dcbe4085c30f&oe=587D584A" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Sofie</h3>
                                        <p>Lesgeefster, Eigenares van Corleana</p>
                                        <p>Geeft groepslessen op zaterdagmorgend en woensdagnamiddag, en in het bezit van haar initiator diploma.</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                        <!-- member-team -->
                        <div class="col-sm-4 mb30">
                            <div class="member-team animated out" data-animation="fadeInRight" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/58001_10201102423186482_1190990591_n.jpg?oh=6460a68cc405b782e79c752bdcc28d6c&oe=5879A4FE" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Linde</h3>
                                        <p>Lesgeefster, Eigenares van Donna</p>
                                        <p>Geeft les op zaterdagvoormiddag, alsook de drijvende kracht achter de ponykampen.</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                        <!-- member-team -->
                        <div class="col-sm-4 mb30">
                            <div class="member-team animated out" data-animation="fadeInRight" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/13528723_1315037648524303_8013691554533728004_n.jpg?oh=689174ff9819f2f3d715fa86cad0f810&oe=586BFFAB" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Lynn</h3>
                                        <p>Lesgeefster, Eigenares van Evita</p>
                                        <p>Geeft les op zaterdagnamiddag en woensdagnamiddag</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                        <!-- member-team -->
                        <div class="col-sm-4 mb30">
                            <div class="member-team animated out" data-animation="fadeInRight" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/13511036_10210032366391697_5199090697000772519_n.jpg?oh=4e1113a7773c24313012d130d49883ce&oe=58655FE9" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Caroline</h3>
                                        <p>Lesgeefster, Eigenares van Laika</p>
                                        <p>Geeft les op zaterdagnamiddag en springles op vrijdag.</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                        <!-- member-team -->
                        <div class="col-sm-4 mb30">
                            <div class="member-team animated out" data-animation="fadeInRight" data-delay="0">
                                <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/14222081_1381296415218386_2250593258897722813_n.jpg?oh=3148d1323897d59fe9cb4249ec9e53d3&oe=583A7A91" alt="">
                                <div class="magnifier">
                                    <div class="magnifier-inner">
                                        <h3>Maya</h3>
                                        <p>Lesgeefster, Eigenares van Crusador</p>
                                        <p>Geeft les op zaterdagnamiddag en springles op vrijdag.</p>
                                    </div> <!-- End magnifier-inner -->
                                </div> <!-- End magnifier -->
                            </div> <!-- End member-team -->
                        </div> <!-- End col-sm-4 -->

                    </div>
                </div> <!-- End team-members -->
            </div> <!-- End container -->
        </div> <!-- End team-section -->
    </section>
@stop
