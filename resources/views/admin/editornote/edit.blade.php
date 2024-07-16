@extends('master.master')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Editor Note</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Editor Note</h4>

                        <form action="{{ route('admin.editornote.update', $editornote->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">Editor*</label>
                                        <select id="user_id" name="user_id" class="js-example-basic-multiple form-select"
                                            data-width="100%" required>
                                            @foreach ($editors as $editor)
                                                <option value="{{ $editor->id }}"
                                                    {{ $editor->id == $editornote->user_id ? 'selected' : '' }}>
                                                    {{ $editor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form_editor" class="form-label">Form Editor*</label>
                                        <input id="form_editor" class="form-control" name="form_editor" type="text"
                                            value="{{ old('form_editor', $editornote->form_editor) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title*</label>
                                        <input id="title" class="form-control" name="title" type="text"
                                            value="{{ old('title', $editornote->title) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="des">Description *</label>
                                                <textarea name="description" id="open-source-plugins" class="form-control" cols="30" rows="5">{{ old('description', $editornote->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <label class="form-check-label" for="termsCheck">
                                                Active
                                            </label>
                                            <input type="checkbox" class="form-check-input" name="status" id="termsCheck"
                                                {{ $editornote->status ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
