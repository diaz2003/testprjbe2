<x-layout>
    @foreach($products as $product)
    <p>
        {{ $product->name }}
        <br>
        <img src="{{ asset('images') . '/' . $product->photo }}" alt="">
    </p>
    @endforeach
</x-layout>