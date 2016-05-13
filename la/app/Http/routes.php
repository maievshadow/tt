<?php
#use DB;
use App\Task;
use App\Message;
use App\Library\Tencent;
use Illuminate\Http\Request;


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

Route::get('/', function(){
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('task', ['tasks' => $tasks]);
});

Route::post('/task', function(Request $request){
    $validator = Validator::make($request->all(), ['name' => 'required|max:255']);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

#Route::get('test', function(){
#    return view("hello");
#});

Route::get('t1', function(){
    return 1;
    #DB::insert('insert into users (id, name, email, password) values (?, ?, ? , ? )',
    #    [1, 'Laravel','laravel@test.com','123']);
    #DB::insert('insert into users (id, name, email, password) values (?, ?, ?, ? )',
    #    [2, 'Academy','academy@test.com','123']);
});

Route::resource('test', 'TestController');


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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('qq', function(){
    return view('child', ['name' => 'maiev']);
});

Route::get('pict', function(){
    
    $file = '/home/redredmaple/work2/meitu.jpg';
    $tencent = new Tencent();
    $t = $tencent->add($filename);
    $t = Tencent::add($file);
    var_dump($t);exit;
});

Route::any('saveImg/{type}', function(Request $request){
    if(!$request->hasFile('upfile')){
        exit('上传文件为空！');
    }
    $file = $request->file('upfile');
    $filename = $file->getClientOriginalName();
    $path = $file->getRealpath();
    $dest = sprintf('%s', $path);
    $tencent = new Tencent();
    $result = $tencent->add($dest);

    if (!$result['code']){
        //成功
        $arr = array(
            'state' => 'SUCCESS',
            'url' => $result['data']['downloadUrl'],
            'tilte' => 'zzzz');
    } else{
        //失败
        $arr = array(
            'state' => $result['message'],
        );
    }

    return $arr;
});

Route::post('save', function(Request $request){

    $arr = $request->all();

    var_dump($arr);exit;
});


Route::auth();

Route::get('/home', 'HomeController@index');
