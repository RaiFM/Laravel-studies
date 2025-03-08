<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FullController;

Route::get('/', function () {
    return view('welcome');
});

// call view directly
    Route::view('/emp', 'empresa');

// Route naming and redirecting 
    Route::get('/teste', function(){
        return view('teste');
    })->name('te');

    Route::get('/deploy', function(){
        return redirect()->route('te');
    });
    
    Route::get('/deploy', function(){
        return redirect()->route('adm.core');
    });

// Redirect route
    Route::redirect('/sobre', '/empresa');

// request types
    Route::any('/any', function(){
        return "request of any type";
    });

    Route::match(['get', 'post'], '/match', function(){
        return "match request";
    });

    Route::get('/params/{t}/{p?}', function($p, $t = ''){
        return "params request:" . $p . ' - ' . $t;
    });

// route groups

    // all
        Route::group([
            'prefix' => 'adm',
            'as' => 'adm.' 
        ], function(){
            Route::get('/teste', function(){
                return "prefixed routes group: teste";
            })->name('teste');
            
            Route::get('/core', function(){
                return "prefixed routes group: core";
            })->name('core');
        });

    // prefix
        Route::prefix('adm')->group(function(){
            Route::get('/teste', function(){
                return "prefixed routes group: teste";
            });
            
            Route::get('/core', function(){
                return "prefixed routes group: core";
            });
        });

    // name
        Route::name('adm.')->group(function(){
            Route::get('adm/teste', function(){
                return "named routes group: teste";
            })->name('teste');
            
            Route::get('adm/core', function(){
                return "named routes group: core";
            })->name('core');
        });

// Call controller
    Route::name('core.')->group(function(){
        Route::get('/core', [EmpresaController::class, 'index'])->name('core.idx');
        Route::get('/time/{time?}', [EmpresaController::class, 'time'])->name('core.time');
    });

// resource call controller
    Route::resource('full', FullController::class);
