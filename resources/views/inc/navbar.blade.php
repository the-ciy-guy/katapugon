<nav class="nav-main">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Katapugon') }}
    </a>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About The Comic</a></li>
        <li><a href="/posts">Latest strip</a></li>
        <li><a href="/albums/archive">Archive</a></li>
        <li><a href="/faq">FAQ</a></li>
        <li><a href="/contact">Contact</a></li>
        
        
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-content">
                    <a href="/dashboard">Dashboard</a>
                    <a href="/albums/create">Create Album</a>
                    
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    
                </div>
            </li>
        @endif
    </ul>
</nav>



<div class="nav-dropbar">
    <button class="dropbtn" onclick="dropDown()">Menu</button>
    <div class="dropdown-content" id="drop">
        <a href="/">Home</a>
        <a href="/about">About the comic</a>
        <a href="/posts">Latest strip</a>
        <a href="/albums/archive">Archive</a>
        <a href="/faq">FAQ</a>
        <a href="/contact">Contact</a>
        
        @if (Auth::guest())
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            
                <a href="#">
                    {{ Auth::user()->name }} 
                </a>

                
                    <a href="/dashboard">Dashboard</a>
                    <a href="/albums/create">Create Album</a>
                    
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    
            
        @endif
    </div>
</div> 