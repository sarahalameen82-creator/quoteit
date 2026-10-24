<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحباً بك في QuoteIt</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between items-center py-12 px-4">

    <!-- Header / Logo -->
    <header class="w-full max-w-4xl flex justify-between items-center bg-slate-800/80 p-6 rounded-2xl border border-slate-700/60 shadow-xl">
        <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">QuoteIt</h1>
        
        <div class="flex items-center space-x-4 rtl:space-x-reverse">
            @auth
                <a href="{{ route('quotes.index') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-lg shadow-indigo-600/30">
                    تصفح الاقتباسات 🚀
                </a>
            @else
                <a href="{{ route('login') }}" class="text-slate-300 hover:text-white text-sm font-medium transition">
                    تسجيل الدخول
                </a>
                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-xl text-sm font-semibold transition shadow-lg shadow-indigo-600/30">
                    إنشاء حساب
                </a>
            @endauth
        </div>
    </header>

    <!-- Main Hero Section -->
    <main class="max-w-2xl text-center my-auto space-y-6">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
            عالمك الخاص لمشاركة وحفظ <span class="text-indigo-400">أجمل الاقتباسات</span>
        </h2>
        <p class="text-slate-400 text-base md:text-lg leading-relaxed">
            منصة بسيطة وأنيقة تمكنك من كتابة اقتباساتك الملهمة، حفظها، ومشاركتها مع العالم بسهولة ومرونة.
        </p>
        <div class="pt-4">
            <a href="{{ route('quotes.index') }}" class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold text-lg px-8 py-4 rounded-2xl shadow-xl shadow-indigo-600/25 transition transform hover:-translate-y-0.5">
                استكشف الاقتباسات الآن ←
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-slate-500 text-sm">
        جميع الحقوق محفوظة &copy; {{ date('Y') }} QuoteIt
    </footer>

</body>
</html>