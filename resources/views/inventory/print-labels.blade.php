@extends('layouts.app')

@section('title', 'Print Labels')
@section('page-title', 'Print Labels')

@section('content')
<div class="space-y-6">
    {{-- Top section: title --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Print Labels</h2>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Print product stickers and barcodes for your inventory</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left Column: Configuration --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- SECTION 1: Product Selection --}}
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">1. Product Selection</h2>
                
                {{-- Product Search --}}
                <div class="mb-5">
                    <label for="product-search-label" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search Products</label>
                    <input type="text"
                           id="product-search-label"
                           placeholder="Search by name or SKU..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>

                {{-- Selected Products List --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Selected Products</label>
                    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 max-h-64 overflow-y-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-100 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-600 sticky top-0">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Product</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">SKU</th>
                                    <th class="px-3 py-2 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Quantity</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase w-20">Action</th>
                                </tr>
                            </thead>
                            <tbody id="selected-products-list" class="divide-y divide-slate-200 dark:divide-slate-600">
                                <tr class="hover:bg-slate-100 dark:hover:bg-slate-700/30">
                                    <td class="px-3 py-2">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-slate-900 dark:text-slate-100">Premium Wheat Seeds 50kg</span>
                                            <span class="text-xs text-slate-500 dark:text-slate-400" dir="rtl">پریمیم گندم کے بیج 50 کلو</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="text-xs font-mono text-slate-600 dark:text-slate-400">PRD-001</span>
                                    </td>
                                    <td class="px-3 py-2 text-right">
                                        <input type="number" value="10" min="1" class="w-20 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-2 py-1 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/20 outline-none">
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                        <button type="button" class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors" title="Remove">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-100 dark:hover:bg-slate-700/30">
                                    <td class="px-3 py-2">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-slate-900 dark:text-slate-100">Organic NPK Fertilizer 25kg</span>
                                            <span class="text-xs text-slate-500 dark:text-slate-400" dir="rtl">نامیاتی این پی کے کھاد 25 کلو</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="text-xs font-mono text-slate-600 dark:text-slate-400">PRD-002</span>
                                    </td>
                                    <td class="px-3 py-2 text-right">
                                        <input type="number" value="5" min="1" class="w-20 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-2 py-1 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/20 outline-none">
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                        <button type="button" class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors" title="Remove">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="no-products-message" class="hidden p-8 text-center">
                            <p class="text-sm text-slate-500 dark:text-slate-400">No products selected. Search and add products to print labels.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Label Configuration --}}
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">2. Label Configuration</h2>
                
                <div class="space-y-5">
                    {{-- Label Code Type --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Label Code Type</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="label_type" value="barcode" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Barcode</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="label_type" value="qrcode" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">QR Code</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="label_type" value="both" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Both</span>
                            </label>
                        </div>
                    </div>

                    {{-- Label Language --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Label Language</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="label_language" value="en" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">English</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="label_language" value="ur" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Urdu</span>
                            </label>
                        </div>
                    </div>

                    {{-- Store / Company Name --}}
                    <div>
                        <label for="store-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Store / Company Name</label>
                        <input type="text"
                               id="store-name"
                               name="store_name"
                               value="AgriStack Store"
                               placeholder="Enter store name..."
                               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Default from ERP Settings. You can customize for this print job.</p>
                    </div>

                    {{-- Price Display Options --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Price Display on Label</label>
                        <div class="space-y-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="show_retail_price" checked class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Retail Price</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer block">
                                <input type="checkbox" name="show_wholesale_price" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Wholesale Price</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer block">
                                <input type="checkbox" name="show_super_wholesale_price" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Super Wholesale Price</span>
                            </label>
                        </div>
                    </div>

                    {{-- Custom Code Field --}}
                    <div>
                        <label for="custom-code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Custom Code (Internal)</label>
                        <input type="text"
                               id="custom-code"
                               name="custom_code"
                               placeholder="e.g. ABCD / X1 / PZ"
                               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">This code will appear on the label. Internal purchase price mapping (not visible to customers).</p>
                    </div>

                    {{-- Sticker Size Info --}}
                    <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-600">
                        <p class="text-sm text-slate-700 dark:text-slate-300">
                            <span class="font-medium">Sticker Size:</span> 
                            <span id="sticker-size-display">38 × 50 mm</span> 
                            <span class="text-slate-500 dark:text-slate-400">(from settings)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Label Preview --}}
        <div class="lg:col-span-1">
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6 sticky top-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">Label Preview</h2>
                
                {{-- Preview Container --}}
                <div class="flex items-center justify-center mb-5">
                    <div id="label-preview" class="bg-white border-2 border-slate-300 dark:border-slate-600 shadow-lg" style="width: 190px; height: 250px; aspect-ratio: 38/50;">
                        {{-- Label Content --}}
                        <div class="p-3 h-full flex flex-col justify-between text-black" style="font-size: 10px;">
                            {{-- Store Name --}}
                            <div class="text-center border-b border-slate-300 pb-1 mb-1">
                                <div class="font-bold text-xs" id="preview-store-name">AgriStack Store</div>
                            </div>

                            {{-- Product Name --}}
                            <div class="text-center mb-2 flex-1 flex items-center justify-center">
                                <div>
                                    <div class="font-semibold text-xs mb-1" id="preview-product-name-en">Premium Wheat Seeds 50kg</div>
                                    <div class="text-xs" id="preview-product-name-ur" dir="rtl" style="display: none;">پریمیم گندم کے بیج 50 کلو</div>
                                </div>
                            </div>

                            {{-- Barcode/QR Code Area --}}
                            <div class="flex items-center justify-center mb-2" id="preview-code-area">
                                <div class="bg-white border border-slate-300 p-2">
                                    <svg width="120" height="40" viewBox="0 0 120 40" class="block">
                                        <rect x="2" y="5" width="3" height="30" fill="black"/>
                                        <rect x="7" y="5" width="1" height="30" fill="black"/>
                                        <rect x="10" y="5" width="2" height="30" fill="black"/>
                                        <rect x="14" y="5" width="1" height="30" fill="black"/>
                                        <rect x="17" y="5" width="3" height="30" fill="black"/>
                                        <rect x="22" y="5" width="2" height="30" fill="black"/>
                                        <rect x="26" y="5" width="1" height="30" fill="black"/>
                                        <rect x="29" y="5" width="3" height="30" fill="black"/>
                                        <rect x="34" y="5" width="1" height="30" fill="black"/>
                                        <rect x="37" y="5" width="2" height="30" fill="black"/>
                                        <rect x="41" y="5" width="3" height="30" fill="black"/>
                                        <rect x="46" y="5" width="1" height="30" fill="black"/>
                                        <rect x="49" y="5" width="2" height="30" fill="black"/>
                                        <rect x="53" y="5" width="3" height="30" fill="black"/>
                                        <rect x="58" y="5" width="1" height="30" fill="black"/>
                                        <rect x="61" y="5" width="2" height="30" fill="black"/>
                                        <rect x="65" y="5" width="3" height="30" fill="black"/>
                                        <rect x="70" y="5" width="1" height="30" fill="black"/>
                                        <rect x="73" y="5" width="2" height="30" fill="black"/>
                                        <rect x="77" y="5" width="3" height="30" fill="black"/>
                                        <rect x="82" y="5" width="1" height="30" fill="black"/>
                                        <rect x="85" y="5" width="2" height="30" fill="black"/>
                                        <rect x="89" y="5" width="3" height="30" fill="black"/>
                                        <rect x="94" y="5" width="1" height="30" fill="black"/>
                                        <rect x="97" y="5" width="2" height="30" fill="black"/>
                                        <rect x="101" y="5" width="3" height="30" fill="black"/>
                                        <rect x="106" y="5" width="1" height="30" fill="black"/>
                                        <rect x="109" y="5" width="2" height="30" fill="black"/>
                                        <text x="60" y="38" text-anchor="middle" font-size="8" fill="black">PRD-001</text>
                                    </svg>
                                </div>
                            </div>

                            {{-- SKU --}}
                            <div class="text-center mb-1">
                                <div class="text-xs font-mono" id="preview-sku">SKU: PRD-001</div>
                            </div>

                            {{-- Prices --}}
                            <div class="text-center mb-1" id="preview-prices">
                                <div class="text-xs font-semibold" id="preview-retail-price">Retail: Rs. 3,000.00</div>
                            </div>

                            {{-- Custom Code --}}
                            <div class="text-center border-t border-slate-300 pt-1">
                                <div class="text-xs font-mono" id="preview-custom-code">ABCD</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Print Button --}}
                <button type="button" id="print-labels-btn" class="w-full px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
                    Print Labels
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Update preview based on configuration changes
    function updatePreview() {
        var labelType = document.querySelector('input[name="label_type"]:checked').value;
        var labelLanguage = document.querySelector('input[name="label_language"]:checked').value;
        var storeName = document.getElementById('store-name').value || 'AgriStack Store';
        var customCode = document.getElementById('custom-code').value || 'ABCD';
        var showRetail = document.querySelector('input[name="show_retail_price"]').checked;
        var showWholesale = document.querySelector('input[name="show_wholesale_price"]').checked;
        var showSuperWholesale = document.querySelector('input[name="show_super_wholesale_price"]').checked;

        // Update store name
        document.getElementById('preview-store-name').textContent = storeName;

        // Update language
        if (labelLanguage === 'ur') {
            document.getElementById('preview-product-name-en').style.display = 'none';
            document.getElementById('preview-product-name-ur').style.display = 'block';
        } else {
            document.getElementById('preview-product-name-en').style.display = 'block';
            document.getElementById('preview-product-name-ur').style.display = 'none';
        }

        // Update code type
        var codeArea = document.getElementById('preview-code-area');
        if (labelType === 'barcode') {
            codeArea.innerHTML = `
                <div class="bg-white border border-slate-300 p-2">
                    <svg width="120" height="40" viewBox="0 0 120 40" class="block">
                        <rect x="2" y="5" width="3" height="30" fill="black"/>
                        <rect x="7" y="5" width="1" height="30" fill="black"/>
                        <rect x="10" y="5" width="2" height="30" fill="black"/>
                        <rect x="14" y="5" width="1" height="30" fill="black"/>
                        <rect x="17" y="5" width="3" height="30" fill="black"/>
                        <rect x="22" y="5" width="2" height="30" fill="black"/>
                        <rect x="26" y="5" width="1" height="30" fill="black"/>
                        <rect x="29" y="5" width="3" height="30" fill="black"/>
                        <rect x="34" y="5" width="1" height="30" fill="black"/>
                        <rect x="37" y="5" width="2" height="30" fill="black"/>
                        <rect x="41" y="5" width="3" height="30" fill="black"/>
                        <rect x="46" y="5" width="1" height="30" fill="black"/>
                        <rect x="49" y="5" width="2" height="30" fill="black"/>
                        <rect x="53" y="5" width="3" height="30" fill="black"/>
                        <rect x="58" y="5" width="1" height="30" fill="black"/>
                        <rect x="61" y="5" width="2" height="30" fill="black"/>
                        <rect x="65" y="5" width="3" height="30" fill="black"/>
                        <rect x="70" y="5" width="1" height="30" fill="black"/>
                        <rect x="73" y="5" width="2" height="30" fill="black"/>
                        <rect x="77" y="5" width="3" height="30" fill="black"/>
                        <rect x="82" y="5" width="1" height="30" fill="black"/>
                        <rect x="85" y="5" width="2" height="30" fill="black"/>
                        <rect x="89" y="5" width="3" height="30" fill="black"/>
                        <rect x="94" y="5" width="1" height="30" fill="black"/>
                        <rect x="97" y="5" width="2" height="30" fill="black"/>
                        <rect x="101" y="5" width="3" height="30" fill="black"/>
                        <rect x="106" y="5" width="1" height="30" fill="black"/>
                        <rect x="109" y="5" width="2" height="30" fill="black"/>
                        <text x="60" y="38" text-anchor="middle" font-size="8" fill="black">PRD-001</text>
                    </svg>
                </div>
            `;
        } else if (labelType === 'qrcode') {
            codeArea.innerHTML = `
                <div class="bg-white border border-slate-300 p-2">
                    <svg width="80" height="80" viewBox="0 0 80 80" class="block mx-auto">
                        <rect x="0" y="0" width="80" height="80" fill="white"/>
                        <rect x="5" y="5" width="10" height="10" fill="black"/>
                        <rect x="20" y="5" width="10" height="10" fill="black"/>
                        <rect x="35" y="5" width="10" height="10" fill="black"/>
                        <rect x="50" y="5" width="10" height="10" fill="black"/>
                        <rect x="65" y="5" width="10" height="10" fill="black"/>
                        <rect x="5" y="20" width="10" height="10" fill="black"/>
                        <rect x="35" y="20" width="10" height="10" fill="black"/>
                        <rect x="50" y="20" width="10" height="10" fill="black"/>
                        <rect x="65" y="20" width="10" height="10" fill="black"/>
                        <rect x="5" y="35" width="10" height="10" fill="black"/>
                        <rect x="20" y="35" width="10" height="10" fill="black"/>
                        <rect x="35" y="35" width="10" height="10" fill="black"/>
                        <rect x="50" y="35" width="10" height="10" fill="black"/>
                        <rect x="65" y="35" width="10" height="10" fill="black"/>
                        <rect x="5" y="50" width="10" height="10" fill="black"/>
                        <rect x="20" y="50" width="10" height="10" fill="black"/>
                        <rect x="50" y="50" width="10" height="10" fill="black"/>
                        <rect x="65" y="50" width="10" height="10" fill="black"/>
                        <rect x="5" y="65" width="10" height="10" fill="black"/>
                        <rect x="20" y="65" width="10" height="10" fill="black"/>
                        <rect x="35" y="65" width="10" height="10" fill="black"/>
                        <rect x="50" y="65" width="10" height="10" fill="black"/>
                        <rect x="65" y="65" width="10" height="10" fill="black"/>
                    </svg>
                </div>
            `;
        } else {
            codeArea.innerHTML = `
                <div class="space-y-2">
                    <div class="bg-white border border-slate-300 p-1">
                        <svg width="100" height="30" viewBox="0 0 100 30" class="block">
                            <rect x="2" y="5" width="3" height="20" fill="black"/>
                            <rect x="7" y="5" width="1" height="20" fill="black"/>
                            <rect x="10" y="5" width="2" height="20" fill="black"/>
                            <rect x="14" y="5" width="1" height="20" fill="black"/>
                            <rect x="17" y="5" width="3" height="20" fill="black"/>
                            <text x="50" y="20" text-anchor="middle" font-size="6" fill="black">PRD-001</text>
                        </svg>
                    </div>
                    <div class="bg-white border border-slate-300 p-1">
                        <svg width="50" height="50" viewBox="0 0 50 50" class="block mx-auto">
                            <rect x="5" y="5" width="8" height="8" fill="black"/>
                            <rect x="18" y="5" width="8" height="8" fill="black"/>
                            <rect x="5" y="18" width="8" height="8" fill="black"/>
                            <rect x="18" y="18" width="8" height="8" fill="black"/>
                            <rect x="5" y="31" width="8" height="8" fill="black"/>
                            <rect x="18" y="31" width="8" height="8" fill="black"/>
                            <rect x="31" y="5" width="8" height="8" fill="black"/>
                            <rect x="31" y="18" width="8" height="8" fill="black"/>
                            <rect x="31" y="31" width="8" height="8" fill="black"/>
                        </svg>
                    </div>
                </div>
            `;
        }

        // Update prices
        var pricesHtml = '';
        if (showRetail) {
            pricesHtml += '<div class="text-xs font-semibold mb-0.5">Retail: Rs. 3,000.00</div>';
        }
        if (showWholesale) {
            pricesHtml += '<div class="text-xs font-semibold mb-0.5">Wholesale: Rs. 2,800.00</div>';
        }
        if (showSuperWholesale) {
            pricesHtml += '<div class="text-xs font-semibold mb-0.5">Super: Rs. 2,600.00</div>';
        }
        document.getElementById('preview-prices').innerHTML = pricesHtml || '<div class="text-xs text-slate-400">No prices selected</div>';

        // Update custom code
        document.getElementById('preview-custom-code').textContent = customCode || 'ABCD';
    }

    // Event listeners
    document.querySelectorAll('input[name="label_type"]').forEach(function(radio) {
        radio.addEventListener('change', updatePreview);
    });
    document.querySelectorAll('input[name="label_language"]').forEach(function(radio) {
        radio.addEventListener('change', updatePreview);
    });
    document.getElementById('store-name').addEventListener('input', updatePreview);
    document.getElementById('custom-code').addEventListener('input', updatePreview);
    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', updatePreview);
    });

    // Print button (UI only)
    document.getElementById('print-labels-btn').addEventListener('click', function() {
        alert('Print Labels functionality (UI only - no backend logic)');
    });

    // Initialize preview
    updatePreview();
})();
</script>
@endsection
