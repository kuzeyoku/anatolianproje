@extends("layouts.main")
@section("content")
    @include("layouts.breadcrumb")
    <section class="services-three">
        <div class="services-three__shape-bg"
            style="background-image: url({{ asset("assets/images/shapes/services-three-shape-bg.jpg);") }})"></div>
        <div class="container">
            <div class="section-title-two text-center">
                <h2 class="section-title-two__title">Hizmetlerimiz</h2>
            </div>
            <div class="row">
                <!--Services One Single Start-->
                @foreach ($services as $service)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="services-one__single">
                            <div class="services-one__img-box">
                                <div class="services-one__img">
                                    <img src="{{ $service->image }}" alt="">
                                </div>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__icon">
                                    <span class="icon-planning"></span>
                                </div>
                                <h3 class="services-one__title"><a href="{{$service->url}}">{{$service->title}}</a></h3>
                                <div class="services-one__hover-content">
                                    <h3 class="services-one__hover-title"><a href="{{$service->url}}">{{$service->title}}</a>
                                    </h3>
                                    <p class="services-one__hover-text">{{$service->short_description}}</p>
                                    <a href="{{$service->url}}" class="services-one__btn"><span
                                            class="icon-right-arrow-11"></span>Detaylar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="why-choose-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-xl-6">
                    <div class="why-choose-three__left">
                        <div class="why-choose-three__shape-1 float-bob-y">
                            <img src="{{ asset("assets/images/shapes/why-choose-three-shape-1.png") }}" alt="">
                        </div>
                        <div class="section-title-two text-left">
                            <div class="section-title-two__tagline-box">
                                <p class="section-title-two__tagline">Neden Biz ?</p>
                                <div class="section-title-two__shape">
                                    <img src="{{ asset("assets/images/shapes/section-title-two-shape-2.png") }}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title-two__title">delivery solution the
                                result in happy</h2>
                        </div>
                        <p class="why-choose-three__text">Darkness subdueli wasner flying blessed not two together
                            water<br>
                            fish fruitful divided fly shall days sea his.</p>
                        <div class="why-choose-three__count-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="100ms"
                                    style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <div class="why-choose-three__count-single">
                                        <div class="why-choose-three__counter-shape-1">
                                            <img src="{{ asset("assets/images/shapes/why-choose-three-counter-shape-1.png") }}"
                                                alt="">
                                        </div>
                                        <div class="why-choose-three__count-icon">
                                            <span class="icon-happy-hour"></span>
                                        </div>
                                        <div class="why-choose-three__count-content">
                                            <div class="why-choose-three__count count-box counted">
                                                <h3 class="count-text" data-stop="520" data-speed="1500">520</h3>
                                                <span class="why-choose-three__count-plus">+</span>
                                            </div>
                                            <p class="why-choose-three__count-text">Happy Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="200ms"
                                    style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                                    <div class="why-choose-three__count-single">
                                        <div class="why-choose-three__counter-shape-1">
                                            <img src="{{ asset("assets/images/shapes/why-choose-three-counter-shape-1.png") }}"
                                                alt="">
                                        </div>
                                        <div class="why-choose-three__count-icon">
                                            <span class="icon-start-up"></span>
                                        </div>
                                        <div class="why-choose-three__count-content">
                                            <div class="why-choose-three__count count-box counted">
                                                <h3 class="count-text" data-stop="260" data-speed="1500">260</h3>
                                                <span class="why-choose-three__count-plus">+</span>
                                            </div>
                                            <p class="why-choose-three__count-text">Complete Project</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="why-choose-three__points list-unstyled">
                            <li class="wow fadeInUp animated" data-wow-delay="300ms"
                                style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                <div class="why-choose-three__points-icon">
                                    <span class="icon-love-hand"></span>
                                </div>
                                <div class="why-choose-three__points-content">
                                    <h3>Process Excellence</h3>
                                    <p>Dominion fowlen into there light shelter lightse beginary subdue without
                                        saying unlimiter pot moving winged</p>
                                </div>
                            </li>
                            <li class="wow fadeInUp animated" data-wow-delay="400ms"
                                style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                                <div class="why-choose-three__points-icon">
                                    <span class="icon-patient"></span>
                                </div>
                                <div class="why-choose-three__points-content">
                                    <h3>Satisfied Consulting</h3>
                                    <p>Dominion fowle introduct there light shelter does lights beginary without
                                        saying unlimiter poses move.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-xl-6">
                    <div class="why-choose-three__right">
                        <div class="why-choose-three__img wow slideInRight animated" data-wow-delay="100ms"
                            data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <img src="{{ asset("assets/images/resources/mining.jpg") }}" alt="">
                            <div class="why-choose-three__experience-box">
                                <div class="why-choose-three__experience">
                                    <div class="why-choose-three__experience-count count-box counted">
                                        <h3 class="count-text" data-stop="25" data-speed="1500">30</h3>
                                        <span class="why-choose-three__experience-count-plus">+</span>
                                    </div>
                                    <p class="why-choose-three__experience-count-text">Yılı Aşkın
                                        <br> Tecrübe
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="brand-one brand-three">
        <div class="container">
            <div class="brand-one__text-box count-box">
                Referanslarımız
            </div>
            <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                                    "items": 3,
                                    "margin": 10,
                                    "smartSpeed": 700,
                                    "loop":true,
                                    "autoplay": 6000,
                                    "nav":false,
                                    "dots":false,
                                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                    "responsive":{
                                        "0":{
                                            "items":2
                                        },
                                        "768":{
                                            "items":3
                                        },
                                        "992":{
                                            "items": 5
                                        }
                                    }
                                }'>

                @foreach ($references as $reference)
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{$reference->image}}" alt="">
                            </div>
                            <div class="brand-one__hover-img">
                                <img src="{{$reference->image}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection