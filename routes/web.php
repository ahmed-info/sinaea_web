<?php



use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DollarController;
use App\Http\Controllers\ExternalCategoryController;
use App\Http\Controllers\ExternalCategoryItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemDetailController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrivecyController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CallUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;



    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Route::get('/user/dashboard', [DashboardController::class, 'userdashboard'])
// ->middleware(['auth', 'verified'])
// ->name('user.dashboard');


// Route::get('/user/login', [DashboardController::class, 'userlogin'])
// ->middleware(['auth', 'verified'])
// ->name('user.login');



//Route::get('/', [MainController::class, 'home'])->name('home');

// Route::get('/', function () {
//     return view('soon');
// });
Route::get('/', [MainController::class,'home'])->name('home');
Route::get('/itemsByBrand/{brandId}', [MainController::class,'itemsBybrand'])->name('itemsByBrand');
Route::get('/itemsByCategory/{categoryId?}', [MainController::class,'itemsByCategory'])->name('itemsByCategory');
Route::get('/itemsByDepartment/{departmentId}', [MainController::class,'itemsByDepartment'])->name('itemsByDepartment');
Route::get('/itemsByExternal/{externalId}', [MainController::class,'itemsByExternal'])->name('itemsByExternal');
Route::get('/productDetails/{id}', [MainController::class,'productDetails'])->name('productDetails');

Route::get('/shopcart', [CartController::class,  'shopcart'])->name('shopcart')->middleware('roleManager');
Route::any('/addItemToCart/{itemId}', [CartController::class,  'addItemToCart'])->name('addItemToCart')->middleware('roleManager');


Route::get('/favorite', [FavoriteController::class,  'favorite'])->name('favorite')->middleware('roleManager');
Route::any('/addItemTofav/{itemId}', [FavoriteController::class,  'addItemTofav'])->name('addItemTofav')->middleware('roleManager');
Route::delete('/deleteFav/{id}', [FavoriteController::class,  'deleteFav'])->name('favorite.delete');

Route::put('/decreaseCart/{id}', [CartController::class,  'decreaseCart'])->name('decreaseCart')->middleware('roleManager');
Route::put('/increaseCart/{id}', [CartController::class,  'increaseCart'])->name('increaseCart');
Route::delete('/deleteCart/{id}', [CartController::class,  'deleteCart'])->name('cart.delete');
Route::any('/search/user', [MainController::class,  'search'])->name('search.user');
Route::get('/sortby/{sort}', [MainController::class,  'sortBy'])->name('sortby.user');


Route::post('checkoutOrder', [CartController::class,'checkoutOrder'])->name(  'order.store')->middleware('roleManager');
// ->middleware(['auth', 'verified'])
// ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
Route::resource('blogs', BlogController::class);
Route::resource('brands', BrandController::class);
Route::resource('orders', OrderController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('external-categories', ExternalCategoryController::class);
Route::get('/search', [ExternalCategoryController::class, 'search'])->name('items.search');
Route::get('/addExternalItem/{id}', [ExternalCategoryController::class, 'createExternalItem'])->name('createExternalItem');
Route::resource('external-category-items', ExternalCategoryItemController::class);
//Route::resource('favorites', FavoriteController::class);
Route::resource('items', ItemController::class);
Route::resource('item-details', ItemDetailController::class);
Route::resource('questions', QuestionController::class)->middleware('web');
Route::resource('ranks', RankController::class);
Route::resource('records', RecordController::class);
Route::resource('slides', SlideController::class);

Route::get('socials',[ SocialController::class,'edit'])->name('socials.edit');
Route::put('socials', [SocialController::class, 'update'])->name('socials.update');

Route::get('call-us', [CallUsController::class,'edit'])->name('call-us.edit');
Route::put('call-us', [CallUsController::class, 'update'])->name('call-us.update');

Route::get('privacy', [PrivecyController::class,'edit'])->name('privacy.edit');
Route::put('privacy', [PrivecyController::class, 'update'])->name('privacy.update');

Route::get('dollars', [DollarController::class,'edit'])->name('dollars.edit');
Route::put('dollars', [DollarController::class, 'update'])->name('dollars.update');

});




Route::get('/session-test', function () {
    session(['test' => 'Hello']);
    return redirect('/session-check');
});

Route::get('/session-check', function () {
    return session('test', 'Session Not Found!');
});

require __DIR__.'/auth.php';
