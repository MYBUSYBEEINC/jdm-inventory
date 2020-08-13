
<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

Route::get('/', function () {
    return view('login');
});

// ADMIN MIDDDLEWARE
Route::group(['middleware' => ['admin']], function () {
    
});

Route::get('/', 'MainController@successlogin')->name('home'); 
    Route::get('/dashboard', 'MainController@successlogin');


    Route::get('/product', 'ProductMasterfileController@index')->name('product');
    Route::post('/product/create', 'ProductMasterfileController@store')->name('product.create');
    Route::get('/product/quantity/{id}', 'ProductMasterfileController@editupdatequantity')->name('product.update');
    Route::post('/product/quantity/{id}', 'ProductMasterfileController@updatequantity');
    Route::get('/product/update/{id}', 'ProductMasterfileController@editupdateproduct')->name('product.updateproduct');
    Route::post('/product/update/{id}', 'ProductMasterfileController@updateproduct');

    Route::get('/admin/product/edit/{id}', 'ProductMasterfileController@getProduct')->name('editProduct');
    Route::post('/admin/product/edit/{id}', 'ProductMasterfileController@editProduct');

    Route::post('/admin/add/product/image/{id}', 'ProductImageController@addImage')->name('addProductImage');
    Route::post('/admin/delete/product/image/{id}', 'ProductImageController@deleteProductImage')->name('deleteProductImage');
    Route::get('/product/show/{id}', 'ProductMasterfileController@show')->name('product.show');

    Route::get('/product/category', 'CategoryMasterfileController@index')->name('category');
Route::post('product/category/create', 'CategoryMasterfileController@store')->name('category.create');
Route::get('/product/category/{id}', 'CategoryMasterfileController@editupdate')->name('category.update');
Route::post('/product/category/{id}', 'CategoryMasterfileController@update');

// Brand Masterfile

Route::get('/product/brand', 'BrandMasterfileController@index')->name('brand');
Route::post('/product/brand/create', 'BrandMasterfileController@store')->name('brand.create');
Route::get('/product/brand/{id}', 'BrandMasterfileController@editupdate')->name('brand.update');
Route::post('/product/brand/{id}', 'BrandMasterfileController@update');

//Unit Masterfile

Route::get('/product/unit', 'UnitMasterfileController@index')->name('unit');
Route::post('product/unit/create', 'UnitMasterfileController@store')->name('unit.create');
Route::get('/product/unit/{id}', 'UnitMasterfileController@editupdate')->name('unit.update');
Route::post('/product/unit/{id}', 'UnitMasterfileController@update');

// Color Masterfile

Route::get('product/color', 'ColorMasterfileController@index')->name('color');
Route::post('product/color/create', 'ColorMasterfileController@store')->name('color.create');
Route::get('/product/color/{id}', 'ColorMasterfileController@editupdate')->name('color.update');
Route::post('/product/color/{id}', 'ColorMasterfileController@update');

// Class Masterfile

Route::get('product/classification', 'ClassificationMasterfileController@index')->name('classification');
Route::post('product/classification/create', 'ClassificationMasterfileController@store')->name('classification.create');
Route::get('/product/classification/{id}', 'ClassificationMasterfileController@editupdate')->name('classification.update');
Route::post('/product/classification/{id}', 'ClassificationMasterfileController@update');

// Branch Masterfile

Route::get('/branch', 'BranchMasterfileController@index')->name('branch');
Route::post('/branch/create', 'BranchMasterfileController@store')->name('branch.create');
Route::get('/product/branch/{id}', 'BranchMasterfileController@editupdate')->name('branch.update');
Route::post('/product/branch/{id}', 'BranchMasterfileController@update');

// SubCategory Masterfile

Route::get('product/subcategory', 'SubCategoryMasterfileController@index')->name('subcategory');
Route::post('product/subcategory/create', 'SubCategoryMasterfileController@store')->name('subcategory.create');
Route::get('/product/subcategory/{id}', 'SubCategoryMasterfileController@editupdate')->name('subcategory.update');
Route::post('/product/subcategory/{id}', 'SubCategoryMasterfileController@update');

// SubSubCategoryMasterfile

Route::get('product/subsubcategory', 'SubSubCategoryMasterfileController@index')->name('subsubcategory');
Route::post('product/subsubcategory/create', 'SubSubCategoryMasterfileController@store')->name('subsubcategory.create');
Route::get('/product/subsubcategory/{id}', 'SubSubCategoryMasterfileController@editupdate')->name('subsubcategory.update');
Route::post('/product/subsubcategory/{id}', 'SubSubCategoryMasterfileController@update');

// Supplier Masterfile

