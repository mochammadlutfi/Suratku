<ul class="nav-main-header">
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Surat Masuk</a>
        <ul>
            <li>
                <a href="{{ route('surat.masuk.tambah') }}">Tambah Surat Masuk Baru</a>
            </li>
            <li>
                <a href="{{ route('surat.masuk.data') }}">Kelola Surat Masuk</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Surat Keluar</a>
        <ul>
            <li>
                <a href="be_comp_chat_multiple.html">Tambah Surat Keluar Baru</a>
            </li>
            <li>
                <a href="be_comp_chat_single.html">Kelola Surat Keluar</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('beranda') }}" class=""><i class="si si-compass"></i><span class="sidebar-mini-hide">Disposisi</span></a>
    </li>
</ul>
