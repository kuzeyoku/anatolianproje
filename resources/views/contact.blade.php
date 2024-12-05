@extends("layouts.main")
@section("title","İLETİŞİM")
@section("content")
    @include("layouts.breadcrumb")
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title-two text-left">
                            <div class="section-title-two__tagline-box">
                                <p class="section-title-two__tagline">İLETİŞİME GEÇ</p>
                                <div class="section-title-two__shape">
                                    <img src="{{asset("assets/images/shapes/section-title-two-shape.png")}}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title-two__title">İLETİŞİM BİLGİLERİMİZ</h2>
                        </div>
                        <div class="contact-page__contact-info">
                            <ul class="list-unstyled contact-page__contact-info-list">
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone-call-1"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="tel:@setting('contact','phone')">@setting("contact","phone")</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-location1"></span>
                                    </div>
                                    <div class="text">
                                        <p>@setting("contact","address")</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-email"></span>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <a href="mailto:@setting('contact','email')">@setting('contact','email')</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="contact-page__live-chat">
                                <a href="https://wa.me/@setting('contact','phone')"><span class="icon-comments"></span>Canlı
                                    İletişim</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="contact-page__form-box">
                            <h5 class="contact-page__form-title">Hızlı İletişim</h5>
                            {{html()->form()->route("contact.send")->class("comment-one__form")->open()}}

                            <div class="comment-form__input-box">
                                <div class="comment-form__input-box-name">
                                    <p>Adınız Soyadınız</p>
                                </div>
                                {{html()->text("name")->placeholder("Adınız Soyadınız")->required()}}
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <div class="comment-form__input-box-name">
                                            <p>E-Posta Adresiniz</p>
                                        </div>
                                        {{html()->email("email")->placeholder("E-Posta Adresiniz")->required()}}
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <div class="comment-form__input-box-name">
                                            <p>Phone</p>
                                        </div>
                                        <input type="text" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                            </div>


                            <div class="comment-form__input-box text-message-box">
                                <div class="comment-form__input-box-name">
                                    <p>Mesajınız</p>
                                </div>
                                {{html()->textarea("message")->placeholder("Mesajınız")->required()}}
                            </div>
                            {{html()->form()->close()}}

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <div class="comment-form__input-box-name">
                                            <p>Your email</p>
                                        </div>
                                        <input type="email" placeholder="Your email" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <div class="comment-form__input-box-name">
                                            <p>Phone</p>
                                        </div>
                                        <input type="text" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <div class="comment-form__input-box-name">
                                            <p>Subject</p>
                                        </div>
                                        <input type="text" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="checked-box">
                                        <input type="checkbox" name="skipper1" id="skipper" checked="">
                                        <label for="skipper"><span></span>Save my name, email, and website
                                            in
                                            this browser
                                            for the next time I comment.</label>
                                    </div>
                                    <div class="comment-form__btn-box">
                                        <button type="submit" class="thm-btn comment-form__btn"><span
                                                class="icon-right-arrow"></span>Post Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->

    <!--Google Map Start-->
    @if(setting("contact","map"))
        <section class="contact-page-google-map">
            <div class="container">
                <iframe src="@setting('contact','map')" class="google-map__two" allowfullscreen=""></iframe>
            </div>
        </section>
    @endif
@endsection
