<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PersController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicInformationController;
use App\Livewire\SuperDuper\BlogList;
use App\Livewire\SuperDuper\BlogDetails;
use App\Livewire\SuperDuper\Pages\ContactUs;
use Illuminate\Support\Facades\Route;
use Lab404\Impersonate\Services\ImpersonateManager;

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

// Route::get('/', function () {
//     return view('components.superduper.pages.home');
// })->name('home');

/* HOME */
Route::get('/', [HomeController::class, 'index'])->name(('home'));
Route::get('/berita', [NewsController::class, 'index'])->name(name: ('news'));
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/pers/{slug}', [PersController::class, 'show'])->name('pers');
Route::get('/harga-acuan', [PriceController::class, 'index'])->name(('price'));

/* PERIZINAN */
Route::get('/perizinan', [\App\Http\Controllers\PermitController::class, 'index'])->name('permit.index');
Route::get('/perizinan/download/{name}', [\App\Http\Controllers\PermitController::class, 'download'])->name('permit.download');
Route::get('/perizinan/satisfaction-index', [\App\Http\Controllers\PermitController::class, 'satisfactionIndex'])->name('permit.satisfaction-index');

/* INFORMASI PUBLIK */
Route::get('/informasi-publik/kinerja', [PublicInformationController::class, 'performance'])->name('public-information.performance');
Route::get('/informasi-publik/kinerja/download/{name}', [PublicInformationController::class, 'download'])->name('public-information.performance.download');
Route::get('/informasi-publik/faq', [PublicInformationController::class, 'faq'])->name('public-information.faq');
Route::get('/informasi-publik/foto', [PublicInformationController::class, 'photos'])->name('public-information.photos');
Route::get('/informasi-publik/video', [PublicInformationController::class, 'videos'])->name('public-information.videos');
Route::get('/informasi-publik/foto/{slug}', [PublicInformationController::class, 'photoShow'])->name('public-information.photos.show');
Route::get('/informasi-publik/video/{slug}', [PublicInformationController::class, 'videoShow'])->name('public-information.videos.show');

/* PROFILE */
Route::get('/profil/sejarah', [ProfileController::class, 'sejarah'])->name(('profil.sejarah'));
Route::get('/profil/visi-misi', [ProfileController::class, 'visiMisi'])->name(('profil.visi-misi'));
Route::get('/profil/struktur-organisasi', [ProfileController::class, 'strukturOrganisasi'])->name(('profil.struktur-organisasi'));
Route::get('/profil/makna-logo', [ProfileController::class, 'maknaLogo'])->name(('profil.makna-logo'));
Route::get('/profil/daftar-menteri', [ProfileController::class, 'daftarMenteri'])->name(('profil.profile-menteri'));
Route::get('/profil/daftar-pejabat', [ProfileController::class, 'daftarPejabat'])->name(('profil.daftar-pejabat'));
Route::get('/profil/lokasi-kontak', [ProfileController::class, 'lokasiKontak'])->name(('profil.lokasi-kontak'));
Route::get('/profil/tugas-fungsi', [ProfileController::class, 'taskFunctions'])->name(('profil.tugas-fungsi'));

Route::get('/about-us', function () {
    return view('components.superduper.pages.about');
})->name('about-us');

Route::get('/menus/data', [HomeController::class, 'menus'])->name('menus.data');



Route::get('/blog', BlogList::class)->name('blog');

Route::get('/blog/{slug}', BlogDetails::class)->name('blog.show');

Route::get('/contact-us', ContactUs::class)->name('contact-us');

Route::get('/privacy-policy', function () {
    return view('components.superduper.pages.coming-soon');
})->name('privacy-policy');

Route::get('/terms-conditions', function () {
    return view('components.superduper.pages.coming-soon');
})->name('terms-conditions');

Route::get('/coming-soon', function () {
    return view('components.superduper.pages.coming-soon');
})->name('coming-soon');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'submit'])
    ->name('contact.submit');

Route::get('impersonate/leave', function() {
    if(!app(ImpersonateManager::class)->isImpersonating()) {
        return redirect('/');
    }

    app(ImpersonateManager::class)->leave();

    return redirect(
        session()->pull('impersonate.back_to')
    );
})->name('impersonate.leave')->middleware('web');

// SEO Routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');

