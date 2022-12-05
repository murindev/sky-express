<?php

use Illuminate\Support\Facades\Route;

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


// public
Route::get('/', function () {
    return view('root.home');
})->name('home');
Route::get('/calculator', function () {
    return view('root.calculator');
})->name('calculator');

Route::get('/fizicheskim-licam', [\App\Http\Controllers\Pages\IndividualController::class, 'index'])->name('individuals');
Route::get('/fizicheskim-licam/{slug}', [\App\Http\Controllers\Pages\IndividualController::class, 'show'])->name('individual');

Route::get('/juridicheskim-licam', [\App\Http\Controllers\Pages\LegalController::class, 'index'])->name('legals');
Route::get('/juridicheskim-licam/{slug}', [\App\Http\Controllers\Pages\LegalController::class, 'show'])->name('legal');

Route::get('/uslugi', [\App\Http\Controllers\Pages\ServiceController::class, 'index'])->name('services');
Route::get('/uslugi/{slug}', [\App\Http\Controllers\Pages\ServiceController::class, 'show'])->name('service');

Route::get('/dop-uslugi', [\App\Http\Controllers\Pages\AddServiceController::class, 'index'])->name('add-services');
Route::get('/dop-uslugi/{slug}', [\App\Http\Controllers\Pages\AddServiceController::class, 'show'])->name('add-service');

Route::get('/akcii', [\App\Http\Controllers\Pages\ActionController::class, 'index'])->name('actions');
Route::get('/akcii/{slug}', [\App\Http\Controllers\Pages\ActionController::class, 'show'])->name('action-page');


Route::get('/poleznaja-informacija', [\App\Http\Controllers\Pages\FaqController::class, 'index'])->name('faq');

Route::get('/nashi-ofisy', [\App\Http\Controllers\Pages\OfficeController::class, 'index'])->name('offices');
Route::get('/zakaz-oformlen', [\App\Http\Controllers\Pages\TrackingNumberController::class, 'index'])->name('tracking-number');

// personal

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Personal\User::class,'index'])->name('user');
    Route::get('add-user', [\App\Http\Controllers\Personal\AddUser::class,'index'])->name('add-user');
    Route::get('departures', [\App\Http\Controllers\Personal\Departures::class,'index'])->name('departures');
    Route::get('address-book', [\App\Http\Controllers\Personal\AddressBook::class,'index'])->name('address-book');
    Route::get('calculate', [\App\Http\Controllers\Personal\Calculate::class,'index'])->name('calculate');
    Route::get('docs', [\App\Http\Controllers\Personal\Docs::class,'index'])->name('docs');

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/sess', function () {
//    request()->session()->forget('departures');
    dump(request()->session()->get('departures'));
    dump(request()->session()->get('orders'));
    dump(request()->session()->get('total'));
    dump(request()->session()->all());

//    $prices = array_sum(array_column( $departures,'price'));
//    $insurances = array_sum(array_column($departures, 'inshprice'));


});

Route::get('/test', function () {
    dump('sdfsdfsdf');


//    $res = $measoft->citiesList(array('namestarts' => 'Москва '));

    $data = array(
        'sender' => array(
            'company' => 'Отправкин',
            'person' => 'Олегов Олег Олегович',
            'phone' => '495 1234567',
            'zipcode' => '644000',
            'town' => 'Омск',
            'address' => 'Огуречная, 1',
            'date' => '',
            'time_min' => '',
            'time_max' => '',
        ),
        'receiver' => array(
            'company' => 'Получайкин',
            'person' => 'Петров Петр Петрович',
            'phone' => '495 2345678',
            'zipcode' => '180000',
            'town' => 'Псков',
            'address' => 'Помидорная, 5',
            'date' => date('Y-m-d'),
            'time_min' => '',
            'time_max' => '',
        ),
        'price' => 1100,
        'inshprice' => 1100,
        'deliveryprice' => 0,
        'discount' => 0,
        'paytype' => 'CARD',
        'receiverpays' => 'NO',

        'quantity' => 1,
        'weight' => 2,
        'service' => 1,
        'type' => 1,

        'return' => 'NO',
        'return_weight' => 0,
        'return_service' => 0,
        'return_type' => 0,

        'enclosure' => 'Описание заказа',
        'instruction' => 'Комментарии к заказу',

        'department' => 'Отдел',
        'pickup' => 'NO',
        'acceptpartially' => 'NO',
        'costcode' => 'cc12345',
    );

    $items = array(
        array(
            'name' => 'Товар 1',
            'quantity' => 1,
            'mass' => 0.5,
            'retprice' => 100,
            'barcode' => '12345789'
        ),
        array(
            'name' => 'Товар 2',
            'quantity' => 4,
            'mass' => 0.25,
            'retprice' => 250,
            'barcode' => '987654321'
        ),
    );

    $packages = array(
        array(
            'name' => 'Место 1',
            'mass' => 0.5,
            'strbarcode' => '12345789'
        ),
        array(
            'name' => 'Место 2',
            'mass' => 0.25,
            'strbarcode' => '987654321'
        ),
    );

    $measoft = new App\Services\Measoft\MeasoftCourier('ABS', '123456', '391');

    $res = $measoft->orderCreate($data, $items, $packages);

    dump($res);

});


