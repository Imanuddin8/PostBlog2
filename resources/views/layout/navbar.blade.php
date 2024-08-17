<nav class="p-3 sticky-top" style="background: #212529">
    <div class="d-flex justify-content-start align-items-center">
        <div>
            <span class="text-white fw-bold fs-5 responsive-font">POST BLOG</span>
        </div>
        @auth
            <div class="ms-auto">
                @php
  $notifications = auth()->user()->unreadNotifications;
@endphp

<!-- Notifikasi Dropdown -->
<div class="dropdown position-relative">
  <a class="btn btn-link text-white" href="#" role="button" id="dropdownNotificationButton" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-bell fs-3"></i>
    @if($notifications->count() > 0)
      <span class="position-absolute top-0 start-55 translate-middle badge rounded-pill bg-danger">
        {{ $notifications->count() }}
      </span>
    @endif
  </a>

  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownNotificationButton">
    @forelse($notifications as $notification)
      <li>
        <a class="dropdown-item" href="#">
          <i class="fa-solid fa-comment"></i> {{ $notification->data['message'] }}
        </a>
      </li>
    @empty
      <li>
        <a class="dropdown-item" href="#">No notifications</a>
      </li>
    @endforelse
    @if($notifications->count() > 0)
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">View all notifications</a></li>
    @endif
  </ul>
</div>
            </div>
            <div class="dropdown ms-1">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('dist/img/anonim.jpg') }}" alt="" style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;">
                        <span class="text-white ms-2">{{auth()->user()->username}}</span>
                    </div>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a href="{{url('/index')}}" class="dropdown-item">
                            <i class="fa-solid fa-share me-2"></i>
                            <span>Post</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.index', auth()->user()->id)}}" class="dropdown-item">
                            <i class="fa-solid fa-user me-2"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary px-4 ms-auto d-flex align-items-center">
                <span class="me-2">Login</span>
                <i class="hidden sm:block fa-solid fa-sign-in-alt"></i>
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary px-4 ms-2 d-flex align-items-center">
                <span class="me-2">register</span>
                <i class="hidden sm:block fa-solid fa-user-plus"></i>
            </a>
        @endguest
    </div>
</nav>
