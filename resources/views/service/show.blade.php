@extends("layouts.main")
@section("content")
    @include("layouts.breadcrumb")
    <section class="service-benifit">
        <div class="container">
            <div class="service-benifit__inner">
                <div class="section-title-two text-left">
                    <div class="section-title-two__tagline-box">
                        <a href="{{ route("contact.index") }}" 
                           class="section-title-two__tagline" 
                           title="Hızlı teklif almak için tıklayın">Hızlı Teklif Al</a>
                    </div>
                    <h2 class="section-title-two__title">{{$service->title}}</h2>
                </div>
                {!! $service->description !!}
            </div>
        </div>
    </section>
    @if($otherServices->isNotEmpty())
        <section class="services-carousel-page">
        <div class="services-one__bg"
            style="background-image: url({{ asset("assets/images/backgrounds/services-one-bg.jpg") }});">
        </div>
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline">Diğerlerini İncelediniz mi?</span>
                        <div class="section-title__icon">
                            <img src="{{ asset("assets/images/icon/section-title-icon.png") }}" 
                                 alt="Hizmetler İkonu" 
                                 loading="lazy">
                        </div>
                    </div>
                    <h2 class="section-title__title">Diğer Hizmetlerimiz</h2>
                </div>
                <div class="services-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                                 "items": 3,
                                 "margin": 30,
                                 "smartSpeed": 700,
                                 "loop": true,
                                 "autoplay": 6000,
                                 "nav": false,
                                 "dots": true,
                                 "navText": ["<span class=\"fa fa-angle-left\"></span>", "<span class=\"fa fa-angle-right\"></span>"],
                                 "responsive": {
                                     "0": {"items": 1},
                                     "768": {"items": 2},
                                     "992": {"items": 2},
                                     "1200": {"items": 3}
                                 }
                             }'>
                    @foreach ($otherServices as $item)
                        <div class="item">
                            <div class="services-one__single">
                                <div class="services-one__img-box">
                                                                    <div class="services-one__img">
                                        <img src="{{$item->image}}" 
                                             alt="{{$item->title}}" 
                                             loading="lazy">
                                    </div>
                                </div>
                                <div class="services-one__content">
                                    <div class="services-one__icon">
                                        <span class="icon-planning"></span>
                                    </div>
                                    <h3 class="services-one__title">
                                        <a href="{{$item->url}}" 
                                           title="{{$item->title}} hizmeti hakkında detaylı bilgi">{{$item->title}}</a>
                                    </h3>
                                    <div class="services-one__hover-content">
                                        <h3 class="services-one__hover-title">
                                            <a href="{{$item->url}}" 
                                               title="{{$item->title}} hizmeti hakkında detaylı bilgi">{{$item->title}}</a>
                                        </h3>
                                        <p class="services-one__hover-text">{{$item->short_description}}</p>
                                        <a href="{{$item->url}}" 
                                           class="services-one__btn" 
                                           title="{{$item->title}} hizmeti detayları">
                                            <span class="icon-right-arrow-11"></span>Detaylar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection