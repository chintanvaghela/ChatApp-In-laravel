<div class="container-fluid">
        <div class="row navbar bg-dark fixed-top">
            <div class="col">
                <a href="/" class="navbar-brand">Chat Application</a>
            </div>
            <div class="col">
                <div>
                    <ul class="nav justify-content-center nav-pills">
                        <li class="nav-item"><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                        <li class="nav-item"><a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a></li>
                        <li class="nav-item"><a href="/contact" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>

                        @if(Auth::user())
                        <li class="nav-item"><a href="/chat" class="nav-link {{ Request::is('chat') ? 'active' : '' }}">Chat</a></li>
                        <li class="nav-item"><a href="/logout" class="nav-link {{ Request::is('logout') ? 'active' : '' }}">Logout</a></li>

                        @else

                        <li class="nav-item"><a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a></li>
                        <li class="nav-item"><a href="/registration" class="nav-link {{ Request::is('registration') ? 'active' : '' }}">Registration</a></li>


                        @endif
                    </ul>
                </div>
            </div>
        </div>
</div>
