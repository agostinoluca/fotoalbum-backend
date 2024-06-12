@php
    $width = $width ?? '100%';
    $aspectRatio = $aspectRatio ?? null;

@endphp

@if (Str::startsWith($photo->image, 'https://'))
    <img class="rounded-3 card-img-top" src="{{ $photo->image }}" alt="Photo number {{ $photo->id }}" loading="lazy"
        style="width: {{ $width }}; @if ($aspectRatio) aspect-ratio: {{ $aspectRatio }}; @endif ">
@else
    <img class="rounded-3 card-img-top" src="{{ asset('storage/' . $photo->image) }}"
        alt="Photo number {{ $photo->id }}"
        style="width: {{ $width }}; @if ($aspectRatio) aspect-ratio: {{ $aspectRatio }}; @endif ">
@endif
