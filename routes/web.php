<?php

use App\Events\MyEvent;
use App\Http\Controllers\AbutUsController;
use App\Http\Controllers\confg_user_controll;
use App\Http\Controllers\controll__api;
use App\Http\Controllers\ControllPanelController;
use App\Http\Controllers\enter_first_data;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\is_twoilio;
use App\Http\Controllers\KarymyBankController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\setting;
use App\Http\Controllers\user_table;
use App\Http\Controllers\VisaController;
use App\Models\controll_panel;
use App\Models\general_setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return redirect()->route('login');
});

Route::get('/dashboard', [ControllPanelController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/even', function () {
    // $response = Http::withToken('EAAI1m4weYQEBO8L911VdF9ZAlIqnb2sJzcILBlkf1QG0wyZCZBJ68lyrSshI13LxWZC4u5IZACjvnh88rVnM8dbnGyySTBDJQHdKic4Gvp6EppuiJvqQn9EMVMlalhwGP5PqxbpOtWZCb61t7worq0bmIZCHZAkK0P42Ev21Pup0VowzEeLIHIFdYtXAjHbotOl5ZC7J50aEioK7xIiu16uBqvNhcEn4ZD')
    // ->post('https://graph.facebook.com/v22.0/549212688277656/messages', [
    //     "messaging_product" => "whatsapp",
    //     "to"                => "967714229743",
    //     "type"              => "template",
    //     "template"          => [
    //         "name"     => "hello_world",
    //         "language" => [
    //             "code" => "en_US"
    //         ]
    //     ]
    // ]);
    // return $response->json();
    event(new MyEvent("alart"));
});
Route::get('seting_mangment', function () {

    return view("fram.setting.setting_mangment");
})->name("seting_mangment");
Route::resource('setting', setting::class)->middleware('auth');
Route::resource('karymy_bank', KarymyBankController::class)->middleware('auth');
Route::resource('visa', VisaController::class)->middleware('auth');
Route::resource('help', HelpController::class)->middleware('auth');
Route::resource('abut_us', AbutUsController::class)->middleware('auth');

Route::resource('conf_user', confg_user_controll::class);
Route::resource('twoilio_setting', is_twoilio::class)->middleware('auth');
Route::resource('user_table', user_table::class)->middleware('auth');
//hooooome
Route::resource('data', controller: ControllPanelController::class)->middleware('auth');
// Route::get('/aaaa', [ControllPanelController::class,"index"])->name('main');

Route::get('MySetting/{id}', [setting::class,'MyUpdate'])->name('update_setting')->middleware('auth');
Route::get('test', [controll__api::class,'test'])->name('test')->middleware('auth');
// Route::get('is_twoilio', [is_twoilio::class,'index'])->name('is_twoilio');
// Route::post('api/webhook', [controll__api::class, 'handleWebhook']);


// Route::get('manage',function (){
//     return view('fram.register');
// })->name('manage');
Route::resource('manange', ManageController::class)->middleware('auth');
Route::resource('general_setting', GeneralSettingController::class)->middleware('auth');
Route::get('/Hello', function () {

    return view('fram.Hello_user');
})->name('hello')->middleware('auth');

require __DIR__.'/auth.php';


