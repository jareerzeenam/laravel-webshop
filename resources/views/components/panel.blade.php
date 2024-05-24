@props(['title' => false])
<div {{ $attributes->class(['bg-white rounded-lg shadow p-4 relative space-y-2']) }}>
    @if($title)
        <h2 class="font-medium text-lg">{{ $title }}</h2>
    @endif
    <div>
        {{ $slot }}
    </div>
</div>
