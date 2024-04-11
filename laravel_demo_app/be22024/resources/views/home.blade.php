<x-layout>
    <x-slot:title>
        Trang home
        </x-slot>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4">

                @foreach($products as $product)

                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images') . '/' . $product->photo }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('products.showUser', $product->id) }}"><h5 class="card-title">{{ $product->name }}</h5></a>
                            @foreach($product->categories as $category)
                            <span class="badge text-bg-warning">{{ $category->name }}</span>
                            @endforeach
                            @php
                            $description = trim(strip_tags($product->description));
                            if(strlen($description) >= 100) {
                                $description = mb_substr($description, 0, mb_strpos($description, ' ', 100));
                            }
                            @endphp
                            <p class="card-text">{{ $description }}</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            {{ $products->links() }}
        </div>

</x-layout>