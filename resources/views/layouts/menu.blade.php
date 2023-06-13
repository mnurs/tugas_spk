<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bobots.index') }}" class="nav-link {{ Request::is('bobots*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Bobot</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('hotels.index') }}" class="nav-link {{ Request::is('hotels*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Hotel</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('hotelDatas.index') }}" class="nav-link {{ Request::is('hotelDatas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Hotel Data</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('hotelKandidats.index') }}" class="nav-link {{ Request::is('hotelKandidats*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Hotel Kandidat</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('wisatas.index') }}" class="nav-link {{ Request::is('wisatas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Wisata</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('wisataDatas.index') }}" class="nav-link {{ Request::is('wisataDatas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Wisata Data</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('wisataKandidats.index') }}" class="nav-link {{ Request::is('wisataKandidats*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Wisata Kandidat</p>
    </a>
</li>