Route::get('/cities', function () {
    $r = App\Services\Courier\Courier::cities([
        'namestarts' => 'moskoo'
    ]);

    dump($r);
//echo '<pre>';
//print_r($r);
//echo '</pre>';
//    foreach ($s->town as $t) {
//       $rr =  collect($t)->toArray();
//        dump($t);
//    }


    /*    $measoft = new \App\Services\Measoft\MeasoftCourier('ABC', '123456', '391');
        $res = $measoft->citiesList(array('namestarts' => 'Моск'));

        echo '<pre>';
        print_r($res);
        echo '</pre>';*/
});


Route::get('/calc', function () {

    $courier = \App\Services\Courier\Courier::calculate([
        'sender' => 'Москва город',
        'receiver' => 'Санкт-Петербург город',
        'mass' => 23.9,
        'length' => 40,
        'width' => 40,
        'height' => 20,
//        'service' => 2
    ]);


});


Route::get('/calc-packs', function () {

    $courier = \App\Services\Courier\Courier::calculatePackages([
        'sender' => 'Москва город',
        'receiver' => 'Санкт-Петербург город',
        'packages' => [
            [
                'mass' => 33.9,
                'length' => 90,
                'width' => 40,
                'height' => 20,
//        'service' => 2
            ],
            [
                'mass' => 5.9,
                'length' => 40,
                'width' => 20,
                'height' => 20,
//        'service' => 2
            ],
            [
                'mass' => 8.9,
                'length' => 40,
                'width' => 40,
                'height' => 30,
//        'service' => 2
            ],
        ],

    ]);

    dd($courier);


});


Route::get('/serv-ice', function () {

    $measoft = new \App\Services\Measoft\MeasoftCourier('ABS', '123456', '391');
    if (is_array($res = $measoft->servicesList())) {
        echo '<pre>';
        foreach ($res as $code => $service) {
            print 'Код ' . $code . ', наименование: ' . $service . "\n";
        }
        echo '</pre>';
    }
});

Route::get('/rasch', function () {
    $measoft = new \App\Services\Measoft\MeasoftCourier('ABS', '123456', '391');
    $res = $measoft->calculate(array(
        'townfrom' => 'Москва',
        'townto' => 'Санкт-Петербург',
        'service' => 2,
    ));
    dump($res);

    /*    echo '<pre>';
        print_r($res);
        echo '</pre>';*/
});

Route::get('/street', function () {
    $streets = \App\Services\Courier\Courier::streets([
        'town' => 'Санкт-Петербург город',
        'namecontains' => 'лен'

    ]);
    dump($streets);

});


Route::get('/crawler', function () {



/*   \Spatie\Crawler\Crawler::create()
        ->ignoreRobots()
        ->setCrawlObserver(new \App\Services\Crawlers\WikiCountries())
       ->setCurrentCrawlLimit(1)
        ->startCrawling('https://www.lipsum.com');

//    dump(\Spatie\Crawler\Crawler::);*/

    /*
        $link = 'https://ru.wikipedia.org/wiki/ISO_3166-1';


        $html = file_get_contents($link);

        $crawler = new \Symfony\Component\DomCrawler\Crawler(null, $link);
        $crawler->addHtmlContent($html, 'UTF-8');

        $crawler->filter('.wikitable > tbody tr')->each(function (\Symfony\ComponenDomCrawler\Crawler $node, $i) {


    /*

            $node->filter('td')->each(function (\Symfony\Component\DomCrawler\Crawler $td, $k) {

                if($k == 0) { // name
                    $name = $td->text();
                    $name = str_replace("\xc2\xa0",'',$name);
                    echo '-> '.$name;
                    $arr = [
                        'order' => 500,
                        'active' => 1
                    ];
                    $arr['slug'] =  Str::slug($name);
                    $arr['name'] = $name;
                }

                if($k == 1) { // name
                    $alpha_short = $td->text();
                    $alpha_short = str_replace("\xc2\xa0",'',$alpha_short);
                    echo '-> '.$alpha_short;
                    $arr['alpha_short'] = $alpha_short;
                }

                if($k == 2) { // name
                    $alpha = $td->text();
                    $alpha = str_replace("\xc2\xa0",'',$alpha);
                    echo '-> '.$alpha;
                    $arr['alpha'] = $alpha;
                }

                if($k == 3) { // name
                    $digital = $td->text();
                    $digital = str_replace("\xc2\xa0",'',$digital);
                    echo '-> '.$digital;
                    $arr['digital'] = $digital;
                }

                if($k == 4) { // name
                    $code = $td->text();
                    $code = str_replace("\xc2\xa0",'',$code);
                    echo '-> '.$code;
                    $arr['code'] = $code;

                    dump($arr);
                }




            });
            echo '<br/>'.PHP_EOL;
    //        $country = \App\Models\Settings\Countries::create($arr);



    });

*/

    new \App\Services\Crawlers\WikiCountries();

});
