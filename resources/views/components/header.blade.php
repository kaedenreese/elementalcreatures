<header>
    <div id="main_logo">
        <a href="/"><img src="{{ asset('images/elemental_creatures_logo.webp') }}" alt="Elemental Creatures Trading Card Game" class="main-logo"></a>
    </div>
    <div id="header">
        <nav>
            <input type="checkbox" id="hamburger_menu">
            <ul id="navigation">
                <li><a href="{{ route('gallery') }}" class="nav-button">Card Gallery</a></li>
                <li><a href="{{ route('events') }}" class="nav-button">Events</a></li>
                <li><a href="{{ route('howtoplay') }}" class="nav-button">How to Play</a></li>
                <li><a href="{{ route('live') }}" class="nav-button">Live Calculator</a></li>
                <li><a href="{{ route('retailers') }}" class="nav-button">Retailer Locator</a></li>
            </ul>
        </nav>
    </div>
</header>