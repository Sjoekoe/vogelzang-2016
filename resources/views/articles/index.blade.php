@extends('layouts.app')

@section('content')
    <section>
        <div id="hero-section" class="home-hero-2" data-stellar-background-ratio="0" style="background: url({{ asset('images/bg_image.jpg') }} ) no-repeat center center fixed;">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="hero-text">
                                <h1>Nieuws</h1>
                                <div class="div-line"></div>
                                <p class="hero">Het laatste nieuws over en voor de vogelzangers.</p>
                            </div>
                        </div> <!-- end col-md-6 -->
                    </div> <!-- end row -->
                </div> <!-- End container -->
            </div> <!-- End hero-content -->
        </div> <!-- End hero-section -->
    </section>

    <section>
        <div id="section-blog" class="pad-sec">
            <div class="container">

                <div id="main" class="col-md-12 clearfix">

                    @foreach ($articles as $article)
                        <!-- Blog post -->
                        <article class="blog-post">
                            <div class="blog-item-body">
                                <h3 class="entry-title p-name">{{ $article->title() }}</h3>

                                <div class="blog-entry-meta">
                                    <i class="fa fa-clock-o"></i> {{ $article->createdAt('d M') }}
                                    <span class="separator">&nbsp;</span>
                                    <i class="fa fa-user"></i> {{ $article->author()->username() }}
                                </div>

                                <div class="blog-entry-body">
                                    <p>{!! nl2br($article->message()) !!}</p>
                                </div>
                            </div> <!-- end blog-item-body -->
                        </article>
                    @endforeach


                </div> <!-- End main -->

            </div> <!-- end container -->
        </div>
    </section>
@stop
