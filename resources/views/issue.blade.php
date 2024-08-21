@extends('master.frontend-master')

@section('content')
    <!-- ============== Issue List ============== -->
    <section class="issue-list" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="issue-list-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <a href="/blog-details.html" class="issue-details-img">
                            <img src="{{ $latestIssue->image }}" alt="" />
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="issue-details-content">
                            <div class="issue-details-title">
                                <h4>Current Issue</h4>
                                <div class="issue-details-title-item">
                                    <h1>{{ $latestIssue->month->name }} {{ $latestIssue->year->year }}</h1>

                                    <a href="/blog-details.html" class="custom-btn">
                                        Dig Deep
                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="issue-details-description">
                                <h4>Editorial Note</h4>
                                <p>
                                    {!! Str::limit($latestIssue->editornote->description, 500) !!}

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
        </div>
    </section>
    <!-- =============== Issue Filter ============== -->
    <section class="issue-filter" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="issue-filter-wrapper">
                <div class="issue-filter-header">
                    <h1 class="issue-filter-title">Archive</h1>
                    <div class="issue-filter-nav">
                        <div class="issue-filter-left">
                            <div class="issue-filter-tap-item">
                                <ul class="issue-filter-tabs" id="myTab" role="tablist">
                                    <li class="nav-filter-item" role="presentation">
                                        <button class="nav-filter-link active" id="year-tab" data-bs-toggle="tab"
                                            data-bs-target="#year" type="button" role="tab" aria-controls="year"
                                            aria-selected="true">
                                            Year
                                        </button>
                                    </li>
                                    <li class="nav-filter-item" role="presentation">
                                        <button class="nav-filter-link" id="issue-tab" data-bs-toggle="tab"
                                            data-bs-target="#issue" type="button" role="tab" aria-controls="issue"
                                            aria-selected="false">
                                            Issues
                                        </button>
                                    </li>
                                    <li class="nav-filter-item" role="presentation">
                                        <button class="nav-filter-link" id="search-tab" data-bs-toggle="tab"
                                            data-bs-target="#search" type="button" role="tab" aria-controls="search"
                                            aria-selected="false">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="issue-filter-tap-content">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="year" role="tabpanel"
                                        aria-labelledby="year-tab">
                                        <div class="swiper mySwiperYear mySwiperWrapper">
                                            <div class="swiper-wrapper">
                                                @foreach ($years as $year)
                                                    <div class="swiper-slide">
                                                        <div class="issue-item-year">
                                                            <button>{{ $year->year }}</button>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="issue" role="tabpanel" aria-labelledby="issue-tab">
                                        <div class="swiper mySwiperIssue mySwiperWrapper">
                                            <div class="swiper-wrapper">
                                                @foreach ($issues as $issue)
                                                    <div class="swiper-slide">
                                                        <div class="issue-item-num">
                                                            <button>{{ $issue->issue_number }}</button>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">
                                        <form action="">
                                            <div class="issue-search-flied">
                                                <input type="text" placeholder="Browse here by year, Issue..... " />
                                                <button class="issue-search-btn">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="issue-filter-right">
                            <button>View All</button>
                        </div>
                    </div>
                </div>
                <div class="issue-filter-content">
                    @if (isset($yearIssues) && $yearIssues->isNotEmpty())
                        <div class="issue-filter-item">
                            <h4>{{ $yearModel->year }}</h4>
                            <div class="row">
                                @foreach ($yearIssues as $issue)
                                    <div class="col-md-3">
                                        <div class="recent-issue-item">
                                            <a href="">
                                                <div class="recent-img">
                                                    <img src="{{ $issue->image }}" alt="" />
                                                </div>
                                                <p>{{ $issue->month->name }} {{ $yearModel->year }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>Select a year to see the issues.</p>
                    @endif

                    @foreach ($lastThreeYears as $year)
                        @php
                            $yearId = $year->id;
                            $yearIssues = $lastThreeYearsIssues->get($yearId);
                        @endphp
                        @if ($yearIssues)
                            <div class="issue-filter-item">
                                <h4>{{ $year->year }}</h4>
                                <div class="row">
                                    @foreach ($yearIssues as $issue)
                                        <div class="col-md-3">
                                            <div class="recent-issue-item">
                                                <a href="/issue-details.html">
                                                    <div class="recent-img">
                                                        <img src="{{ $issue->image }}" alt="" />
                                                    </div>
                                                    <p>{{ $issue->month->name }} {{ $year->year }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- ========= Thoughts in Motion ========== -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.issue-item-year button').on('click', function() {
                var year = $(this).text();

                $.ajax({
                    url: '/issues-by-year/' + year,
                    type: 'GET',
                    success: function(response) {
                        if (response.status === 'success') {
                            var issues = response.yearIssues;
                            var content = '';

                            if (issues.length > 0) {
                                content += '<div class="issue-filter-item">';
                                content += '<h4>' + year + '</h4>';
                                content += '<div class="row">';

                                issues.forEach(function(issue) {
                                    content += '<div class="col-md-3">';
                                    content += '<div class="recent-issue-item">';
                                    content += '<a href="/issue-details/' + issue.id +
                                        '">';
                                    content += '<div class="recent-img">';
                                    content += '<img src="' + issue.image +
                                        '" alt="" />';
                                    content += '</div>';
                                    content += '<p>' + issue.month.name + ' ' + year +
                                        '</p>';
                                    content += '</a>';
                                    content += '</div>';
                                    content += '</div>';
                                });

                                content += '</div>';
                                content += '</div>';
                            } else {
                                content = '<p>No issues found for ' + year + '.</p>';
                            }

                            $('.issue-filter-content').html(content);
                        } else {
                            $('.issue-filter-content').html('<p>' + response.message + '</p>');
                        }
                    },
                    error: function() {
                        alert('An error occurred while fetching the issues.');
                    }
                });
            });
        });
    </script>
@endsection
