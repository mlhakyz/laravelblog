<?php

use App\Contracts\Hammer;
use App\Contracts\Nail;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Teto\HTTP\AcceptLanguage;
use App\Http\Controllers\FormController;

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
    return view('welcome');
});

Route::get('welcome/{lang?}', function ($lang = null) {

    /*
    $languages = ['tr', 'en'];
    if (!in_array($lang, $languages)) {
        return "Geçersiz bir dil belirttiniz.";
    }
    */

    // basit bir karşılama sayfası hazırlayacağız.
    // bu karşılama sayfası Türkçe ve İngilizce seçeneklerle
    // hizmet verecek. Her iki dil için metin değerlerini
    // barındıran birer dizi oluşturacağız. Tercih edilen
    // dile göre ilgili dizinin elemanları ile çıktıyı oluşturacağız.

    $translations = [
        'tr' => [
            'welcome' => "Hoşgeldiniz",
            'intro' => "Biz en iyisiyiz",
            'headline' => "Diğerlerini boşverin",
            'outro' => "Daha fazlası için takip etmeye devam edin",
        ],
        'en' => [
            'welcome' => "Welcome",
            'intro' => "We're the best",
            'headline' => "Ignore the rest",
            'outro' => "Keep following for more",
        ],
        'es' => [
            'welcome' => "Bienvenido",
            'intro' => "Somos los mejores",
            'headline' => "Ignorar el resto",
            'outro' => "Sigue siguiendo para más",
        ],
        'fr' => [
            'welcome' => "Accueillir",
            'intro' => "Nous sommes les meilleurs",
            'headline' => "Ignorer le reste",
            'outro' => "Continuez à suivre pour en savoir plus",
        ],
    ];


    // Adres çubuğundan dil gelmediyse, request header'larındaki
    // Accept-Language dil dizisinin içinde var mı diye kontrol edilecek
    // Varsa o dil kullanılacak, yoksa İngilizce kullanılacak.
    // "factor" önemli değil, sırası önemli.
    // explode() ile belirli karaktere göre ayrım sağlayabiliriz.

    // Örneğin; Accept-Language: tr-TR,tr;q=0.9 ise ve /welcome şeklinde ziyaret edilmişse
    // site Türkçe dilinde gösterilmeli.
    // Örneğin; Accept-Language: jp... ise ve /welcome şeklinde ziyaret edilmişse
    // sitemizde bu dil olmadığı için site İngilizce dilinde gösterilmeli.


    /*
    $prefferedLanguage = substr($request->header('accept-language'), 0, 2);
    // dd($prefferedLanguage);

    if ($lang == null) {
        $lang = $prefferedLanguage;
    }
    */

    // 1. 'Accept-Language' headerına eriş
    // dd($request->header('accept-language'));
    // 2. kullanıcının istediği dillerin listesi olacak şekilde düzenle
    // Accept-Language: en-US,en;q=0.8,tr-TR,tr;q=0.9 --> [en,tr]
    // 3. bu listedeki herhangi bir eleman dil listesinde bulunuyorsa lang
    // değerine eşitle
    // 4. listenin devamını kontrol etme

    // Daha sonra Middleware olarak kullanılacak
    if ($lang == null) {
        $lang = 'en';
        foreach (AcceptLanguage::get() as $language) {
            if (in_array($language['language'], array_keys($translations))) {
                $lang = $language['language'];
                break;
            }
        }
    }

    // Prensipler; Inversion of Control, Dependency Inversion Principle
    // Desen/Pattern; Dependency Injection
    // Çatı/Framework; IoC Container

    // if (!isset($translations[$lang])) {
    //    return "İstediğiniz dil bulunmuyor";
    // }

    // dump($translations[$lang]);
    // dump n die
    // dd();

    return view('landing', [
        'lang' => $lang,
        'translations' => $translations[$lang],
        'languages' => array_keys($translations),
    ]);
})->name('landing');

Route::get('set-color/{color}', function ($color) {
    return redirect()->back()->withCookie('color', $color);
});

Route::get('story', [FormController::class, 'show'])->name('story.show');

Route::post('story', [FormController::class, 'handle'])->name('story.handle');

Route::match(['get', 'post'], 'hem-get-hem-post', function () {
    dd("Burası hem GET hem POST ile çalışıyor");
});

Route::any('tum-methodlar-icin', function () {
    dd('Burası tüm method lar için çalışıyor');
});

// index -> listeleme
// create -> ekleme formunu gösterme
// store -> eklemenin yapılacağı yer
// show  -> görüntüleme
// edit -> düzenleme formunu gösterme
// update -> güncellemenin yapılacağı yer
// destroy -> silinmenin yapılacağı yer
Route::resource('posts', PostController::class);

Route::resource('categories', CategoryController::class);

Route::get('app', function () {
    dd(app());
});

/*Route::get(
    'carpenter',
    function (Hammer $hammer, Nail $nail) {
        // bana gelen IzeltasCekic mi KorkmazCekic mi belli değil
        $hammer->nailing($nail, "sol üst");
        $hammer->nailing($nail, "sağ üst");
    }
);*/

// Create => create, store
// Read => index, show
// Update => edit, update
// Delete => destroyaa