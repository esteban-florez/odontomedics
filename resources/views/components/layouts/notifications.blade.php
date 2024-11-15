@php
  $notifs = auth()->user()->unreadNotifications;
  $count = $notifs->count();
@endphp

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle pl-lg-3 position-relative" href="javascript:void(0)" id="bell" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span><i data-feather="bell" class="icon-sm"></i></span>
    @if ($count)
      <span class="badge text-bg-primary notify-no rounded-circle">{{ $count }}</span>
    @endif
  </a>
  <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown bg-white">
    <ul class="list-style-none">
      <li>
        <div class="message-center notifications position-relative">
          @forelse ($notifs as $notif)
            @php
              $carbon = new Carbon\Carbon($notif->data['time']);

              $time = $carbon->diffForHumans();
            @endphp
            <a href="{{ $notif->data['href'] }}"
              class="message-item d-flex align-items-center border-bottom px-3 py-2">
              <span class="btn btn-primary rounded-circle btn-circle pe-none d-flex justify-content-center align-items-center">
                <i data-feather="{{ $notif->data['icon'] }}"
                  class="text-white"></i>
              </span>
              <div class="w-75 d-inline-block v-middle ps-2">
                <h6 class="message-title mb-0 mt-1">{{ $notif->data['title'] }}</h6> <span
                  class="font-12 text-nowrap d-block text-muted">{{ $notif->data['text'] }}</span>
                <span class="font-12 text-nowrap d-block text-dark">{{ $time }}</span>
              </div>
            </a>
          @empty
          <a class="bg-white message-item d-flex align-items-center px-3 py-2">
            <h5 class="message-title pt-3 text-center text-muted">
              No hay notificaciones
            </h5>
          </a>
          @endforelse
        </div>
      </li>
      @if ($count)
        <li>
          <form action="{{ route('notifications') }}" method="POST" id="read">
            @csrf
            <a class="nav-link pt-3 text-center text-dark" data-form="read" href="javascript:void(0)">
              <strong>Marcar como leídas</strong>
            </a>
          </form>
        </li>
      @endif
    </ul>
  </div>
</li>
