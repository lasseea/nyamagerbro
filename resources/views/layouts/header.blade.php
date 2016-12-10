<div class="container">
    <div class="masthead">
        <h3 class="text-muted">Ny Amagerbrogade</h3>
        <nav>
                    <ul class="nav nav-justified">
                    <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ url('/butikker') }}">Butikker</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/events') }}">Nyheder & Events</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/kultur') }}">Historie & Kultur</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Log ind</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Tilmeld dig</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/butikker') }}">Butikker</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/events') }}">Nyheder & Events</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/kultur') }}">Historie & Kultur</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Min profil</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Log ud

                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin panel</a></li>
                            @endif
                        @endif
                    </ul>
        </nav>
    </div>
</div>

