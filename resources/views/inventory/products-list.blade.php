@extends('layouts.app')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')
<div class="space-y-6">
    {{-- Top section: title + Add Product --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Products</h2>
        <a href="{{ route('app.inventory.add-product') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
            <span aria-hidden="true">+</span>
            Add Product
        </a>
    </div>

    {{-- Filters & Search Section --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <div class="space-y-4">
            {{-- Search Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="product-search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by Product Name</label>
                    <input type="text"
                           id="product-search"
                           name="product_search"
                           placeholder="Search by name (English / Urdu)..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
                <div>
                    <label for="sku-search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by SKU / Product Number</label>
                    <input type="text"
                           id="sku-search"
                           name="sku_search"
                           placeholder="Search by SKU..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
            </div>

            {{-- Filter Row --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="filter-category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                    <select id="filter-category" name="category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Categories</option>
                        <option value="1">Seeds (بیج)</option>
                        <option value="2">Fertilizers (کھاد)</option>
                        <option value="3">Pesticides (کیڑے مار ادویات)</option>
                        <option value="4">Tools (اوزار)</option>
                        <option value="5">Livestock Feed (مویشیوں کا چارہ)</option>
                        <option value="6">Vegetables (سبزیاں)</option>
                    </select>
                </div>
                <div>
                    <label for="filter-sub-category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sub Category</label>
                    <select id="filter-sub-category" name="sub_category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Sub Categories</option>
                        <option value="1">Wheat Seeds (گندم کے بیج)</option>
                        <option value="2">Rice Seeds (چاول کے بیج)</option>
                        <option value="3">Organic Fertilizers (نامیاتی کھاد)</option>
                        <option value="4">Chemical Fertilizers (کیمیائی کھاد)</option>
                    </select>
                </div>
                <div>
                    <label for="filter-brand" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Brand</label>
                    <select id="filter-brand" name="brand" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Brands</option>
                        <option value="1">AgriTech Solutions</option>
                        <option value="2">GreenFields</option>
                        <option value="3">FarmPro</option>
                        <option value="4">CropMaster</option>
                        <option value="5">HarvestKing</option>
                        <option value="6">NatureFresh</option>
                    </select>
                </div>
                <div>
                    <label for="filter-status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                    <select id="filter-status" name="status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            {{-- Clear Filters Button --}}
            <div class="flex justify-end">
                <button type="button" id="clear-filters" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                    Clear Filters
                </button>
            </div>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Product Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">SKU</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Category</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Brand</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Purchase Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Retail Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Stock</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="products-table-body">
                    @php
                        $sampleProducts = [
                            [
                                'sku' => 'PRD-001',
                                'nameEn' => 'Premium Wheat Seeds 50kg',
                                'nameUr' => 'پریمیم گندم کے بیج 50 کلو',
                                'category' => 'Seeds',
                                'subCategory' => 'Wheat Seeds',
                                'brand' => 'AgriTech Solutions',
                                'purchasePrice' => '2500.00',
                                'retailPrice' => '3000.00',
                                'stock' => '150',
                                'status' => 'active',
                                'image' => 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="48" height="48"%3E%3Crect width="48" height="48" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="10" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E'
                            ],
                            [
                                'sku' => 'PRD-002',
                                'nameEn' => 'Organic NPK Fertilizer 25kg',
                                'nameUr' => 'نامیاتی این پی کے کھاد 25 کلو',
                                'category' => 'Fertilizers',
                                'subCategory' => 'Organic Fertilizers',
                                'brand' => 'GreenFields',
                                'purchasePrice' => '1800.00',
                                'retailPrice' => '2200.00',
                                'stock' => '85',
                                'status' => 'active',
                                'image' => 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="48" height="48"%3E%3Crect width="48" height="48" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="10" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E'
                            ],
                            [
                                'sku' => 'PRD-003',
                                'nameEn' => 'Garden Hand Trowel',
                                'nameUr' => 'باغیچہ ہاتھ کا کدال',
                                'category' => 'Tools',
                                'subCategory' => 'Hand Tools',
                                'brand' => 'FarmPro',
                                'purchasePrice' => '450.00',
                                'retailPrice' => '600.00',
                                'stock' => '0',
                                'status' => 'inactive',
                                'image' => 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="48" height="48"%3E%3Crect width="48" height="48" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="10" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E'
                            ],
                            [
                                'sku' => 'PRD-004',
                                'nameEn' => 'Rice Seeds Premium 20kg',
                                'nameUr' => 'چاول کے بیج پریمیم 20 کلو',
                                'category' => 'Seeds',
                                'subCategory' => 'Rice Seeds',
                                'brand' => 'CropMaster',
                                'purchasePrice' => '3200.00',
                                'retailPrice' => '3800.00',
                                'stock' => '42',
                                'status' => 'active',
                                'image' => 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="48" height="48"%3E%3Crect width="48" height="48" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="10" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E'
                            ],
                            [
                                'sku' => 'PRD-005',
                                'nameEn' => 'Chemical Pesticide 5L',
                                'nameUr' => 'کیمیائی کیڑے مار 5 لیٹر',
                                'category' => 'Pesticides',
                                'subCategory' => 'Chemical Pesticides',
                                'brand' => 'HarvestKing',
                                'purchasePrice' => '1200.00',
                                'retailPrice' => '1500.00',
                                'stock' => '28',
                                'status' => 'active',
                                'image' => 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="48" height="48"%3E%3Crect width="48" height="48" fill="%23e2e8f0"/%3E%3Ctext x="50%25" y="50%25" font-size="10" fill="%2394a3b8" text-anchor="middle" dominant-baseline="middle"%3EImage%3C/text%3E%3C/svg%3E'
                            ],
                        ];
                    @endphp
                    @foreach ($sampleProducts as $product)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            {{-- Image --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 overflow-hidden flex items-center justify-center">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['nameEn'] }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            {{-- Product Name --}}
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-slate-900 dark:text-white">{{ $product['nameEn'] }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400 mt-0.5" dir="rtl">{{ $product['nameUr'] }}</span>
                                </div>
                            </td>
                            {{-- SKU --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-xs font-mono text-slate-600 dark:text-slate-400">{{ $product['sku'] }}</span>
                            </td>
                            {{-- Category --}}
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="text-sm text-slate-900 dark:text-slate-100">{{ $product['category'] }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $product['subCategory'] }}</span>
                                </div>
                            </td>
                            {{-- Brand --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $product['brand'] }}</span>
                            </td>
                            {{-- Purchase Price --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <span class="text-sm text-slate-900 dark:text-slate-100">Rs. {{ number_format($product['purchasePrice'], 2) }}</span>
                            </td>
                            {{-- Retail Price --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs. {{ number_format($product['retailPrice'], 2) }}</span>
                            </td>
                            {{-- Stock --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                @if($product['stock'] == '0')
                                    <span class="text-sm font-medium text-red-600 dark:text-red-400">Out of Stock</span>
                                @else
                                    <span class="text-sm text-slate-900 dark:text-slate-100">{{ $product['stock'] }}</span>
                                @endif
                            </td>
                            {{-- Status --}}
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                @if($product['status'] == 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Empty State (hidden by default, shown via JS when no products) --}}
        <div id="empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No products found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by adding your first product to the inventory.</p>
                <a href="{{ route('app.inventory.add-product') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First Product
                </a>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="px-4 py-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                {{-- Rows per page --}}
                <div class="flex items-center gap-2">
                    <label for="rows-per-page" class="text-sm text-slate-700 dark:text-slate-300">Rows per page:</label>
                    <select id="rows-per-page" name="rows_per_page" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-1.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                {{-- Pagination Info & Controls --}}
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-700 dark:text-slate-300">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">5</span> products
                    </span>
                    <div class="flex items-center gap-2">
                        <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Clear filters functionality (UI only)
    document.getElementById('clear-filters').addEventListener('click', function() {
        document.getElementById('product-search').value = '';
        document.getElementById('sku-search').value = '';
        document.getElementById('filter-category').value = '';
        document.getElementById('filter-sub-category').value = '';
        document.getElementById('filter-brand').value = '';
        document.getElementById('filter-status').value = '';
    });

    // Filter/search functionality (UI only - simulate)
    function filterProducts() {
        // This would filter products in a real implementation
        // For now, just UI demonstration
        var searchTerm = document.getElementById('product-search').value.toLowerCase();
        var skuTerm = document.getElementById('sku-search').value.toLowerCase();
        var categoryFilter = document.getElementById('filter-category').value;
        var subCategoryFilter = document.getElementById('filter-sub-category').value;
        var brandFilter = document.getElementById('filter-brand').value;
        var statusFilter = document.getElementById('filter-status').value;

        // In a real implementation, this would filter the table rows
        // For UI-only, we'll just log the filter values
        console.log('Filters applied:', {
            search: searchTerm,
            sku: skuTerm,
            category: categoryFilter,
            subCategory: subCategoryFilter,
            brand: brandFilter,
            status: statusFilter
        });
    }

    // Add event listeners for filtering
    document.getElementById('product-search').addEventListener('input', filterProducts);
    document.getElementById('sku-search').addEventListener('input', filterProducts);
    document.getElementById('filter-category').addEventListener('change', filterProducts);
    document.getElementById('filter-sub-category').addEventListener('change', filterProducts);
    document.getElementById('filter-brand').addEventListener('change', filterProducts);
    document.getElementById('filter-status').addEventListener('change', filterProducts);
})();
</script>
@endsection
