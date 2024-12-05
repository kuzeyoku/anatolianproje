<section class="project-one">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline">Projelerimiz</span>
                <div class="section-title__icon">
                    <img src="{{asset("assets/images/icon/section-title-icon.png")}}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Tamamlanmış Projelerimiz</h2>
        </div>
        <div class="project-one__bottom">
            <div class="project-one__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                        "loop": true,
                        "autoplay": true,
                        "margin": 30,
                        "nav": false,
                        "dots": false,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"fas fa-long-arrow-alt-left\"></span>","<span class=\"fas fa-long-arrow-alt-right\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 1
                            },
                            "992": {
                                "items": 1
                            },
                            "1290": {
                                "items": 1
                            }
                        }
                    }'>
                @foreach($projects as $project)
                    <div class="item">
                        <div class="project-one__single">
                            <div class="project-one__img-box">
                                <div class="project-one__img">
                                    <img src="{{$project->image}}" alt="">
                                </div>
                                <div class="project-one__content-inner">
                                    <div class="project-one__content-box">
                                        <div class="project-one__content">
                                            <div class="project-one__icon">
                                                <span class="icon-salary"></span>
                                            </div>
                                            <h3 class="project-one__title">
                                                <a href="{{$project->url}}">{{$project->title}}</a>
                                            </h3>
                                        </div>
                                        <div class="project-one__arrow">
                                            <a href="{{$project->url}}">
                                                <span class="icon-next"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
