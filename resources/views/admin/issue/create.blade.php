@extends('master.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Editornots</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Editornots</h4>

                        <form action="{{ route('admin.issue.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="issue_number" class="form-label">Issue Number <span
                                                class="text-danger">*</span></label>
                                        <input id="issue_number"
                                            class="form-control @error('issue_number') is-invalid @enderror"
                                            name="issue_number" type="text" value="{{ old('issue_number') }}">
                                        @error('issue_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input id="name" class="form-control @error('name') is-invalid @enderror"
                                            name="name" type="text" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year_id" class="form-label">Year <span
                                                class="text-danger">*</span></label>
                                        <select id="year_id" name="year_id"
                                            class="js-example-basic-multiple form-select @error('year_id') is-invalid @enderror">
                                            <option value="">Select Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}"
                                                    {{ old('year_id') == $year->id ? 'selected' : '' }}>{{ $year->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('year_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="issue_month" class="form-label">Issue Month <span
                                                class="text-danger">*</span></label>
                                        <select id="issue_month" name="issue_month"
                                            class="js-example-basic-multiple form-select @error('issue_month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $month)
                                                <option value="{{ $month->id }}"
                                                    {{ old('issue_month') == $month->id ? 'selected' : '' }}>
                                                    {{ $month->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('issue_month')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="editorialnote_id" class="form-label">Select Editorial Note <span
                                                class="text-danger">*</span></label>
                                        <select id="editorialnote_id" name="editorialnote_id"
                                            class="js-example-basic-multiple form-select @error('editorialnote_id') is-invalid @enderror">
                                            <option value="">Select Editorial Note</option>
                                            @foreach ($editorialnots as $editorialnote)
                                                <option value="{{ $editorialnote->id }}"
                                                    {{ old('editorialnote_id') == $editorialnote->id ? 'selected' : '' }}>
                                                    {{ $editorialnote->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('editorialnote_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="editorial_note" class="form-label">Editorial Note <span
                                                class="text-danger">*</span></label>
                                        <textarea id="open-source-plugins" name="editorial_note"
                                            class="form-control @error('editorial_note') is-invalid @enderror" cols="30" rows="5">{{ old('editorial_note') }}</textarea>
                                        @error('editorial_note')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

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
                                                {{ old('status', true) ? 'checked' : '' }} name="status" id="termsCheck">
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
