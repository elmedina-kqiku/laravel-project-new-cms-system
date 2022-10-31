<x-admin-master>

    @section('content')

        <h1>Edit a Post</h1>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       value="{{$post->title}}">
                @error('title')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>

            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
                @error('body')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>
