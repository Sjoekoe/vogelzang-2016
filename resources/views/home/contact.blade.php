@extends('layouts.app')

@section('content')
    <section>
        <div id="module-maps">
            <div id="map"></div>
        </div>
    </section>

    <section>
        <div id="contact-section" class="pad-sec">
            <div class="container">
                <contactform></contactform>
            </div>

        </div>
    </section>

    <section>
        <div class="contact-info">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <a href="#"><i class="fa fa-map-marker active"></i>Vogelzangstraat 12, 9170 Lokeren</a>
                    </div> <!-- End col-sm-4 -->

                    <div class="col-sm-4">
                        <a href="tel:+32 (0) 475.29.57.60"><i class="fa fa-mobile active"></i>+32 (0) 475.29.57.60</a>
                    </div>

                    <div class="col-sm-4">
                        <a href="mailto:info@staldevogelzang.be"><i class="fa fa-envelope-o active"></i>info@staldevogelzang.be</a>
                    </div>

                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- End contact-info -->
    </section>
@stop
