<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Web\InicioController@index')->name('inicio');

/** pagina transparencia */
Route::resource('transparencia', 'Articulos\ArticuloController');

//Route::post('transparencia/docs', 'Articulos\ArticuloController@getDocumentos')->name('get-documentos-transparencia');
Route::get('transparencia/documento/inciso/{id_inciso}', [
    'as' => 'transparencia.documento.inciso', 'uses' => 'Articulos\ArticuloController@getDocumentosInciso'
]);
Route::get('transparencia/documento/parrafo/{id_parrafo}', [
    'as' => 'transparencia.documento.parrafo', 'uses' => 'Articulos\ArticuloController@getDocumentosParrafo'
]);

Route::post('/transparencia','Articulos\ArticuloController@showUploadFile');

Route::resource('parrafo', 'Articulos\ArticuloParrafoController');

Route::post('transparencia/parrafo/{id}', [
    'as' => 'transparencia.parrafo', 'uses' => 'Articulos\ArticuloParrafoController@getParrafos'
]);

Route::post('transparencia/inciso/{id_parrafo}', [
    'as' => 'transparencia.inciso', 'uses' => 'Articulos\ArticuloIncisoController@getIncisos'
]);

Route::post('transparencia/documento/parrafo/{id_parrafo}', [
    'as' => 'transparencia.documento.parrafo', 'uses' => 'Articulos\ArticuloDocumentoController@getDocumentosParrafo'
]);
Route::post('transparencia/documento/inciso/{id_inciso}', [
    'as' => 'transparencia.documento.inciso', 'uses' => 'Articulos\ArticuloDocumentoController@getDocumentosInciso'
]);
Route::resource('transparencia/inciso', 'Articulos\ArticuloIncisoController');
Route::resource('transparencia/documento', 'Articulos\ArticuloDocumentoController');

/** fin transparencia */

//////web
//aviso de privacidad
Route::get('/aviso-de-privacidad', 'Web\WebsController@aviso')->name('aviso-de-privacidad');

//directorio
Route::get('/directorio', 'Web\WebsController@directorio')->name('directorio');

//estrados
Route::get('/estrados', 'Estrados\EstradosController@index')->name('estrados');
Route::get('estrados/documento/{nivel}/{id}', [
    'as' => 'estrados.documento', 'uses' => 'Estrados\EstradosController@getDocumentosByNivel'
]);


//contacto
Route::get('/contacto', 'Web\WebsController@contacto')->name('contacto');
Route::post('/contacto/send', 'Web\WebsController@contactoSend')->name('send-contacto');

//noticias
Route::get('noticias', 'Web\Noticias\NoticiaController@notas')->name('noticias');
Route::get('notas/{slug}', 'Web\Noticias\NoticiaController@nota')->name('noticia');
Route::get('notas/categoria/{slug}', 'Web\Noticias\NoticiaController@categoria')->name('categoria');

//paginas
Route::get('/{slug}', 'Web\Paginas\PaginaController@page')->name('pagina');


//Route::view('/aviso-de-privacidad', 'web.avisodeprivacidad');

//Auth::routes();
Route::group(['prefix' => 'adm'], function() {
    Route::auth();
});
// Authentication Routes...
//Route::resource('adm/login', 'Auth\AuthController');
//Route::get('adm/login', 'Auth\LoginController@index');
//Route::post('super/admin', 'Auth\AuthController@postLogin')->name('auth.login.post');
//Route::get('super/admin/logout', 'Auth\AuthController@getLogout')->name('auth.logout.get');
//Route::get('/login-admin', 'HomeController@index')->name('login-admin');

//admin
Route::get('/adm/admin', 'Admin\PanelAdminController@index')->name('admin');
Route::resource('adm/admincategorias', 'Admin\CategoriaController');
Route::resource('adm/adminnoticias', 'Admin\NoticiaController');
Route::resource('adm/adminpaginas', 'Admin\PaginaController');
Route::resource('adm/adminmenus', 'Admin\MenuController');
Route::post('adm/adminmenus/reorder', 'Admin\MenuController@reorder')->name('reorder-menu');
Route::resource('adm/adminsliders', 'Admin\SliderController');
Route::resource('adm/adminboletines', 'Admin\BoletinController');

