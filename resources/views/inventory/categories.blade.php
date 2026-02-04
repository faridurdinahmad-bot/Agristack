@extends('layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories')

@section('content')
<style>
    #add-category-modal-toggle { display: none; }
    .add-category-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-category-modal-toggle:checked ~ .add-category-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-category-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-category-modal-toggle:checked ~ .add-category-modal-wrap .add-category-drawer-panel {
        transform: translateX(0);
    }
    .add-category-modal-wrap.drawer-closing .add-category-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-category-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Category --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Categories</h2>
        <label for="add-category-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
            <span aria-hidden="true">+</span>
            Add Category
        </label>
    </div>

    {{-- Search --}}
    <div class="max-w-md">
        <label for="category-search" class="sr-only">Search categories</label>
        <input type="text"
               id="category-search"
               placeholder="Search categories…"
               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
    </div>

    {{-- Categories grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @php
            $sampleCategories = [
                ['nameEn' => 'Seeds', 'nameUr' => 'بیج'],
                ['nameEn' => 'Fertilizers', 'nameUr' => 'کھادیں'],
                ['nameEn' => 'Pesticides', 'nameUr' => 'کیڑے مار'],
                ['nameEn' => 'Tools', 'nameUr' => 'اوزار'],
                ['nameEn' => 'Livestock Feed', 'nameUr' => 'مویشیوں کا چارہ'],
                ['nameEn' => 'Vegetables', 'nameUr' => 'سبزیاں'],
            ];
        @endphp
        @foreach ($sampleCategories as $cat)
            <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="p-5">
                    <p class="font-medium text-slate-900 dark:text-white">{{ $cat['nameEn'] }}</p>
                    @if($cat['nameUr'])
                        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400" dir="rtl">{{ $cat['nameUr'] }}</p>
                    @endif
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

    {{-- Add Category: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-category-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-category-overlay">
        {{-- Backdrop: blocks interaction with category list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-category-backdrop" aria-hidden="true" id="add-category-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-category-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-category-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Category</h3>
                <button type="button" class="add-category-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-category-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category Name (English)</label>
                        <input type="text" id="name_en" name="name_en" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="name_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category Name (Urdu)</label>
                        <input type="text" id="name_ur" name="name_ur" dir="rtl" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                <div>
                    <label for="category_slug" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Slug</label>
                    <input type="text" id="category_slug" name="slug" readonly placeholder="tractor-parts" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated from Category Name (English).</p>
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
                        <button type="button" class="suggest-keywords-btn inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors cursor-pointer" title="Suggest keywords from category name (English + Urdu)">
                            🤖 Suggest Keywords
                        </button>
                    </div>
                    <input type="text" id="keywords" name="keywords" placeholder="e.g. tractor parts, agriculture machinery, ٹریکٹر پارٹس, زرعی مشینری" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category Image</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="category-image-preview-wrap">
                            <img id="category-image-preview" src="" alt="" class="w-full h-full object-cover hidden">
                            <span id="category-image-placeholder" class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" id="category_image" name="category_image" accept="image/*" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30">
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
                    <button type="button" class="add-category-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-category-form');
    var modalToggle = document.getElementById('add-category-modal-toggle');
    var imageInput = document.getElementById('category_image');
    var imagePreview = document.getElementById('category-image-preview');
    var imagePlaceholder = document.getElementById('category-image-placeholder');
    var modalWrap = document.querySelector('.add-category-modal-wrap');
    var modalPanel = document.getElementById('add-category-modal-panel');
    var keywordsInput = document.getElementById('keywords');
    var nameEnInput = document.getElementById('name_en');
    var nameUrInput = document.getElementById('name_ur');

    /** Heuristic: true if string contains only Latin/ASCII (treat as English for lowercase). */
    function isLatinOnly(str) {
        return /^[\x00-\x7F]*$/.test(str);
    }

    /** Split keywords by comma, trim, lowercase English-only. Returns array (internal storage). */
    function processKeywordsForStorage(rawKeywords) {
        if (!rawKeywords || typeof rawKeywords !== 'string') return [];
        return rawKeywords.split(',').map(function(s) {
            var trimmed = s.trim();
            if (!trimmed) return null;
            return isLatinOnly(trimmed) ? trimmed.toLowerCase() : trimmed;
        }).filter(Boolean);
    }

    /** Generate URL-safe slug from English name. */
    function slugFromNameEn(nameEn) {
        if (!nameEn || typeof nameEn !== 'string') return '';
        return nameEn.trim().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9\-]/g, '');
    }

    /** Build category payload (future-proof structure). No UI change; for internal/API use. */
    function buildCategoryPayload() {
        var nameEn = nameEnInput ? nameEnInput.value.trim() : '';
        var nameUr = nameUrInput ? nameUrInput.value.trim() : '';
        var descEn = form && form.querySelector('[name="desc_en"]') ? form.querySelector('[name="desc_en"]').value : '';
        var descUr = form && form.querySelector('[name="desc_ur"]') ? form.querySelector('[name="desc_ur"]').value : '';
        var rawKeywords = keywordsInput ? keywordsInput.value : '';
        var statusEl = form && form.querySelector('input[name="status"]:checked');
        var status = statusEl ? statusEl.value : 'active';
        var imageFile = imageInput && imageInput.files && imageInput.files[0] ? imageInput.files[0] : null;

        return {
            name_en: nameEn,
            name_ur: nameUr,
            description_en: descEn,
            description_ur: descUr,
            keywords: processKeywordsForStorage(rawKeywords),
            slug: slugFromNameEn(nameEn),
            parent_category_id: null,
            image: imageFile,
            status: status,
            meta_title_en: form && form.querySelector('[name="meta_title_en"]') ? form.querySelector('[name="meta_title_en"]').value : '',
            meta_description_en: form && form.querySelector('[name="meta_description_en"]') ? form.querySelector('[name="meta_description_en"]').value : ''
        };
    }

    /** Simulate AI: suggest keywords from category name (English + Urdu). Runs only on button click. */
    function suggestKeywords() {
        var nameEn = nameEnInput ? nameEnInput.value.trim() : '';
        var nameUr = nameUrInput ? nameUrInput.value.trim() : '';
        var parts = [];
        if (nameEn) parts.push(nameEn.toLowerCase());
        if (nameUr) parts.push(nameUr);
        var fallbacks = { seeds: ['seeds', 'grains', 'planting', 'بیج', 'دانے'], fertilizers: ['fertilizers', 'nutrients', 'کھاد', 'زراعت'], pesticides: ['pesticides', 'crop protection', 'کیڑے مار', 'زراعت'], tools: ['tools', 'equipment', 'اوزار', 'سامان'], vegetables: ['vegetables', 'produce', 'سبزیاں', 'پھل'], livestock: ['livestock', 'feed', 'مویشی', 'چارہ'], machinery: ['machinery', 'equipment', 'مشینری', 'آلات'] };
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

            var payload = buildCategoryPayload();
            if (typeof console !== 'undefined' && console.debug) console.debug('Category payload (internal):', { name_en: payload.name_en, name_ur: payload.name_ur, description_en: payload.description_en ? '(set)' : '', description_ur: payload.description_ur ? '(set)' : '', keywords: payload.keywords, slug: payload.slug, image: payload.image ? payload.image.name : null, status: payload.status });

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

    function closeWithTransition() {
        if (!modalWrap) return;
        modalWrap.classList.add('drawer-closing');
        setTimeout(function() {
            closeModal();
            modalWrap.classList.remove('drawer-closing');
        }, 300);
    }

    if (modalWrap && modalPanel) {
        modalPanel.addEventListener('click', function(e) { e.stopPropagation(); });
        var backdrop = document.getElementById('add-category-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-category-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-category-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
