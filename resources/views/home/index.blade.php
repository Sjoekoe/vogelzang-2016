@extends('layouts.app')

@section('content')
    <section class="page page-home">

        <div class="cycle-wrap">
            <div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-speed="2000" data-cycle-loop="1">
                <div><img src="{{ asset('images/home5.jpg') }}" alt="Stal de vogelzang" /></div>
            </div>

        </div>

        <div class="page-content">
            <div class="va-wrap">
                <div class="va-t">
                    This is the home content
                </div>
            </div>
        </div>

        <p class="allfin">
            <a href="http://www.allfin.be/" class="logo allfin" target="_blank">
                <img src="{{ asset('images/allfin-white.png') }}" alt="Allfin" />
            </a>
        </p>

        <div id="scroll-down">
            <i class="icon-arrow-down"></i>
        </div>

    </section>

    <div class="page-content-2-col fixed">
        {{ 'popup description' }}
        <hr class="alt" />
        <form name="openhouse" action="#" method="post" class="validate ajax alt">
            <p class="accent">* Required</p>
            <input type="hidden" name="lang" value="nl"/>
            <fieldset>
                <div class="row">
                    <div class="one-half">
                        <ul>
                            <li>
                                <label for="name">Name*</label>
                                <input type="text" name="name" id="name" class="validate[required]" />
                            </li>
                            <li>
                                <label for="phone">Phone*</label>
                                <input type="tel" name="phone" id="phone" class="validate[required]" />
                            </li>
                            <li>
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="validate[required,custom[email]]" />
                            </li>
                            <li>
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" />
                            </li>
                            <li>
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" />
                            </li>
                        </ul>
                    </div>
                    <div class="one-half">
                        <p>Choose</p>
                        <ul>
                            <li class="hidden">
                                <label for="machine">Machine</label>
                                <input type="text" name="machine" id="machine" value="" />
                            </li>
                            <li class="clearfix">
                                <input type="submit" value="Submit" class="submit" />
                            </li>
                        </ul>
                    </div>

                </div>
            </fieldset>
        </form>
    </div>
    <div class="overlay"></div>


    <section id="About" class="page page-about">

        <div class="visual">
            <img src="{{ asset('images/about-building.jpg') }}" alt="Lake Front" />
        </div>

        <div class="page-content-middle">
            Lakefront
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/LGtTPyyx65I?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

    </section>


    <section id="Available" class="page page-available">

        <div class="visual">
            <img src="{{ asset('images/about-building.jpg') }}" alt="Lake Front" />
        </div>

        <div class="page-content-middle big">
            Available
        </div>

    </section>


    <section id="Pictures" class="page page-photos">
        <div class="row g3">
            <div class="three-fourth-half">
                <a href="#" class="fancybox" rel="gallery" title="">
                    <img src="#" alt="#" class="back" />
                    <span class="magnify"><i class="icon-magnify"></i></span>
                </a>
            </div>
            <div class="three-fourth-half">
                <a href="#" class="fancybox" rel="gallery" title="">
                    <img src="#" alt="#" class="back" />
                    <span class="magnify"><i class="icon-magnify"></i></span>
                </a>
            </div>
            <div class="one-fourth">
                <a href="#" class="fancybox" rel="gallery" title="#">
                    <img src="#" alt="#" class="back" />
                    <span class="magnify"><i class="icon-magnify"></i></span>
                </a>
                <div class="hidden">
                    <a href="#" class="fancybox" rel="gallery" title=""></a>
                    <a href="#" class="fancybox" rel="gallery" title=""></a>
                </div>
            </div>
        </div>
    </section>

    <section id="Contact" class="page page-contact">
        <img src="{{ asset('images/contact-bg.jpg') }}" alt="Duinen" class="visual" />

        <div class="page-content-2-col">
            <div class="col1">
                Contact
            </div>
            <div class="col2">

                <form name="contact" action="#" method="post" class="validate ajax">
                    <p class="bottom accent">* Required</p>
                    <input type="hidden" name="lang" value="nl"/>
                    <fieldset>
                        <ul>
                            <li>
                                <label for="name">Name*</label>
                                <input type="text" name="name" id="name" class="validate[required]" />
                            </li>
                            <li>
                                <label for="phone">Phone*</label>
                                <input type="tel" name="phone" id="phone" class="validate[required]" />
                            </li>
                            <li>
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="validate[required,custom[email]]" />
                            </li>
                            <li>
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" />
                            </li>
                            <li>
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" />
                            </li>
                            <li>
                                <label for="message">Message</label>
                                <textarea name="message" id="message"></textarea>
                            </li>
                            <li class="hidden">
                                <label for="machine">Machine</label>
                                <input type="text" name="machine" id="machine" value="" />
                            </li>
                            <li>
                                <input type="submit" value="Sibmit" class="submit" />
                            </li>
                        </ul>
                    </fieldset>
                </form>
            </div>
            <div class="col-bottom-left">
                <a href="http://www.allfin.be/" class="logo" target="_blank">
                    <img src="{{ asset('images/allfin-logo.png') }}" alt="Allfin" />
                </a>
                <p>Knop</p>
            </div>
        </div>

    </section>
@stop
