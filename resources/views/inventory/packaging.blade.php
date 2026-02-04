@extends('layouts.app')

@section('title', 'Packaging / Conversion')
@section('page-title', 'Packaging / Conversion')

@section('content')
<style>
    #add-packaging-modal-toggle { display: none; }
    .add-packaging-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-packaging-modal-toggle:checked ~ .add-packaging-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-packaging-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-packaging-modal-toggle:checked ~ .add-packaging-modal-wrap .add-packaging-drawer-panel {
        transform: translateX(0);
    }
    .add-packaging-modal-wrap.drawer-closing .add-packaging-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-packaging-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Packaging --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Packaging / Conversion</h2>
            <label for="add-packaging-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Packaging
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="packaging-search" class="sr-only">Search packaging</label>
            <input type="text"
                   id="packaging-search"
                   placeholder="Search packaging…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Packaging grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $samplePackaging = [
                    ['name' => 'Carton', 'baseUnit' => 'Piece', 'quantity' => 6, 'conversion' => '1 Carton = 6 pcs'],
                    ['name' => 'Bori', 'baseUnit' => 'Kilogram', 'quantity' => 20, 'conversion' => '1 Bori = 20 kg'],
                    ['name' => 'Set', 'baseUnit' => 'Piece', 'quantity' => 12, 'conversion' => '1 Set = 12 pcs'],
                    ['name' => 'Box', 'baseUnit' => 'Piece', 'quantity' => 24, 'conversion' => '1 Box = 24 pcs'],
                    ['name' => 'Bag', 'baseUnit' => 'Kilogram', 'quantity' => 50, 'conversion' => '1 Bag = 50 kg'],
                    ['name' => 'Pallet', 'baseUnit' => 'Box', 'quantity' => 48, 'conversion' => '1 Pallet = 48 boxes'],
                ];
            @endphp
            @foreach ($samplePackaging as $pkg)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="mb-3">
                            <p class="font-medium text-slate-900 dark:text-white text-lg">{{ $pkg['name'] }}</p>
                            <p class="mt-1 text-sm font-mono text-emerald-600 dark:text-emerald-400">{{ $pkg['conversion'] }}</p>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Base Unit: {{ $pkg['baseUnit'] }}</p>
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

    {{-- Add Packaging: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-packaging-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-packaging-overlay">
        {{-- Backdrop: blocks interaction with packaging list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-packaging-backdrop" aria-hidden="true" id="add-packaging-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-packaging-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-packaging-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Packaging / Conversion</h3>
                <button type="button" class="add-packaging-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-packaging-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="packaging_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Packaging Name</label>
                        <input type="text" id="packaging_name" name="packaging_name" placeholder="e.g. Carton, Bori, Set, Box" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="base_unit" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Base Unit</label>
                        <select id="base_unit" name="base_unit" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select base unit</option>
                            <option value="pcs">Piece (pcs)</option>
                            <option value="kg">Kilogram (kg)</option>
                            <option value="g">Gram (g)</option>
                            <option value="L">Liter (L)</option>
                            <option value="m">Meter (m)</option>
                            <option value="box">Box</option>
                            <option value="bag">Bag</option>
                            <option value="dz">Dozen (dz)</option>
                        </select>
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">The unit this packaging converts to.</p>
                    </div>
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Quantity</label>
                    <div class="flex items-center gap-3">
                        <div class="flex-1">
                            <input type="number" id="quantity" name="quantity" min="0.01" step="0.01" placeholder="e.g. 6, 20, 12" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium shrink-0">
                            <span id="base-unit-display">base units</span>
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">How many base units equal 1 package (e.g., 1 Carton = 6 pieces).</p>
                </div>

                {{-- Conversion Preview --}}
                <div class="rounded-xl border border-emerald-200 dark:border-emerald-500/30 bg-emerald-50/50 dark:bg-emerald-500/10 p-4">
                    <p class="text-xs font-medium text-emerald-700 dark:text-emerald-400 mb-2">Conversion Preview:</p>
                    <p id="conversion-preview" class="text-sm font-mono text-emerald-900 dark:text-emerald-300">1 <span id="preview-name">Packaging</span> = <span id="preview-quantity">0</span> <span id="preview-unit">base units</span></p>
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
                    <button type="button" class="add-packaging-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-packaging-form');
    var modalToggle = document.getElementById('add-packaging-modal-toggle');
    var modalWrap = document.querySelector('.add-packaging-modal-wrap');
    var modalPanel = document.getElementById('add-packaging-modal-panel');
    var packagingNameInput = document.getElementById('packaging_name');
    var baseUnitSelect = document.getElementById('base_unit');
    var quantityInput = document.getElementById('quantity');
    var baseUnitDisplay = document.getElementById('base-unit-display');
    var conversionPreview = document.getElementById('conversion-preview');
    var previewName = document.getElementById('preview-name');
    var previewQuantity = document.getElementById('preview-quantity');
    var previewUnit = document.getElementById('preview-unit');

    function updateConversionPreview() {
        var name = packagingNameInput ? packagingNameInput.value.trim() : 'Packaging';
        var quantity = quantityInput ? quantityInput.value : '0';
        var baseUnit = baseUnitSelect ? baseUnitSelect.options[baseUnitSelect.selectedIndex] : null;
        var unitText = baseUnit ? baseUnit.text : 'base units';
        
        if (baseUnitDisplay) baseUnitDisplay.textContent = unitText;
        if (previewName) previewName.textContent = name || 'Packaging';
        if (previewQuantity) previewQuantity.textContent = quantity || '0';
        if (previewUnit) previewUnit.textContent = unitText;
    }

    function resetForm() {
        if (form) {
            form.reset();
            var activeRadio = form.querySelector('input[name="status"][value="active"]');
            if (activeRadio) activeRadio.checked = true;
        }
        updateConversionPreview();
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

    if (packagingNameInput) packagingNameInput.addEventListener('input', updateConversionPreview);
    if (baseUnitSelect) baseUnitSelect.addEventListener('change', updateConversionPreview);
    if (quantityInput) quantityInput.addEventListener('input', updateConversionPreview);

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
        var backdrop = document.getElementById('add-packaging-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-packaging-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-packaging-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }

    updateConversionPreview();
})();
</script>
@endsection
