@props(['fallbackUrl'])
@php
    $previousUrl = url()->previous();
    $currentUrl = url()->current();
@endphp
<a href="{{ $previousUrl !== $currentUrl ? $previousUrl : $fallbackUrl }}" class="btn btn-outline">
  {{ $slot }}
</a>