Route::resource('adm/adminsocials', 'Admin\SocialController');
Route::get('adm/adminsocials/whats', 'Admin\SocialController@editWhat')->name('edit-whatsapp');
Route::post('adm/adminsocials/whatsupdate', 'Admin\SocialController@updateWhats')->name('update-whatsapp');

Route::resource('adm/adminusers', 'Admin\UsuarioController');
Route::resource('adm/adminenlaces', 'Admin\EnlaceController');
//Route::resource('adm/adminestrados', 'Admin\ExtradoController');
//Route::resource('adm/admincategoriasextrado', 'Admin\CategoriaExtradoController');

Route::get('adm/adminestrados', 'Admin\EstradoController@index')->name('adminestrados');

Route::get('adm/adminestrados/categorias', 'Admin\EstradoController@indexCategorias')->name('categoriaEstrado');
Route::get('adm/adminestrados/categorias/create', 'Admin\EstradoController@createCategoria')->name('categoriaEstradoCreate');
Route::post('adm/adminestrados/categorias/post', 'Admin\EstradoController@storeCategoria')->name('categoriaEstradoPost');
Route::get('adm/adminestrados/categorias/edit/{id}', 'Admin\EstradoController@editCategoria')->name('categoriaEstradoEdit');
Route::put('adm/adminestrados/categorias/update', 'Admin\EstradoController@updateCategoria')->name('categoriaEstradoUpdate');
Route::delete('adm/adminestrados/categorias/delete/{id}', 'Admin\EstradoController@deleteCategoria')->name('categoriaEstradoDelete');

Route::get('adm/adminestrados/subcategorias', 'Admin\EstradoController@indexSubCategorias')->name('subcategoriaEstrado');
Route::get('adm/adminestrados/subcategorias/create', 'Admin\EstradoController@createSubCategoria')->name('subcategoriaEstradoCreate');
Route::post('adm/adminestrados/subcategorias/post', 'Admin\EstradoController@storeSubCategoria')->name('subcategoriaEstradoPost');
Route::get('adm/adminestrados/subcategorias/edit/{id}', 'Admin\EstradoController@editSubCategoria')->name('subcategoriaEstradoEdit');
Route::put('adm/adminestrados/subcategorias/update', 'Admin\EstradoController@updateSubCategoria')->name('subcategoriaEstradoUpdate');
Route::delete('adm/adminestrados/subcategorias/delete/{id}', 'Admin\EstradoController@deleteSubCategoria')->name('subcategoriaEstradoDelete');

Route::get('adm/adminestrados/grupos', 'Admin\EstradoController@indexGrupos')->name('grupoEstrado');
Route::get('adm/adminestrados/grupos/create', 'Admin\EstradoController@createGrupo')->name('grupoEstradoCreate');
Route::post('adm/adminestrados/grupos/post', 'Admin\EstradoController@storeGrupo')->name('grupoEstradoPost');
Route::get('adm/adminestrados/grupos/edit/{id}', 'Admin\EstradoController@editGrupo')->name('grupoEstradoEdit');
Route::put('adm/adminestrados/grupos/update', 'Admin\EstradoController@updateGrupo')->name('grupoEstradoUpdate');
Route::delete('adm/adminestrados/grupos/delete/{id}', 'Admin\EstradoController@deleteGrupo')->name('grupoEstradoDelete');

Route::get('adm/adminestrados/documentos', 'Admin\EstradoController@indexDocs')->name('docEstrado');
Route::get('adm/adminestrados/documentos/create/{nivel}/{id}', 'Admin\EstradoController@createDoc')->name('docEstradoCreate');
Route::post('adm/adminestrados/documentos/post', 'Admin\EstradoController@storeDoc')->name('docEstradoPost');
Route::get('adm/adminestrados/documentos/edit/{id}', 'Admin\EstradoController@editDoc')->name('docEstradoEdit');
Route::put('adm/adminestrados/documentos/update', 'Admin\EstradoController@updateDoc')->name('docEstradoUpdate');
Route::delete('adm/adminestrados/documentos/delete/{id}', 'Admin\EstradoController@deleteDoc')->name('docEstradoDelete');



Route::resource('adm/adminhemeroteca', 'Admin\HemerotecaController');
Route::resource('adm/admindirectorio', 'Admin\DirectorioController');
Route::resource('adm/admincomite', 'Admin\ComiteController');
Route::resource('adm/admincomision', 'Admin\ComisionController');
Route::resource('adm/adminmapas', 'Admin\ImagenMapaController');

