<div class="grid grid-cols-4 gap-4 mt-12">
    @foreach ($this->products as $product)
        <x-panel>
            <a wire:navigate href="{{ route('product.show', $product) }}" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ $product->image->path }}" alt="Product Image" class="w-full h-48 object-cover">
            <h2 class="font-medium text-lg">{{ $product->name }}</h2>
            <span class="text-gray-600 text-sm">{{ $product->price }}</span>
            <p>{{ $product->description }}</p>
        </x-panel>
    @endforeach
</div>
