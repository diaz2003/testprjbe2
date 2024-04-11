<x-admin-layout>
    @if($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif
    <h1>Products
        <a href="{{ route('products.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i></a>
    </h1>
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}"><i class="bi bi-pencil-square"></i></a>
                    delete
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</x-admin-layout>