@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-slider-section">
            <div id="slides">
                <ul class="slides-container">
                    <li>
                        <img src="{{ asset('images/bg_image.jpg') }}" alt="">
                        <div class="overlay-slider"></div>
                        <div class="hero-slider-content text-center">
                            <div class="c-vertical">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="hero-slider-text">
                                                <h1 class="animated out" >Stal de vogelzang</h1>
                                                <div class="div-line"></div>
                                                <p class="hero animated out">Waar paardrijden puur genot is</p>
                                            </div> <!-- End hero-text -->
                                        </div> <!-- end col-md-6 -->
                                    </div> <!-- end row -->
                                </div> <!-- End container -->
                            </div> <!-- end c-vertical -->
                        </div> <!-- End hero-content -->
                    </li>
                </ul>
            </div>
        </div> <!-- End hero-section -->
    </section>

    <section>
        <div id="about-section" class="clearfix pad-sec">
            <div class="container">
                <div class="title-section big-title-sec animated out" data-animation="fadeInUp" data-delay="0">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <p class="about-text">
                                In het midden van het waasland in het kleine Heiende, ligt bla bla bla, ik heb geen inspiratie voor een verdere teks momenteel
                            </p>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- end title-section -->

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

    <section id="fh5co-pricing" data-section="pricing">
        <div class="getting-started getting-started-1">
            <a href="#" class="getting-grid2">
                <div class="call-to-action text-center">
                    <p href="#" class="sign-up">Manege</p>
                </div>
            </a>
            <div class="getting-grid" style="background-image:  url({{ asset('images/manege-2.jpg') }});">
                <div class="desc"></div>
            </div>
        </div>
        <div class="fh5co-pricing" style="margin-top: 2em;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <div class="col-md-8 col-md-offset-2 subtext">
                            <h3 class="to-animate">Op woensdagmiddag, vrijdagavond en zaterdag geven wij groepslessen op verschillende niveaus, van beginneling tot gevorderde,
                                van jong tot oud.
                                De lessen worden gegeven door onze eigen ervaren lesgevers.

                                Natuurlijk bestaat er ook de mogelijkheid tot het nemen van privelessen met een van onze lesgevers.

                                Deze kunnen plaatsvinden op tijdstippen buiten onze groepslessen.</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="price-box to-animate">
                            <h2 class="pricing-plan">Groeps-les</h2>
                            <div class="price"><sup class="currency">€</sup>16 <small>per uur</small></div>
                            <p>Voor een enkele les met een lespony</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="price-box to-animate">
                            <h2 class="pricing-plan">Prive-les</h2>
                            <div class="price"><sup class="currency">€</sup>20 <small>per 1/2 uur</small></div>
                            <p>Een one-to-one les met een lespony.</p>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 to-animate">
                        <div class="price-box popular">
                            <div class="popular-text">Best value</div>
                            <h2 class="pricing-plan">Leskaart</h2>
                            <div class="price"><sup class="currency">€</sup>130</div>
                            <p>Een beurtenkaart voor 10 groepslessen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-services" data-section="services">
        <div class="getting-started getting-started-1">
            <div class="getting-grid" style="background-image:  url({{ asset('images/groepswandeling.jpg') }});">
                <div class="desc"></div>
            </div>
            <a href="#" class="getting-grid2">
                <div class="call-to-action text-center">
                    <p href="#" class="sign-up">Pensionstal</p>
                </div>
            </a>
        </div>
        <div class="fh5co-services" style="margin-top: 2em;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">U kan bij ons terecht voor het verhuur van stallingen. Dit kan voor voor zowel vol- als halfpension. Voor meer informatie kan u ons altijd contacteren. of kom gerust eens langs. </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Onbeperkt gebruik faciliteiten</h3>
                            </div>
                        </div>

                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Dagelijks vers hooi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Uitmesten van stallen</h3>
                            </div>
                        </div>

                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Dagelijkse Weidegang</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Persoonlijke opbergkast</h3>
                            </div>
                        </div>

                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Begeleiden van veearts/hoefsmid</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Maandelijkse groepswandeling</h3>
                            </div>
                        </div>

                        <div class="box-services">
                            <div class="fh5co-post to-animate">
                                <h3>Deelname aan onze lessen</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="core-features">
            <div class="grid2 to-animate" style="background-image: url({{ asset('images/accomodatie.jpg') }});">
            </div>
            <div class="grid2 fh5co-bg-color">
                <div class="core-f">
                    <h2 class="to-animate">Onze faciliteiten</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>+/- 50 verluchte binnenstallen</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>5 buitenstallen</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>4 grote loopstallen</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Automatische drinkbakken</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Stofvrije binnenpiste</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Verlichte Buitenpiste</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>2 wasplaatsen met warm & koud water</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Solarium</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Paddock</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Longeerpiste</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Verschillende ruime weides in de omgeving</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Voldoende springmateriaal</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Wandelroutes</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Parking</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Verwarmde Cafetaria</h3>
                                </div>
                            </div>
                            <div class="core">
                                <div class="fh5co-post to-animate">
                                    <h3>Sanitaire voorzieningen</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-explore" data-section="explore">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="to-animate"><span>Bekijk enkele sfeerbeelden van onze stal</span></h2>
                </div>
            </div>
        </div>
        <div class="fh5co-project">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/buitenstallen.jpg') }});">
                            <div class="desc">
                                <h3><a href="#">Buitenstallen</a></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/piste.jpg') }});">
                                    <div class="desc">
                                        <h3><a href="#">Binnenpiste</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/wasplaats.jpg') }});">
                                    <div class="desc">
                                        <h3><a href="#">Wasplaats</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/wasplaats.png') }});">
                            <div class="desc">
                                <h3><a href="#">Wasplaats</a></h3>
                            </div>
                        </div>
                        <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/stalpaard.jpg') }});">
                            <div class="desc">
                                <h3><a href="#">Stal</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/stal.jpg') }});">
                                    <div class="desc">
                                        <h3><a href="#">Open stal</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/spring.jpg') }});">
                                    <div class="desc">
                                        <h3><a href="#">Springmateriaal</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-grid to-animate-2" style="background-image:  url({{ asset('images/manege.jpg') }});">
                            <div class="desc">
                                <h3><a href="#">Onze ingang</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-faq" class="fh5co-bg-color" data-section="faq">
        <div class="fh5co-faq">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate"><span>Veelgestelde vragen</span></h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">Alles wat je moet weten om te beginnen met paardrijden</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Hoe oud moet ik zijn.</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Is het dragen van paardrij kledij verplicht? </h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Kan ik zelf mijn pony kiezen?</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Hoeveel kost het huren van een stal?</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Wanneer moet ik aanwezig zijn voor mijn les.</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="box-faq to-animate-2">
                            <i class="icon-check2"></i>
                            <div class="desc">
                                <h3>Kan ik ook een paard / pony huren?</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
