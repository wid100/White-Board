@extends('master.master')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Home Setting</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Home Setting</h4>

                        <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Spotlight -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="spotlight" class="form-label">Spotlight <span
                                                class="text-danger">*</span></label>
                                        <select id="spotlight" name="spotlight"
                                            class="form-select @error('spotlight') is-invalid @enderror">
                                            <option value="">Select Spotlight</option>
                                            @foreach ($allPosts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ old('spotlight', $setting->spotlight) == $post->id ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('spotlight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Spotlight Second -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="spotlight_second" class="form-label">Spotlight Second</label>
                                        <select id="spotlight_second" name="spotlight_second[]" class="form-select"
                                            multiple="multiple">
                                            @foreach ($allPosts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ in_array($post->id, json_decode($setting->spotlight_second, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Editor Pick -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editor_pick" class="form-label">Editor Pick</label>
                                        <select id="editor_pick" name="editor_pick[]" class="form-select"
                                            multiple="multiple">
                                            @foreach ($editor_picks as $editor_pick)
                                                <option value="{{ $editor_pick->id }}"
                                                    {{ in_array($editor_pick->id, json_decode($setting->editor_pick, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $editor_pick->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Policy Stream -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="policy_stream" class="form-label">Policy Stream</label>
                                        <select id="policy_stream" name="policy_stream[]" class="form-select"
                                            multiple="multiple">
                                            @foreach ($policy_streams as $policy_stream)
                                                <option value="{{ $policy_stream->id }}"
                                                    {{ in_array($policy_stream->id, json_decode($setting->policy_stream, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $policy_stream->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Tailored for Policymakers -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tailored_for_policymakers" class="form-label">Tailored for
                                            Policymakers</label>
                                        <select id="tailored_for_policymakers" name="tailored_for_policymakers[]"
                                            class="form-select" multiple="multiple">
                                            @foreach ($allPosts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ in_array($post->id, json_decode($setting->tailored_for_policymakers, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Trending -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="trending" class="form-label">Trending</label>
                                        <select id="trending" name="trending[]" class="form-select" multiple="multiple">
                                            @foreach ($allPosts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ in_array($post->id, json_decode($setting->trending, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Latest Issue -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_issue" class="form-label">Latest Issue</label>
                                        <select id="latest_issue" name="latest_issue" class="form-select">
                                            <option value="">Select Latest Issue</option>
                                            @foreach ($latest_issues as $issue)
                                                <option value="{{ $issue->id }}"
                                                    {{ old('latest_issue', $setting->latest_issue) == $issue->id ? 'selected' : '' }}>
                                                    {{ $issue->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Latest Issue Post (using AJAX) -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_issue_post" class="form-label">Latest Issue Post</label>
                                        <select id="latest_issue_post" name="latest_issue_post[]" class="form-select"
                                            multiple="multiple">
                                            @foreach ($latestIssuePosts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ in_array($post->id, json_decode($setting->latest_issue_post, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Latest Category -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_category" class="form-label">Latest Category</label>
                                        <select id="latest_category" name="latest_category[]" class="form-select"
                                            multiple="multiple">
                                            @foreach ($latest_categoris as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ in_array($category->id, json_decode($setting->latest_category, true) ?: []) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Initialize select2
            $('.form-select').select2();

            // AJAX call to load posts based on selected issue
            $('#latest_issue').on('change', function() {
                var issueId = $(this).val();
                if (issueId) {
                    $.ajax({
                        url: '/admin/issue/' + issueId + '/posts',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#latest_issue_post').empty();
                            var selectedPosts = @json(json_decode($setting->latest_issue_post, true) ?: []);
                            $.each(data, function(key, post) {
                                var selected = selectedPosts.includes(post.id) ?
                                    'selected' : '';
                                $('#latest_issue_post').append('<option value="' + post
                                    .id + '"' + selected + '>' + post.title +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                        }
                    });
                } else {
                    $('#latest_issue_post').empty();
                }
            });

            // Trigger the change event to load posts for the pre-selected issue
            // $('#latest_issue').trigger('change');
        });
    </script>
@endsection
