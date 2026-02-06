@extends('layouts.app')

@section('title', 'API Settings')
@section('page-title', 'API Settings')

@section('content')
<style>
    #test-result-modal-toggle { display: none; }
    #test-result-modal { display: none; }
    #test-result-modal-toggle:checked ~ #test-result-modal { display: flex; }
</style>
<input type="checkbox" id="test-result-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="test-result-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="test-result-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-sm p-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-xl">✓</div>
            <div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Connection successful</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">API is reachable. (Dummy response)</p>
            </div>
        </div>
        <label for="test-result-modal-toggle" class="mt-4 block w-full text-center px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 cursor-pointer">OK</label>
    </div>
</div>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">API Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Configure API keys and endpoints for sync</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-5">
        <div>
            <label for="api_environment" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Environment</label>
            <select id="api_environment" class="w-full max-w-xs rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <option value="live">Live</option>
                <option value="staging">Staging</option>
                <option value="sandbox">Sandbox</option>
            </select>
        </div>
        <div>
            <label for="api_base_url" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Base URL / Endpoint</label>
            <input type="url" id="api_base_url" value="https://api.agristack-demo.com/v1" placeholder="https://api.example.com"
                class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
        </div>
        <div>
            <label for="api_key" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">API Key</label>
            <div class="flex gap-2">
                <input type="password" id="api_key" value="sk_live_••••••••••••••••" placeholder="Enter API key"
                    class="flex-1 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors shrink-0">Show</button>
            </div>
        </div>
        <div>
            <label for="api_secret" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">API Secret (optional)</label>
            <input type="password" id="api_secret" placeholder="Optional secret"
                class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <label for="test-result-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Test connection</label>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save settings</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-2">Webhook URL (for incoming sync)</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Use this URL in your website or external system to push data to AgriStack.</p>
        <div class="flex gap-2">
            <input type="text" readonly value="https://app.agristack.com/webhook/sync/abc123" class="flex-1 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 outline-none">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors shrink-0">Copy</button>
        </div>
    </div>
</div>
@endsection
