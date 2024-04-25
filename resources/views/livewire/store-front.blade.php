<div class="grid grid-cols-4 gap-4 mt-12">
    @foreach ($this->products as $product)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ $product->image->path }}" alt="Product Image" class="w-full h-48 object-cover">
            <h2 class="font-medium text-lg">{{ $product->name }}</h2>
            <span class="text-gray-600 text-sm">{{ $product->price }}</span>
            <p>{{ $product->description }}</p>
        </div>
    @endforeach
</div>
