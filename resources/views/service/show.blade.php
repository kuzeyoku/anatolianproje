@extends("layouts.main")
@section("content")
    @include("layouts.breadcrumb")
    <section class="service-benifit">
        <div class="container">
            <div class="service-benifit__inner">
                <div class="section-title-two text-left">
                    <div class="section-title-two__tagline-box">
                        <a href="{{ route("contact.index") }}" class="section-title-two__tagline thm-btn"
                            title="Hızlı teklif almak için tıklayın">Hızlı Teklif Al</a>
                    </div>
                    <h2 class="section-title-two__title">{{$service->title}}</h2>
                </div>
                {!! $service->description !!}
            </div>
            @if($service->getMedia('documents')->count())
                <div class="content-documents">
                    <div class="row g-3">
                        @foreach($service->getMedia('documents') as $doc)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ $doc->getUrl() }}" target="_blank" class="text-decoration-none">
                                    <div class="card doc-card h-100 text-center p-3">
                                        <div class="card-body">
                                            <i class="fas fa-file-alt fa-3x mb-3 text-danger"></i>
                                            <p class="card-text small text-muted" title="{{ $doc->file_name }}">
                                                {{ $doc->file_name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
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
                            <img src="{{ asset("assets/images/icon/section-title-icon.png") }}" alt="Hizmetler İkonu"
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
                                        <img src="{{$item->image}}" alt="{{$item->title}}" loading="lazy">
                                    </div>
                                </div>
                                <div class="services-one__content">
                                    <div class="services-one__icon">
                                        <span class="icon-verified"></span>
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
                                        <a href="{{$item->url}}" class="services-one__btn"
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