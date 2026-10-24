<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuoteIt - منصة الاقتباسات</title>
    <!-- Tailwind CSS CDN السريع والجاهز -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen py-10 px-4">

    <div class="max-w-4xl mx-auto space-y-8">
        
        <!-- Navbar Header -->
        <header class="flex flex-col sm:flex-row justify-between items-center bg-slate-800 p-6 rounded-2xl border border-slate-700/60 shadow-xl gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">QuoteIt</h1>
                <p class="text-slate-400 text-sm mt-1">شارك وحفظ أفضل الاقتباسات الملهمة</p>
            </div>

            <!-- Auth Navigation Buttons -->
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                @auth
                    <span class="text-slate-300 font-medium text-sm">مرحباً، {{ auth()->user()->name }} 👋</span>
                    
                    <a href="{{ route('quotes.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-xl text-sm font-semibold transition shadow-lg shadow-indigo-600/30">
                        + إضافة اقتباس
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-rose-400 text-sm font-medium transition">
                            تسجيل الخروج
                        </button>
                    </form>
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

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 p-4 rounded-xl text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Quotes List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($quotes as $quote)
                <div class="bg-slate-800/80 backdrop-blur border border-slate-700/50 p-6 rounded-2xl shadow-lg flex flex-col justify-between space-y-4 hover:border-indigo-500/50 transition">
                    <div class="space-y-3">
                        <blockquote class="text-lg font-medium text-slate-100 leading-relaxed">
                            "{{ $quote->quote }}"
                        </blockquote>
                        <div class="text-indigo-400 font-semibold text-sm">
                            — {{ $quote->author }}
                        </div>
                        @if($quote->context)
                            <p class="text-slate-400 text-xs italic bg-slate-900/50 p-2 rounded-lg">
                                {{ $quote->context }}
                            </p>
                        @endif
                    </div>

                    <div class="flex items-center justify-between border-t border-slate-700/50 pt-4 text-xs text-slate-400">
                        <div>
                            @if($quote->category)
                                <span class="bg-slate-700/60 text-slate-300 px-2.5 py-1 rounded-md font-medium">
                                    {{ $quote->category }}
                                </span>
                            @endif
                        </div>

                        <!-- Edit/Delete options for owner -->
                        @auth
                            @if($quote->user_id === auth()->id())
                                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <a href="{{ route('quotes.edit', $quote) }}" class="hover:text-amber-400 transition">تعديل</a>
                                    <form action="{{ route('quotes.destroy', $quote) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت تأكد من الحذف؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="hover:text-rose-400 transition">حذف</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-slate-800/40 rounded-2xl border border-slate-800 text-slate-400">
                    لا يوجد اقتباسات حالياً. كن أول من يضيف اقتباساً!
                </div>
            @endforelse
        </div>

    </div>

</body>
</html>