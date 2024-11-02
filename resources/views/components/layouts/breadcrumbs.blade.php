@props(['breadcrumbs'])

@if (collect($breadcrumbs)->count() !== 0)
  <div class="d-none d-lg-flex align-items-center">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0 p-0">
        @foreach ($breadcrumbs as $href => $title)
          <li @class([
            'breadcrumb-item',
            'text-muted',
            'active' => $loop->last
          ]) @if ($loop->last)aria-current="page" @endif>
            @if (is_string($href))
              <a href="{{ $href }}">{{ $title }}</a>
            @else
              {{ $title }}
            @endif
          </li>
        @endforeach
      </ol>
    </nav>
  </div>  
@endif
