@extends('master.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Post</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Post</h4>

                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Meta Title -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_title" class="form-label">Meta Title <span
                                                class="text-danger">*</span></label>
                                        <input id="meta_title"
                                            class="form-control @error('meta_title') is-invalid @enderror" name="meta_title"
                                            type="text" value="{{ old('meta_title') }}" maxlength="70">
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Meta Tag -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_tag" class="form-label">Meta Tag <span
                                                class="text-danger">*</span></label>
                                        <input name="meta_tag" id="tags"
                                            class="form-select @error('meta_tag') is-invalid @enderror"
                                            value="{{ old('meta_tag') }}" placeholder="Add comma-separated tags" />
                                        @error('meta_tag')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Meta Description -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="meta_description" id="description" rows="5"
                                            class="form-control @error('meta_description') is-invalid @enderror" maxlength="170">{{ old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <h4 class="card-title">Post Information</h4>

                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="title" class="form-control @error('title') is-invalid @enderror"
                                            name="title" type="text" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Post Type -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="post_type" class="form-label">Post Type <span
                                                class="text-danger">*</span></label>
                                        <input id="post_type" class="form-control @error('post_type') is-invalid @enderror"
                                            name="post_type" type="text" value="{{ old('post_type') }}">
                                        @error('post_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Author (Select Writer) -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="author_id" class="form-label">Select Writer <span
                                                class="text-danger">*</span></label>
                                        <select id="author_id" name="author_id"
                                            class="js-example-basic-multiple form-select @error('author_id') is-invalid @enderror">
                                            <option value="">Select user</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('author_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('author_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Issue -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="issue_id" class="form-label">Issue <span
                                                class="text-danger">*</span></label>
                                        <select id="issue_id" name="issue_id"
                                            class="js-example-basic-multiple form-select @error('issue_id') is-invalid @enderror">
                                            <option value="">Select Issue</option>
                                            @foreach ($issues as $issue)
                                                <option value="{{ $issue->id }}"
                                                    {{ old('issue_id') == $issue->id ? 'selected' : '' }}>
                                                    {{ $issue->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('issue_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Issue Category <span
                                                class="text-danger">*</span></label>
                                        <select id="category_id" name="category_id"
                                            class="js-example-basic-multiple form-select @error('category_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tag -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tag_id" class="form-label">Select Tag <span
                                                class="text-danger">*</span></label>
                                        <select id="tag_id" name="tag_id"
                                            class="js-example-basic-multiple form-select @error('tag_id') is-invalid @enderror">
                                            <option value="">Select Tag</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tag_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Post Date -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="post_date" class="form-label">Post Date <span
                                                class="text-danger">*</span></label>
                                        <input id="post_date"
                                            class="form-control @error('post_date') is-invalid @enderror" name="post_date"
                                            type="date" value="{{ old('post_date') }}">
                                        @error('post_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea id="open-source-plugins" name="description"
                                            class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Cover Image -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Cover Image <span
                                                class="text-danger">*</span></label>
                                        <input id="image" class="form-control @error('image') is-invalid @enderror"
                                            name="image" type="file">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <label class="form-check-label" for="termsCheck">
                                                Active
                                            </label>
                                            <input type="checkbox" class="form-check-input"
                                                {{ old('status', true) ? 'checked' : '' }} name="status"
                                                id="termsCheck">
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
