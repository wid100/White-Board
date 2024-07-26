@extends('master.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post Table</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="card-title">Post</h6>
                            <div class="create-button">
                                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-icon">
                                    <i data-feather="plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Issue</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Post Date</th>
                                        <th>status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($post->image) }}" alt="" width="100"></td>
                                            <td>{{ Str::limit($post->title, 50) }}</td>

                                            <td>{{ $post->issue->issue_number }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->author->name }}</td>
                                            <td>{{ $post->post_date ? $post->post_date->format('d-M-Y') : 'N/A' }}</td>

                                            <td>
                                                @if ($post->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-primary">De Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.post.edit', $post->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                @if (Auth::user()->role_id == 1)
                                                    <form id="delete_form_{{ $post->id }}"
                                                        action="{{ route('admin.post.destroy', $post->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-icon delete-button"
                                                            onclick="deleteId({{ $post->id }})">
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
