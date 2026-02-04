@extends('layouts.app')

@section('title', 'Product Groups')
@section('page-title', 'Product Groups')

@section('content')
<style>
    #add-product-group-modal-toggle { display: none; }
    .add-product-group-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-product-group-modal-toggle:checked ~ .add-product-group-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-product-group-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-product-group-modal-toggle:checked ~ .add-product-group-modal-wrap .add-product-group-drawer-panel {
        transform: translateX(0);
    }
    .add-product-group-modal-wrap.drawer-closing .add-product-group-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-product-group-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Product Group --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Product Groups</h2>
            <label for="add-product-group-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Product Group
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="product-group-search" class="sr-only">Search product groups</label>
            <input type="text"
                   id="product-group-search"
                   placeholder="Search product groups…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Product Groups grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $sampleProductGroups = [
                    ['groupNumber' => 'PG-001', 'nameEn' => 'Premium Wheat Seeds', 'nameUr' => 'پریمیم گندم کے بیج', 'category' => 'Seeds', 'subCategory' => 'Wheat Seeds'],
                    ['groupNumber' => 'PG-002', 'nameEn' => 'Organic Rice Seeds', 'nameUr' => 'نامیاتی چاول کے بیج', 'category' => 'Seeds', 'subCategory' => 'Rice Seeds'],
                    ['groupNumber' => 'PG-003', 'nameEn' => 'NPK Fertilizers', 'nameUr' => 'این پی کے کھاد', 'category' => 'Fertilizers', 'subCategory' => 'Chemical Fertilizers'],
                    ['groupNumber' => 'PG-004', 'nameEn' => 'Compost Fertilizers', 'nameUr' => 'کمپوسٹ کھاد', 'category' => 'Fertilizers', 'subCategory' => 'Organic Fertilizers'],
                    ['groupNumber' => 'PG-005', 'nameEn' => 'Garden Hand Tools', 'nameUr' => 'باغ کے ہاتھ کے اوزار', 'category' => 'Tools', 'subCategory' => 'Hand Tools'],
                    ['groupNumber' => 'PG-006', 'nameEn' => 'Electric Drills', 'nameUr' => 'بجلی کی ڈرل', 'category' => 'Tools', 'subCategory' => 'Power Tools'],
                ];
            @endphp
            @foreach ($sampleProductGroups as $group)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white">{{ $group['nameEn'] }}</p>
                                @if($group['nameUr'])
                                    <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400" dir="rtl">{{ $group['nameUr'] }}</p>
                                @endif
                                @if($group['category'] && $group['subCategory'])
                                    <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">{{ $group['category'] }} → {{ $group['subCategory'] }}</p>
                                @endif
                            </div>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-2 py-1 rounded shrink-0">{{ $group['groupNumber'] }}</span>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors">View</button>
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors">Edit</button>
                            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Add Product Group: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-product-group-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-product-group-overlay">
        {{-- Backdrop: blocks interaction with product group list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-product-group-backdrop" aria-hidden="true" id="add-product-group-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-product-group-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-product-group-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Product Group</h3>
                <button type="button" class="add-product-group-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-product-group-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                {{-- Category Selection with Image Preview --}}
                <div>
                    <label for="category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                    <select id="category_id" name="category_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select category</option>
                        <option value="1">Seeds</option>
                        <option value="2">Fertilizers</option>
                        <option value="3">Pesticides</option>
                        <option value="4">Tools</option>
                        <option value="5">Livestock Feed</option>
                        <option value="6">Vegetables</option>
                    </select>
                    {{-- Category Image Preview --}}
                    <div id="category-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Category Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="category-image" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='96' height='96' viewBox='0 0 96 96'%3E%3Crect width='96' height='96' fill='%23e2e8f0'/%3E%3Ctext x='50%25' y='50%25' font-family='Arial' font-size='12' fill='%2394a3b8' text-anchor='middle' dominant-baseline='middle'%3EPlaceholder%3C/text%3E%3C/svg%3E" alt="Category image" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                {{-- Sub Category Selection with Image Preview --}}
                <div>
                    <label for="sub_category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category</label>
                    <select id="sub_category_id" name="sub_category_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select sub category</option>
                        <option value="1" data-category="1">Wheat Seeds</option>
                        <option value="2" data-category="1">Rice Seeds</option>
                        <option value="3" data-category="2">Organic Fertilizers</option>
                        <option value="4" data-category="2">Chemical Fertilizers</option>
                        <option value="5" data-category="4">Hand Tools</option>
                        <option value="6" data-category="4">Power Tools</option>
                    </select>
                    {{-- Sub Category Image Preview --}}
                    <div id="sub-category-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Sub Category Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="sub-category-image" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='96' height='96' viewBox='0 0 96 96'%3E%3Crect width='96' height='96' fill='%23e2e8f0'/%3E%3Ctext x='50%25' y='50%25' font-family='Arial' font-size='12' fill='%2394a3b8' text-anchor='middle' dominant-baseline='middle'%3EPlaceholder%3C/text%3E%3C/svg%3E" alt="Sub category image" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Group Name (English)</label>
                        <input type="text" id="name_en" name="name_en" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="name_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Group Name (Urdu)</label>
                        <input type="text" id="name_ur" name="name_ur" dir="rtl" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="group_number" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Group Number</label>
                        <input type="text" id="group_number" name="group_number" readonly placeholder="Auto generated" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated product group number.</p>
                    </div>
                    <div>
                        <label for="group_slug" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Slug</label>
                        <input type="text" id="group_slug" name="slug" readonly placeholder="premium-wheat-seeds" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated from Product Group Name (English).</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="desc_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description (English)</label>
                        <textarea id="desc_en" name="desc_en" rows="3" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                    </div>
                    <div>
                        <label for="desc_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description (Urdu)</label>
                        <textarea id="desc_ur" name="desc_ur" dir="rtl" rows="3" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                    </div>
                </div>

                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <label for="keywords" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Keywords / Tags (comma separated)</label>
                        <button type="button" class="suggest-keywords-btn inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors cursor-pointer" title="Suggest keywords from product group name (English + Urdu)">
                            🤖 Suggest Keywords
                        </button>
                    </div>
                    <input type="text" id="keywords" name="keywords" placeholder="e.g. premium, wheat, seeds, پریمیم, گندم, بیج" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Group Image</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="product-group-image-preview-wrap">
                            <img id="product-group-image-preview" src="" alt="" class="w-full h-full object-cover hidden">
                            <span id="product-group-image-placeholder" class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" id="product_group_image" name="product_group_image" accept="image/*" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30">
                        </div>
                    </div>
                </div>

                <details class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/30 overflow-hidden">
                    <summary class="px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 cursor-pointer list-none flex items-center justify-between gap-2 hover:bg-slate-100/50 dark:hover:bg-slate-700/30 transition-colors [&::-webkit-details-marker]:hidden">
                        <span>Advanced / SEO (Optional)</span>
                        <span class="text-slate-400 dark:text-slate-500 text-xs shrink-0">Click to expand</span>
                    </summary>
                    <div class="px-4 pb-4 pt-1 space-y-4 border-t border-slate-200 dark:border-slate-600">
                        <div>
                            <label for="meta_title_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Meta Title (English)</label>
                            <input type="text" id="meta_title_en" name="meta_title_en" placeholder="Optional for search engines" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label for="meta_description_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Meta Description (English)</label>
                            <textarea id="meta_description_en" name="meta_description_en" rows="2" placeholder="Optional short description for search results" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                        </div>
                    </div>
                </details>

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
                    <button type="button" class="add-product-group-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-product-group-form');
    var modalToggle = document.getElementById('add-product-group-modal-toggle');
    var imageInput = document.getElementById('product_group_image');
    var imagePreview = document.getElementById('product-group-image-preview');
    var imagePlaceholder = document.getElementById('product-group-image-placeholder');
    var modalWrap = document.querySelector('.add-product-group-modal-wrap');
    var modalPanel = document.getElementById('add-product-group-modal-panel');
    var keywordsInput = document.getElementById('keywords');
    var nameEnInput = document.getElementById('name_en');
    var nameUrInput = document.getElementById('name_ur');
    var categorySelect = document.getElementById('category_id');
    var subCategorySelect = document.getElementById('sub_category_id');

    function isLatinOnly(str) {
        return /^[\x00-\x7F]*$/.test(str);
    }

    function processKeywordsForStorage(rawKeywords) {
        if (!rawKeywords || typeof rawKeywords !== 'string') return [];
        return rawKeywords.split(',').map(function(s) {
            var trimmed = s.trim();
            if (!trimmed) return null;
            return isLatinOnly(trimmed) ? trimmed.toLowerCase() : trimmed;
        }).filter(Boolean);
    }

    function slugFromNameEn(nameEn) {
        if (!nameEn || typeof nameEn !== 'string') return '';
        return nameEn.trim().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9\-]/g, '');
    }

    function suggestKeywords() {
        var nameEn = nameEnInput ? nameEnInput.value.trim() : '';
        var nameUr = nameUrInput ? nameUrInput.value.trim() : '';
        var parts = [];
        if (nameEn) parts.push(nameEn.toLowerCase());
        if (nameUr) parts.push(nameUr);
        var fallbacks = { premium: ['premium', 'quality', 'high-grade', 'پریمیم', 'معیار'], organic: ['organic', 'natural', 'نامیاتی', 'قدرتی'], wheat: ['wheat', 'grains', 'cereals', 'گندم', 'دانے'], rice: ['rice', 'paddy', 'چاول', 'دانے'], npk: ['npk', 'fertilizer', 'nutrients', 'کھاد', 'غذائی اجزاء'], compost: ['compost', 'organic', 'natural', 'کمپوسٹ', 'نامیاتی'] };
        var lower = nameEn.toLowerCase();
        for (var key in fallbacks) { if (lower.indexOf(key) !== -1) { parts = parts.concat(fallbacks[key]); break; } }
        if (parts.length <= 2) parts = parts.concat(['agriculture', 'farming', 'زراعت', 'کھیتی']);
        var suggested = parts.filter(function(p, i, arr) { return arr.indexOf(p) === i; }).slice(0, 8).join(', ');
        if (keywordsInput) keywordsInput.value = suggested;
    }

    function resetForm() {
        if (form) {
            form.reset();
            var activeRadio = form.querySelector('input[name="status"][value="active"]');
            if (activeRadio) activeRadio.checked = true;
        }
        if (imagePreview) {
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
        }
        if (imagePlaceholder) imagePlaceholder.classList.remove('hidden');
        if (imageInput) imageInput.value = '';
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

    if (imageInput) {
        imageInput.addEventListener('change', function() {
            var file = this.files && this.files[0];
            if (!file) {
                if (imagePreview) { imagePreview.src = ''; imagePreview.classList.add('hidden'); }
                if (imagePlaceholder) imagePlaceholder.classList.remove('hidden');
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                if (imagePreview) {
                    imagePreview.src = e.target.result;
                    imagePreview.alt = 'Preview';
                    imagePreview.classList.remove('hidden');
                }
                if (imagePlaceholder) imagePlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    }

    var suggestBtn = document.querySelector('.suggest-keywords-btn');
    if (suggestBtn) suggestBtn.addEventListener('click', suggestKeywords);

    var slugInput = document.getElementById('group_slug');
    if (nameEnInput && slugInput) {
        function updateSlugFromName() {
            slugInput.value = slugFromNameEn(nameEnInput.value);
        }
        nameEnInput.addEventListener('input', updateSlugFromName);
        nameEnInput.addEventListener('change', updateSlugFromName);
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
        var backdrop = document.getElementById('add-product-group-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-product-group-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-product-group-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
