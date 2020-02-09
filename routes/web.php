<?php
use App\TheLoai;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@getVideo');

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::group(['prefix'=>'theloai'],function(){
        //admin/theloai/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');
        
        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{id}','TheLoaiController@getXoa');
    });

    Route::group(['prefix'=>'loaitin'],function(){

        Route::get('danhsach','LoaiTinController@getDanhSach');

        Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');
        
        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

        Route::get('xoa/{id}','LoaiTinController@getXoa');
    });

    Route::group(['prefix'=>'tintuc'],function(){

        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });

    Route::group(['prefix'=>'comment'],function(){
        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
    });

    Route::group(['prefix'=>'slide'],function(){

        Route::get('danhsach','SlideController@getDanhSach');

        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');

        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('xoa/{id}','SlideController@getXoa');
    });

    Route::group(['prefix'=>'user'],function(){

        Route::get('danhsach','UserController@getDanhSach');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');

        Route::get('detail/{id}','UserController@getDetail');

    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idCategory}','AjaxController@getLoaiTin');
    });

});

Route::get('home','PagesController@home');
Route::get('contact','PagesController@contact');
Route::get('typeOfnews/{id}/{TenKhongDau}.html','PagesController@typeOfnews');
Route::get('news/{id}/{TieuDeKhongDau}.html','PagesController@news');

Route::get('login','PagesController@getDangnhap');
Route::post('login','PagesController@postDangnhap');
Route::get('logout','PagesController@getDangxuat');
Route::get('userDetail','PagesController@getUserDetail');
Route::post('userDetail','PagesController@postUserDetail');
Route::get('register','PagesController@getRegister');
Route::post('register','PagesController@postRegister');

Route::post('comment/{id}','CommentController@postComment');

Route::get('search','PagesController@getSearch');

Route::get('intro','PagesController@getAbout');
    
    