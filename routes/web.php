<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth (UI only — POST redirects, no validation or persistence)
Route::get('/register/vendor', fn () => view('auth.register-vendor'))->name('register.vendor');
Route::post('/register/vendor', fn () => redirect()->route('app.dashboard'));
Route::get('/register/staff', fn () => view('auth.register-staff'))->name('register.staff');
Route::post('/register/staff', fn () => redirect()->route('app.dashboard'));
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', fn () => redirect()->route('app.dashboard'));

// Legacy dashboard URL → redirect to app
Route::get('/dashboard', fn () => redirect()->route('app.dashboard'))->name('dashboard');

// App (ERP dashboard framework — design only, no auth)
Route::prefix('app')->name('app.')->group(function () {
    Route::get('/', fn () => view('dashboard.index'))->name('dashboard');

    // Inventory
    Route::get('/inventory/products-list', fn () => view('dashboard.page', ['pageTitle' => 'Products List', 'pageIcon' => '📋']))->name('inventory.products-list');
    Route::get('/inventory/add-product', fn () => view('dashboard.page', ['pageTitle' => 'Add Product', 'pageIcon' => '➕']))->name('inventory.add-product');
    Route::get('/inventory/categories', fn () => view('dashboard.page', ['pageTitle' => 'Categories', 'pageIcon' => '📁']))->name('inventory.categories');
    Route::get('/inventory/sub-categories', fn () => view('dashboard.page', ['pageTitle' => 'Sub Categories', 'pageIcon' => '📂']))->name('inventory.sub-categories');
    Route::get('/inventory/product-groups', fn () => view('dashboard.page', ['pageTitle' => 'Product Groups', 'pageIcon' => '🗂️']))->name('inventory.product-groups');
    Route::get('/inventory/brands', fn () => view('dashboard.page', ['pageTitle' => 'Brands', 'pageIcon' => '🏷️']))->name('inventory.brands');
    Route::get('/inventory/units', fn () => view('dashboard.page', ['pageTitle' => 'Units', 'pageIcon' => '📐']))->name('inventory.units');
    Route::get('/inventory/warranties', fn () => view('dashboard.page', ['pageTitle' => 'Warranties', 'pageIcon' => '🛡️']))->name('inventory.warranties');
    Route::get('/inventory/print-labels', fn () => view('dashboard.page', ['pageTitle' => 'Print Labels', 'pageIcon' => '🏷️']))->name('inventory.print-labels');

    // People & Accounts
    Route::get('/people/roles', fn () => view('dashboard.page', ['pageTitle' => 'Roles', 'pageIcon' => '🔐']))->name('people.roles');
    Route::get('/people/users', fn () => view('dashboard.page', ['pageTitle' => 'Users', 'pageIcon' => '👤']))->name('people.users');
    Route::get('/people/suppliers', fn () => view('dashboard.page', ['pageTitle' => 'Suppliers', 'pageIcon' => '🚚']))->name('people.suppliers');
    Route::get('/people/supplier-groups', fn () => view('dashboard.page', ['pageTitle' => 'Supplier Groups', 'pageIcon' => '📁']))->name('people.supplier-groups');
    Route::get('/people/customers', fn () => view('dashboard.page', ['pageTitle' => 'Customers', 'pageIcon' => '🛒']))->name('people.customers');
    Route::get('/people/customer-groups', fn () => view('dashboard.page', ['pageTitle' => 'Customer Groups', 'pageIcon' => '📁']))->name('people.customer-groups');

    // Sales
    Route::get('/sales/add-sale', fn () => view('dashboard.page', ['pageTitle' => 'Add Sale', 'pageIcon' => '➕']))->name('sales.add-sale');
    Route::get('/sales/list', fn () => view('dashboard.page', ['pageTitle' => 'Sales List', 'pageIcon' => '📋']))->name('sales.list');
    Route::get('/sales/return', fn () => view('dashboard.page', ['pageTitle' => 'Sales Return', 'pageIcon' => '↩️']))->name('sales.return');
    Route::get('/sales/quotations', fn () => view('dashboard.page', ['pageTitle' => 'Quotations', 'pageIcon' => '📄']))->name('sales.quotations');
    Route::get('/sales/quotations-list', fn () => view('dashboard.page', ['pageTitle' => 'Quotations List', 'pageIcon' => '📋']))->name('sales.quotations-list');

    // Expense
    Route::get('/expense/categories', fn () => view('dashboard.page', ['pageTitle' => 'Expense Categories', 'pageIcon' => '📁']))->name('expense.categories');
    Route::get('/expense/add', fn () => view('dashboard.page', ['pageTitle' => 'Add Expense', 'pageIcon' => '➕']))->name('expense.add');
    Route::get('/expense/list', fn () => view('dashboard.page', ['pageTitle' => 'Expense List', 'pageIcon' => '📋']))->name('expense.list');

    // HR & Payroll
    Route::get('/hr/employees', fn () => view('dashboard.page', ['pageTitle' => 'Employees', 'pageIcon' => '👤']))->name('hr.employees');
    Route::get('/hr/payroll', fn () => view('dashboard.page', ['pageTitle' => 'Payroll', 'pageIcon' => '💵']))->name('hr.payroll');
    Route::get('/hr/advances', fn () => view('dashboard.page', ['pageTitle' => 'Advances', 'pageIcon' => '📤']))->name('hr.advances');
    Route::get('/hr/attendance-leaves', fn () => view('dashboard.page', ['pageTitle' => 'Attendance & Leaves', 'pageIcon' => '📅']))->name('hr.attendance-leaves');

    // Utilities & Bills
    Route::get('/utilities/bills', fn () => view('dashboard.page', ['pageTitle' => 'Utility Bills', 'pageIcon' => '📄']))->name('utilities.bills');
    Route::get('/utilities/reminders', fn () => view('dashboard.page', ['pageTitle' => 'Bill Reminders', 'pageIcon' => '⏰']))->name('utilities.reminders');

    // Finance
    Route::get('/finance/banks', fn () => view('dashboard.page', ['pageTitle' => 'Banks', 'pageIcon' => '🏦']))->name('finance.banks');
    Route::get('/finance/cash', fn () => view('dashboard.page', ['pageTitle' => 'Cash', 'pageIcon' => '💵']))->name('finance.cash');
    Route::get('/finance/transactions', fn () => view('dashboard.page', ['pageTitle' => 'Transactions', 'pageIcon' => '📒']))->name('finance.transactions');

    // Reports
    Route::get('/reports/stock', fn () => view('dashboard.page', ['pageTitle' => 'Stock Report', 'pageIcon' => '📦']))->name('reports.stock');
    Route::get('/reports/profit-loss', fn () => view('dashboard.page', ['pageTitle' => 'Profit & Loss', 'pageIcon' => '📊']))->name('reports.profit-loss');
    Route::get('/reports/ledger', fn () => view('dashboard.page', ['pageTitle' => 'Ledger Reports', 'pageIcon' => '📒']))->name('reports.ledger');
    Route::get('/reports/business', fn () => view('dashboard.page', ['pageTitle' => 'Business Reports', 'pageIcon' => '📋']))->name('reports.business');

    // Synchronization
    Route::get('/sync/website', fn () => view('dashboard.page', ['pageTitle' => 'Sync with Website', 'pageIcon' => '🌐']))->name('sync.website');
    Route::get('/sync/api', fn () => view('dashboard.page', ['pageTitle' => 'API Settings', 'pageIcon' => '🔗']))->name('sync.api');

    // Settings
    Route::get('/settings/business', fn () => view('dashboard.page', ['pageTitle' => 'Business Settings', 'pageIcon' => '🏢']))->name('settings.business');
    Route::get('/settings/invoice', fn () => view('dashboard.page', ['pageTitle' => 'Invoice Settings', 'pageIcon' => '📄']))->name('settings.invoice');
    Route::get('/settings/barcode', fn () => view('dashboard.page', ['pageTitle' => 'Barcode Settings', 'pageIcon' => '📊']))->name('settings.barcode');
    Route::get('/settings/printers', fn () => view('dashboard.page', ['pageTitle' => 'Printers', 'pageIcon' => '🖨️']))->name('settings.printers');
    Route::get('/settings/tax-rates', fn () => view('dashboard.page', ['pageTitle' => 'Tax Rates', 'pageIcon' => '📋']))->name('settings.tax-rates');
});

// Footer / static pages (placeholder content for now)
Route::get('/about', fn () => view('static.placeholder', ['pageTitle' => 'About']))->name('about');
Route::get('/privacy', fn () => view('static.placeholder', ['pageTitle' => 'Privacy Policy']))->name('privacy');
Route::get('/terms', fn () => view('static.placeholder', ['pageTitle' => 'Terms & Conditions']))->name('terms');
Route::get('/contact', fn () => view('static.placeholder', ['pageTitle' => 'Contact']))->name('contact');
