<section class="blog-one">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline">Blog</span>
                <div class="section-title__icon">
                    <img src="{{asset("assets/images/icon/section-title-icon.png")}}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Blog & Haberler</h2>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="blog-one__single">
                        <div class="blog-one__img-box">
                            <div class="blog-one__img">
                                <img src="{{$blog->image}}" alt="">
                            </div>
                        </div>
                        <div class="blog-one__content">
                            <div class="blog-one__date">
                                <p>{{$blog->created_at->format("d")}}<br>
                                    <span>{{$blog->created_at->format("M")}}</span>
                                </p>
                            </div>
                            <ul class="blog-one__meta list-unstyled">
                                <li>
                                    <a href="{{$blog->url}}"><span class="icon-user-icon"></span>{{$blog->user->name}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$blog->url}}"><span
                                                class="icon-comment-icon"></span>({{$blog->comments->count()}})
                                        Yorum</a>
                                </li>
                            </ul>
                            <h3 class="blog-one__title"><a href="{{$blog->url}}">{{$blog->title}}</a></h3>
                            <p class="blog-one__text">{{$blog->short_description}}</p>
                            <a href="{{$blog->url}}" class="blog-one__btn">
                                <span class="icon-right-arrow"></span>Detaylar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
