@extends('layouts.auth')

@section('title', 'Sign In — ' . config('app.name', 'AgriStack'))

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Sign in</h1>
    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Enter your credentials to access your account.</p>
</div>

{{-- Social sign-in (design only) --}}
<div class="space-y-3 mb-6">
    <a href="#" class="flex items-center justify-center gap-3 w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors shadow-sm">
        <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
        </svg>
        <span class="text-sm font-medium">Continue with Google</span>
    </a>
    <a href="#" class="flex items-center justify-center gap-3 w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors shadow-sm">
        <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/>
        </svg>
        <span class="text-sm font-medium">Continue with Apple</span>
    </a>
    <a href="#" class="flex items-center justify-center gap-3 w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors shadow-sm">
        <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#f35325" d="M1 1h10v10H1z"/>
            <path fill="#81bc06" d="M1 13h10v10H1z"/>
            <path fill="#05a6f0" d="M13 1h10v10H13z"/>
            <path fill="#ffba08" d="M13 13h10v10H13z"/>
        </svg>
        <span class="text-sm font-medium">Continue with Microsoft</span>
    </a>
</div>

{{-- Divider: OR --}}
<div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-slate-200 dark:border-slate-600"></div>
    </div>
    <div class="relative flex justify-center">
        <span class="bg-white dark:bg-slate-800/80 px-3 text-sm font-medium text-slate-500 dark:text-slate-400">OR</span>
    </div>
</div>

<form action="{{ route('login') }}" method="post" class="space-y-5">
    @csrf
    <div>
        <label for="login" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email or username</label>
        <input type="text" name="email" id="login" required autofocus autocomplete="username"
               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors shadow-sm"
               placeholder="you@example.com or username">
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Password</label>
        <div class="relative">
            <input type="password" name="password" id="password" required autocomplete="current-password"
                   class="w-full px-4 py-3 pr-12 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors shadow-sm"
                   placeholder="••••••••">
            <button type="button" id="toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" aria-label="Toggle password visibility">
                <svg id="icon-eye" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg id="icon-eye-off" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M4.5 4.5l15 15"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="flex items-center justify-between gap-4">
        <label class="inline-flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
            <span class="text-sm text-slate-700 dark:text-slate-300">Remember me</span>
        </label>
        <a href="#" class="text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:underline">Forgot password?</a>
    </div>
    <button type="submit"
            class="w-full py-3.5 px-4 rounded-xl font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/30">
        Sign in
    </button>
</form>

{{-- Register links --}}
<div class="mt-6 pt-6 border-t border-slate-200/80 dark:border-slate-700/50">
    <p class="text-sm text-slate-600 dark:text-slate-400 text-center mb-3">Don't have an account?</p>
    <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <a href="{{ route('register.vendor') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors text-sm font-medium">
            <span aria-hidden="true">🏪</span>
            Register as Vendor
        </a>
        <a href="{{ route('register.staff') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors text-sm font-medium">
            <span aria-hidden="true">👤</span>
            Register as Staff
        </a>
    </div>
</div>

{{-- Trust / Security --}}
<p class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400 flex items-center justify-center gap-1.5">
    <svg class="w-4 h-4 shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
    </svg>
    Your data is secure with us.
</p>
{{-- Password visibility toggle (design only, no backend) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('toggle-password');
        var input = document.getElementById('password');
        var iconEye = document.getElementById('icon-eye');
        var iconEyeOff = document.getElementById('icon-eye-off');
        if (btn && input && iconEye && iconEyeOff) {
            btn.addEventListener('click', function () {
                var isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                iconEye.classList.toggle('hidden', isPassword);
                iconEyeOff.classList.toggle('hidden', !isPassword);
            });
        }
    });
</script>
@endsection
