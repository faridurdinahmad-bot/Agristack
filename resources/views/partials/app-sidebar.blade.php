@php
$current = fn($name) => request()->routeIs($name);
@endphp
<aside class="hidden lg:flex lg:flex-shrink-0 lg:w-64 lg:flex-col">
    <div class="flex flex-col flex-grow rounded-2xl m-4 mr-0 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
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

            {{-- Sales --}}
            <details class="group" {{ $current('app.sales.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 cursor-pointer list-none transition-colors">
                    <span aria-hidden="true">💰</span>
                    Sales
                    <span class="ml-auto text-xs opacity-70 group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <ul class="mt-1 ml-4 pl-4 border-l border-slate-200 dark:border-slate-600 space-y-0.5">
                    <li><a href="{{ route('app.sales.add-sale') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.add-sale') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">➕ Add Sale</a></li>
                    <li><a href="{{ route('app.sales.list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Sales List</a></li>
                    <li><a href="{{ route('app.sales.return') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.return') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">↩️ Sales Return</a></li>
                    <li><a href="{{ route('app.sales.quotations') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.quotations') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📄 Quotations</a></li>
                    <li><a href="{{ route('app.sales.quotations-list') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ $current('app.sales.quotations-list') ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50' }}">📋 Quotations List</a></li>
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
        </nav>
        <div class="p-4 border-t border-slate-200/80 dark:border-slate-700/50">
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                ← Back to site
            </a>
        </div>
    </div>
</aside>
