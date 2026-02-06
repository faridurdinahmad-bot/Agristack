<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth (UI only — POST redirects, no validation or persistence)
// TEMPORARY: Login bypassed for design/testing - redirects directly to dashboard
Route::get('/login', fn () => redirect()->route('app.dashboard'))->name('login');
Route::post('/login', fn () => redirect()->route('app.dashboard'));
Route::get('/register/vendor', fn () => view('auth.register-vendor'))->name('register.vendor');
Route::post('/register/vendor', fn () => redirect()->route('app.dashboard'));
Route::get('/register/staff', fn () => view('auth.register-staff'))->name('register.staff');
Route::post('/register/staff', fn () => redirect()->route('app.dashboard'));

// Legacy dashboard URL → redirect to app
Route::get('/dashboard', fn () => redirect()->route('app.dashboard'))->name('dashboard');

// App (ERP dashboard framework — design only, no auth)
Route::prefix('app')->name('app.')->group(function () {
    Route::get('/', fn () => view('dashboard.index'))->name('dashboard');

    // Inventory
    Route::get('/inventory/products-list', fn () => view('inventory.products-list'))->name('inventory.products-list');
    Route::get('/inventory/add-product', fn () => view('inventory.products'))->name('inventory.add-product');
    Route::get('/inventory/categories', fn () => view('inventory.categories'))->name('inventory.categories');
    Route::get('/inventory/sub-categories', fn () => view('inventory.sub-categories'))->name('inventory.sub-categories');
    Route::get('/inventory/product-groups', fn () => view('inventory.product-groups'))->name('inventory.product-groups');
    Route::get('/inventory/brands', fn () => view('inventory.brands'))->name('inventory.brands');
    Route::get('/inventory/units', fn () => view('inventory.units'))->name('inventory.units');
    Route::get('/inventory/packaging', fn () => view('inventory.packaging'))->name('inventory.packaging');
    Route::get('/inventory/warranties', fn () => view('inventory.warranties'))->name('inventory.warranties');
    Route::get('/inventory/print-labels', fn () => view('inventory.print-labels'))->name('inventory.print-labels');

    // People & Accounts
    Route::get('/people/roles', fn () => view('people.roles'))->name('people.roles');
    Route::get('/people/roles/add', fn () => view('people.roles-form'))->name('people.roles-form');
    Route::get('/people/users', fn () => view('people.users'))->name('people.users');
    Route::get('/people/suppliers', fn () => view('people.suppliers'))->name('people.suppliers');
    Route::get('/people/suppliers/add', fn () => view('people.suppliers-form'))->name('people.suppliers-form');
    Route::get('/people/suppliers/view/{id}', fn ($id) => view('people.supplier-view', ['id' => $id]))->name('people.supplier-view');

    // Approvals
    Route::get('/approvals/vendors', fn () => view('approvals.list', ['pageTitle' => 'Vendor Approvals', 'approvalType' => 'vendors']))->name('approvals.vendors');
    Route::get('/approvals/users', fn () => view('approvals.list', ['pageTitle' => 'User / Staff Approvals', 'approvalType' => 'users']))->name('approvals.users');
    Route::get('/approvals/categories', fn () => view('approvals.list', ['pageTitle' => 'Category Approvals', 'approvalType' => 'categories']))->name('approvals.categories');
    Route::get('/approvals/sub-categories', fn () => view('approvals.list', ['pageTitle' => 'Sub Category Approvals', 'approvalType' => 'sub-categories']))->name('approvals.sub-categories');
    Route::get('/approvals/product-groups', fn () => view('approvals.list', ['pageTitle' => 'Product Group Approvals', 'approvalType' => 'product-groups']))->name('approvals.product-groups');
    Route::get('/approvals/products', fn () => view('approvals.list', ['pageTitle' => 'Product Approvals', 'approvalType' => 'products', 'showType' => true]))->name('approvals.products');
    Route::get('/approvals/roles', fn () => view('approvals.list', ['pageTitle' => 'Role Approvals', 'approvalType' => 'roles']))->name('approvals.roles');
    Route::get('/approvals/price-changes', fn () => view('approvals.list', ['pageTitle' => 'Price Change Approvals', 'approvalType' => 'price-changes', 'showType' => true]))->name('approvals.price-changes');
    Route::get('/approvals/stock-adjustments', fn () => view('approvals.list', ['pageTitle' => 'Stock Adjustment Approvals', 'approvalType' => 'stock-adjustments', 'showType' => true]))->name('approvals.stock-adjustments');
    Route::get('/approvals/purchases', fn () => view('approvals.list', ['pageTitle' => 'Purchase Approvals', 'approvalType' => 'purchases', 'showType' => true]))->name('approvals.purchases');
    Route::get('/approvals/returns', fn () => view('approvals.list', ['pageTitle' => 'Return Approvals', 'approvalType' => 'returns', 'showType' => true]))->name('approvals.returns');
    Route::get('/approvals/view/{type}/{id}', fn ($type, $id) => view('approvals.view'))->name('approvals.view');
    Route::get('/people/supplier-groups', fn () => view('people.supplier-groups'))->name('people.supplier-groups');
    Route::get('/people/customers', fn () => view('people.customers'))->name('people.customers');
    Route::get('/people/customers/view/{id}', fn ($id) => view('people.customer-view', ['id' => $id]))->name('people.customer-view');
    Route::get('/people/customer-groups', fn () => view('people.customer-groups'))->name('people.customer-groups');
    Route::get('/people/customer-groups/view/{id}', fn ($id) => view('people.customer-group-view', ['id' => $id]))->name('people.customer-group-view');

    // Sales
    Route::get('/sales/add', fn () => view('sales.add'))->name('sales.add');
    Route::get('/sales/list', fn () => view('sales.list'))->name('sales.list');
    Route::get('/sales/return', fn () => view('sales.return'))->name('sales.return');
    Route::get('/sales/quotations', fn () => view('sales.hold-invoices-list'))->name('sales.quotations');
    Route::get('/sales/quotation/add', fn () => view('sales.quotation-add'))->name('sales.quotation-add');
    Route::get('/sales/quotations-list', fn () => view('sales.quotations-list'))->name('sales.quotations-list');

    // Purchase
    Route::get('/purchase/add-purchase', fn () => view('purchase.add-purchase'))->name('purchase.add-purchase');
    Route::get('/purchase/list', fn () => view('purchase.list'))->name('purchase.list');
    Route::get('/purchase/return', fn () => view('purchase.return-list'))->name('purchase.return');
    Route::get('/purchase/orders', fn () => view('purchase.orders'))->name('purchase.orders');
    Route::get('/purchase/pending-orders', fn () => view('purchase.pending-orders'))->name('purchase.pending-orders');
    Route::get('/purchase/order-summary', fn () => view('purchase.order-summary'))->name('purchase.order-summary');
    Route::get('/purchase/quotations', fn () => view('purchase.quotations'))->name('purchase.quotations');
    Route::get('/purchase/quotations-list', fn () => view('purchase.quotations-list'))->name('purchase.quotations-list');

    // Expense
    Route::get('/expense/categories', fn () => view('expense.categories'))->name('expense.categories');
    Route::get('/expense/add', fn () => view('expense.add'))->name('expense.add');
    Route::get('/expense/list', fn () => view('expense.list'))->name('expense.list');

    // HR & Payroll
    Route::get('/hr/employees', fn () => view('hr.employees'))->name('hr.employees');
    Route::get('/hr/payroll', fn () => view('hr.payroll'))->name('hr.payroll');
    Route::get('/hr/advances', fn () => view('hr.advances'))->name('hr.advances');
    Route::get('/hr/attendance-leaves', fn () => view('hr.attendance-leaves'))->name('hr.attendance-leaves');

    // Utilities & Bills
    Route::get('/utilities/bills', fn () => view('utilities.bills'))->name('utilities.bills');
    Route::get('/utilities/reminders', fn () => view('utilities.reminders'))->name('utilities.reminders');

    // Finance
    Route::get('/finance/banks', fn () => view('finance.banks'))->name('finance.banks');
    Route::get('/finance/cash', fn () => view('finance.cash'))->name('finance.cash');
    Route::get('/finance/transactions', fn () => view('finance.transactions'))->name('finance.transactions');

    // Reports
    Route::get('/reports/stock', fn () => view('reports.stock'))->name('reports.stock');
    Route::get('/reports/profit-loss', fn () => view('reports.profit-loss'))->name('reports.profit-loss');
    Route::get('/reports/ledger', fn () => view('reports.ledger'))->name('reports.ledger');
    Route::get('/reports/business', fn () => view('reports.business'))->name('reports.business');

    // Synchronization
    Route::get('/sync/website', fn () => view('sync.website'))->name('sync.website');
    Route::get('/sync/api', fn () => view('sync.api'))->name('sync.api');
    Route::get('/sync/logs', fn () => view('sync.logs'))->name('sync.logs');
    Route::get('/sync/schedule', fn () => view('sync.schedule'))->name('sync.schedule');

    // Settings
    Route::get('/settings/general', fn () => view('settings.general'))->name('settings.general');
    Route::get('/settings/business', fn () => view('settings.business'))->name('settings.business');
    Route::get('/settings/user-roles', fn () => view('settings.user-roles'))->name('settings.user-roles');
    Route::get('/settings/notifications', fn () => view('settings.notifications'))->name('settings.notifications');
    Route::get('/settings/tax-invoice', fn () => view('settings.tax-invoice'))->name('settings.tax-invoice');
    Route::get('/settings/backup-sync', fn () => view('settings.backup-sync'))->name('settings.backup-sync');
    Route::get('/settings/appearance', fn () => view('settings.appearance'))->name('settings.appearance');
    Route::get('/settings/invoice', fn () => redirect()->route('app.settings.tax-invoice'))->name('settings.invoice');
    Route::get('/settings/barcode', fn () => redirect()->route('app.settings.appearance'))->name('settings.barcode');
    Route::get('/settings/printers', fn () => redirect()->route('app.settings.appearance'))->name('settings.printers');
    Route::get('/settings/tax-rates', fn () => redirect()->route('app.settings.tax-invoice'))->name('settings.tax-rates');

    // Analytics (parent redirect for mobile menu)
    Route::get('/analytics', fn () => redirect()->route('app.analytics.overview'))->name('analytics');
    Route::get('/analytics/overview', fn () => view('analytics.overview'))->name('analytics.overview');
    Route::get('/analytics/sales-analytics', fn () => view('analytics.sales'))->name('analytics.sales-analytics');
    Route::get('/analytics/purchase-analytics', fn () => view('analytics.purchase'))->name('analytics.purchase-analytics');
    Route::get('/analytics/inventory-analytics', fn () => view('analytics.inventory'))->name('analytics.inventory-analytics');
    Route::get('/analytics/expense-analytics', fn () => view('analytics.expense'))->name('analytics.expense-analytics');
    Route::get('/analytics/profit-loss-analytics', fn () => view('analytics.profit-loss'))->name('analytics.profit-loss-analytics');
    Route::get('/analytics/charts-graphs', fn () => view('analytics.charts-graphs'))->name('analytics.charts-graphs');
    Route::get('/analytics/trends-insights', fn () => view('analytics.trends-insights'))->name('analytics.trends-insights');

    // Documents (parent redirect for mobile menu)
    Route::get('/documents', fn () => redirect()->route('app.documents.all'))->name('documents');
    Route::get('/documents/all', fn () => view('documents.all'))->name('documents.all');
    Route::get('/documents/invoices', fn () => view('documents.invoices'))->name('documents.invoices');
    Route::get('/documents/quotations', fn () => view('documents.quotations'))->name('documents.quotations');
    Route::get('/documents/purchase-orders', fn () => view('documents.purchase-orders'))->name('documents.purchase-orders');
    Route::get('/documents/delivery-notes', fn () => view('documents.delivery-notes'))->name('documents.delivery-notes');
    Route::get('/documents/receipts', fn () => view('documents.receipts'))->name('documents.receipts');
    Route::get('/documents/uploaded-files', fn () => view('documents.uploaded-files'))->name('documents.uploaded-files');
    Route::get('/documents/templates', fn () => view('documents.templates'))->name('documents.templates');
    Route::get('/documents/archived', fn () => view('documents.archived'))->name('documents.archived');

    // Notifications (parent redirect for mobile menu)
    Route::get('/notifications', fn () => redirect()->route('app.notifications.all'))->name('notifications');
    Route::get('/notifications/all', fn () => view('notifications.all'))->name('notifications.all');
    Route::get('/notifications/system', fn () => view('notifications.system'))->name('notifications.system');
    Route::get('/notifications/sales-alerts', fn () => view('notifications.sales-alerts'))->name('notifications.sales-alerts');
    Route::get('/notifications/purchase-alerts', fn () => view('notifications.purchase-alerts'))->name('notifications.purchase-alerts');
    Route::get('/notifications/inventory-alerts', fn () => view('notifications.inventory-alerts'))->name('notifications.inventory-alerts');
    Route::get('/notifications/payment-reminders', fn () => view('notifications.payment-reminders'))->name('notifications.payment-reminders');
    Route::get('/notifications/read', fn () => view('notifications.read'))->name('notifications.read');
    Route::get('/notifications/settings', fn () => redirect()->route('app.settings.notifications'))->name('notifications.settings');

    // Audit / Logs (parent redirect for mobile menu)
    Route::get('/audit-logs', fn () => redirect()->route('app.audit-logs.activity'))->name('audit-logs');
    Route::get('/audit-logs/activity', fn () => view('audit-logs.activity'))->name('audit-logs.activity');
    Route::get('/audit-logs/user-activity', fn () => view('audit-logs.user-activity'))->name('audit-logs.user-activity');
    Route::get('/audit-logs/login-history', fn () => view('audit-logs.login-history'))->name('audit-logs.login-history');
    Route::get('/audit-logs/data-changes', fn () => view('audit-logs.data-changes'))->name('audit-logs.data-changes');
    Route::get('/audit-logs/system-logs', fn () => view('audit-logs.system-logs'))->name('audit-logs.system-logs');
    Route::get('/audit-logs/error-logs', fn () => view('audit-logs.error-logs'))->name('audit-logs.error-logs');
    Route::get('/audit-logs/access-logs', fn () => view('audit-logs.access-logs'))->name('audit-logs.access-logs');

    // Support (parent redirect for mobile menu)
    Route::get('/support', fn () => redirect()->route('app.support.help-center'))->name('support');
    Route::get('/support/help-center', fn () => view('support.help-center'))->name('support.help-center');
    Route::get('/support/faqs', fn () => view('support.faqs'))->name('support.faqs');
    Route::get('/support/user-guide', fn () => view('support.user-guide'))->name('support.user-guide');
    Route::get('/support/tutorials', fn () => view('support.tutorials'))->name('support.tutorials');
    Route::get('/support/contact', fn () => view('support.contact'))->name('support.contact');
    Route::get('/support/raise-ticket', fn () => view('support.raise-ticket'))->name('support.raise-ticket');
    Route::get('/support/ticket-history', fn () => view('support.ticket-history'))->name('support.ticket-history');
    Route::get('/support/tickets/{id}', fn ($id) => view('support.ticket-details', ['id' => $id]))->name('support.ticket-details');
    Route::get('/support/system-status', fn () => view('support.system-status'))->name('support.system-status');

    // Backups (parent redirect for mobile menu)
    Route::get('/backups', fn () => redirect()->route('app.backups.dashboard'))->name('backups');
    Route::get('/backups/dashboard', fn () => view('dashboard.page', ['pageTitle' => 'Backup Dashboard', 'pageIcon' => '💾']))->name('backups.dashboard');
    Route::get('/backups/create', fn () => view('dashboard.page', ['pageTitle' => 'Create Backup', 'pageIcon' => '💾']))->name('backups.create');
    Route::get('/backups/history', fn () => view('dashboard.page', ['pageTitle' => 'Backup History', 'pageIcon' => '💾']))->name('backups.history');
    Route::get('/backups/download-full', fn () => view('dashboard.page', ['pageTitle' => 'Download Full Backup', 'pageIcon' => '💾']))->name('backups.download-full');
    Route::get('/backups/download-database', fn () => view('dashboard.page', ['pageTitle' => 'Download Database as CSV / Excel', 'pageIcon' => '💾']))->name('backups.download-database');
    Route::get('/backups/download-products', fn () => view('dashboard.page', ['pageTitle' => 'Download Products Data as CSV / Excel', 'pageIcon' => '💾']))->name('backups.download-products');
    Route::get('/backups/download-sales', fn () => view('dashboard.page', ['pageTitle' => 'Download Sales Data as CSV / Excel', 'pageIcon' => '💾']))->name('backups.download-sales');
    Route::get('/backups/download-purchase', fn () => view('dashboard.page', ['pageTitle' => 'Download Purchase Data as CSV / Excel', 'pageIcon' => '💾']))->name('backups.download-purchase');
    Route::get('/backups/download-json', fn () => view('dashboard.page', ['pageTitle' => 'Download JSON Exports', 'pageIcon' => '💾']))->name('backups.download-json');
    Route::get('/backups/restore', fn () => view('dashboard.page', ['pageTitle' => 'Restore Backup', 'pageIcon' => '💾']))->name('backups.restore');
    Route::get('/backups/auto-settings', fn () => view('dashboard.page', ['pageTitle' => 'Auto Backup Settings', 'pageIcon' => '💾']))->name('backups.auto-settings');
    Route::get('/backups/storage', fn () => view('dashboard.page', ['pageTitle' => 'Storage & Locations', 'pageIcon' => '💾']))->name('backups.storage');
    Route::get('/backups/logs', fn () => view('dashboard.page', ['pageTitle' => 'Backup Logs', 'pageIcon' => '💾']))->name('backups.logs');
    Route::get('/backups/permissions', fn () => view('dashboard.page', ['pageTitle' => 'Backup Permissions', 'pageIcon' => '💾']))->name('backups.permissions');
});

// Footer / static pages (placeholder content for now)
Route::get('/about', fn () => view('static.placeholder', ['pageTitle' => 'About']))->name('about');
Route::get('/privacy', fn () => view('static.placeholder', ['pageTitle' => 'Privacy Policy']))->name('privacy');
Route::get('/terms', fn () => view('static.placeholder', ['pageTitle' => 'Terms & Conditions']))->name('terms');
Route::get('/contact', fn () => view('static.placeholder', ['pageTitle' => 'Contact']))->name('contact');
