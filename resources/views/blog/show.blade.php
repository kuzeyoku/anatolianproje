@extends("layouts.main")
@section("title",$blog->title)
@section("content")
    @include("layouts.breadcrumb")
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__content-one">
                            <div class="blog-details__content-one-img">
                                <img src="{{$blog->image}}" alt="">
                                <div class="blog-details__date">
                                    <p>
                                        {{$blog->created_at->format("d")}}<br>
                                        <span>{{$blog->created_at->format("M")}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="blog-details__content-one-details">
                                <ul class="blog-details__meta list-unstyled">
                                    <li>
                                        <a href="#"><span class="icon-user-icon"></span>{{$blog->user->name}}</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-comment-icon"></span>({{$blog->comments->count()}}
                                            ) Yorum</a>
                                    </li>
                                </ul>
                                <h3 class="blog-details__title">{{$blog->title}}</h3>
                                <p class="blog-details__text-1">{!! $blog->description !!}
                                </p>
                            </div>
                        </div>
                        <div class="blog-details__tag-and-social">
                            @if(!empty($blog->tagsToArray))
                                <div class="blog-details__tag">
                                    <span>Etiketler:</span>
                                    @foreach($blog->tagsToArray as $tag)
                                        <a href="#">{{$tag}}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="author">
                            <div class="author__content">
                                <h3 class="author__name">{{$blog->user->name}}</h3>
                                <p class="author__about">About author</p>
                                <p class="author__text">Felis montes justo imperdiet urna eleifend lacus luctus cum
                                    consequat semper suspe metus lobortis at fusce leona dignissim sociis pharetra
                                    tortor lacinia cum accumsan tristique pulvinar ornare natoque sodales pharetra
                                </p>
                                <div class="author__social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-details__bottom">
                            @if($blog->comments->isNotEmpty())
                                <div class="blog-details__comment-and-form">
                                    <div class="comment-one">
                                        <h3 class="comment-one__title">{{$blog->comments->count()}} Yorum Yapıldı</h3>
                                        @foreach($blog->comments as $comment)
                                            <div class="comment-one__single">
                                                <div class="comment-one__content">
                                                    <h3>{{$comment->name}}</h3>
                                                    <span>{{$comment->created_at->format("d M Y H:i:s")}}</span>
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="comment-form">
                                <h3 class="comment-form__title">Yorum Yap </h3>
                                <p class="comment-form__text">Açıklama Metin</p>
                                {{html()->form()->route("blog.comment.store",$blog)->class("comment-one__form")->open()}}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <div class="comment-form__input-box-name">
                                                <p>Ad Soyad</p>
                                            </div>
                                            {{html()->text("name")->placeholder("Ad Soyad")->required()}}
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <div class="comment-form__input-box-name">
                                                <p>Email Adresi</p>
                                            </div>
                                            {{html()->email("email")->placeholder("Email")->required()}}
                                        </div>
                                    </div>
                                    <div class="comment-form__input-box text-message-box">
                                        <div class="comment-form__input-box-name">
                                            <p>Yorumunuz</p>
                                        </div>
                                        {{html()->textarea("comment")->placeholder("Yorumunuz")->required()}}
                                    </div>
                                    <div class="checked-box">
                                        {{html()->checkbox("skipper")->id("skipper")->required()}}

                                        <label for="skipper"><span></span>Verdiğim bilgilerin kayıt edileceğini ve
                                            kullanılacağını kabul ediyorum.</label>
                                    </div>
                                    <div class="comment-form__btn-box">
                                        {{html()->submit("<span class='icon-right-arrow'></span> Gönder")->class("thm-btn comment-form__btn")}}
                                    </div>
                                </div>
                                {{html()->form()->close()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    @include("blog.sidebar")
                </div>
            </div>
        </div>
    </section>
@endsection
