<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\AppointmentListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\PromoController;
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
      return view('user.landing');
});


Route::get('/landing', function () {
    return view('user.landing');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/landing', [HomeController::class, "index"]);
Route::get('/user/readmore/{id}', [ServiceController::class, "info"]);
Route::get('/user/read-promo/{id}', [PromoController::class, "readpromo"]);
Route::controller(ServiceController::class)->group(function(){
    Route::get('/user/services', 'index');

    Route::get('/user/read-more/{id}', 'view');
    Route::get('/user/about', 'about');
   
});

Route::middleware(['auth', 'user'])->prefix('user')->group(function () {

    Route::controller(ServiceController::class)->group(function(){
      
        Route::post('/save-services', 'store');
        Route::get('/read-more/{id}', 'view');
    
    });
    Route::controller(AppointmentListController::class)->group(function(){
        
        Route::get('/get-info', 'get');
        Route::get('/respond/{id}', 'respond');
       
    });
    Route::controller(AppointmentListController::class)->group(function(){
        Route::get('/appointment-history', 'history');
        Route::get('/get-appointment/{id}', 'edit');
        Route::get('/appointment-list', 'appointment');
        Route::get('fullcalenderAjax', 'ajax');
        Route::delete('/destroy-supplier/{id}', 'destroy');
    
});
    Route::controller(AppointmentController::class)->group(function(){
            Route::get('/appointment', 'calendar');
            Route::get('/appointment-list', 'appointment');
            Route::get('fullcalenderAjax', 'ajax');
            Route::delete('/destroy-supplier/{id}', 'destroy');
            Route::get('fullcalenderAjax', 'ajax');
            Route::get('/fullcalender','index');
            Route::get('/details/{id}', 'details');
            Route::post('/update-event', 'update');
            Route::post('/paid-appointment/{id}', 'paid');
            Route::post('/cancel-appointment/{id}', 'cancel');
             Route::post('/updateEvent', 'modify');
            
 });
});
Route::middleware(['auth', 'admin',])->prefix('admin')->group(function () {

            Route::controller(HomeController::class)->group(function(){
            Route::get('/assistanceRequest', 'index');
      

 });
 Route::controller(TransactionTypeController::class)->group(function(){
    Route::get('/transaction', 'index');
     //fetch to 
    
     Route::get('/get-type/{id}', 'edit');
     
      //update the data
     Route::post('update-type', 'update');
     //delete
     Route::delete('/destroy-type/{id}', 'destroy');
     //insert
     Route::post('insert-type','store');
 });
 Route::controller(OutgoingController::class)->group(function(){
    Route::get('/outgoing', 'index');
     //fetch to 
    
     Route::get('/get-transaction/{id}', 'edit');
     
      //update the data
     Route::post('update-transaction', 'update');
     //delete
     Route::delete('/destroy-transaction/{id}', 'destroy');
     //insert
     Route::post('insert-transaction','store');
     
     Route::get('/filter-trans', 'filter');
 });  
 
        Route::controller(PromoController::class)->group(function(){
            Route::get('/promo', 'index');
            Route::post('/insert-promo', 'store');
            Route::delete('/destroy-promo/{id}', 'destroy');
            Route::get('/get-promo/{id}', 'edit');
            Route::post('/update-promo', 'update');
            

        });
    Route::controller(ServiceController::class)->group(function(){
            Route::get('/service', 'index');
            Route::post('/save-services', 'store');
            Route::delete('/destroy-service/{id}', 'destroy');
            Route::get('/get-service/{id}', 'edit');
            Route::post('/update-service', 'update');
        

 });
            Route::controller(SupplierController::class)->group(function(){
            Route::get('/supplier', 'index');
            //fetch to 
            Route::get('/get-supplier/{id}', 'edit');
             //update the data

            Route::post('update-supplier', 'update');
            //delete
            Route::delete('/destroy-supplier/{id}', 'destroy');
            //insert
            Route::post('insert-supplier','store');
            //filter
             // Route::get('/filter-report', 'filter');
           
        });
        
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'index');
        //fetch to 
        Route::get('/get-category/{id}', 'edit');
         //update the data
        Route::post('update-category', 'update');
        //delete
        Route::delete('/destroy-category/{id}', 'destroy');
        //insert
        Route::post('insert-category','store');
        //filter
         // Route::get('/filter-report', 'filter');
       
    });
    Route::controller(AppointmentListController::class)->group(function(){
        
        Route::get('/limit-per-day', 'limit');
        Route::get('/appointment-read/{id}', 'mark');
        Route::get('/filter', 'filter')->name('filter');
        Route::get('/appointment-list', 'index');
        Route::get('/appointment-accepted', 'accepted');
        Route::get('/appointment-req/{id}', 'read');
        //fetch to 
        Route::get('/appointment-pending', 'pending');
        Route::get('/appointment-declined', 'declined');
        Route::get('/get-appointment/{id}', 'edit');
         //update the data
        Route::get('/pastAppointment', 'past');
        Route::post('/update-appointment', 'update');
        //delete
        Route::delete('/destroy-item/{id}', 'destroy');
       
    });
    Route::controller(InventoryController::class)->group(function(){
            
        Route::get('/item', 'index');
        //fetch to 
        Route::get('/get-item/{id}', 'edit');
         //update the data
        Route::post('update-item', 'update');
        //delete
        Route::delete('/destroy-item/{id}', 'destroy');
        //insert
        Route::post('insert-item','store');
        //filter
        
        Route::post('add-item','add');
         // Route::get('/filter-report', 'filter');
        Route::get('/Inventory-mdrrmo', 'mdrrmo');
        Route::get('/municipality-mdrrmo', 'municipality');
       
        Route::get('/download-pic/{filename}', 'download')->name('download-pic');
       
    });
       Route::controller(SupplierController::class)->group(function(){
        Route::get('/supplier', 'index');
        //fetch to 
        Route::get('/get-supplier/{id}', 'edit');
         //update the data

        Route::post('update-supplier', 'update');
        //delete
        Route::delete('/destroy-supplier/{id}', 'destroy');
        //insert
        Route::post('insert-supplier','store');
        //filter
         // Route::get('/filter-report', 'filter');
       
    });

    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
