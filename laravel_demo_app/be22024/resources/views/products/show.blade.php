<x-layout>
    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <h1>{{ $product->name }}</h1>
        {!! $product->description !!}
        @foreach($product->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">
                    <b>{{ $comment->rate }}</b> - {{ $comment->content }}
                </p>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="post" onsubmit="return confirm('Xóa không?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-small btn-danger mb-3">Delete</button>
                </form>

                <p class="card-text"><small class="text-body-secondary">{{ $comment->created_at }}</small></p>
            </div>
        </div>
        @endforeach

        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="mb-3">
                <label for="rate" class="form-label">Rate: </label>
                <input type="number" class="form-control" id="rate" name="rate">
                @error('rate')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Comment: </label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </form>

    </div>
</x-layout>