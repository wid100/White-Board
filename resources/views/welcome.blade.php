@extends('master.frontend-master')

@section('content')
    <!-- ========== Hero ============= -->
    <section class="hero" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="hero-wrapper">
                <div class="row">
                    <div class="col-md-12 col-lg-3 order-lg-1 order-2">
                        @if ($spotlight)
                            <div class="hero-content-left">
                                <h4>SPOTLIGHT</h4>
                                <h1>{!! Str::limit($spotlight->title, 40) !!}</h1>
                                <p>
                                    {!! Str::limit($spotlight->description, 100) !!}
                                </p>
                                <div class="more-btn">
                                    <a href="{{ route('posts.show', $spotlight->slug) }}">more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-12 col-lg-6 order-lg-1 order-1">
                        <div class="hero-img">
                            <img src="{{ asset($spotlight->image) }}" alt="" />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 order-lg-2 order-3">
                        <div class="hero-content-right">
                            <div class="hero-right-title">Editor's Pick</div>
                            <ul class="hero-editor-list">
                                @foreach ($editorPicks as $editor)
                                    <li>
                                        <a href="/blog-details.html">{{ Str::limit($editor->title, 55) }}</a>
                                        <p>{{ $editor->form_editor }} <span>{{ $editor->user->name }}</span></p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======== hero slider ============ -->
    <section class="slider" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="slider-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="slider-content-top">
                                            <h3>Politics</h3>
                                            <img src="/assets/images/icon/arrow.svg" alt="" />
                                            <p>
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is the eighth most populous
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is thepopulous The answer to
                                                the title’s question is no. Let’s keep in
                                            </p>
                                        </div>
                                        <div class="slider-content-botttom">
                                            <span>……………</span>
                                            <h4>RAJIB ASHRAF</h4>
                                            <p>Professior, Scientist,BUET</p>
                                        </div>
                                        <div class="slider-shap-img">
                                            <img src="/assets/images/icon/bottom-shap.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="slider-content-top">
                                            <h3>Politics</h3>
                                            <img src="/assets/images/icon/arrow.svg" alt="" />
                                            <p>
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is the eighth most populous
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is thepopulous The answer to
                                                the title’s question is no. Let’s keep in
                                            </p>
                                        </div>
                                        <div class="slider-content-botttom">
                                            <span>……………</span>
                                            <h4>RAJIB ASHRAF</h4>
                                            <p>Professior, Scientist,BUET</p>
                                        </div>
                                        <div class="slider-shap-img">
                                            <img src="/assets/images/icon/bottom-shap.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="slider-content-top">
                                            <h3>Politics</h3>
                                            <img src="/assets/images/icon/arrow.svg" alt="" />
                                            <p>
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is the eighth most populous
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is thepopulous The answer to
                                                the title’s question is no. Let’s keep in
                                            </p>
                                        </div>
                                        <div class="slider-content-botttom">
                                            <span>……………</span>
                                            <h4>RAJIB ASHRAF</h4>
                                            <p>Professior, Scientist,BUET</p>
                                        </div>
                                        <div class="slider-shap-img">
                                            <img src="/assets/images/icon/bottom-shap.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="slider-content-top">
                                            <h3>Politics</h3>
                                            <img src="/assets/images/icon/arrow.svg" alt="" />
                                            <p>
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is the eighth most populous
                                                The answer to the title’s question is no. Let’s keep
                                                in mind that Bangladesh is thepopulous The answer to
                                                the title’s question is no. Let’s keep in
                                            </p>
                                        </div>
                                        <div class="slider-content-botttom">
                                            <span>……………</span>
                                            <h4>RAJIB ASHRAF</h4>
                                            <p>Professior, Scientist,BUET</p>
                                        </div>
                                        <div class="slider-shap-img">
                                            <img src="/assets/images/icon/bottom-shap.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="slider-content-center">
                            <div class="shortlight-item">
                                <span>SPOTLIGHT</span>
                                @foreach ($firstSectionPosts as $post)
                                    <div class="shortlight-title">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                    <div class="shortlight-card">
                                        <div class="shortlight-img">
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="100px" />
                                        </div>
                                        <div>
                                            <p>
                                                {!! Str::limit($post->description, 100) !!}
                                            </p>
                                            <div class="more-btn">
                                                <a href="{{ route('posts.show', $post->slug) }}">more
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="shortlight-item-two">
                                <div class="shortlight-card">
                                    @foreach ($secondSectionPosts as $post)
                                        <div class="shortlight-img">
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                        <div>
                                            <a href="{{ route('posts.show', $post->slug) }}" class="shortlight-card-text">
                                                {{ $post->title }}
                                            </a>
                                            <div class="more-btn">
                                                <a href="{{ route('posts.show', $post->slug) }}">more
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="hero-content-right">
                            <div class="hero-right-title">Policy Stream</div>
                            <ul class="hero-editor-list">
                                @foreach ($policyStreams as $policy)
                                    <li>
                                        <a
                                            href="{{ route('policy-streams.show', $policy->slug) }}">{{ Str::limit($policy->title, 55) }}</a>
                                        <p>{{ $policy->post_type }} <span>{{ $policy->author->name }}</span></p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Industry Insight =============== -->
    <section class="industry" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="section-title">
                <h1>Industry Insight</h1>
            </div>
            <div class="industry-wrraper">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="industry-card">
                            <a href="/blog-details.html">Poverty-reducing lessons from success stories</a>
                            <p>
                                The answer to the title’s question is no. Let’s keep in mind
                                that Bangladesh
                            </p>
                            <div class="more-btn">
                                <a href="/blog-details.html">more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="industry-card">
                            <a href="/blog-details.html">Poverty-reducing lessons from success stories</a>
                            <p>
                                The answer to the title’s question is no. Let’s keep in mind
                                that Bangladesh
                            </p>
                            <div class="more-btn">
                                <a href="/blog-details.html">more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="industry-card">
                            <a href="/blog-details.html">Poverty-reducing lessons from success stories</a>
                            <p>
                                The answer to the title’s question is no. Let’s keep in mind
                                that Bangladesh
                            </p>
                            <div class="more-btn">
                                <a href="/blog-details.html">more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="industry-card">
                            <a href="/blog-details.html">Poverty-reducing lessons from success stories</a>
                            <p>
                                The answer to the title’s question is no. Let’s keep in mind
                                that Bangladesh
                            </p>
                            <div class="more-btn">
                                <a href="/blog-details.html">more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========= Blog And Tending  -->
    <section class="blog" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="blog-wrapper">
                <div class="row">
                    <div class="col-md-7">
                        <div class="blog-content-left">
                            <div class="section-title">
                                <h1>Tailored for Policymakers</h1>
                            </div>
                            <div class="blog-content">
                                <div class="row">
                                    @foreach ($tailoredForPolicymakers as $post)
                                        <div class="col-md-6">
                                            <div class="blog-card-item">
                                                <a class="blog-img" href="{{ route('posts.show', $post->slug) }}">
                                                    <img src="{{ asset($post->image) }}" alt="" />
                                                </a>
                                                <div class="blog-card-content">
                                                    <span class="category-name">{{ $post->category->name }}</span>
                                                    <div class="blog-title">
                                                        <a
                                                            href="{{ route('posts.show', $post->slug) }}">{{ Str::limit($post->title, 50) }}</a>
                                                    </div>
                                                    <p class="blog-owner">
                                                        {{ $post->post_type }} <span>{{ $post->author->name }}</span>
                                                    </p>
                                                    <p>
                                                        {!! Str::limit($post->description, 100) !!}
                                                    </p>
                                                    <div class="more-btn">
                                                        <a href="{{ route('posts.show', $post->slug) }}">more
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="trending-right-site">
                            <div class="section-title trending-h-title">
                                <h1>Trending</h1>
                            </div>
                            <div class="trending-content">
                                <ul class="trening-list-items">
                                    @foreach ($trendings as $key => $post)
                                        <li class="trening-list-item">
                                            <div class="trening-number">
                                                <h4>{{ $key + 1 }}</h4>
                                            </div>
                                            <div class="trening-list-content">
                                                <div class="trending-title">
                                                    <a
                                                        href="{{ route('posts.show', $post->slug) }}">{{ Str::limit($post->title, 100) }} </a>
                                                </div>
                                                <p>{{ $post->post_type }} <span>{{ $post->author->name }}</span></p>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="trending-add">
                                    <img src="/assets/images/blog/adds.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======== Explore ========== -->

    <section class="explore" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="explore-wrapper">
                <div class="explore-left">
                    <p>
                        Want to Receive Complementary <span> WhiteBoard</span> Copies at
                        your Doorstep?
                    </p>
                    <a href="/single-news-letter.html" class="explore-link">
                        Send me copies!
                        <span><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
                <div class="explore-right">
                    <!-- <div class="explore-img">
                                                                                                                                                                                                                                                                                                                                  <img src="/assets/images/home/explore.png" alt="" />
                                                                                                                                                                                                                                                                                                                                </div> -->
                    <div class="explore-content">
                        <p>
                            Find out why <span>WhiteBoard</span> is the go to place for
                            policy insights of Bangladesh.
                        </p>
                        <a href="/single-news-letter.html" class="explore-link">
                            Explore
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Latest Issue =========-->
    <section class="latest-issue" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="latest-issue-wrapper">
                <div class="section-title">
                    <h1>Latest Issue</h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="/blog-details.html" class="latest-img">
                            <img src="{{ asset($latestIssue->image) }}" alt="{{ $latestIssue->name }}" />
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="blog-card-item latest-issue-item">
                            <a class="blog-img" href="{{ route('posts.show', $post->slug) }}">
                                <img src="{{ $firstLatestIssuePost->image }}"
                                    alt="{{ $firstLatestIssuePost->title }}" />
                            </a>
                            <div class="blog-card-content">
                                <div class="blog-title">
                                    <a
                                        href="{{ route('posts.show', $firstLatestIssuePost->slug) }}">{{ Str::limit($firstLatestIssuePost->title, 70) }}</a>
                                </div>
                                <p class="blog-owner">{{ $firstLatestIssuePost->post_type }}
                                    <span>{{ $firstLatestIssuePost->author->name }}</span>
                                </p>
                                <p>
                                    {!! Str::limit($post->description, 150) !!}
                                </p>
                                <div class="more-btn">
                                    <a href="{{ route('posts.show', $firstLatestIssuePost->slug) }}">more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="blog-card-item latest-issue-item latest-issue-item-left">
                            <a class="blog-img" href="{{ route('posts.show', $secondLatestIssuePost->slug) }}">
                                <img src="{{ asset($secondLatestIssuePost->image) }}" alt="" />
                            </a>
                            <div class="blog-card-content">
                                <div class="blog-title">
                                    <a
                                        href="{{ route('posts.show', $secondLatestIssuePost->slug) }}">{{ Str::limit($secondLatestIssuePost->title, 70) }}</a>
                                </div>
                                <p class="blog-owner">{{ $secondLatestIssuePost->post_type }} <span>
                                        {{ $secondLatestIssuePost->author->name }}</span>
                                </p>
                                <div class="more-btn">
                                    <a href="{{ route('posts.show', $secondLatestIssuePost->slug) }}">more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        @foreach ($remainingLatestIssuePosts as $post)
                            <div class="blog-card-item latest-issue-item latest-issue-item-left">

                                <div class="blog-card-content">
                                    <div class="blog-title">
                                        <a
                                            href="{{ route('posts.show', $post->slug) }}">{{ Str::limit($post->title, 70) }}</a>
                                    </div>
                                    <p class="blog-owner">{{ $post->post_type }} <span> {{ $post->author->name }}</span>
                                    </p>
                                    <div class="more-btn">
                                        <a href="{{ route('posts.show', $post->slug) }}">more
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============== Recent Issues ============= -->

    <section class="recent-issue" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="recent-issue-wrapper">
                <div class="recent-header">
                    <div class="section-title">
                        <h1 class="recent-issue-title">Recent Issues</h1>
                    </div>
                    <div class="see-more-btn">
                        <a href="/issue-list.html" class="custom-btn">See All</a>
                    </div>
                </div>
                <div class="recent-issue-items">
                    @foreach ($latest5Issues as $issue)
                        <div class="recent-issue-item">
                            <a href="/issue-details.html">
                                <div class="recent-img">
                                    <img src="{{ asset($issue->image) }}" alt="" />
                                </div>
                                <p>{{ $issue->month->name }} {{ $issue->year->year }}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- ========= Thoughts in Motion ========== -->
    <section class="thoughts-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="thoughts-wrapper">
                <div class="thoughts-header">
                    <div class="thought-title-img">
                        <img src="{{ asset('/frontend/images/icon/shap-icon.svg') }}" alt="" />
                    </div>
                    <h1>Thoughts in motion</h1>
                </div>

                <div class="thoughts-desktap">
                    <div class="row">
                        @foreach ($categoriesWithLatestPosts as $categoryData)
                            <div class="col-md-4">
                                <div class="thoughts-item">
                                    <h2>{{ $categoryData['category']->name }}</h2>
                                    <div class="thoughts-list">
                                        <ul>
                                            @foreach ($categoryData['posts'] as $post)
                                                <li>
                                                    <a href=""><span>{{ $post->author->name }}</span>
                                                    </a>
                                                    <a href="{{ route('posts.show', $post->slug) }}">
                                                        {{ Str::limit($post->title, 70) }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="thoughts-mobile accordion-flush" id="accordionExample">
                    <div class="row">
                        <div class="col-md-4">
                            @foreach ($categoriesWithLatestPosts as $categoryData)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $categoryData['category']->id }}" aria-expanded="true"
                                            aria-controls="{{ $categoryData['category']->id }}">
                                            {{ $categoryData['category']->name }}
                                        </button>
                                    </h2>
                                    <div id="{{ $categoryData['category']->id }}"
                                        class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="thoughts-list thoughts-list-mobile">
                                            <ul>
                                                @foreach ($categoryData['posts'] as $post)
                                                    <li>
                                                        <a href=""><span>{{ $post->author->name }}</span>
                                                        </a>
                                                        <a href="{{ route('posts.show', $post->slug) }}">
                                                            {{ Str::limit($post->title, 70) }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
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
    <!-- ========= Thoughts in Motion ========== -->
@endsection
