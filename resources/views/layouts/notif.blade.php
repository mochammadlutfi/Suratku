@role('admin')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="badge badge-danger badge-pill">{{ Auth::user()->unreadNotifications()->groupBy('notifiable_id')->count() }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifikasi</h5>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.masuk') }}">
            <i class="si si-envelope mr-5"></i> Surat Masuk
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratMasukNotif')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.keluar') }}">
            <i class="si si-direction mr-5"></i> Surat Keluar
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratKeluarBaruNotification')->count() }}</span>
        </a>
    </div>
</div>
@endrole
@role('kasubbag')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="badge badge-danger badge-pill">{{ Auth::user()->unreadNotifications()->groupBy('notifiable_id')->count() }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifikasi</h5>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.masuk') }}">
            <i class="si si-envelope mr-5"></i> Surat Masuk
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratMasukNotif')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.keluar') }}">
            <i class="si si-direction mr-5"></i> Surat Keluar
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratKeluarBaruNotification')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.disposisi') }}">
            <i class="si si-note mr-5"></i> Disposisi
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\DisposisiNotif')->count() }}</span>
        </a>
    </div>
</div>
@endrole
@role('sekretaris')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="badge badge-danger badge-pill">{{ Auth::user()->unreadNotifications()->groupBy('notifiable_id')->count() }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifikasi</h5>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.masuk') }}">
            <i class="si si-envelope mr-5"></i> Surat Masuk
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratMasukNotif')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.keluar') }}">
            <i class="si si-direction mr-5"></i> Surat Keluar
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratKeluarBaruNotification')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.disposisi') }}">
            <i class="si si-note mr-5"></i> Disposisi
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\DisposisiNotif')->count() }}</span>
        </a>
    </div>
</div>
@endrole
@role('kepala badan')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="badge badge-danger badge-pill">{{ Auth::user()->unreadNotifications()->groupBy('notifiable_id')->count() }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifikasi</h5>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.masuk') }}">
            <i class="si si-envelope mr-5"></i> Surat Masuk
            <span class="badge badge-danger float-right badge-pill"> {{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratMasukNotif')->count() }}</span>
        </a>
        <a class="dropdown-item text-left mb-0" href="{{ route('notif.keluar') }}">
            <i class="si si-direction mr-5"></i> Surat Keluar
            <span class="badge badge-danger float-right badge-pill">{{ Auth::user()->unreadNotifications()->where('type','App\Notifications\SuratKeluarBaruNotification')->count() }}</span>
        </a>
    </div>
</div>
@endrole
<script>
    $(document).ready(function(){
        Pusher.logToConsole = true;

        var pusher = new Pusher('65db04c2ceafdd03f84c', {
            cluster: 'ap1',
            forceTLS: true
        });

        var userid = '<?= Auth::user()->id ?>'

        var channel = pusher.subscribe('App.User.' + userid);
            channel.bind('SuratKeluarBaruNotification', function(data) {
            alert(JSON.stringify(data));
        });


        // var channel = pusher.subscribe('my-channel');
        //     channel.bind('my-event', function(data) {
        //     alert(JSON.stringify(data));
        // });

    });
</script>