@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>Onze accommodatie</h1>
                                <div class="div-line"></div>
                                <p class="hero">Alles wat uw paard wensen kan.</p>
                            </div>
                        </div> <!-- end col-md-6 -->
                    </div> <!-- end row -->
                </div> <!-- End container -->
            </div> <!-- End hero-content -->
        </div> <!-- End hero-section -->
    </section>

    <section>
        <div id="services-page-section" class="pad-sec">
            <div class="container">

                <div class="title-section big-title-sec animated fadeInUp in" data-animation="fadeInUp" data-delay="0">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2 class="big-title">Onze faciliteiten</h2>
                            <h1 class="big-subtitle">Alles wat we hebben, daar mogen jij en je paard gebruik van maken.</h1>
                            <hr>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- end title-section -->

                <div class="row">
                    <div class="col-md-3 without-padding">
                        <div class="left-features-services">
                            <ul class="features-list">
                                <!-- feature -->
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>+/- 50 verluchte binnenstallen</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>5 buitenstallen</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>4 grote loopstallen</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Automatische drinkbakken</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Stofvrije binnenpiste</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Verlichte Buitenpiste</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>2 wasplaatsen met warm & koud water</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                                <li>
                                    <div class="left-features-box animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Solarium</h6>
                                        </div> <!-- end features-box-content -->
                                    </div> <!-- end left-features-box -->
                                </li>
                            </ul> <!-- end features-list -->
                        </div> <!-- end left-features-service -->
                    </div><!--  end col-md-3 -->

                    <div class="col-md-6">
                        <div class="features-image animated fadeInUp in" data-animation="fadeInUp" data-delay="0">
                            <img src="{{ asset('images/correke.jpg') }}" height="500" alt="">
                        </div> <!-- end features-image -->
                    </div> <!-- end col-md-6 -->

                    <div class="col-md-3 without-padding">
                        <div class="right-features-services">
                            <ul class="features-list">
                                <!-- feature -->
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Verschillende ruime weides in de omgeving</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Paddock</h6>
                                        </div>
                                    </div>
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Longeerpiste</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Voldoende springmateriaal</h6>
                                        </div>
                                    </div>
                                </li>
                                <!-- feature -->
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Wandelroutes</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Auto & trailer-parking</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Sanitaire voorzieningen</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="right-features-box animated fadeInRight in" data-animation="fadeInRight" data-delay="0">
                                        <div class="features-box-content">
                                            <h6>Verwarmde Cafetaria</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul> <!-- end features-list -->
                        </div>
                    </div> <!-- end col-md-3 -->

                </div> <!-- end row -->
            </div> <!-- End container -->
        </div> <!-- End team-section -->
    </section>

    <section>
        <div id="statistic-section" data-stellar-background-ratio="0" style="">
        </div> <!-- end statistic-section -->
    </section>

    <section>
        <div id="about-team" class="pad-t-100">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title-section">
                            <h3>Verhuur van stallen</h3>
                        </div>
                        <p>
                            U kan bij ons terecht voor het verhuur van stallingen. Dit kan voor voor zowel vol- als halfpension.
                            <br>
                            Voor meer informatie kan u ons altijd contacteren. of kom gerust eens langs.
                        </p>
                        <p>
                            Inbegrepen is:
                            <ul>
                                <li>Onbeperkt gebruik faciliteiten</li>
                                <li>Dagelijks vers hooi</li>
                                <li>Uitmesten van stallen</li>
                                <li>Dagelijkse Weidegang</li>
                                <li>Persoonlijke opbergkast</li>
                                <li>Begeleiden van veearts/hoefsmid</li>
                                <li>Maandelijkse groepswandeling</li>
                            </ul>
                        </p>
                    </div> <!-- end col-md-6 -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>

@stop
