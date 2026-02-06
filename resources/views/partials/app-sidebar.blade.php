@php
$current = fn($name) => request()->routeIs($name);
@endphp
<aside class="app-sidebar flex fixed inset-y-0 left-0 z-[100] w-64 -translate-x-full transition-transform duration-300 ease-out lg:translate-x-0 lg:relative lg:inset-auto lg:z-auto lg:flex-shrink-0 lg:flex-col">
    <div class="flex flex-col flex-grow lg:rounded-2xl m-0 lg:m-4 lg:mr-0 rounded-none border-r border-slate-200/80 dark:border-slate-700/50 lg:border border-white/60 dark:border-slate-700/50 bg-slate-50 dark:bg-slate-800/95 backdrop-blur-xl lg:bg-white/80 dark:lg:bg-slate-800/80 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden min-h-full lg:min-h-0">
        <div class="flex items-center h-16 px-6 border-b border-slate-200/80 dark:border-slate-700/50">
            <a href="{{ route('app.dashboard') }}" class="text-lg font-semibold bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                {{ config('app.name', 'AgriStack') }}
            </a>
        </div>
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            {{-- Dashboard --}}
            <a href="{{ route('app.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium {{ $current('app.dashboard') ? 'text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200/50 dark:border-emerald-500/20' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }} transition-colors">
                <span aria-hidden="true">📊</span>
                Dashboard
            </a>

            {{-- Inventory --}}
            <details class="group" {{ $current('app.inventory.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">📦</span>
                    Inventory
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.inventory.products-list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.products-list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Products List</a></li>
                    <li><a href="{{ route('app.inventory.add-product') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.add-product') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Add Product</a></li>
                    <li><a href="{{ route('app.inventory.categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.categories') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Categories</a></li>
                    <li><a href="{{ route('app.inventory.sub-categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.sub-categories') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📂 Sub Categories</a></li>
                    <li><a href="{{ route('app.inventory.product-groups') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.product-groups') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🗂️ Product Groups</a></li>
                    <li><a href="{{ route('app.inventory.brands') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.brands') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🏷️ Brands</a></li>
                    <li><a href="{{ route('app.inventory.units') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.units') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📐 Units</a></li>
                    <li><a href="{{ route('app.inventory.warranties') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.warranties') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛡️ Warranties</a></li>
                    <li><a href="{{ route('app.inventory.print-labels') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.inventory.print-labels') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🏷️ Print Labels</a></li>
                </ul>
            </details>

            {{-- People & Accounts --}}
            <details class="group" {{ $current('app.people.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">👥</span>
                    People &amp; Accounts
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.people.roles') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.roles') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔐 Roles</a></li>
                    <li><a href="{{ route('app.people.users') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.users') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">👤 Users</a></li>
                    <li><a href="{{ route('app.people.suppliers') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.suppliers') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🚚 Suppliers</a></li>
                    <li><a href="{{ route('app.people.supplier-groups') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.supplier-groups') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Supplier Groups</a></li>
                    <li><a href="{{ route('app.people.customers') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.customers') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛒 Customers</a></li>
                    <li><a href="{{ route('app.people.customer-groups') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.people.customer-groups') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Customer Groups</a></li>
                </ul>
            </details>

            {{-- Approvals --}}
            <details class="group" {{ $current('app.approvals.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">✅</span>
                    Approvals
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.approvals.vendors') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.vendors') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🏪 Suppliers</a></li>
                    <li><a href="{{ route('app.approvals.users') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.users') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">👤 Users / Staff</a></li>
                    <li><a href="{{ route('app.approvals.categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.categories') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Categories</a></li>
                    <li><a href="{{ route('app.approvals.sub-categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.sub-categories') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📂 Sub Categories</a></li>
                    <li><a href="{{ route('app.approvals.product-groups') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.product-groups') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🗂️ Product Groups</a></li>
                    <li><a href="{{ route('app.approvals.products') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.products') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📦 Products</a></li>
                    <li><a href="{{ route('app.approvals.roles') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.roles') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔐 Roles</a></li>
                    <li><a href="{{ route('app.approvals.price-changes') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.price-changes') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💰 Price Changes</a></li>
                    <li><a href="{{ route('app.approvals.stock-adjustments') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.stock-adjustments') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📊 Stock Adjustments</a></li>
                    <li><a href="{{ route('app.approvals.purchases') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.purchases') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛒 Purchases</a></li>
                    <li><a href="{{ route('app.approvals.returns') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.approvals.returns') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">↩️ Returns</a></li>
                </ul>
            </details>

            {{-- Sales --}}
            <details class="group" {{ $current('app.sales.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">💰</span>
                    Sales
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.sales.add') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.add') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Add Sale</a></li>
                    <li><a href="{{ route('app.sales.list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Sales List</a></li>
                    <li><a href="{{ route('app.sales.return') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.return') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">↩️ Return Sale List</a></li>
                    <li><a href="{{ route('app.sales.quotations') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.quotations') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📄 Hold Invoices List</a></li>
                    <li><a href="{{ route('app.sales.quotations-list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.quotations-list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Quotations List</a></li>
                </ul>
            </details>

            {{-- Purchase --}}
            <details class="group" {{ $current('app.purchase.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🛒</span>
                    Purchase
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.purchase.add-purchase') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.add-purchase') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Add Purchase</a></li>
                    <li><a href="{{ route('app.purchase.list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Purchase List</a></li>
                    <li><a href="{{ route('app.purchase.return') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.return') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">↩️ Purchase Return List</a></li>
                    <li><a href="{{ route('app.purchase.orders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.orders') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Purchase Orders</a></li>
                    <li><a href="{{ route('app.purchase.pending-orders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.pending-orders') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">⏳ Pending Orders</a></li>
                    <li><a href="{{ route('app.purchase.order-summary') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.order-summary') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📊 Purchase Order Summary</a></li>
                    <li><a href="{{ route('app.purchase.quotations') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.quotations') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📄 Purchase Quotations</a></li>
                    <li><a href="{{ route('app.purchase.quotations-list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.purchase.quotations-list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Purchase Quotations List</a></li>
                </ul>
            </details>

            {{-- Expense --}}
            <details class="group" {{ $current('app.expense.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">💸</span>
                    Expense
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.expense.categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.expense.categories') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Expense Categories</a></li>
                    <li><a href="{{ route('app.expense.add') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.expense.add') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Add Expense</a></li>
                    <li><a href="{{ route('app.expense.list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.expense.list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Expense List</a></li>
                </ul>
            </details>

            {{-- HR & Payroll --}}
            <details class="group" {{ $current('app.hr.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🧑‍💼</span>
                    HR &amp; Payroll
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.hr.employees') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.hr.employees') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">👤 Employees</a></li>
                    <li><a href="{{ route('app.hr.payroll') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.hr.payroll') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💵 Payroll</a></li>
                    <li><a href="{{ route('app.hr.advances') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.hr.advances') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📤 Advances</a></li>
                    <li><a href="{{ route('app.hr.attendance-leaves') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.hr.attendance-leaves') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📅 Attendance &amp; Leaves</a></li>
                </ul>
            </details>

            {{-- Utilities & Bills --}}
            <details class="group" {{ $current('app.utilities.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🔌</span>
                    Utilities &amp; Bills
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.utilities.bills') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.utilities.bills') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📄 Utility Bills</a></li>
                    <li><a href="{{ route('app.utilities.reminders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.utilities.reminders') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">⏰ Bill Reminders</a></li>
                </ul>
            </details>

            {{-- Finance --}}
            <details class="group" {{ $current('app.finance.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🏦</span>
                    Finance
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.finance.banks') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.finance.banks') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🏦 Banks</a></li>
                    <li><a href="{{ route('app.finance.cash') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.finance.cash') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💵 Cash</a></li>
                    <li><a href="{{ route('app.finance.transactions') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.finance.transactions') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📒 Transactions</a></li>
                </ul>
            </details>

            {{-- Reports --}}
            <details class="group" {{ $current('app.reports.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">📈</span>
                    Reports
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.reports.stock') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.reports.stock') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📦 Stock Report</a></li>
                    <li><a href="{{ route('app.reports.profit-loss') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.reports.profit-loss') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📊 Profit &amp; Loss</a></li>
                    <li><a href="{{ route('app.reports.ledger') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.reports.ledger') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📒 Ledger Reports</a></li>
                    <li><a href="{{ route('app.reports.business') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.reports.business') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Business Reports</a></li>
                </ul>
            </details>

            {{-- Synchronization --}}
            <details class="group" {{ $current('app.sync.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🔄</span>
                    Synchronization
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.sync.website') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sync.website') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🌐 Sync with Website</a></li>
                    <li><a href="{{ route('app.sync.api') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sync.api') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔗 API Settings</a></li>
                </ul>
            </details>

            {{-- Settings --}}
            <details class="group" {{ $current('app.settings.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">⚙️</span>
                    Settings
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.settings.business') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.settings.business') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🏢 Business Settings</a></li>
                    <li><a href="{{ route('app.settings.invoice') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.settings.invoice') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📄 Invoice Settings</a></li>
                    <li><a href="{{ route('app.settings.barcode') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.settings.barcode') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📊 Barcode Settings</a></li>
                    <li><a href="{{ route('app.settings.printers') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.settings.printers') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🖨️ Printers</a></li>
                    <li><a href="{{ route('app.settings.tax-rates') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.settings.tax-rates') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Tax Rates</a></li>
                </ul>
            </details>

            {{-- Analytics --}}
            <details class="group" {{ $current('app.analytics.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">📈</span>
                    Analytics
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.analytics.overview') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.overview') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🎯 Overview</a></li>
                    <li><a href="{{ route('app.analytics.sales-analytics') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.sales-analytics') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💵 Sales Analytics</a></li>
                    <li><a href="{{ route('app.analytics.purchase-analytics') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.purchase-analytics') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛒 Purchase Analytics</a></li>
                    <li><a href="{{ route('app.analytics.inventory-analytics') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.inventory-analytics') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📦 Inventory Analytics</a></li>
                    <li><a href="{{ route('app.analytics.expense-analytics') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.expense-analytics') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💸 Expense Analytics</a></li>
                    <li><a href="{{ route('app.analytics.profit-loss-analytics') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.profit-loss-analytics') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📊 Profit &amp; Loss Analytics</a></li>
                    <li><a href="{{ route('app.analytics.charts-graphs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.charts-graphs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📉 Charts &amp; Graphs</a></li>
                    <li><a href="{{ route('app.analytics.trends-insights') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.analytics.trends-insights') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💡 Trends / Insights</a></li>
                </ul>
            </details>

            {{-- Documents --}}
            <details class="group" {{ $current('app.documents.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">📑</span>
                    Documents
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.documents.all') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.all') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📂 All Documents</a></li>
                    <li><a href="{{ route('app.documents.invoices') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.invoices') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🧾 Invoices</a></li>
                    <li><a href="{{ route('app.documents.quotations') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.quotations') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📃 Quotations</a></li>
                    <li><a href="{{ route('app.documents.purchase-orders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.purchase-orders') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Purchase Orders</a></li>
                    <li><a href="{{ route('app.documents.delivery-notes') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.delivery-notes') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🚚 Delivery Notes</a></li>
                    <li><a href="{{ route('app.documents.receipts') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.receipts') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💳 Receipts</a></li>
                    <li><a href="{{ route('app.documents.uploaded-files') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.uploaded-files') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📤 Uploaded Files</a></li>
                    <li><a href="{{ route('app.documents.templates') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.templates') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📑 Document Templates</a></li>
                    <li><a href="{{ route('app.documents.archived') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.documents.archived') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Archived Documents</a></li>
                </ul>
            </details>

            {{-- Notifications --}}
            <details class="group" {{ $current('app.notifications.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🔔</span>
                    Notifications
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.notifications.all') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.all') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📬 All Notifications</a></li>
                    <li><a href="{{ route('app.notifications.system') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.system') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🖥️ System Notifications</a></li>
                    <li><a href="{{ route('app.notifications.sales-alerts') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.sales-alerts') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💰 Sales Alerts</a></li>
                    <li><a href="{{ route('app.notifications.purchase-alerts') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.purchase-alerts') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛒 Purchase Alerts</a></li>
                    <li><a href="{{ route('app.notifications.inventory-alerts') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.inventory-alerts') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📦 Inventory Alerts</a></li>
                    <li><a href="{{ route('app.notifications.payment-reminders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.payment-reminders') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💳 Payment Reminders</a></li>
                    <li><a href="{{ route('app.notifications.read') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.read') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">✔️ Read Notifications</a></li>
                    <li><a href="{{ route('app.notifications.settings') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.notifications.settings') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔧 Notification Settings</a></li>
                </ul>
            </details>

            {{-- Audit / Logs --}}
            <details class="group" {{ $current('app.audit-logs.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">📜</span>
                    Audit / Logs
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.audit-logs.activity') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.activity') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Activity Logs</a></li>
                    <li><a href="{{ route('app.audit-logs.user-activity') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.user-activity') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">👤 User Activity</a></li>
                    <li><a href="{{ route('app.audit-logs.login-history') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.login-history') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔐 Login History</a></li>
                    <li><a href="{{ route('app.audit-logs.data-changes') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.data-changes') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📝 Data Changes Log</a></li>
                    <li><a href="{{ route('app.audit-logs.system-logs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.system-logs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🖥️ System Logs</a></li>
                    <li><a href="{{ route('app.audit-logs.error-logs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.error-logs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">⚠️ Error Logs</a></li>
                    <li><a href="{{ route('app.audit-logs.access-logs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.audit-logs.access-logs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔑 Access Logs</a></li>
                </ul>
            </details>

            {{-- Support --}}
            <details class="group" {{ $current('app.support.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">🆘</span>
                    Support
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.support.help-center') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.help-center') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">❓ Help Center</a></li>
                    <li><a href="{{ route('app.support.faqs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.faqs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🗨️ FAQs</a></li>
                    <li><a href="{{ route('app.support.user-guide') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.user-guide') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📖 User Guide</a></li>
                    <li><a href="{{ route('app.support.tutorials') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.tutorials') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🎓 Tutorials</a></li>
                    <li><a href="{{ route('app.support.contact') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.contact') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📧 Contact Support</a></li>
                    <li><a href="{{ route('app.support.raise-ticket') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.raise-ticket') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🎫 Raise a Ticket</a></li>
                    <li><a href="{{ route('app.support.ticket-history') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.ticket-history') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📑 Ticket History</a></li>
                    <li><a href="{{ route('app.support.system-status') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.support.system-status') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🟢 System Status</a></li>
                </ul>
            </details>

            {{-- Backups --}}
            <details class="group" {{ $current('app.backups.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">💾</span>
                    Backups
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.backups.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.dashboard') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🗂️ Backup Dashboard</a></li>
                    <li><a href="{{ route('app.backups.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.create') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Create Backup</a></li>
                    <li><a href="{{ route('app.backups.history') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.history') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🕐 Backup History</a></li>
                    <li><a href="{{ route('app.backups.download-full') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-full') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📥 Download Full Backup</a></li>
                    <li><a href="{{ route('app.backups.download-database') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-database') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🗄️ Database as CSV / Excel</a></li>
                    <li><a href="{{ route('app.backups.download-products') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-products') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📦 Products Data as CSV / Excel</a></li>
                    <li><a href="{{ route('app.backups.download-sales') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-sales') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">💰 Sales Data as CSV / Excel</a></li>
                    <li><a href="{{ route('app.backups.download-purchase') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-purchase') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🛒 Purchase Data as CSV / Excel</a></li>
                    <li><a href="{{ route('app.backups.download-json') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.download-json') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📑 JSON Exports</a></li>
                    <li><a href="{{ route('app.backups.restore') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.restore') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔄 Restore Backup</a></li>
                    <li><a href="{{ route('app.backups.auto-settings') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.auto-settings') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">⏰ Auto Backup Settings</a></li>
                    <li><a href="{{ route('app.backups.storage') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.storage') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📁 Storage &amp; Locations</a></li>
                    <li><a href="{{ route('app.backups.logs') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.logs') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📝 Backup Logs</a></li>
                    <li><a href="{{ route('app.backups.permissions') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.backups.permissions') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">🔐 Backup Permissions</a></li>
                </ul>
            </details>
        </nav>
        <div class="p-4 border-t border-slate-200/80 dark:border-slate-700/50">
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                ← Back to site
            </a>
        </div>
    </div>
</aside>
