@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-10">
            <h2>Posts</h2>

            <div class="lead">
                Manages You Posts Here
                <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">
                    Add New Post
                </a>
            </div>

            <div class="mt-2">
                @include('partials.message')
            </div>

            <table class="table table-bordered">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>

                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="d-flex">
                {!! $posts->links() !!}
            </div>
        </div>

        
    </div>
@endsection