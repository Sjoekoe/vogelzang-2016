@extends('layouts.app')

@section('content')
    <section id="fh5co-home" data-section="home" style="background-image: url({{ asset('images/bg_image.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="to-animate">Stal de vogelzang</h1>
                            <h2 class="to-animate">Waar paardrijden puur genot is!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-testimony" data-section="testimony">
        <div class="row">
            <div class="col-md-12 to-animate">
                <div class="getting-started getting-started-1">
                    <div class="getting-grid" style="background-image:  url({{ asset('images/manege.jpg') }});">
                        <div class="desc"></div>
                    </div>
                    <a href="#" class="getting-grid2">
                        <div class="call-to-action text-center">
                            <p class="sign-up">Over ons</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 2em;">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <div class="row">
                        <div class="col-md-12 subtext">
                            <h3 class="to-animate">
                                De opzetter van Stal de Vogelzang - Peter Wauters - was van kleins af aan actief in de paardensport. <br>
                                Bij de LRV en op allerlei paardenmarkten was hij dan ook een vaak gezien gezicht.
                                <br>
                                Na enig zoeken kocht hij een boerderij met een aantal weiden in lokeren. <br>
                                De koeienstallen maakten plaats voor ruime paardenstallen en werd er een piste aangelegd.
                                <br>
                                Een naam zoeken voor de paardenstal bleek niet zo moeilijk te zijn. De boerderij is gelegen in de vogelzangstraat en op de boerderij hangt er nog steeds een bord met het opschrift "De Vogelzang".
                                <br>
                                Recentelijk zijn er nog vernieuwingen aangebracht, en is er een grote binnenpiste gebouwd met ruime stallen.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <div id="fh5co-counter-section" class="fh5co-counters">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate"><span>Some Fun Facts</span></h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">Hier enkele feiten over Stal de Vogelzang</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row to-animate">
                    <div class="col-md-4 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="{{ $ridersCount }}" data-speed="3000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Ingeschreven ruiters</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="{{ $lessonCount }}" data-speed="3000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Lessen</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="{{ $subscriptionCount }}" data-speed="3000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Lesinschrijvingen</span>
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

        </div>

    </section>

    <section id="fh5co-team" class="fh5co-bg-color" data-section="team">
        <div class="fh5co-team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate"><span>Meet The Team</span></h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">Onze vrijwilligers staan altijd klaar om jullie te helpen. En tot het uiterste te begeleiden tijdens de lessen.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="{{ asset('images/peter2.png') }}" alt="Peter Wauters"></div>
                            <h3>Peter wauters</h3>
                            <span class="position">Stalhouder</span>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-1/p160x160/13754567_10209191779583246_6626096159450168752_n.jpg?oh=9f9eb453bcaa9d35eb88f4470af4ac69&oe=586C20C4" alt="Sofie Poot"></div>
                            <h3>Sofie Poot</h3>
                            <span class="position">Lesgeefster, Eigenares van Corleana</span>
                            <p>Geeft groepslessen op zaterdagmorgend en woensdagnamiddag, en in het bezit van haar initiator diploma.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/1800453_10203542699591867_690159729_n.jpg?oh=af80ef267e7c582dc58996f26b939793&oe=5867A590" alt="Lind Haleydt"></div>
                            <h3>Linde Haleydt</h3>
                            <span class="position">Lesgeefster, Eigenares van Donna</span>
                            <p>Geeft les op zaterdagvoormiddag, alsook de drijvende kracht achter de ponykampen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-blog" data-section="blog">
        <div class="fh5co-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate"><span>Het laatste niews</span></h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">Hier een intro?</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-md-6 to-animate blog">
                            <div class="blog-grid" style="background-image: url({{ asset('/images/items/random/' . rand(0, 8) . '.jpg') }});">
                                <div class="date">
                                    <span>{{ $article->createdAt()->format('d') }}</span>
                                    <small>{{ $article->createdAt()->format('M') }}</small>
                                </div>
                            </div>
                            <a href="#" class="desc">
                                <div class="desc-grid">
                                    <h3>{{ $article->title() }}</h3>
                                </div>
                                <div class="reading">
                                    <i class="icon-arrow-right2"></i>
                                </div>
                            </a>
                        </div>
                    @endforeach
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

    <div id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row">

                <div class="col-md-4 to-animate">
                    <h3 class="section-title">Ons Adres</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map-marker"></i>Vogelzangstraat 12, 9160 Lokeren</li>
                        <li><i class="icon-phone"></i><a href="tel:+32 (0) 475.29.57.60">+32 (0) 475.29.57.60</a></li>
                        <li><i class="icon-envelope"></i><a href="mail:info@staldevogelzang.be">info@staldevogelzang.be</a></li>
                        <li><i class="icon-globe2"></i><a href="{{ route('home') }}">www.staldevogelzang.be</a></li>
                    </ul>
                    <h3 class="section-title">Volg ons</h3>
                    <ul class="social-media">
                        <li><a target="_blank" href="https://www.facebook.com/groups/180597618657465/" class="facebook"><i class="icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-8 to-animate">
                    <h3 class="section-title">Stuur ons een bericht</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Volledige naam</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Volledige naam">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Onderwerp</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Onderwerp">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Bericht</label>
                            <textarea class="form-control" name="message" id="message" rows="7" placeholder="Bericht"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Verzenden">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="map" class="fh5co-map"></div>
@stop
