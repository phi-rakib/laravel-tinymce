@extends('layout.default')


@section('content')
    <div class="row">
        <div class="col-12 justify-content-center">
            <h2>New Post</h2>
            <div class="lead">
                Add New Post
            </div>

            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">
                        <h5>Title</h5>
                    </label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="body" class="form-label">
                        <h5>Content</h5>
                    </label>

                    <textarea name="body" class="tinymce-editor" cols="30" rows="10">
                        {{ old('body') }}
                    </textarea>

                    @if ($errors->has('body'))
                        <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-block">Publish</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help'
    });
</script>
@endsection

