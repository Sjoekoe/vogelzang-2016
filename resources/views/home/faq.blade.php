@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>Veelgestelde vragen</h1>
                                <div class="div-line"></div>
                                <p class="hero">Nog geen antwoord gevonden? Hier vindt je het zeker terug.</p>
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
                @foreach($faqs->chunk(2) as $faqChunk)
                    <div class="row">
                        @foreach($faqChunk as $faq)
                            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 30px;">
                                <div class="title-section">
                                    <h3>{{ $faq->title() }}</h3>
                                </div>
                                <p>
                                    {!! $faq->content() !!}
                                </p>
                            </div> <!-- end col-md-6 -->
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
