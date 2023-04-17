<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\TrainingCategoryController;
use App\Admin\Controllers\TrainingMenuController;
use App\Admin\Controllers\TrainingResultController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('training_categories', TrainingCategoryController::class);
    $router->resource('training_menus', TrainingMenuController::class);
    $router->resource('training_results', TrainingResultController::class);

});