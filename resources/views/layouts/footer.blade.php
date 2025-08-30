<footer class="site-footer">
    <div class="site-footer__shape-1 float-bob-x">
        <img src="{{asset("assets/images/shapes/site-footer-shape-1.png")}}" alt="">
    </div>
    <div class="site-footer__shape-2 float-bob-y">
        <img src="{{asset("assets/images/shapes/site-footer-shape-2.png")}}" alt="">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="{{route("home")}}">
                                <img src="{{asset("assets/images/resources/footer-logo.png")}}"
                                    alt="@setting("general", "title")">
                            </a>
                        </div>
                        <p class="footer-widget__about-text">@setting("general", "description")</p>
                        <div class="site-footer__social">
                            <a href="#"><i class="icon-facebook-app-symbol"></i></a>
                            <a href="#"><i class="icon-twitter"></i></a>
                            <a href="#"><i class="icon-instagram"></i></a>
                            <a href="#"><i class="icon-linked-in-logo-of-two-letters"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__usefull-link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Bağlantılar</h3>
                        </div>
                        <div class="footer-widget__link-box">
                            <ul class="footer-widget__link list-unstyled">
                                @foreach ($quickLinks as $page)
                                    <li><a href="{{ $page->url }}">{{ $page->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__services">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Hizmetlerimiz</h3>
                        </div>
                        <ul class="footer-widget__link list-unstyled">
                            @foreach ($services as $service)
                                <li><a href="{{ $service->url }}">{{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__post">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Blog</h3>
                        </div>
                        <ul class="footer-widget__post-list list-unstyled clearfix">
                            @foreach ($blogs as $blog)
                                <li>
                                    <div class="footer-widget__post-img">
                                        <img src="{{$blog->image}}" alt="{{ $blog->title }}">
                                    </div>
                                    <div class="footer-widget__post-content">
                                        <p>{{$blog->created_at->format("d M Y")}}</p>
                                        <h4><a href="{{ $blog->url }}">{{ $blog->title }}</a></h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="site-footer__bottom-inner">
                <p class="site-footer__bottom-text">© {{date("Y")}}
                    Copyright <a href="{{route("home")}}">@setting("general", "title")</a> | Tüm Hakları Saklıdır</p>
                <ul class="list-unstyled site-footer__bottom-menu">
                    @foreach ($pages as $page)
                        <li><a href="{{ $page["url"] }}">{{ $page["title"] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>