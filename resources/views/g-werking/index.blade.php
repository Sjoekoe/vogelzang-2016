@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>G-werking</h1>
                                <div class="div-line"></div>
                                <p class="hero">Paardrijden voor jongeren met individuele noden</p>
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
                        <p>Voor kinderen/jongeren met speciefieke noden bieden wij in samenwerking met de provincie oost vlaanderen rijlessen aan voor zowel individuen als groepen.</p>
                        <p>Woensdagnamiddag kan je altijd vrijblijvend komen kijken.</p>
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
                                Ook het gebruik van een tok is mogelijk.
                            </p>
                            <p>Wenst u meer informatie kan u mailen naar <a
                                        href="mailto:g-werking@staldevogelzang.be">g-werking@staldevogelzang.be</a></p>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- end title-section -->

                <div class="row">
                    <div class="col-sm-6">
                        <ul class="price-table animated fadeInLeft in" data-animation="fadeInLeft" data-delay="0">
                            <li class="title-price">
                                <h3>Individuele sessie</h3>
                            </li>
                            <li class="price-box">
                                <p class="price"><span class="currency">&euro;</span>25</p>
                                <p class="months">per uur</p>
                            </li>
                        </ul>
                    </div> <!-- end col-sm-4 -->

                    <div class="col-sm-6">
                        <ul class="price-table animated fadeInUp in" data-animation="fadeInUp" data-delay="0">
                            <li class="title-price">
                                <h3>Groepssessies</h3>
                            </li>
                            <li class="price-box">
                                <p class="months">Op aavraag</p>
                            </li>
                        </ul>
                    </div> <!-- end col-sm-4 -->

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </section>
@stop
