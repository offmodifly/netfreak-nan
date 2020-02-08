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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/test-video', function () {
    return view('partials.vimeo-video-player');
});

//แสดงรายการ ซีรีย์// ตอน index
Route::get('/series',function(){
    $series = \App\Serie::all();

    return view('serie.index')->with([
        'series'=> $series
    ]);
})->name('series');

//แสดงฟอร์ม
Route::get('/series/create',function(){
    return view('serie.create');
});

Route::get('series/{serieId}/episodes/create',function($serieId){
    return view('episode.create')->with([
        'serieId'=>$serieId
    ]);
});

// รับข้อมุลจากฟอร์ม บันทึก
Route::POST('/series',function(){
    $data=\Request::all();

     \App\Serie::create($data); // เพิ่มข้อมุล

    return redirect('series');  // ไปหน้าหลัก
});

//รับข้อมุลจากฟอร์ม ตอนย่อยของซีรี
Route::POST('/series/{id}/episodes',function($id){
    $data =\Request::all();
    $episode = \App\Episodes::create($data); // เพิ่มข้อมุล
    $episode->serie_id=$id;
    $episode->save();
    return redirect('/series/'.$id);  // ไปหน้าหลัก
});

//แสดง ตอน  ที่อยู่ในซีรีแต่ละเรื่อง
Route::get('/series/{serie}',function(\App\Serie $serie){
//Route::get('/series/{id}',function($serie){
    // $serie = \App\Serie::find($id);
    return view('serie.show')->with([
        'serie'=>$serie
    ]);
});

