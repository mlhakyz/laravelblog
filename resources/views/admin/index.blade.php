@extends('admin.layout.layout')
@section('adminbody')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between ml-2 mr-2 mt-2">

                                    <p class="mb-0">Posts</p>
                                    <a type="button" href="{{ route('posts.create') }}" class="btn btn-info">Add
                                        Post</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive-sm">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Post ID</th>
                                            <th>Post Categories</th>
                                            <th>Post Editor</th>
                                            <th>Post Title</th>
                                            <th>Post Content</th>
                                            <th>Post Image</th>
                                            <th>Show</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $postevery)
                                            <tr>
                                                <td>{{ $postevery->id }}</td>
                                                <td> {{ $postevery->category->name }} </td>
                                                <td>{{ $postevery->editor }}</td>
                                                <td>{{ $postevery->title }}</td>
                                                <td>{{ $postevery->content }}</td>
                                                <td>{{ $postevery->image_url }}</td>
                                                <td><a href="{{ route('posts.show', $postevery) }}" type="button"
                                                        class="btn btn-block btn-primary">Show</a>
                                                </td>
                                                <td><a href="{{ route('posts.edit', $postevery) }}" type="button"
                                                        class="btn btn-block btn-secondary">Edit</a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('posts.destroy', $postevery) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-block btn-danger"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <li>
                                                Herhangi bir yazı bulunamadı
                                            </li>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                </div><!-- /.main row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
