<div class="grid grid-cols-2 gap-10 mt-12 py-12">
    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}' }">
        <div class="bg-white pt-5 rounded-lg shadow">
            <img x-bind:src="image" alt="">
        </div>

        <div class="grid grid-cols-4 gap-4">
            @foreach($this->product->images as $image)
                <div class="rounded bg-white p-2 shadow">
                    <img src="/{{ $image->path }}" @click="image = '/{{ $image->path }}'" alt="">
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h1 class="text-3xl font-medium">{{$this->product->name}}</h1>
        <div class="text-xl text-gray-700">{{ $this->product->price }}</div>
        <div class="mt-4">
            <p>{{ $this->product->description }}</p>
        </div>

        <div class="mt-4 space-y-4">
            <select wire:model.change="variant" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-800">
                @foreach($this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            @error('variant')
                <span class="mt-2 text-red-500">{{ $message }}</span>
            @enderror

            <x-button wire:click="addToCart" class="w-full">Add to Cart</x-button>
        </div>
    </div>
</div>
