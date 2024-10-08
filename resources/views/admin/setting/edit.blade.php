@extends('master.master')
<style>
    .multi-select-wrapper {
        position: relative;
        /* width: 300px; */
        /* border: 1px solid #ccc; */
        /* border-radius: 4px; */
        /* padding: 5px; */
        /* background-color: #fff; */
        cursor: text;
    }

    .multi-select-box {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        min-height: 40px;
        border: 1px solid #172340;
        padding: 8px;
    }

    .multi-select-box input {
        border: none;
        outline: none;
        flex: 1;
        padding: 5px;
        min-width: 50px;
        background: none;
    }

    .multi-select-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #172340;
        background-color: #060c17;
        z-index: 1;
        max-height: 150px;
        overflow-y: auto;
        box-sizing: border-box;
    }

    .multi-select-options label {
        display: block;
        padding: 5px;
        cursor: pointer;
    }

    .multi-select-options label:hover {
        background-color: #6571ff;
    }

    .multi-select-options input[type="checkbox"]:disabled+span {
        color: #fff;
        cursor: not-allowed;
    }

    .selected-tag {
        background-color: #6571ff;
        border-radius: 2px;
        padding: 5px 10px;
        margin-right: 5px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        color: #fff;
    }

    .close-button {
        margin-left: 5px;
        cursor: pointer;
        color: #c1c1c1;
    }

    .close-button:hover {
        color: #f00;
    }
