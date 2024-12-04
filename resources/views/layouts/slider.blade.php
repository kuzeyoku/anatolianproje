<section class="main-slider">
    <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
         data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-prev\"></span>","<span class=\"icon-next\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>

        @foreach($sliders as $slider)
            <div class="item main-slider__slide-1">
                <div class="main-slider__bg"
                     style="background-image: url({{asset("assets/images/backgrounds/main-slider-bg-1.jpg")}});">
                </div>

                <div class="main-slider__img">
                    <img src="{{$slider->image}}" alt="">
                </div>
                <div class="container">
                    <div class="main-slider__content">
                        <p class="main-slider__sub-title">{{$slider->title}}</p>
                        <h4 class="main-slider__title">{!!$slider->description!!}</h4>
                        <div class="main-slider__btn-box">
                            @if($slider->button)
                                <a href="{{$slider->button}}" class="main-slider__btn-1 thm-btn"><span
                                        class="icon-right-arrow"></span> Detaylar</a>
                            @endif
                            <a href="{{route("contact.index")}}" class="main-slider__btn-2 thm-btn"><span
                                    class="icon-right-arrow"></span> İletişim</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
