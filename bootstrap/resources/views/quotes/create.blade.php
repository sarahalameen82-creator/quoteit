<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة اقتباس جديد - QuoteIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Tajawal', sans-serif; } </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen py-10 px-4">

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-400">إضافة اقتباس جديد 📝</h1>
            <a href="{{ route('quotes.index') }}" class="text-slate-400 hover:text-white transition">← العودة للرئيسية</a>
        </div>

        <form action="{{ route('quotes.store') }}" method="POST" class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl space-y-6">
            @csrf

            <div>
                <label class="block text-slate-300 font-bold mb-2">نص الاقتباس *</label>
                <textarea name="quote" rows="3" required class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-indigo-500" placeholder="اكتب الاقتباس هنا..."></textarea>
            </div>

            <div>
                <label class="block text-slate-300 font-bold mb-2">القائل / صاحب الاقتباس *</label>
                <input type="text" name="author" required class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-indigo-500" placeholder="مثال: سقراط، المتنبي، ابن خلدون...">
            </div>

            <div class="p-5 bg-indigo-950/40 border border-indigo-500/30 rounded-xl space-y-4">
                <h3 class="text-indigo-300 font-bold flex items-center gap-2">
                    🛡️ كاشف السياق (الميزة المبتكرة)
                </h3>
                <p class="text-xs text-slate-400">اشرح الحالة النفسية أو الموقف التاريخي لمنع الفهم الخاطئ أو الاقتطاع.</p>

                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">السياق الاصلي والموقف (لماذا قيل؟)</label>
                    <textarea name="context" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-indigo-500" placeholder="مثال: قال هذه العبارة أثناء محاكمته الشهيرة لشرح فكرته عن..."></textarea>
                </div>

                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">المصدر (كتاب / فيلم / موقف)</label>
                    <input type="text" name="source" class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-indigo-500" placeholder="مثال: كتاب محاكمة سقراط - الصفحة 45">
                </div>
            </div>

            <div>
                <label class="block text-slate-300 font-bold mb-2">التصنيف</label>
                <input type="text" name="category" class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-indigo-500" placeholder="فلسفة، أدب، تحفيز...">
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl transition shadow-lg">
                حفظ الاقتباس وتوثيق السياق ✨
            </button>
        </form>
    </div>

</body>
</html>