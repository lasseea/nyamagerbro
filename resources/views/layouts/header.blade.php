<div class="container">
    <div class="masthead">
        <h3 class="text-muted">Ny Amagerbrogade</h3>
        <nav>
                    <ul class="nav nav-justified">
                    <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link" href="{{ url('/butikker') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Butikker</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/events') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Nyheder & Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/kultur') }}"><i class="fa fa-heart" aria-hidden="true"></i> Historie & Kultur</a></li>
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Log ind</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> Tilmeld dig</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> Min profil</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Log ud

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

