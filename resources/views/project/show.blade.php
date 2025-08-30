@extends("layouts.main")
@section("content")
    @include("layouts.breadcrumb")
    <section class="case-details">
        <div class="container">
            <div class="case-details__top">
                <h4 class="case-details__top-title">{{$project->title}}</h4>
                <p class="case-details__text-1">{!! $project->description !!}</p>
                <div class="case-details__img-box-and-info-box">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="case-details__img-box">
                                <img src="assets/images/project/case-details-img-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="case-details__info-box">
                                <h4 class="case-details__info-box-title">Proje Detayları:</h4>
                                <ul class="list-unstyled case-details__info-list">
                                    @foreach ($project->feature as $key => $value)
                                        <li>
                                            <p>{{ $key }}</p>
                                            <h6>{{ $value }}</h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-details__description">
                    {!! $project->description !!}
                </div>
                <div class="case-details__related-project">
                    <h5 class="case-details__related-project-title">Related Projects</h5>
                    <div class="row">
                        <!--Project Two Single Start-->
                        <div class="col-xl-4 col-lg-6 col-mg-6">
                            <div class="project-two__single">
                                <div class="project-two__img-box">
                                    <div class="project-two__img">
                                        <img src="{{asset("assets/images/project/case-studies-two-1-1.jpg")}}" alt="">
                                    </div>
                                    <div class="project-two__content">
                                        <div class="project-two__icon">
                                            <span class="icon-analicis-icon"></span>
                                        </div>
                                        <h3 class="project-two__title"><a href="case-details.html">Product Market
                                                <br> Analysis</a></h3>
                                        <div class="project-two__arrow">
                                            <a href="{{asset("assets/images/project/case-studies-two-1-1.jpg")}}"
                                                class="img-popup"><span class="icon-next"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Project Two Single End-->
                        <!--Project Two Single Start-->
                        <div class="col-xl-4 col-lg-6 col-mg-6">
                            <div class="project-two__single">
                                <div class="project-two__img-box">
                                    <div class="project-two__img">
                                        <img src="assets/images/project/case-studies-two-1-2.jpg" alt="">
                                    </div>
                                    <div class="project-two__content">
                                        <div class="project-two__icon">
                                            <span class="icon-analicis-icon"></span>
                                        </div>
                                        <h3 class="project-two__title"><a href="case-details.html">Product Market
                                                <br> Analysis</a></h3>
                                        <div class="project-two__arrow">
                                            <a href="assets/images/project/case-studies-two-1-2.jpg" class="img-popup"><span
                                                    class="icon-next"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Project Two Single End-->
                        <!--Project Two Single Start-->
                        <div class="col-xl-4 col-lg-6 col-mg-6">
                            <div class="project-two__single">
                                <div class="project-two__img-box">
                                    <div class="project-two__img">
                                        <img src="assets/images/project/case-studies-two-1-3.jpg" alt="">
                                    </div>
                                    <div class="project-two__content">
                                        <div class="project-two__icon">
                                            <span class="icon-analicis-icon"></span>
                                        </div>
                                        <h3 class="project-two__title"><a href="case-details.html">Product Market
                                                <br> Analysis</a></h3>
                                        <div class="project-two__arrow">
                                            <a href="assets/images/project/case-studies-two-1-3.jpg" class="img-popup"><span
                                                    class="icon-next"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Project Two Single End-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection