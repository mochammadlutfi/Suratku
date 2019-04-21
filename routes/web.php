<?php
use App\User;
use Spatie\Permission\Models\Role;

Route::get('/coba', function () {
    $coba = Role::find(5);
    // foreach($coba as $c)
    // {
    //     echo $c->nama .'<br>';
    // }
    echo $coba->name;
    // Auth::user()->assignRole(5);
});
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('beranda', 'BerandaController@index')->name('beranda');

Route::group(['prefix' => 'surat'], function () {

    Route::group(['prefix' => 'masuk'], function () {
        Route::match(['get', 'post'], 'tambah', 'MasukController@tambah')->name('surat.masuk.tambah');
        Route::get('/data', 'MasukController@index')->name('surat.masuk.data');
        Route::get('/detail/{id}', 'MasukController@detail')->name('surat.masuk.detail');
        Route::get('/edit/{id}', 'MasukController@edit')->name('surat.masuk.edit');
        Route::post('/update/{id}', 'MasukController@update')->name('surat.masuk.update');
        Route::post('/hapus/{$id}','MasukController@delete_surat')->name('surat.masuk.hapus');
        Route::post('paraf', 'MasukController@paraf')->name('surat.masuk.paraf');
    });


    Route::group(['prefix' => 'keluar'], function () {
        Route::match(['get', 'post'], 'tambah', 'KeluarController@tambah')->name('surat.keluar.tambah');
        Route::get('data', 'KeluarController@index')->name('surat.keluar.data');
        Route::get('/detail/{id}', 'KeluarController@detail')->name('surat.keluar.detail');
        Route::get('/edit/{id}', 'KeluarController@edit')->name('surat.keluar.edit');
        Route::post('update', 'KeluarController@update')->name('surat.keluar.update');
        Route::get('/delete/{$id}', 'KeluarController@delete')->name('surat.keluar.delete');
    });

    Route::group(['prefix' => 'disposisi'], function () {
        Route::match(['get', 'post'], 'tambah', 'DisposisiController@tambah')->name('surat.disposisi.tambah');
        Route::get('data', 'DisposisiController@index')->name('surat.disposisi.data');
        Route::get('/detail/{id}', 'DisposisiController@detail')->name('surat.disposisi.detail');
    });
});

Route::group(['prefix' => 'agenda'],function (){
    Route::match(['get', 'post'], 'tambah', 'AgendaController@tambah')->name('agenda.tambah');
    Route::get('data','AgendaController@index')->name('agenda.data');
    Route::get('/detail/{id}', 'AgendaController@detail')->name('agenda.detail');
    Route::get('/edit/{id}', 'AgendaController@edit')->name('agenda.edit');
    Route::post('update','AgendaController@update')->name('agenda.update');
    Route::post('hapus/{id}','AgendaController@hapus')->name('agenda.hapus');

});

Route::group(['prefix' => 'laporan'], function () {
    Route::get('/surat-masuk','LaporanMasukController@index')->name('laporan.masuk');
    Route::get('/surat-keluar', 'LaporanKeluarController@index')->name('laporan.keluar');
});

Route::group(['prefix' => 'notifikasi'], function () {
    Route::get('/surat-masuk', 'NotifikasiController@masuk')->name('notif.masuk');
    Route::get('/surat-keluar', 'NotifikasiController@keluar')->name('notif.keluar');
    Route::get('/disposisi', 'NotifikasiController@disposisi')->name('notif.disposisi');
    Route::post('/marking','NotifikasiController@marking')->name('notif.marking');
});

Route::group(['prefix' => 'pengguna'], function () {
    Route::match(['get', 'post'], 'tambah', 'UserController@tambah')->name('user.tambah');
    Route::get('data', 'UserController@index')->name('user.data');
    Route::get('/detail/{id}', 'UserController@detail')->name('user.detail');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/update', 'UserController@update')->name('user.update');
    Route::match(['get', 'post'], 'pengaturan', 'UserController@pengaturan')->name('user.pengaturan');
    Route::match(['get', 'post'], 'ubah-password', 'UserController@ubah_pw')->name('user.ubah_pw');
    Route::match(['get', 'post'], 'roles', 'UserController@roles')->name('user.roles');

});
