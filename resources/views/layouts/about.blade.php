<section class="about-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="about-one__img-box">
                                <div class="about-one__img-1">
                                    <img src="{{asset("assets/images/resources/about-one-img-1.jpg")}}" alt="">
                                </div>
                                <div class="about-one__img-2">
                                    <img src="{{asset("assets/images/resources/about-one-img-2.jpg")}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="about-one__img-box-two">
                                <div class="about-one__img-3">
                                    <img src="{{asset("assets/images/resources/about-one-img-3.jpg")}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline">@lang("front/about.txt1")</span>
                            <div class="section-title__icon">
                                <img src="{{asset("assets/images/icon/section-title-icon.png")}}" alt="">
                            </div>
                        </div>
                        <h2 class="section-title__title">@lang("front/about.txt2")
                        </h2>
                    </div>
                    <p class="about-one__text">@lang("front/about.txt3")</p>
                    <div class="about-one__count-and-points-box">
                        <div class="about-one__points-box">
                            <ul class="about-one__points list-unstyled">
                                <li>
                                    <h3>@lang("front/about.txt4")</h3>
                                    <p>@lang("front/about.txt5")</p>
                                </li>
                                <li>
                                    <h3>@lang("front/about.txt6")</h3>
                                    <p>@lang("front/about.txt7")</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-one__btn-and-client-info">
                        <div class="about-one__btn-box">
                            <a href="{{$about?->url}}" class="about-one__btn thm-btn">
                                <span class="icon-right-arrow"></span>@lang("front/about.txt8")</a>
                        </div>
                        <div class="about-one__client-info">
                            <div class="about-one__client-signature">
                                <img src="{{asset("assets/images/resources/about-one-client-signature.png")}}" alt="">
                            </div>
                            <p>@lang("front/about.txt9")</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
