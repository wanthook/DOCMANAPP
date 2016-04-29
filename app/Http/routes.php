<?php
$ext    = '';
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () use ($ext){
    Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
});

Route::group(['middleware' => ['web','auth']], function ()  use ($ext){
    
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('/', ['as' => 'home.root','uses' => 'HomeController@index']);
    Route::get('dashboard', ['as' => 'home.dashboard','uses' => 'HomeController@dashboard']);
    
    /*
     * Route buat kategori
     */
    Route::get('kategori',                ['as' => 'kategori.tabel','uses'  => 'KategoriController@show']);
    Route::post('kategori',               ['as' => 'kategori.tabel','uses'  => 'KategoriController@dataTables']);
    Route::get('kategori/tambah',         ['as' => 'kategori.tambah','uses' => 'KategoriController@create']);
    Route::post('kategori/tambah',        ['as' => 'kategori.tambah','uses' => 'KategoriController@save']);
    Route::get('kategori/{id}/ubah',      ['as' => 'kategori.ubah','uses'   => 'KategoriController@edit']);
    Route::patch('kategori/{id}/ubah',    ['as' => 'kategori.ubah','uses'   => 'KategoriController@update']);
    Route::patch('kategori/{id}/hapus',   ['as' => 'kategori.hapus','uses'   => 'KategoriController@softdelete']);
    //for select2
    Route::post('kategori/selectdua',        ['as' => 'kategori.selectdua','uses' => 'KategoriController@selectdua']);
    
    /*
     * Route buat departemen
     */
    Route::get('departemen',                ['as' => 'departemen.tabel','uses'  => 'DepartemenController@show']);
    Route::post('departemen',               ['as' => 'departemen.tabel','uses'  => 'DepartemenController@dataTables']);
    Route::get('departemen/tambah',         ['as' => 'departemen.tambah','uses' => 'DepartemenController@create']);
    Route::post('departemen/tambah',        ['as' => 'departemen.tambah','uses' => 'DepartemenController@save']);
    Route::get('departemen/{id}/ubah',      ['as' => 'departemen.ubah','uses'   => 'DepartemenController@edit']);
    Route::patch('departemen/{id}/ubah',    ['as' => 'departemen.ubah','uses'   => 'DepartemenController@update']);
    Route::patch('departemen/{id}/hapus',   ['as' => 'departemen.hapus','uses'   => 'DepartemenController@softdelete']);
    //for select2
    Route::post('departemen/selectdua',        ['as' => 'departemen.selectdua','uses' => 'DepartemenController@selectdua']);
    
     /*
     * Route buat user
     */
    Route::get('user',                ['as' => 'user.tabel','uses'  => 'UserController@show']);
    Route::post('user',               ['as' => 'user.tabel','uses'  => 'UserController@dataTables']);
    Route::get('user/tambah',         ['as' => 'user.tambah','uses' => 'UserController@create']);
    Route::post('user/tambah',        ['as' => 'user.tambah','uses' => 'UserController@save']);
    Route::get('user/{id}/ubah',      ['as' => 'user.ubah','uses'   => 'UserController@edit']);
    Route::patch('user/{id}/ubah',    ['as' => 'user.ubah','uses'   => 'UserController@update']);
    Route::patch('user/{id}/hapus',   ['as' => 'user.hapus','uses'   => 'UserController@softdelete']);
    //for select2
    Route::post('user/selectdua',        ['as' => 'user.selectdua','uses' => 'UserController@selectdua']);
    Route::post('user/selectduaauthor',        ['as' => 'user.selectduaauthor','uses' => 'UserController@selectduaauthor']);
     /*
     * Route buat module
     */
    Route::get('module',                ['as' => 'module.tabel','uses'  => 'ModuleController@show']);
    Route::post('module',               ['as' => 'module.tabel','uses'  => 'ModuleController@dataTables']);
    Route::get('module/tambah',         ['as' => 'module.tambah','uses' => 'ModuleController@create']);
    Route::post('module/tambah',        ['as' => 'module.tambah','uses' => 'ModuleController@save']);
    Route::get('module/{id}/ubah',      ['as' => 'module.ubah','uses'   => 'ModuleController@edit']);
    Route::patch('module/{id}/ubah',    ['as' => 'module.ubah','uses'   => 'ModuleController@update']);
    Route::patch('module/{id}/hapus',   ['as' => 'module.hapus','uses'   => 'ModuleController@softdelete']);
    //for select2
    Route::post('module/selectdua',        ['as' => 'module.selectdua','uses' => 'ModuleController@selectdua']);
    
    /*
     * Route buat dokumen
     */
    Route::get('dokumen',                ['as' => 'dokumen.tabel','uses'  => 'DokumenController@show']);
    Route::post('dokumen',               ['as' => 'dokumen.tabel','uses'  => 'DokumenController@dataTables']);
    Route::get('dokumen/tambah',         ['as' => 'dokumen.tambah','uses' => 'DokumenController@create']);
    Route::post('dokumen/tambah',        ['as' => 'dokumen.tambah','uses' => 'DokumenController@save']);
    Route::get('dokumen/{id}/ubah',      ['as' => 'dokumen.ubah','uses'   => 'DokumenController@edit']);
    Route::patch('dokumen/{id}/ubah',    ['as' => 'dokumen.ubah','uses'   => 'DokumenController@update']);
    Route::patch('dokumen/{id}/hapus',   ['as' => 'dokumen.hapus','uses'   => 'DokumenController@softdelete']);
    //for select2
    Route::post('dokumen/selectdua',        ['as' => 'dokumen.selectdua','uses' => 'DokumenController@selectdua']);
});
