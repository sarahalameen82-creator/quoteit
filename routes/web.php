<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية للموقع
Route::get('/', function () {
    return view('welcome');
});

// تحويل لوحة التحكم تلقائياً إلى صفحة الاقتباسات
Route::get('/dashboard', function () {
    return redirect()->route('quotes.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// 1. مسار عرض الاقتباسات (متاح للجميع: زوار ومسجلين)
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');

// 2. المسارات التي تتطلب تسجيل الدخول فقط (الإضافة، التعديل، الحذف)
Route::middleware('auth')->group(function () {
    Route::get('/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');
    Route::get('/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
    Route::put('/quotes/{quote}', [QuoteController::class, 'update'])->name('quotes.update');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');

    // مسارات إعدادات الحساب الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// تحميل مسارات المصادقة (تسجيل الدخول، التسجيل، الخروج)
require __DIR__.'/auth.php';