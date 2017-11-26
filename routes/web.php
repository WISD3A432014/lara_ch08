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

//練習八: 修改根路由'/'，使之可執行HomeController的indexc函數
//oute::get('/', 'HomeController@indexc');

Route::get('/', function () {
  return view('welcome');
});
/*
練習一: 顯示學生的資料與成績
Route::get('student/{student_no}',function ($student_no){
    return '學號：'.$student_no;
});
Route::get('student/{student_no}/score',function ($student_no){
    return '學號：'.$student_no.'的所有成績';
});
*/

//練習二: 提供學生查詢自己的成績
//Route::get('student/{student_no}/score/{subject}', function ($student_no,$subject){
    //return '學號：'.$student_no.'的'.$subject.'成績';
//});

//練習三: 提供學生查詢所有科目或特定科目的成績
//Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject=null){
    ///return '學號：'.$student_no.'的'.((is_null($subject))?'所有科目':$subject).'成績';
//});

//練習四: 正規表達式限制參數_將參數做格式限制
//Route::get('student/{student_no}',function ($student_no){
   // return '學號：'.$student_no;
//}) -> where(['student_no' => 's[0-9]{10}']);
//Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject=null){
    //return '學號：'.$student_no.'的'.((is_null($subject))?'所有科目':$subject).'成績';
//}) -> where(['student_no' => 's[0-9]{10}','subject' => '(chinese|english|math)']);

//練習五: 用Route的param方法替常用的參數統一限制
//Route::pattern('student_no','s[0-9]{10}');
//Route::get('student/{student_no}',function ($student_no){
   // return '學號：'.$student_no;
//});
//Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject=null){
    //return '學號：'.$student_no.'的'.((is_null($subject))?'所有科目':$subject).'成績';
//}) -> where(['subject' => '(chinese|english|math)']);

//練習六: 路由群組_透過prefix前綴，將網址前套上student
//Route::group(['prefix' => 'student'],function(){
    //Route::get('{student_no}', function ($student_no) {
        //return '學號：' . $student_no;
    //});
    //Route::get('{student_no}/score/{subject?}', function ($student_no, $subject = null) {
        //return '學號：' . $student_no . '的' . ((is_null($subject)) ? '所有科目' : $subject) . '成績';
    //})->where(['subject' => '(chinese|english|math)']);
//});
//練習七: 路由命名
//Route::get('{student_no}',['as' => 'student', 'uses' => function ($student_no) {
    //return '學號：' . $student_no;
//}]);
//Route::get('{student_no}/score/{subject?}',['as' => 'student.score',
    //'uses' => function ($student_no, $subject = null) {
        //return '學號：' . $student_no . '的' . ((is_null($subject)) ? '所有科目' : $subject) . '成績';
    //}])->where(['subject' => '(chinese|english|math)']);
//});
//練習九: 修改路由，使之可執行StudentController內的getStudentData及getStudentScore函數
    //Route::get('{student_no}',['as' => 'student', 'uses' => 'StudentController@getStudentData']);
    //Route::get('{student_no}/score/{subject?}',['as' => 'student.score',
        //'uses' => 'StudentController@getStudentScore'])->where(['subject' => '(chinese|english|math)']);
//});
//練習十: 新增路由'cool'
//Route::get('cool', 'Cool\TestController@indexc');
//練習十: 修改路由'cool'，使之加入namespace路由'Cool'當中
//Route::group(['namespace' => 'Cool'],function (){
    //Route::get('cool', 'TestController@indexc');
//});
/*
//練習五
Route::pattern('student_no','s[0-9]{10}');
//練習十
Route::group(['namespace' => 'Cool'],function (){
    Route::get('cool', 'TestController@indexc');
});
//練習二 CH7
Route::group(['prefix' => 'student'],function() {
//ch07練習三-7 測試http://localhost:8000/student/s9876543210
    Route::get('{student_no}', ['as' => 'student', 'uses' => 'StudentController@getStudentData']);
//ch07練習三-7 http://localhost:8000/student/s9999999999/score/math
    Route::get('{student_no}/score/{subject?}', ['as' => 'student.score',
        'uses' => 'StudentController@getStudentScore'])->where(['subject' => '(chinese|english|math)']);
});
Route::get('/board', 'BoardController@getIndex');
*/
Route::get('/adduser',function (){
    $user = new \App\User();
    $user -> name = "user1";
    $user -> email = "user1@test.com";
    $user -> password = "user1pass";
    $user -> save();
});