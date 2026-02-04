@extends('layouts.app')

@section('title', 'Units')
@section('page-title', 'Units')

@section('content')
<style>
    #add-unit-modal-toggle { display: none; }
    .add-unit-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-unit-modal-toggle:checked ~ .add-unit-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-unit-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-unit-modal-toggle:checked ~ .add-unit-modal-wrap .add-unit-drawer-panel {
        transform: translateX(0);
    }
    .add-unit-modal-wrap.drawer-closing .add-unit-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-unit-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Unit --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Units</h2>
            <label for="add-unit-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Unit
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="unit-search" class="sr-only">Search units</label>
            <input type="text"
                   id="unit-search"
                   placeholder="Search units…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Units grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $sampleUnits = [
                    ['name' => 'Piece', 'symbol' => 'pcs', 'icon' => '📦'],
                    ['name' => 'Kilogram', 'symbol' => 'kg', 'icon' => '⚖️'],
                    ['name' => 'Gram', 'symbol' => 'g', 'icon' => '⚖️'],
                    ['name' => 'Liter', 'symbol' => 'L', 'icon' => '💧'],
                    ['name' => 'Meter', 'symbol' => 'm', 'icon' => '📏'],
                    ['name' => 'Box', 'symbol' => 'box', 'icon' => '📦'],
                    ['name' => 'Bag', 'symbol' => 'bag', 'icon' => '👜'],
                    ['name' => 'Dozen', 'symbol' => 'dz', 'icon' => '📊'],
                ];
            @endphp
            @foreach ($sampleUnits as $unit)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-2xl shrink-0">
                                {{ $unit['icon'] }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white">{{ $unit['name'] }}</p>
                                <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400 font-mono">{{ $unit['symbol'] }}</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors">View</button>
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors">Edit</button>
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Add Unit: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-unit-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-unit-overlay">
        {{-- Backdrop: blocks interaction with unit list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-unit-backdrop" aria-hidden="true" id="add-unit-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-unit-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-unit-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Unit</h3>
                <button type="button" class="add-unit-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-unit-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="unit_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Unit Name</label>
                        <input type="text" id="unit_name" name="unit_name" placeholder="e.g. Kilogram, Piece, Liter" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="unit_symbol" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Unit Symbol</label>
                        <input type="text" id="unit_symbol" name="unit_symbol" placeholder="e.g. kg, pcs, L" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Short symbol used for display (e.g., kg, pcs, L, m).</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Unit Icon</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-24 h-24 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="unit-icon-preview-wrap">
                            <span id="unit-icon-preview" class="text-4xl">📦</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="text" id="unit_icon" name="unit_icon" placeholder="Enter emoji or icon (e.g., 📦, ⚖️, 💧)" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Enter an emoji or icon character to represent this unit visually.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="active" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Active</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="inactive" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Inactive</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
                    <button type="submit" name="action" value="save_and_next" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save & Add Next</button>
                    <button type="submit" name="action" value="save_and_exit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-500 dark:hover:bg-slate-600 transition-colors">Save & Exit</button>
                    <button type="button" class="add-unit-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-unit-form');
    var modalToggle = document.getElementById('add-unit-modal-toggle');
    var modalWrap = document.querySelector('.add-unit-modal-wrap');
    var modalPanel = document.getElementById('add-unit-modal-panel');
    var iconInput = document.getElementById('unit_icon');
    var iconPreview = document.getElementById('unit-icon-preview');

    function resetForm() {
        if (form) {
            form.reset();
            var activeRadio = form.querySelector('input[name="status"][value="active"]');
            if (activeRadio) activeRadio.checked = true;
        }
        if (iconPreview) iconPreview.textContent = '📦';
    }

    function closeModal() {
        if (modalToggle) modalToggle.checked = false;
    }

    function closeWithTransition() {
        if (!modalWrap) return;
        modalWrap.classList.add('drawer-closing');
        setTimeout(function() {
            closeModal();
            modalWrap.classList.remove('drawer-closing');
        }, 300);
    }

    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', function() {
            var icon = this.value.trim();
            if (iconPreview) iconPreview.textContent = icon || '📦';
        });
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var submitter = e.submitter;
            var action = submitter && submitter.value;

            if (action === 'save_and_next') {
                resetForm();
                return;
            }
            if (action === 'save_and_exit') {
                resetForm();
                closeWithTransition();
            }
        });
    }

    if (modalWrap && modalPanel) {
        modalPanel.addEventListener('click', function(e) { e.stopPropagation(); });
        var backdrop = document.getElementById('add-unit-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-unit-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-unit-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
