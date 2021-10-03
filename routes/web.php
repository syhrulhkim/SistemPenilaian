<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\TahapKepuasanPelanggan;
use App\Http\Livewire\OfiNcr;

use App\Http\Livewire\KPI;
use App\Http\Livewire\Kecekapan;
use App\Http\Livewire\Nilai;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;

use Illuminate\Http\Request;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
 
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::post('/staff/save/kpi',[KPI::class, 'kpi_save'])->name('kpi_save');
Route::post('/staff/save/kecekapan',[Kecekapan::class, 'kecekapan_save'])->name('kecekapan_save');
Route::post('/staff/save/nilai',[Nilai::class, 'nilai_save'])->name('nilai_save');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/kpi', KPI::class)->name('kpi');
    Route::get('/kecekapan', Kecekapan::class)->name('kecekapan');
    Route::get('/nilai', Nilai::class)->name('nilai');

    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/tahap-kepuasan-pelanggan', TahapKepuasanPelanggan::class)->name('tahap-kepuasan-pelanggan');
    Route::get('/ofi-ncr', OfiNcr::class)->name('ofi-ncr');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});

