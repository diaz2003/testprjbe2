<x-admin-layout>
    <h1>Edit product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Product photo</label>
            <input type="text" class="form-control" id="photo" name="photo" value="{{ $product->photo }}">
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label class="form-label">Categories:</label>
        @foreach($categories as $category)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]" id="cate-{{ $category->id }}">
            <label class="form-check-label" for="cate-{{ $category->id }}">
                {{ $category ->name }}
            </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-admin-layout>