</style>
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
                                            class="js-example-basic-single form-select @error('spotlight') is-invalid @enderror">
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

                                        <div class="multi-select-wrapper spotlight-second-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select spotlight second...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($allPosts as $post)
                                                    <label>
                                                        <input type="checkbox" value="{{ $post->id }}"
                                                            {{ in_array($post->id, $spotlightSecondIds) ? 'checked' : '' }}>
                                                        <span>{{ $post->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="spotlight_second[]" class="hidden-spotlight-second">
                                        </div>
                                    </div>
                                </div>
                                <!-- Editor Pick -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editor_pick" class="form-label">Editor Pick</label>

                                        <div class="multi-select-wrapper editor-pick-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select editor picks...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($editor_picks as $editor_pick)
                                                    <label>
                                                        <input type="checkbox" value="{{ $editor_pick->id }}"
                                                            {{ in_array($editor_pick->id, $editorPickIds) ? 'checked' : '' }}>
                                                        <span>{{ $editor_pick->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="editor_pick[]" class="hidden-editor-pick">
                                        </div>
                                    </div>
                                </div>

                                <!-- Policy Stream -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="policy_stream" class="form-label">Policy Stream</label>

                                        <div class="multi-select-wrapper policy-stream-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select policy streams...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($policy_streams as $policy_stream)
                                                    <label>
                                                        <input type="checkbox" value="{{ $policy_stream->id }}"
                                                            {{ in_array($policy_stream->id, $policyStreamIds) ? 'checked' : '' }}>
                                                        <span>{{ $policy_stream->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="policy_stream[]" class="hidden-policy-stream">
                                        </div>
                                    </div>
                                </div>

                                <!-- Tailored for Policymakers -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tailored_for_policymakers" class="form-label">Tailored for
                                            Policymakers</label>

                                        <div class="multi-select-wrapper tailored-for-policymakers-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select tailored for policymakers...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($allPosts as $post)
                                                    <label>
                                                        <input type="checkbox" value="{{ $post->id }}"
                                                            {{ in_array($post->id, $tailoredForPolicymakersIds) ? 'checked' : '' }}>
                                                        <span>{{ $post->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="tailored_for_policymakers[]"
                                                class="hidden-tailored-for-policymakers">
                                        </div>
                                    </div>
                                </div>

                                <!-- Trending -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="trending" class="form-label">Trending</label>

                                        <div class="multi-select-wrapper trending-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select trending posts...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($allPosts as $post)
                                                    <label>
                                                        <input type="checkbox" value="{{ $post->id }}"
                                                            {{ in_array($post->id, $trendingIds) ? 'checked' : '' }}>
                                                        <span>{{ $post->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="trending[]" class="hidden-trending">
                                        </div>
                                    </div>
                                </div>

                                <!-- Latest Issue -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_issue" class="form-label">Latest Issue</label>
                                        <select id="latest_issue" name="latest_issue"
                                            class="js-example-basic-single form-select">
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
                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_issue_post" class="form-label">Latest Issue
                                            Post</label>
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
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_issue_post" class="form-label">Latest Issue Post</label>
                                        <div class="multi-select-wrapper latest-post-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select latest posts...">
                                            </div>
                                            <div class="multi-select-options">
                                                <!-- Options will be dynamically loaded via AJAX -->
                                                @foreach ($latestIssuePosts as $post)
                                                    <label>
                                                        <input type="checkbox" value="{{ $post->id }}"
                                                            {{ in_array($post->id, $latestIssuePostIds) ? 'checked' : '' }}>
                                                        <span>{{ $post->title }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="latest_issue_post[]" id="latest_issue_post"
                                                class="hidden-latest-post">
                                        </div>
                                    </div>
                                </div>

                                <!-- Latest Category -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latest_category" class="form-label">Latest Category</label>

                                        <div class="multi-select-wrapper latest-category-wrapper">
                                            <div class="multi-select-box">
                                                <input type="text" class="search-input"
                                                    placeholder="Select latest categories...">
                                            </div>
                                            <div class="multi-select-options">
                                                @foreach ($latest_categoris as $category)
                                                    <label>
                                                        <input type="checkbox" value="{{ $category->id }}"
                                                            {{ in_array($category->id, $latestCategoryIds) ? 'checked' : '' }}>
                                                        <span>{{ $category->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected values -->
                                            <input type="hidden" name="latest_category[]"
                                                class="hidden-latest-category">
                                        </div>
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
            // AJAX call to load posts based on selected issue
            $('#latest_issue').on('change', function() {
                var issueId = $(this).val();
                if (issueId) {
                    $.ajax({
                        url: '/admin/issue/' + issueId + '/posts',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const multiSelectOptions = $(
                                '.latest-post-wrapper .multi-select-options');
                            multiSelectOptions.empty();

                            var selectedPosts = @json(json_decode($setting->latest_issue_post, true) ?: []);
                            $.each(data, function(key, post) {
                                var selected = selectedPosts.includes(post.id
                                    .toString()) ? 'checked' : '';
                                multiSelectOptions.append(
                                    '<label><input type="checkbox" value="' + post
                                    .id + '" ' + selected + '> <span>' + post
                                    .title + '</span></label>'
                                );
                            });

                            // Reinitialize custom multi-select
                            setupMultiSelect($('.latest-post-wrapper'));
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + ' ' + error);
                        }
                    });
                } else {
                    const multiSelectOptions = $('.latest-post-wrapper .multi-select-options');
                    multiSelectOptions.empty();
                    $('#latest_issue_post').val(''); // Clear hidden input
                }
            });

            // Setup custom multi-select
            function setupMultiSelect(wrapper) {
                const selectedItems = [];

                // Initialize selected items from existing data
                $(wrapper).find('.multi-select-options input[type="checkbox"]:checked').each(function() {
                    const value = $(this).val();
                    const text = $(this).next('span').text().trim();
                    selectedItems.push({
                        value,
                        text
                    });
                    $(this).prop('disabled', true); // Disable already selected checkboxes
                });

                function updateSelectedItems() {
                    $(wrapper).find('.multi-select-box .selected-tag').remove(); // Clear existing tags

                    selectedItems.forEach(item => {
                        const tag = $('<span class="selected-tag"></span>').text(item.text);
                        const closeButton = $('<span class="close-button">x</span>');

                        // Remove item on close button click
                        closeButton.click(function() {
                            const index = selectedItems.findIndex(selectedItem => selectedItem
                                .value === item.value);
                            if (index > -1) {
                                selectedItems.splice(index, 1);
                                $(wrapper).find('.multi-select-options input[value="' + item.value +
                                    '"]').prop('checked', false).prop('disabled', false);
                                updateSelectedItems();
                            }
                        });

                        tag.append(closeButton);
                        $(wrapper).find('.search-input').before(tag); // Add tag before the input
                    });

                    $(wrapper).find('.search-input').attr('placeholder', selectedItems.length ? '' :
                        'Select options...');

                    // Update hidden input with selected values
                    const selectedValues = selectedItems.map(item => item.value);
                    $(wrapper).find(
                        '.hidden-latest-post, .hidden-latest-category, .hidden-editor-pick, .hidden-spotlight-second, .hidden-policy-stream, .hidden-tailored-for-policymakers, .hidden-trending, .hidden-latest-issue-post'
                    ).val(JSON.stringify(
                        selectedValues)); // Ensure correct JSON array
                }

                updateSelectedItems(); // Initialize tags

                // Toggle options visibility on input focus
                $(wrapper).find('.search-input').focus(function() {
                    $(wrapper).find('.multi-select-options').show();
                    $(wrapper).find('.search-input').select(); // Focus and select text for input
                });

                // Filter options based on search input
                $(wrapper).find('.search-input').on('input', function() {
                    const query = $(this).val().toLowerCase();
                    $(wrapper).find('.multi-select-options label').each(function() {
                        const text = $(this).find('span').text().toLowerCase();
                        $(this).toggle(text.includes(query));
                    });
                });

                // Handle checkbox change
                $(wrapper).find('.multi-select-options input[type="checkbox"]').change(function() {
                    const value = $(this).val();
                    const text = $(this).next('span').text().trim();

                    if (this.checked) {
                        selectedItems.push({
                            value,
                            text
                        });
                        $(this).prop('disabled', true);
                    } else {
                        const index = selectedItems.findIndex(item => item.value === value);
                        if (index > -1) {
                            selectedItems.splice(index, 1);
                            $(this).prop('disabled', false);
                        }
                    }

                    updateSelectedItems();
                });

                // Hide dropdown when clicking outside
                $(document).click(function(event) {
                    if (!$(event.target).closest(wrapper).length) {
                        $(wrapper).find('.multi-select-options').hide();
                    }
                });

                // Prevent closing when clicking inside the dropdown
                $(wrapper).find('.multi-select-options').click(function(event) {
                    event.stopPropagation();
                });
            }

            // Initialize multi-select on all wrappers
            $('.multi-select-wrapper').each(function() {
                setupMultiSelect(this);
            });
        });
    </script>
@endsection
