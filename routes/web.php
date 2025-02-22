<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\DefaultController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {




// Admin All Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');

    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

});

// Suppliers All Routes
Route::controller(SupplierController::class)->group(function () {
    Route::get('/suppliers/all', 'SuppliersAll')->name('suppliers.all');
    Route::get('/suppliers/add', 'SuppliersAdd')->name('suppliers.add');
    Route::get('/suppliers/edit/{id}', 'SuppliersEdit')->name('suppliers.edit');
    Route::get('/suppliers/delete/{id}', 'SuppliersDelete')->name('suppliers.delete');

    Route::post('/suppliers/store', 'SupplierStore')->name('supplier.store');
    Route::post('/suppliers/update', 'SupplierUpdate')->name('supplier.update');


});

// Customer All Routes
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all');
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
    Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
    Route::get('/credit/customer/print/pdf', 'CreditCustomerPdf')->name('credit.customer.print.pdf');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
    Route::get('/customer/edit/invoice/{Invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
    Route::get('/customer/invoice/details/{Invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');
    Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');
    Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
    Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
    Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
    Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');


    Route::post('/customer/store', 'CustomerStore')->name('customer.store');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
    Route::post('/customer/update/invoice/{Invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
});

// Unit All Routes
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');


    Route::post('/unit/store', 'UnitStore')->name('unit.store');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
});

// Category All Routes
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'CategoryAll')->name('category.all');
    Route::get('/category/add', 'CategoryAdd')->name('category.add');
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');



    Route::post('/category/store', 'CategoryStore')->name('category.store');
    Route::post('/category/update', 'CategoryUpdate')->name('category.update');
});

// Product All Routes
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all');
    Route::get('/product/add', 'ProductAdd')->name('product.add');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');


    Route::post('/product/store', 'ProductStore')->name('product.store');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
});

// Purchase All Routes
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
    Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
    Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
    Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
    Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');

    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');


});


// invoice All Routes
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
    Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add');
    Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
    Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
    Route::get('/invoice/print/{id}', 'PrintInvoice')->name('print.invoice');
    Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
    Route::get('print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
    Route::get('daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
    Route::get('daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');

    Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');
    Route::post('/invoice/store/{id}', 'ApprovalStore')->name('approval.store');

});


// Stock All Routes
Route::controller(StockController::class)->group(function () {
    Route::get('/stock/report', 'StockReport')->name('stock.report');
    Route::get('/stock/supplier/report', 'StockSupplierWise')->name('stock.supplier.wise');
    Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');
    Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
    Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');
});

// Default All Routes
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');



});


}); // End Group middleware

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
