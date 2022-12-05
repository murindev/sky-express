<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('/blocks/slides', \UI\SliderController::class);
    $router->resource('/blocks/pop-departures', \UI\PopDeparturesController::class);
    $router->resource('/blocks/easy-departures', \UI\EasyDepartureController::class);
    $router->resource('/blocks/easy-courier', \UI\EasyCourierController::class);
    $router->resource('/blocks/express-delivery', \UI\ExpressDeliveryController::class);
    $router->resource('/blocks/side-slider', \UI\SideSliderController::class);
    $router->resource('/blocks/offices', \UI\OfficesController::class);

    //pages
    $router->resource('/individual', \Pages\PageIndividualController::class);
    $router->resource('/legal', \Pages\PageLegalController::class);
    $router->resource('/services', \Pages\PageServicesController::class);
    $router->resource('/services-plus', \Pages\PageAddServicesController::class);
    $router->resource('/actions', \Pages\PageActionController::class);
    $router->resource('/faq', \Pages\FaqController::class);

    //props
    $router->resource('/props/package-standard', \Props\PropsStandardDimensionsController::class);
    $router->resource('/props/values', \Props\PropsValuesController::class);
    $router->resource('/props/texts', \Props\PropsTextValuesController::class);


    //users
    $router->resource('/users', UserController::class);



});
