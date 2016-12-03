@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>Stal de vogelzang</h1>
                                <div class="div-line"></div>
                                <p class="hero">Waar paardrijden puur genot is.</p>
                            </div>
                        </div> <!-- end col-md-6 -->
                    </div> <!-- end row -->
                </div> <!-- End container -->
            </div> <!-- End hero-content -->
        </div> <!-- End hero-section -->
    </section>

    <section>
        <div id="about-section" class="clearfix pad-sec">
            <div class="container">
                {{--<div class="title-section big-title-sec animated out" data-animation="fadeInUp" data-delay="0">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-8 col-sm-offset-2">--}}
                            {{--<p class="about-text">--}}
                                {{--In het midden van het waasland in het kleine Heiende, ligt bla bla bla, ik heb geen inspiratie voor een verdere teks momenteel--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div> <!-- End row -->--}}
                {{--</div> <!-- end title-section -->--}}

                <div class="about-boxes">
                    <div class="row">

                        <!-- about-box -->
                        <div class="col-sm-3">
                            <div class="about-box animated out" data-animation="fadeInLeft" data-delay="0">
                                <h4>Ponylessen &amp; kampen</h4>
                                <p>Uw eerste longeles, of reeds op wedstrijdniveau, onze lesgeefster kunnen u altijd verder helpen.</p>
                            </div>
                        </div>
                        <!-- about-box -->
                        <div class="col-sm-3">
                            <div class="about-box animated out" data-animation="fadeInUp" data-delay="0">
                                <h4>Verhuur van stallingen</h4>
                                <p>Vol- of halpension. Bij ons bent u aan het juiste adres.</p>
                            </div>
                        </div>
                        <!-- about-box -->
                        <div class="col-sm-3">
                            <div class="about-box animated out" data-animation="fadeInUp" data-delay="0">
                                <h4>Verkoop van paarden</h4>
                                <p>Op zoek naar uw nieuw droom paard of pony. Of wil je van je huidig paard vanaf. Wij kunnen u hierbij helpen.</p>
                            </div>
                        </div>
                        <!-- about-box -->
                        <div class="col-sm-3">
                            <div class="about-box animated out" data-animation="fadeInRight" data-delay="0">
                                <h4>Africhten van paarden.</h4>
                                <p>Onder het zadel of voor de koets. Door onze jarenlange ervaring vormt dit geen probleem voor ons.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- End container -->

        </div> <!-- End about-section -->
    </section>
@stop
