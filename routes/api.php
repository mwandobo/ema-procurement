<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('pesapalResonse', 'PesapalController@index')->name('pesapalResonse');

//barkitchen login
Route::post('login','Api_controllers\Auth_ApiController@login');

Route::get('updateDeviceHistory','Api_controllers\Iot\DeviceHistoryController@updateDeviceHistory');

///

//-------*********start Azampesa Route  ***********----------------------------------
 Route::post('get_call_back_data','AzamPesa\IntegrationDepositController@get_call_back_data');
 Route::get('get_token','AzamPesa\IntegrationDepositController@get_token');
 
 //-------*********end Azampesa Route  ***********----------------------------------


Route::group(['prefix' => 'restaurant'], function () {
    
    
    Route::get('get_store_location/{id}/index','Api_controllers\Restaurant\Order\OrderController@store_location');
    
    Route::get('get_members/index','Api_controllers\Restaurant\Order\OrderController@members');
    
    Route::get('get_visitors/index','Api_controllers\Restaurant\Order\OrderController@vistors');
    
    Route::get('selling_items','Api_controllers\Restaurant\Order\OrderController@order_items');
    
    
    Route::get('checking_quantity_items/{item_id}/{location_id}/{id}/index','Api_controllers\Restaurant\Order\OrderController@order_items_quantity_checking');
    
    Route::get('checking_amount_to_use/{buyer_id}/{buyer_type}/index','Api_controllers\Restaurant\Order\OrderController@member_visitor_amount_spend');  
    
    Route::post('order_store/save','Api_controllers\Restaurant\Order\OrderController@order_store');
    
    Route::post('order_items_store/save','Api_controllers\Restaurant\Order\OrderController@order_items_store');
    
    Route::post('order_items_store/update','Api_controllers\Restaurant\Order\OrderController@item_sales_update');
    
    Route::get('delete_order_items/{id}/index','Api_controllers\Restaurant\Order\OrderController@item_sales_delete');
    
    Route::get('get_order_items/{id}/index','Api_controllers\Restaurant\Order\OrderController@item_index');
    
    Route::get('get_order_sold/{id}/index','Api_controllers\Restaurant\Order\OrderController@order_index');
    
    
    
    Route::get('get_orders/{id}/index','Api_controllers\Restaurant\Order\OrderController@index');
    
    Route::get('order_receive/{id}/index','Api_controllers\Restaurant\Order\OrderController@order_receive');
    
    Route::get('order_cancel/{id}/index','Api_controllers\Restaurant\Order\OrderController@order_cancel');
    
    Route::post('orders/save','Api_controllers\Restaurant\Order\OrderController@store');
    
    Route::post('items_order/save','Api_controllers\Restaurant\Order\OrderController@items_order');
    
    
    
    
    Route::get('get_bar_items/index','Api_controllers\Restaurant\Order\OrderController@bar_items');
    
    Route::get('get_kitchen_items/index','Api_controllers\Restaurant\Order\OrderController@kitchen_items');
    
    Route::get('get_currency/index','Api_controllers\Restaurant\Order\OrderController@currency');
    
    Route::get('get_accounts/index','Api_controllers\Restaurant\Order\OrderController@accounts');
    
    Route::get('get_store/index','Api_controllers\Restaurant\Order\OrderController@store_location');
    
    
    
    
});










Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


