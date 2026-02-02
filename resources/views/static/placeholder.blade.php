@extends('layouts.public')

@section('title', $pageTitle . ' — ' . config('app.name', 'AgriStack'))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
    <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-8 sm:p-12">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">{{ $pageTitle }}</h1>
        <p class="mt-4 text-slate-600 dark:text-slate-400">This page is coming soon.</p>
    </div>
</div>
@endsection
