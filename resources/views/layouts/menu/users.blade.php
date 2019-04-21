@role('admin')
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Beranda</span></a>
        </li>
        <li class="{{ Request::is('surat/masuk/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-envelope mr-5"></i>Surat Masuk</a>
            <ul>
                <li>
                    <a class="{{ Request::is('surat/masuk/tambah') ? 'active' : null }}" href="{{ route('surat.masuk.tambah') }}">Tambah Surat Masuk</a>
                </li>
                <li>
                    <a class="{{ Request::is('surat/masuk/data') ? 'active' : null }}" href="{{ route('surat.masuk.data') }}">Kelola Surat Masuk</a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('surat/keluar/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-direction mr-5"></i> Surat Keluar</a>
            <ul>
                <li>
                    <a class="{{ Request::is('surat/keluar/tambah') ? 'active' : null }}" class="" href="{{ route('surat.keluar.tambah') }}">Tambah Surat Keluar</a>
                </li>
                <li>
                    <a class="{{ Request::is('surat/keluar/data') ? 'active' : null }}" href="{{ route('surat.keluar.data') }}">Kelola Surat Keluar</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="{{ Request::is('surat/agenda/*') ? 'active' : null }}" href="{{ route('agenda.data') }}" class=""><i class="si si-calendar"></i><span class="sidebar-mini-hide">Agenda</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/disposisi') ? 'active' : null }}" href="{{ route('surat.disposisi.data') }}" class=""><i class="si si-note"></i><span class="sidebar-mini-hide">Disposisi</span></a>
        </li>
        <li class="{{ Request::is('laporan/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-printer mr-5"></i> Laporan</a>
            <ul>
                <li>
                    <a class="{{ Request::is('laporan/surat-masuk') ? 'active' : null }}" href="{{ route('laporan.masuk') }}">Surat Masuk</a>
                </li>
                <li>
                    <a class="{{ Request::is('laporan/surat-keluar') ? 'active' : null }}" href="{{ route('laporan.keluar') }}">Surat Keluar</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endrole
@role('kasubbag')
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Beranda</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/masuk/data') ? 'active' : null }}" href="{{ route('surat.masuk.data') }}" class=""><i class="si si-envelope"></i><span class="sidebar-mini-hide">Surat Masuk</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/keuar/data') ? 'active' : null }}" href="{{ route('surat.keluar.data') }}" class=""><i class="si si-direction"></i><span class="sidebar-mini-hide">Surat Keluar</span></a>
        </li>
        <li class="{{ Request::is('surat/agenda/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar mr-5"></i> Agenda</a>
            <ul>
                <li>
                    <a class="" href="{{ route('surat.keluar.tambah') }}">Tambah Agenda</a>
                </li>
                <li>
                    <a class="" href="{{ route('surat.keluar.data') }}">Data Agenda</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="{{ Request::is('surat/disposisi') ? 'active' : null }}" href="{{ route('surat.disposisi.data') }}" class=""><i class="si si-note"></i><span class="sidebar-mini-hide">Disposisi</span></a>
        </li>
    </ul>
</div>
@endrole
@role('sekretaris')
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Beranda</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/masuk/data') ? 'active' : null }}" href="{{ route('surat.masuk.data') }}" class=""><i class="si si-envelope"></i><span class="sidebar-mini-hide">Surat Masuk</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/keuar/data') ? 'active' : null }}" href="{{ route('surat.keluar.data') }}" class=""><i class="si si-direction"></i><span class="sidebar-mini-hide">Surat Keluar</span></a>
        </li>
        <li class="{{ Request::is('surat/agenda/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar mr-5"></i> Agenda</a>
            <ul>
                <li>
                    <a class="" href="{{ route('surat.keluar.tambah') }}">Tambah Agenda</a>
                </li>
                <li>
                    <a class="" href="{{ route('surat.keluar.data') }}">Data Agenda</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="{{ Request::is('surat/disposisi') ? 'active' : null }}" href="{{ route('surat.disposisi.data') }}" class=""><i class="si si-note"></i><span class="sidebar-mini-hide">Disposisi</span></a>
        </li>
    </ul>
</div>
@endrole
@role('kepala badan')
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Beranda</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/masuk/data') ? 'active' : null }}" href="{{ route('surat.masuk.data') }}" class=""><i class="si si-envelope"></i><span class="sidebar-mini-hide">Surat Masuk</span></a>
        </li>
        <li>
            <a class="{{ Request::is('surat/keuar/data') ? 'active' : null }}" href="{{ route('surat.keluar.data') }}" class=""><i class="si si-direction"></i><span class="sidebar-mini-hide">Surat Keluar</span></a>
        </li>
        <li class="{{ Request::is('surat/agenda/*') ? 'open' : null }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar mr-5"></i> Agenda</a>
            <ul>
                <li>
                    <a class="" href="{{ route('surat.keluar.tambah') }}">Tambah Agenda</a>
                </li>
                <li>
                    <a class="" href="{{ route('surat.keluar.data') }}">Data Agenda</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="{{ Request::is('surat/disposisi') ? 'active' : null }}" href="{{ route('surat.disposisi.data') }}" class=""><i class="si si-note"></i><span class="sidebar-mini-hide">Disposisi</span></a>
        </li>
    </ul>
</div>
@endrole

