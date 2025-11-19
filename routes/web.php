<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InertiaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;

Route::get('/', 
    [InertiaController::class, 'ShowLandingPage']
);
Route::get('/login',
[InertiaController::class,'ShowLoginPage']
);

Route::post('/login',
[InertiaController::class,'Login']

);
Route::get('/designers', 
    [InertiaController::class, 'DesignersPage']
);

Route::get('/messages', 
    [InertiaController::class, 'MessagesPage']
)->middleware(CheckAuth::class);

Route::get('/assets', 
    [InertiaController::class, 'AssetsPage']
);
Route::get('/forgot-password', 
[InertiaController::class, 'ForgotPasswordPage']
);

Route::get('/products', [InertiaController::class, 'ShowProductsPage']);
Route::get('/products/website-templates', [InertiaController::class, 'WebsiteTemplatesPage']);
Route::get('/products/custom-design', [InertiaController::class, 'CustomDesignPage']);
Route::get('/products/company-profile', [InertiaController::class, 'CompanyProfilePage']);
Route::get('/products/professional-design', [InertiaController::class, 'ProfessionalDesignPage']);

// Route::get('/products', 
//     function () {
//         return view('products');
//     }
// );


Route::get('/register',
    [InertiaController::class,'RegisterPage']
);
Route::post('/login',
    [UserController::class,'Login']
);
Route::get('/logout',
    [UserController::class,'Logout']
);

//// (UNCOMMENT LATER) account and payment, requires authentication
// Route::middleware([CheckAuth::class])->group(function () {
    // account
    Route::post('/account/profile',
        [UserController::class,'UpdateProfile']
    );
    Route::get('/account/profile', 
        [InertiaController::class, 'ProfilePage']
    );
    Route::get('/account/orders', 
        [InertiaController::class, 'OrdersPage']
    );
    
    // payment
    Route::get('/cart', [InertiaController::class, 'CartPage']);
    Route::get('/payment/checkout-summary', [InertiaController::class, 'CheckoutSummaryPage']);
    Route::get('/payment/checkout', [InertiaController::class, 'CheckoutPage']);
    Route::get('/payment/bill', [InertiaController::class, 'BillPage']);
// });
