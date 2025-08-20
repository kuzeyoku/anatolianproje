<section class="services-one">
    <div class="services-one__bg"
         style="background-image: url({{asset("assets/images/backgrounds/services-one-bg.jpg")}});">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline">Hizmetlerimiz</span>
                <div class="section-title__icon">
                    <img src="{{asset("assets/images/icon/section-title-icon.png")}}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Yenilikçi Çözümlerimiz</h2>
        </div>
        <div class="services-one__inner">
            <div class="owl-carousel thm-owl__carousel--range owl-theme services-one__carousel"
                 data-owl-options='{"loop": false,
                    "nav": true,
                    "autoWidth": false,
                    "navText": ["<span class=\"icon-prev\"></span>","<span class=\"icon-next\"></span>"],
                    "dots": false,
                    "margin": 10,
                    "items": 1,
                    "smartSpeed": 700,
                    "responsive": {
                        "0": {
                            "margin": 30,
                            "items": 1,
                            "autoWidth": false
                        },
                        "768": {
                            "margin": 30,
                            "items": 2,
                            "autoWidth": false
                        },
                        "992": {
                            "margin": 30,
                            "items": 2
                        },
                        "1200": {
                            "margin": 30,
                            "items": 3
                        }
                    }}'>
                @foreach($services as $service)
                    <div class="item">
                        <div class="services-one__single">
                            <div class="services-one__img-box">
                                <div class="services-one__img">
                                    <img src="{{$service->image}}" alt="">
                                </div>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__icon">
                                    <span class="icon-verified"></span>
                                </div>
                                <h3 class="services-one__title">
                                    <a href="{{$service->url}}">{{$service->title}}</a>
                                </h3>
                                <div class="services-one__hover-content">
                                    <h3 class="services-one__hover-title"><a href="{{$service->url}}">{{$service->title}}</a></h3>
                                    <p class="services-one__hover-text">{{$service->short_description}}</p>
                                    <a href="{{$service->url}}" class="services-one__btn"><span
                                            class="icon-right-arrow-11"></span>Detaylar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="thm-owl__carousel--range__input"><input type="text" value="" name="range">
            </div>
        </div>
    </div>
</section>
