<header class="main-header">
    <div class="main-menu__top">
        <div class="container">
            <div class="main-menu__top-inner">
                <ul class="list-unstyled main-menu__contact-list">
                    <li>
                        <div class="icon">
                            <i class="icon-telephone-call"></i>
                        </div>
                        <div class="text">
                            <p><a href="tel:@setting('contact', 'phone')">@setting("contact", "phone")</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="icon-mail"></i>
                        </div>
                        <div class="text">
                            <p><a href="mailto:@setting('contact', 'email')">@setting('contact', 'email')</a>
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="main-menu__top-right">
                    <div class="main-menu__social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="container">
                <div class="main-menu__wrapper-inner">
                    <div class="main-menu__left">
                        <div class="main-menu__logo">
                            <a href="{{route("home")}}">
                                <img src="{{asset("assets/images/resources/logo-1.png")}}" alt="">
                            </a>
                        </div>
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                @foreach ($menus as $menu)
                                    @if ($menu->parent_id === 0)
                                        @if ($menu->subMenu->isNotEmpty())
                                            @include('layouts.menu', ['menu' => $menu])
                                        @else
                                            <li>
                                                <a href="{{ $menu->url }}">{{ $menu->title }}</a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__btn-box">
                            <a href="{{route("contact.index")}}" class="main-menu__btn thm-btn"><span
                                    class="icon-right-arrow"></span> İletişim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>