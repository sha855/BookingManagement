<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>env('EVENT_ROUTE_PREFIX','activity')],function(){

    Route::get('/','EventController@index')->name('event.search'); // Search
    Route::get('/{slug}','EventController@detail')->name('event.detail');

    // Detail
});


Route::get('delete/{id}','EventController@deleteEventdata');

Route::get('event-activity-checkout','EventController@activitycheckout');

Route::get('user-cart','EventController@Cart');


Route::get('activity_booking_detail','EventController@activityCart');

Route::post('Quick-Checkout','EventController@checkoutquic');


Route::get('explore-activity','EventController@ActivityExp');

Route::group(['prefix'=>'user/'.env('EVENT_ROUTER_PREFIX','activity'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorEventController@indexEvent')->name('event.vendor.index');
    Route::get('/create','VendorEventController@createEvent')->name('event.vendor.create');
    Route::get('/edit/{id}','VendorEventController@editEvent')->name('event.vendor.edit');
    Route::get('/del/{id}','VendorEventController@deleteEvent')->name('event.vendor.delete');
    Route::post('/store/{id}','VendorEventController@store')->name('event.vendor.store');
    Route::get('bulkEdit/{id}','VendorEventController@bulkEditEvent')->name("event.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','VendorEventController@bookingReportBulkEdit')->name("event.vendor.booking_report.bulk_edit");
    Route::get('/recovery','VendorEventController@recovery')->name('event.vendor.recovery');
    Route::get('/restore/{id}','VendorEventController@restore')->name('event.vendor.restore');
});

Route::group(['prefix'=>'user/'.env('EVENT_ROUTER_PREFIX','activity')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('event.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('event.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('event.vendor.availability.store');
    });
});
