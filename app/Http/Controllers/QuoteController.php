<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * عرض قائمة جميع الاقتباسات
     */
    public function index()
    {
        $quotes = Quote::latest()->get();
        return view('quotes.index', compact('quotes'));
    }

    /**
     * عرض صفحة إضافة اقتباس جديد
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * حفظ الاقتباس الجديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'author' => 'required',
        ]);

        Quote::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'author' => $request->author,
            'context' => $request->context,
            'source' => $request->source,
            'category' => $request->category,
        ]);

        return redirect()->route('quotes.index')->with('success', 'تم إضافة الاقتباس بنجاح!');
    }

    /**
     * عرض تفاصيل اقتباس معين
     */
    public function show(Quote $quote)
    {
        return view('quotes.show', compact('quote'));
    }

    /**
     * عرض صفحة تعديل الاقتباس
     */
    public function edit(Quote $quote)
    {
        return view('quotes.edit', compact('quote'));
    }

    /**
     * تحديث بيانات الاقتباس وإعادة التوجيه للصفحة الرئيسية
     */
    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'text' => 'required',
            'author' => 'required',
        ]);

        $quote->update([
            'text' => $request->text,
            'author' => $request->author,
            'context' => $request->context,
            'source' => $request->source,
            'category' => $request->category,
        ]);

        return redirect()->route('quotes.index')->with('success', 'تم تعديل الاقتباس بنجاح!');
    }

    /**
     * حذف الاقتباس من قاعدة البيانات
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'تم حذف الاقتباس بنجاح!');
    }
}