<section class="page-header">
    <div class="page-header__bg"
        style="background-image: url({{asset("assets/images/backgrounds/page-header-bg.jpg")}});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route("home")}}">Ana Sayfa</a></li>
                    @hasSection('parent_title')
                        <li><span>-</span></li>
                        <li><a href="@yield("parent_url")">@yield("parent_title")</a></li>
                    @endif
                </ul>
            </div>
            <h2>@yield("title")</h2>
        </div>
    </div>
</section>