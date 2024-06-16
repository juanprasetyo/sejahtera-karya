@props(['url', 'icon', 'name', 'active'])

<li class="nav-item">
  <a href="{{ $url }}" class="nav-link {{ $active ? 'active' : ''}}">
    {{ $slot }}
  </a>
</li>