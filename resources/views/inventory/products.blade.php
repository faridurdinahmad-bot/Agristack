@extends('layouts.app')

@section('title', 'Add Product')
@section('page-title', 'Add Product')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Add Product</h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Create a new product in your inventory</p>
    </div>

    <form id="add-product-form" class="space-y-5">
        {{-- SECTION 1: Hierarchy Selection --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">1. Hierarchy Selection</h2>
            <div class="space-y-5">
                {{-- Category --}}
                <div>
                    <label for="category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                    <select id="category_id" name="category_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select category</option>
                        <option value="1">Seeds (بیج)</option>
                        <option value="2">Fertilizers (کھاد)</option>
                        <option value="3">Pesticides (کیڑے مار ادویات)</option>
                        <option value="4">Tools (اوزار)</option>
                        <option value="5">Livestock Feed (مویشیوں کا چارہ)</option>
                        <option value="6">Vegetables (سبزیاں)</option>
                    </select>
                    <div id="category-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Category Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="category-image" src="" alt="Category" class="w-full h-full object-cover hidden">
                            <span class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                    </div>
                </div>

                {{-- Sub Category --}}
                <div>
                    <label for="sub_category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category</label>
                    <select id="sub_category_id" name="sub_category_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select sub category</option>
                        <option value="1">Wheat Seeds (گندم کے بیج)</option>
                        <option value="2">Rice Seeds (چاول کے بیج)</option>
                        <option value="3">Organic Fertilizers (نامیاتی کھاد)</option>
                        <option value="4">Chemical Fertilizers (کیمیائی کھاد)</option>
                        <option value="5">Hand Tools (ہاتھ کے اوزار)</option>
                        <option value="6">Power Tools (بجلی کے اوزار)</option>
                    </select>
                    <div id="sub-category-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Sub Category Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="sub-category-image" src="" alt="Sub Category" class="w-full h-full object-cover hidden">
                            <span class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                    </div>
                </div>

                {{-- Product Group --}}
                <div>
                    <label for="product_group_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Group</label>
                    <select id="product_group_id" name="product_group_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select product group</option>
                        <option value="1">Premium Wheat Seeds</option>
                        <option value="2">Organic Rice Seeds</option>
                        <option value="3">NPK Fertilizers</option>
                        <option value="4">Compost Fertilizers</option>
                        <option value="5">Garden Hand Tools</option>
                        <option value="6">Electric Drills</option>
                    </select>
                    <div id="product-group-preview" class="mt-3">
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">Product Group Image Preview:</p>
                        <div class="w-24 h-24 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                            <img id="product-group-image" src="" alt="Product Group" class="w-full h-full object-cover hidden">
                            <span class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 2: Product Identity --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">2. Product Identity</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="product_name_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Name (English)</label>
                    <input type="text" id="product_name_en" name="product_name_en" placeholder="e.g. Premium Wheat Seeds 50kg" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="product_name_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product Name (Urdu)</label>
                    <input type="text" id="product_name_ur" name="product_name_ur" placeholder="e.g. پریمیم گندم کے بیج 50 کلو" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" dir="rtl">
                </div>
                <div>
                    <label for="product_sku" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product SKU / Product Number</label>
                    <input type="text" id="product_sku" name="product_sku" readonly placeholder="Auto generated" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated product SKU</p>
                </div>
                <div>
                    <label for="brand_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand <span class="text-red-500">*</span></label>
                    <select id="brand_id" name="brand_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select brand</option>
                        <option value="1">AgriTech Solutions</option>
                        <option value="2">GreenFields</option>
                        <option value="3">FarmPro</option>
                        <option value="4">CropMaster</option>
                        <option value="5">HarvestKing</option>
                        <option value="6">NatureFresh</option>
                    </select>
                </div>
                <div>
                    <label for="base_unit_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Base Unit <span class="text-red-500">*</span></label>
                    <select id="base_unit_id" name="base_unit_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select base unit</option>
                        <option value="1">Kilogram (kg)</option>
                        <option value="2">Gram (g)</option>
                        <option value="3">Liter (L)</option>
                        <option value="4">Milliliter (mL)</option>
                        <option value="5">Piece (pcs)</option>
                        <option value="6">Box</option>
                        <option value="7">Carton</option>
                        <option value="8">Bag</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- SECTION 3: Specifications & Search --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">3. Specifications & Search</h2>
            <div class="space-y-5">
                <div>
                    <label for="specifications" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Specifications / Features</label>
                    <textarea id="specifications" name="specifications" rows="4" placeholder="Enter product specifications and features..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>
                <div>
                    <label for="search_keywords" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search Keywords</label>
                    <input type="text" id="search_keywords" name="search_keywords" placeholder="e.g. wheat seeds, premium quality, 50kg, گندم کے بیج" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Separate keywords with commas. Used for product search and filtering.</p>
                </div>
            </div>
        </div>

        {{-- SECTION 4: Pricing --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">4. Pricing</h2>
            
            {{-- Base Cost --}}
            <div class="mb-6 p-4 rounded-xl bg-slate-50/50 dark:bg-slate-800/30 border border-slate-200 dark:border-slate-600">
                <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Base Cost</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="purchase_price" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Purchase Price</label>
                        <input type="number" id="purchase_price" name="purchase_price" min="0" step="0.01" placeholder="0.00" class="base-cost-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="carriage_cost" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Carriage / Transport Cost</label>
                        <input type="number" id="carriage_cost" name="carriage_cost" min="0" step="0.01" placeholder="0.00" class="base-cost-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                        <div class="flex items-end">
                            <div class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 px-4 py-3">
                            <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Total Base Cost</p>
                            <p id="base_total_cost" class="text-lg font-semibold text-slate-900 dark:text-slate-100">0.00</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pricing Levels --}}
            <div class="space-y-4">
                {{-- Retail --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/20">
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-3">Retail Price</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="retail_profit_percentage" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Profit Percentage (%)</label>
                            <input type="number" id="retail_profit_percentage" name="retail_profit_percentage" min="0" step="0.01" placeholder="0.00" class="retail-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label for="retail_price" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sale Price</label>
                            <input type="number" id="retail_price" name="retail_price" min="0" step="0.01" placeholder="0.00" class="retail-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div class="flex items-end">
                            <div class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 px-4 py-3">
                                <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Calculated Price</p>
                                <p id="retail_calculated" class="text-base font-semibold text-slate-900 dark:text-slate-100">0.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Wholesale --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/20">
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-3">Wholesale Price</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="wholesale_profit_percentage" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Profit Percentage (%)</label>
                            <input type="number" id="wholesale_profit_percentage" name="wholesale_profit_percentage" min="0" step="0.01" placeholder="0.00" class="wholesale-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label for="wholesale_price" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sale Price</label>
                            <input type="number" id="wholesale_price" name="wholesale_price" min="0" step="0.01" placeholder="0.00" class="wholesale-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div class="flex items-end">
                            <div class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 px-4 py-3">
                                <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Calculated Price</p>
                                <p id="wholesale_calculated" class="text-base font-semibold text-slate-900 dark:text-slate-100">0.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Super Wholesale --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/20">
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-3">Super Wholesale Price</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="super_wholesale_profit_percentage" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Profit Percentage (%)</label>
                            <input type="number" id="super_wholesale_profit_percentage" name="super_wholesale_profit_percentage" min="0" step="0.01" placeholder="0.00" class="super-wholesale-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label for="super_wholesale_price" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sale Price</label>
                            <input type="number" id="super_wholesale_price" name="super_wholesale_price" min="0" step="0.01" placeholder="0.00" class="super-wholesale-input w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div class="flex items-end">
                            <div class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 px-4 py-3">
                                <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Calculated Price</p>
                                <p id="super_wholesale_calculated" class="text-base font-semibold text-slate-900 dark:text-slate-100">0.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 5: Warranty & Origin --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">5. Warranty & Origin</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label for="warranty_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Warranty</label>
                    <select id="warranty_id" name="warranty_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select warranty</option>
                        <option value="1">Standard Warranty (12 months)</option>
                        <option value="2">Extended Warranty (24 months)</option>
                        <option value="3">Parts Only (6 months)</option>
                        <option value="4">Full Coverage (36 months)</option>
                        <option value="5">No Warranty</option>
                    </select>
                </div>
                <div>
                    <label for="country_of_origin" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Country of Origin</label>
                    <select id="country_of_origin" name="country_of_origin" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select country</option>
                        <option value="PK">Pakistan</option>
                        <option value="US">United States</option>
                        <option value="IN">India</option>
                        <option value="CN">China</option>
                        <option value="DE">Germany</option>
                        <option value="GB">United Kingdom</option>
                        <option value="JP">Japan</option>
                        <option value="KR">South Korea</option>
                    </select>
                </div>
                <div>
                    <label for="model_part_number" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Model / Part Number</label>
                    <input type="text" id="model_part_number" name="model_part_number" placeholder="e.g. WS-2024-50KG" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
            </div>
        </div>

        {{-- SECTION 6: Product Links --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">6. Product Links</h2>
            <div id="product-links-container" class="space-y-3">
                <div class="product-link-row flex gap-3 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Platform</label>
                        <select class="platform-select w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select platform</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">YouTube</option>
                            <option value="daraz">Daraz</option>
                            <option value="amazon">Amazon</option>
                            <option value="facebook">Facebook</option>
                            <option value="tiktok">TikTok</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="flex-[2]">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">URL</label>
                        <input type="url" class="link-url w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" placeholder="https://...">
                    </div>
                    <button type="button" class="remove-link-btn hidden px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Remove</button>
                </div>
            </div>
            <button type="button" id="add-link-btn" class="mt-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">+ Add Another Link</button>
        </div>

        {{-- SECTION 7: Descriptions --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">7. Descriptions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="description_en" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description (English)</label>
                    <textarea id="description_en" name="description_en" rows="6" placeholder="Enter detailed product description in English..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>
                <div>
                    <label for="description_ur" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description (Urdu)</label>
                    <textarea id="description_ur" name="description_ur" rows="6" placeholder="اردو میں مصنوعات کی تفصیلی معلومات درج کریں..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y" dir="rtl"></textarea>
                </div>
            </div>
        </div>

        {{-- SECTION 8: Product Images --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">8. Product Images</h2>
            <div class="space-y-5">
                {{-- Main Image --}}
                <div>
                    <label for="main_image" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Main Product Image</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="flex-shrink-0 w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center overflow-hidden" id="main-image-preview-wrap">
                            <img id="main-image-preview" src="" alt="" class="w-full h-full object-cover hidden">
                            <span id="main-image-placeholder" class="text-slate-400 dark:text-slate-500 text-xs text-center px-2">No image</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" id="main_image" name="main_image" accept="image/*" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30">
                        </div>
                    </div>
                </div>

                {{-- Gallery Images --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Gallery Images (Optional)</label>
                    <div id="gallery-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="gallery-slot aspect-square rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center relative cursor-pointer hover:border-emerald-400 transition-colors">
                            <input type="file" class="gallery-input hidden" accept="image/*" name="gallery_images[]">
                            <div class="text-center p-2 pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Add</p>
                            </div>
                            <img class="gallery-preview hidden w-full h-full object-cover absolute inset-0" alt="Gallery">
                            <button type="button" class="remove-gallery hidden absolute top-1 right-1 p-1 rounded-full bg-slate-600 dark:bg-slate-700 text-white hover:bg-slate-700 dark:hover:bg-slate-600 z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Upload up to 6 additional product images</p>
                </div>
            </div>
        </div>

        {{-- SECTION 9: Status --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">9. Status</h2>
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

        {{-- Form Actions --}}
        <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
            <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save Product</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
        </div>
    </form>
</div>

<script>
(function() {
    // Base cost calculation
    function updateBaseCost() {
        var purchase = parseFloat(document.getElementById('purchase_price').value) || 0;
        var carriage = parseFloat(document.getElementById('carriage_cost').value) || 0;
        var total = purchase + carriage;
        document.getElementById('base_total_cost').textContent = total.toFixed(2);
        return total;
    }

    // Pricing level calculation
    function calculatePricingLevel(prefix, baseCost) {
        if (!baseCost) baseCost = updateBaseCost();
        var profitInput = document.getElementById(prefix + '_profit_percentage');
        var priceInput = document.getElementById(prefix + '_price');
        var calculatedEl = document.getElementById(prefix + '_calculated');
        
        var profit = parseFloat(profitInput.value) || 0;
        var price = parseFloat(priceInput.value) || 0;

        if (profit > 0 && baseCost > 0) {
            var calculated = baseCost * (1 + profit / 100);
            priceInput.value = calculated.toFixed(2);
            calculatedEl.textContent = calculated.toFixed(2);
        } else if (price > 0 && baseCost > 0) {
            var calculatedProfit = ((price - baseCost) / baseCost) * 100;
            profitInput.value = calculatedProfit.toFixed(2);
            calculatedEl.textContent = price.toFixed(2);
        } else if (calculatedEl && baseCost > 0) {
            calculatedEl.textContent = baseCost.toFixed(2);
        }
    }

    // Base cost inputs
    document.getElementById('purchase_price').addEventListener('input', function() {
        updateBaseCost();
        ['retail', 'wholesale', 'super_wholesale'].forEach(function(p) { calculatePricingLevel(p); });
    });
    document.getElementById('carriage_cost').addEventListener('input', function() {
        updateBaseCost();
        ['retail', 'wholesale', 'super_wholesale'].forEach(function(p) { calculatePricingLevel(p); });
    });

    // Pricing level inputs
    ['retail', 'wholesale', 'super_wholesale'].forEach(function(prefix) {
        document.getElementById(prefix + '_profit_percentage').addEventListener('input', function() { calculatePricingLevel(prefix); });
        document.getElementById(prefix + '_price').addEventListener('input', function() { calculatePricingLevel(prefix); });
    });

    // Hierarchy image previews (simulated - UI only)
    function updateHierarchyPreview(selectId, imageId, previewContainerId) {
        var select = document.getElementById(selectId);
        var image = document.getElementById(imageId);
        var container = document.getElementById(previewContainerId);
        if (!select || !image || !container) return;
        
        select.addEventListener('change', function() {
            if (this.value) {
                // Simulate showing an image (UI only)
                image.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="96" height="96"%3E%3Crect width="96" height="96" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="11" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E';
                image.classList.remove('hidden');
                var placeholder = container.querySelector('span');
                if (placeholder) placeholder.classList.add('hidden');
            } else {
                image.classList.add('hidden');
                var placeholder = container.querySelector('span');
                if (placeholder) placeholder.classList.remove('hidden');
            }
        });
    }
    
    updateHierarchyPreview('category_id', 'category-image', 'category-preview');
    updateHierarchyPreview('sub_category_id', 'sub-category-image', 'sub-category-preview');
    updateHierarchyPreview('product_group_id', 'product-group-image', 'product-group-preview');

    // Main image preview
    document.getElementById('main_image').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('main-image-preview');
                var placeholder = document.getElementById('main-image-placeholder');
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Gallery images
    document.getElementById('gallery-container').addEventListener('click', function(e) {
        var slot = e.target.closest('.gallery-slot');
        if (!slot || e.target.closest('.remove-gallery')) return;
        var input = slot.querySelector('.gallery-input');
        var preview = slot.querySelector('.gallery-preview');
        if (preview && preview.classList.contains('hidden')) {
            input.click();
        }
    });

    document.getElementById('gallery-container').addEventListener('change', function(e) {
        if (!e.target.classList.contains('gallery-input')) return;
        var file = e.target.files[0];
        if (file) {
            var slot = e.target.closest('.gallery-slot');
            var reader = new FileReader();
            reader.onload = function(event) {
                var preview = slot.querySelector('.gallery-preview');
                var addBtn = slot.querySelector('svg').parentElement;
                var removeBtn = slot.querySelector('.remove-gallery');
                preview.src = event.target.result;
                preview.classList.remove('hidden');
                addBtn.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('gallery-container').addEventListener('click', function(e) {
        if (e.target.closest('.remove-gallery')) {
            var slot = e.target.closest('.gallery-slot');
            var input = slot.querySelector('.gallery-input');
            var preview = slot.querySelector('.gallery-preview');
            var addBtn = slot.querySelector('svg').parentElement;
            var removeBtn = slot.querySelector('.remove-gallery');
            input.value = '';
            preview.src = '';
            preview.classList.add('hidden');
            addBtn.classList.remove('hidden');
            removeBtn.classList.add('hidden');
        }
    });

    // Product links
    document.getElementById('add-link-btn').addEventListener('click', function() {
        var container = document.getElementById('product-links-container');
        var firstRow = container.querySelector('.product-link-row');
        if (firstRow) {
            firstRow.querySelector('.remove-link-btn').classList.remove('hidden');
        }
        var newRow = document.createElement('div');
        newRow.className = 'product-link-row flex gap-3 items-end';
        newRow.innerHTML = `
            <div class="flex-1">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Platform</label>
                <select class="platform-select w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">Select platform</option>
                    <option value="instagram">Instagram</option>
                    <option value="youtube">YouTube</option>
                    <option value="daraz">Daraz</option>
                    <option value="amazon">Amazon</option>
                    <option value="facebook">Facebook</option>
                    <option value="tiktok">TikTok</option>
                    <option value="custom">Custom</option>
                </select>
            </div>
            <div class="flex-[2]">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">URL</label>
                <input type="url" class="link-url w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" placeholder="https://...">
            </div>
            <button type="button" class="remove-link-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Remove</button>
        `;
        container.appendChild(newRow);
        newRow.querySelector('.remove-link-btn').addEventListener('click', function() {
            newRow.remove();
            var remaining = container.querySelectorAll('.product-link-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-link-btn').classList.add('hidden');
            }
        });
    });

    document.getElementById('product-links-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-link-btn')) {
            e.target.closest('.product-link-row').remove();
            var remaining = document.getElementById('product-links-container').querySelectorAll('.product-link-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-link-btn').classList.add('hidden');
            }
        }
    });

    // Form submission
    document.getElementById('add-product-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // UI only - no backend logic
        alert('Product form submitted (UI only - no backend logic)');
    });
})();
</script>
@endsection
