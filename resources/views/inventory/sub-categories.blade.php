@extends('layouts.app')

@section('title', 'Sub Categories')
@section('page-title', 'Sub Categories')

@section('content')
<style>
    #add-sub-category-modal-toggle { display: none; }
    .add-sub-category-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-sub-category-modal-toggle:checked ~ .add-sub-category-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-sub-category-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-sub-category-modal-toggle:checked ~ .add-sub-category-modal-wrap .add-sub-category-drawer-panel {
        transform: translateX(0);
    }
    .add-sub-category-modal-wrap.drawer-closing .add-sub-category-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-sub-category-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Sub Category --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sub Categories</h2>
            <label for="add-sub-category-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Sub Category
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="sub-category-search" class="sr-only">Search sub categories</label>
            <input type="text"
                   id="sub-category-search"
                   placeholder="Search sub categories…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Sub Categories grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $sampleSubCategories = [
                    ['categoryNumber' => 'SUB-001', 'nameEn' => 'Wheat Seeds', 'nameUr' => 'گندم کے بیج', 'parentCategory' => 'Seeds'],
                    ['categoryNumber' => 'SUB-002', 'nameEn' => 'Rice Seeds', 'nameUr' => 'چاول کے بیج', 'parentCategory' => 'Seeds'],
                    ['categoryNumber' => 'SUB-003', 'nameEn' => 'Organic Fertilizers', 'nameUr' => 'نامیاتی کھاد', 'parentCategory' => 'Fertilizers'],
                    ['categoryNumber' => 'SUB-004', 'nameEn' => 'Chemical Fertilizers', 'nameUr' => 'کیمیائی کھاد', 'parentCategory' => 'Fertilizers'],
                    ['categoryNumber' => 'SUB-005', 'nameEn' => 'Hand Tools', 'nameUr' => 'ہاتھ کے اوزار', 'parentCategory' => 'Tools'],
                    ['categoryNumber' => 'SUB-006', 'nameEn' => 'Power Tools', 'nameUr' => 'بجلی کے اوزار', 'parentCategory' => 'Tools'],
                ];
            @endphp
            @foreach ($sampleSubCategories as $subCat)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white">{{ $subCat['nameEn'] }}</p>
                                @if($subCat['nameUr'])
                                    <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400" dir="rtl">{{ $subCat['nameUr'] }}</p>
                                @endif
                                @if($subCat['parentCategory'])
                                    <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">Parent: {{ $subCat['parentCategory'] }}</p>
                                @endif
                            </div>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-2 py-1 rounded shrink-0">{{ $subCat['categoryNumber'] }}</span>
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

    {{-- Add Sub Category: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-sub-category-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-sub-category-overlay">
        {{-- Backdrop: blocks interaction with sub category list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-sub-category-backdrop" aria-hidden="true" id="add-sub-category-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-sub-category-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-sub-category-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Sub Category</h3>
                <button type="button" class="add-sub-category-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-sub-category-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div>
                    <label for="parent_category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Parent Category</label>
                    <select id="parent_category_id" name="parent_category_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select parent category</option>
                        <option value="1">Seeds</option>
                        <option value="2">Fertilizers</option>
                        <option value="3">Pesticides</option>
                        <option value="4">Tools</option>
                        <option value="5">Livestock Feed</option>
                        <option value="6">Vegetables</option>
                    </select>
                    {{-- Parent Category Image Preview --}}
                    <div id="parent-category-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Parent Category Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="parent-category-image" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='96' height='96' viewBox='0 0 96 96'%3E%3Crect width='96' height='96' fill='%23e2e8f0'/%3E%3Ctext x='50%25' y='50%25' font-family='Arial' font-size='12' fill='%2394a3b8' text-anchor='middle' dominant-baseline='middle'%3EPlaceholder%3C/text%3E%3C/svg%3E" alt="Parent category image" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category Name (English)</label>
                        <input type="text" id="name_en" name="name_en" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="name_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category Name (Urdu)</label>
                        <input type="text" id="name_ur" name="name_ur" dir="rtl" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="category_number" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category Number</label>
                        <input type="text" id="category_number" name="category_number" readonly placeholder="Auto generated" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated sub category number.</p>
                    </div>
                    <div>
                        <label for="category_slug" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Slug</label>
                        <input type="text" id="category_slug" name="slug" readonly placeholder="wheat-seeds" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated from Sub Category Name (English).</p>
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
                        <button type="button" class="suggest-keywords-btn inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors cursor-pointer" title="Suggest keywords from sub category name (English + Urdu)">
                            🤖 Suggest Keywords
                        </button>
                    </div>
                    <input type="text" id="keywords" name="keywords" placeholder="e.g. wheat, grains, گندم, دانے" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category Image</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="sub-category-image-preview-wrap">
                            <img id="sub-category-image-preview" src="" alt="" class="w-full h-full object-cover hidden">
                            <span id="sub-category-image-placeholder" class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" id="sub_category_image" name="sub_category_image" accept="image/*" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30">
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
                    <button type="button" class="add-sub-category-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-sub-category-form');
    var modalToggle = document.getElementById('add-sub-category-modal-toggle');
    var imageInput = document.getElementById('sub_category_image');
    var imagePreview = document.getElementById('sub-category-image-preview');
    var imagePlaceholder = document.getElementById('sub-category-image-placeholder');
    var modalWrap = document.querySelector('.add-sub-category-modal-wrap');
    var modalPanel = document.getElementById('add-sub-category-modal-panel');
    var keywordsInput = document.getElementById('keywords');
    var nameEnInput = document.getElementById('name_en');
    var nameUrInput = document.getElementById('name_ur');

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
        var fallbacks = { wheat: ['wheat', 'grains', 'cereals', 'گندم', 'دانے'], rice: ['rice', 'paddy', 'چاول', 'دانے'], organic: ['organic', 'natural', 'نامیاتی', 'قدرتی'], chemical: ['chemical', 'synthetic', 'کیمیائی', 'مصنوعی'], hand: ['hand', 'manual', 'ہاتھ', 'دستی'], power: ['power', 'electric', 'بجلی', 'برقی'] };
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

    var slugInput = document.getElementById('category_slug');
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
        var backdrop = document.getElementById('add-sub-category-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-sub-category-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-sub-category-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
