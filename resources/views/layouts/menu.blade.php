<!-- need to remove --> 
<li class="nav-item">
    <a href="{{ route('mahasiswas.index') }}" class="nav-link {{ Request::is('mahasiswas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Mahasiswa</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('mataKuliahs.index') }}" class="nav-link {{ Request::is('mataKuliahs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Mata Kuliah</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('khs.index') }}" class="nav-link {{ Request::is('khs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Khs</p>
    </a>
</li>
