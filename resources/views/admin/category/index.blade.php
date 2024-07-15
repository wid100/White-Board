@extends('master.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories Table</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="card-title">Categories</h6>
                            <div class="create-button">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-icon">
                                    <i data-feather="plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->user->name }}</td>

                                            <td>
                                                @if ($category->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-primary">De Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                @if (Auth::user()->role_id == 1)
                                                    <form id="delete_form_{{ $category->id }}"
                                                        action="{{ route('admin.category.destroy', $category->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-icon delete-button"
                                                            onclick="deleteId({{ $category->id }})">
                                                            <i data-feather="trash"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