Route::get('/supplier', 'SupplierMasterfileController@index')->name('supplier');
Route::post('/supplier/create', 'SupplierMasterfileController@store')->name('supplier.create');

// Term Masterfile

Route::get('/term', 'TermsMasterfileController@index')->name('term');
Route::post('/term/create', 'TermsMasterfileController@store')->name('term.create');

// Customer Masterfile

Route::get('/customer', 'CustomerMasterfileController@index')->name('customer');
Route::post('/customer/create', 'CustomerMasterfileController@store')->name('customer.create');

// Purchase Order Routes

Route::get('/purchase', 'PurchaseController@index')->name('purchase');
Route::get('/purchase/create', 'PurchaseController@create')->name('purchase.create');
Route::post('/purchase/store', 'PurchaseController@store')->name('purchase.store');
Route::get('/purchase/show/{id}', 'PurchaseController@show')->name('purchase.show');
Route::get('/purchase/edit/{id}', 'PurchaseController@showedit')->name('purchase.edit');
Route::post('/purchase/update', 'PurchaseController@update')->name('purchase.update');





Route::get('/pricelist', 'PricingController@index')->name('pricelist');
Route::post('pricelist/pricing/create', 'PricingController@store')->name('pricing.create');

Route::get('/pricelist/pricing/{id}', 'PricingController@editupdate')->name('pricing.update');
Route::post('/pricelist/pricing/{id}', 'PricingController@update');

Route::get('/pricelist/pricingpercent/{id}', 'PricingController@editpercent')->name('pricing.updatepercent');
Route::post('/pricelist/pricingpercent/{id}', 'PricingController@updatepercent');


// Settings Routes

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/store', 'UserController@store')->name('user.store');

// Price Routes 

Route::get('/price', 'PriceController@index')->name('price');
Route::get('/price/update/{id}', 'PriceController@editupdateprice')->name('price.update');
Route::post('/price/update/{id}', 'PriceController@updateprice');

Route::get('/live_search_price/action', 'PriceController@action')->name('live_search_price.action');


Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('logout', 'MainController@logout');


// Search

Route::get('/search', 'ProductMasterfileController@search');
Route::get('/live_search', 'ProductMasterfileController@index');
Route::get('/live_search/action', 'ProductMasterfileController@action')->name('live_search.action');

// Product Masterfile





// Category Masterfile




// ECOMMERCE

Route::get('/shop', 'EcomController@index')->name('shophome');

Route::resource('shop', 'EcomController');

Route::get('/shop', 'EcomController@index')->name('shop');

Route::get('/cart', 'EcomController@getCart')->name('cart');
Route::get('/shop/product/{id}', 'EcomController@product')->name('viewprod');
Route::post('/addtoCart/{id}', 'EcomController@addToCart')->name('atc');

Route::get('/cart/item/minus/{id}', 'EcomController@minusQty')->name('minus');
Route::get('/cart/item/add/{id}', 'EcomController@addQty')->name('add');
Route::get('/cart/item/remove/{id}', 'EcomController@removeItem')->name('removeItem');

Route::get('/orders', 'UserController@getOrders')->name('getOrders');
Route::get('/wishlists', 'UserController@getWishlists')->name('getWishlists');
Route::get('/product/addToWishlist/{id}', 'UserController@addToWishlist')->name('addToWishlist');

Route::post('/wishlist/product/remove/{id}', 'UserController@deleteWishlist')->name('deleteWishlist');


Route::get('/checkout', 'EcomController@getCheckout')->name('checkout');
Route::post('/checkout', 'EcomController@checkout');

Route::get('/orders', 'UserController@getOrders')->name('getOrders');
Route::get('/wishlists', 'UserController@getWishlists')->name('getWishlists');
Route::get('/product/addToWishlist/{id}', 'UserController@addToWishlist')->name('addToWishlist');

Route::post('/wishlist/product/remove/{id}', 'UserController@deleteWishlist')->name('deleteWishlist');

Route::post('/admin/order/status/{id}', 'AdminController@orderStatus')->name('orderStatus');


Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/register', 'UserController@showregister')->name('register');
Route::post('/register', 'UserController@register');


Route::get('/admin/dashboard', 'AdminController@index')->name('admin.index');
Route::get('/admin/users', 'AdminController@users')->name('admin.users');
Route::get('/admin/products', 'AdminController@products')->name('admin.products');
Route::get('/admin/orders', 'AdminController@orders')->name('admin.orders');

Route::post('/admin/delete/product/{id}', 'AdminController@deleteProduct')->name('deleteProduct');


Route::get('/login', 'UserController@showlogin')->name('loginlog');
Route::post('login', 'UserController@login');

Route::get('/register', 'UserController@showregister')->name('register');
Route::post('/register', 'UserController@register');


// END OF ECOMMERCE