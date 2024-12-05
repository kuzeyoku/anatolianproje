<section class="testimonial-one">
    <div class="testimonial-one__bg"
         style="background-image: url({{asset("assets/images/backgrounds/testimonial-one-bg.png")}});"></div>
    <div class="testimonial-one__shape-1">
        <img src="{{asset("assets/images/shapes/testimonial-one-shape-1.png")}}" alt="">
    </div>
    <div class="container">
        <div class="testimonial-one__inner">
            <div class="testimonial-one__main-content">
                <div class="swiper-container" id="testimonial-one__carousel">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-one__main-content-inner">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5">
                                            <div class="testimonial-one__left">
                                                <div class="testimonial-one__img">
                                                    <img src="{{$testimonial->image}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7">
                                            <div class="testimonial-one__right">
                                                <div class="section-title text-left">
                                                    <div class="section-title__tagline-box">
                                                        <span class="section-title__tagline">Müşteri Yorumları</span>
                                                        <div class="section-title__icon">
                                                            <img src="{{asset("assets/images/icon/section-title-icon-2.png")}}" alt="">
                                                        </div>
                                                    </div>
                                                    <h2 class="section-title__title">Müşterilerimiz Neler Diyor ?</h2>
                                                </div>
                                                <p class="testimonial-one__text">{{$testimonial->message}}</p>
                                                <div class="testimonial-one__client-info">
                                                    <h3>{{$testimonial->name}}</h3>
                                                    <p>{{$testimonial->position}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="testimonial-one__nav">
                    <div class="swiper-button-prev" id="testimonial-one__swiper-button-next">
                        <i class="icon-prev"></i>
                    </div>
                    <div class="swiper-button-next" id="testimonial-one__swiper-button-prev">
                        <i class="icon-next"></i>
                    </div>
                </div>
            </div>

            <div class="testimonial-one__thumb-box">
                <div class="swiper-container" id="testimonial-one__thumb">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-one__img-holder-box">
                                    <div class="testimonial-one__img-holder">
                                        <img src="{{$testimonial->image}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
