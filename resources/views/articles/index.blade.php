@extends('layouts.app')

@section('content')
    <section>
        <div id="blog-head" data-stellar-background-ratio="0" style="background-position: 50% 0%;">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <div class="head-title">
                            <h2 class="head-blog-title">Nieuws</h2>
                            <h4 class="head-blog-subtitle">Het laatste nieuws over en voor de vogelzangers.</h4>
                        </div> <!-- end subsection-text -->
                    </div> <!-- end col-md-8 -->

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </section>

    <section>
        <div id="section-blog" class="pad-sec">
            <div class="container">

                <div id="main" class="col-md-12 clearfix">

                    @foreach ($articles as $article)
                        <!-- Blog post -->
                        <article class="blog-post">
                            <div class="blog-media">
                                <img src="{{ asset('/images/items/random/' . rand(0, 8) . '.jpg') }}" alt="" width="600px">
                            </div> <!-- end blog-media -->
                            <div class="blog-item-body">
                                <h3 class="entry-title p-name"><a href="post-image.html" class="u-url">{{ $article->title() }}</a></h3>

                                <div class="blog-entry-meta">
                                    <a href="#"><i class="fa fa-clock-o"></i> {{ $article->createdAt('d M') }}</a>
                                    <span class="separator">&nbsp;</span>
                                    <a href="#"><i class="fa fa-user"></i> {{ $article->author()->username() }}</a>
                                </div>

                                <div class="blog-entry-body">
                                    <p>{!! $article->message() !!}</p>
                                </div>
                            </div> <!-- end blog-item-body -->
                        </article>
                    @endforeach


                </div> <!-- End main -->

            </div> <!-- end container -->
        </div>
    </section>
@stop
