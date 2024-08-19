@extends('master.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Politic</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Politic</h4>

                        <form action="{{ route('admin.politic.store') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input id="title" class="form-control" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" class="form-control" name="name" type="text">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input id="designation" class="form-control" name="designation" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="des">Description *</label>
                                                <textarea name="description" id="open-source-plugins" class="form-control" cols="30" rows="5"></textarea>
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
                                            <input type="checkbox" class="form-check-input" checked name="status"
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
