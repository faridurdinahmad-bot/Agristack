@extends('layouts.app')

@section('title', 'Brands')
@section('page-title', 'Brands')

@section('content')
<style>
    #add-brand-modal-toggle { display: none; }
    .add-brand-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-brand-modal-toggle:checked ~ .add-brand-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-brand-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-brand-modal-toggle:checked ~ .add-brand-modal-wrap .add-brand-drawer-panel {
        transform: translateX(0);
    }
    .add-brand-modal-wrap.drawer-closing .add-brand-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-brand-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Brand --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Brands</h2>
            <label for="add-brand-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Brand
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="brand-search" class="sr-only">Search brands</label>
            <input type="text"
                   id="brand-search"
                   placeholder="Search brands…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Brands grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $sampleBrands = [
                    ['brandCode' => 'BRD-001', 'nameEn' => 'AgriTech Solutions', 'nameUr' => 'ایگری ٹیک سولیوشنز', 'originCountry' => 'Pakistan', 'brandType' => 'Agricultural Equipment'],
                    ['brandCode' => 'BRD-002', 'nameEn' => 'GreenFields', 'nameUr' => 'گرین فیلڈز', 'originCountry' => 'USA', 'brandType' => 'Seeds & Fertilizers'],
                    ['brandCode' => 'BRD-003', 'nameEn' => 'FarmPro', 'nameUr' => 'فارم پرو', 'originCountry' => 'India', 'brandType' => 'Tools & Machinery'],
                    ['brandCode' => 'BRD-004', 'nameEn' => 'CropMaster', 'nameUr' => 'کروپ ماسٹر', 'originCountry' => 'China', 'brandType' => 'Pesticides'],
                    ['brandCode' => 'BRD-005', 'nameEn' => 'HarvestKing', 'nameUr' => 'ہارویسٹ کنگ', 'originCountry' => 'Germany', 'brandType' => 'Agricultural Equipment'],
                    ['brandCode' => 'BRD-006', 'nameEn' => 'NatureFresh', 'nameUr' => 'نیچر فریش', 'originCountry' => 'Pakistan', 'brandType' => 'Organic Products'],
                ];
            @endphp
            @foreach ($sampleBrands as $brand)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white">{{ $brand['nameEn'] }}</p>
                                @if($brand['nameUr'])
                                    <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400" dir="rtl">{{ $brand['nameUr'] }}</p>
                                @endif
                                @if($brand['originCountry'])
                                    <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">📍 {{ $brand['originCountry'] }}</p>
                                @endif
                                @if($brand['brandType'])
                                    <p class="mt-0.5 text-xs text-slate-400 dark:text-slate-500">{{ $brand['brandType'] }}</p>
                                @endif
                            </div>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-2 py-1 rounded shrink-0">{{ $brand['brandCode'] }}</span>
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

    {{-- Add Brand: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-brand-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-brand-overlay">
        {{-- Backdrop: blocks interaction with brand list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-brand-backdrop" aria-hidden="true" id="add-brand-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-brand-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-brand-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Brand</h3>
                <button type="button" class="add-brand-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-brand-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand Name (English)</label>
                        <input type="text" id="name_en" name="name_en" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="name_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand Name (Urdu)</label>
                        <input type="text" id="name_ur" name="name_ur" dir="rtl" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="brand_code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand Code</label>
                        <input type="text" id="brand_code" name="brand_code" readonly placeholder="Auto generated" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated brand code.</p>
                    </div>
                    <div>
                        <label for="origin_country" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Origin Country</label>
                        <select id="origin_country" name="origin_country" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select country</option>
                            <option value="PK">Pakistan</option>
                            <option value="US">United States</option>
                            <option value="IN">India</option>
                            <option value="CN">China</option>
                            <option value="DE">Germany</option>
                            <option value="UK">United Kingdom</option>
                            <option value="FR">France</option>
                            <option value="IT">Italy</option>
                            <option value="JP">Japan</option>
                            <option value="KR">South Korea</option>
                            <option value="AU">Australia</option>
                            <option value="CA">Canada</option>
                            <option value="BR">Brazil</option>
                            <option value="MX">Mexico</option>
                            <option value="TR">Turkey</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="EG">Egypt</option>
                            <option value="ZA">South Africa</option>
                            <option value="TH">Thailand</option>
                            <option value="VN">Vietnam</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="brand_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand Type <span class="text-slate-400 dark:text-slate-500 text-xs font-normal">(Optional)</span></label>
                        <select id="brand_type" name="brand_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select brand type (optional)</option>
                            <option value="agricultural_equipment">Agricultural Equipment</option>
                            <option value="seeds_fertilizers">Seeds & Fertilizers</option>
                            <option value="tools_machinery">Tools & Machinery</option>
                            <option value="pesticides">Pesticides</option>
                            <option value="organic_products">Organic Products</option>
                            <option value="livestock_feed">Livestock Feed</option>
                            <option value="irrigation">Irrigation Systems</option>
                            <option value="greenhouse">Greenhouse Equipment</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="website" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Website <span class="text-slate-400 dark:text-slate-500 text-xs font-normal">(Optional)</span></label>
                        <input type="url" id="website" name="website" placeholder="https://example.com" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand Logo / Image</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="brand-logo-preview-wrap">
                            <img id="brand-logo-preview" src="" alt="" class="w-full h-full object-cover hidden">
                            <span id="brand-logo-placeholder" class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No logo</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" id="brand_logo" name="brand_logo" accept="image/*" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30">
                            <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Upload brand logo or image. Recommended: Square format, 512x512px or larger.</p>
                        </div>
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
                    <button type="button" class="add-brand-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-brand-form');
    var modalToggle = document.getElementById('add-brand-modal-toggle');
    var logoInput = document.getElementById('brand_logo');
    var logoPreview = document.getElementById('brand-logo-preview');
    var logoPlaceholder = document.getElementById('brand-logo-placeholder');
    var modalWrap = document.querySelector('.add-brand-modal-wrap');
    var modalPanel = document.getElementById('add-brand-modal-panel');
    var nameEnInput = document.getElementById('name_en');

    function slugFromNameEn(nameEn) {
        if (!nameEn || typeof nameEn !== 'string') return '';
        return nameEn.trim().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9\-]/g, '');
    }

    function resetForm() {
        if (form) {
            form.reset();
            var activeRadio = form.querySelector('input[name="status"][value="active"]');
            if (activeRadio) activeRadio.checked = true;
        }
        if (logoPreview) {
            logoPreview.src = '';
            logoPreview.classList.add('hidden');
        }
        if (logoPlaceholder) logoPlaceholder.classList.remove('hidden');
        if (logoInput) logoInput.value = '';
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

    if (logoInput) {
        logoInput.addEventListener('change', function() {
            var file = this.files && this.files[0];
            if (!file) {
                if (logoPreview) { logoPreview.src = ''; logoPreview.classList.add('hidden'); }
                if (logoPlaceholder) logoPlaceholder.classList.remove('hidden');
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                if (logoPreview) {
                    logoPreview.src = e.target.result;
                    logoPreview.alt = 'Brand logo preview';
                    logoPreview.classList.remove('hidden');
                }
                if (logoPlaceholder) logoPlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
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
        var backdrop = document.getElementById('add-brand-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-brand-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-brand-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