Route::get('adm/admintransparencia', 'Admin\TransparenciaController@index')->name('admintransparencia');
Route::get('adm/admintransparencia/articulo/{id}', 'Admin\TransparenciaController@showParrafos')->name('showParrafosAdmin');
Route::get('adm/admintransparencia/parrafo/{id}', 'Admin\TransparenciaController@showIncisos')->name('showIncisosAdmin');
Route::get('adm/admintransparencia/inciso/{id}', 'Admin\TransparenciaController@showDocumentos')->name('showDocumentosAdmin');

////////////////artiuclos
Route::get('adm/admintransparencia/articulos', 'Admin\TransparenciaController@indexArticulos')->name('articulos');
//formulario crear
Route::get('adm/admintransparencia/articulos/new/', 'Admin\TransparenciaController@crearArticulo')->name('articuloForm');
Route::post('adm/admintransparencia/articulos/create/', 'Admin\TransparenciaController@createArticulo')->name('articuloCreate');
//formulario editar
Route::get('adm/admintransparencia/articulos/edit/{id}', 'Admin\TransparenciaController@editArticulo')->name('articuloEdit');
Route::put('adm/admintransparencia/articulos/update/{id}', 'Admin\TransparenciaController@updateArticulo')->name('articuloUpdate');


////////////////parrafos
Route::get('adm/admintransparencia/parrafos', 'Admin\TransparenciaController@indexParrafos')->name('parrafos');
//formulario crear
Route::get('adm/admintransparencia/parrafos/new/', 'Admin\TransparenciaController@crearParrafo')->name('parrafoForm');
Route::post('adm/admintransparencia/parrafos/create/', 'Admin\TransparenciaController@createParrafo')->name('parrafoCreate');
//formulario editar
Route::get('adm/admintransparencia/parrafos/edit/{id}', 'Admin\TransparenciaController@editParrafo')->name('parrafoEdit');
Route::put('adm/admintransparencia/parrafos/update/{id}', 'Admin\TransparenciaController@updateParrafo')->name('parrafoUpdate');


////////////////incisos
Route::get('adm/admintransparencia/incisos', 'Admin\TransparenciaController@indexIncisos')->name('incisos');
//formulario crear
Route::get('adm/admintransparencia/incisos/new/', 'Admin\TransparenciaController@crearInciso')->name('incisoForm');
Route::post('adm/admintransparencia/incisos/create/', 'Admin\TransparenciaController@createInciso')->name('incisoCreate');
//formulario editar
Route::get('adm/admintransparencia/incisos/edit/{id}', 'Admin\TransparenciaController@editInciso')->name('incisoEdit');
Route::put('adm/admintransparencia/incisos/update/{id}', 'Admin\TransparenciaController@updateInciso')->name('incisoUpdate');

////////////////incisos
Route::get('adm/admintransparencia/documentos', 'Admin\TransparenciaController@indexDocumentos')->name('documentos');
//formulario editar
Route::get('adm/admintransparencia/documentos/edit/{id}', 'Admin\TransparenciaController@editDocumento')->name('documentoEdit');
Route::put('adm/admintransparencia/documentos/update/{id}', 'Admin\TransparenciaController@updateDocumento')->name('documentoUpdate');
//
Route::post('adm/admintransparencia/documentos/add/P', 'Admin\TransparenciaController@addDocumentoParrafo')->name('documentoAddParrafo');
Route::post('adm/admintransparencia/documentos/add/I', 'Admin\TransparenciaController@addDocumentoInciso')->name('documentoAddInciso');
//elimina documento
Route::get('adm/admintrasparencia/documentos/delete/{id}', 'Admin\TransparenciaController@deleteDocumento')->name('documentoDelete');


//elimina un archivo de alguna pagina
Route::get('/deletearchivopagina/{id}', 'Admin\PaginaController@deleteArchivo')->name('delete-archivo-pagina');
//actualiza nombre de archivo
Route::post('/actualizanombrearchivo/{id}', 'Admin\PaginaController@actualizaArchivo')->name('update-archivo-pagina');
//controlador que sube una imagen desde el editor texto
Route::post('ckeditor/image_upload', 'Admin\NoticiaController@uploadImage')->name('upload');
