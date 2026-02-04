@extends('layouts.app')

@section('title', 'Warranties')
@section('page-title', 'Warranties')

@section('content')
<style>
    #add-warranty-modal-toggle { display: none; }
    .add-warranty-modal-wrap {
        display: none;
        pointer-events: none;
    }
    #add-warranty-modal-toggle:checked ~ .add-warranty-modal-wrap {
        display: flex;
        pointer-events: auto;
    }
    .add-warranty-drawer-panel {
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }
    #add-warranty-modal-toggle:checked ~ .add-warranty-modal-wrap .add-warranty-drawer-panel {
        transform: translateX(0);
    }
    .add-warranty-modal-wrap.drawer-closing .add-warranty-drawer-panel {
        transform: translateX(100%);
    }
</style>
<div>
    <input type="checkbox" id="add-warranty-modal-toggle" class="sr-only" aria-hidden="true" />

    <div class="space-y-6">
        {{-- Top section: title + Add Warranty --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Warranties</h2>
            <label for="add-warranty-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors cursor-pointer">
                <span aria-hidden="true">+</span>
                Add Warranty
            </label>
        </div>

        {{-- Search --}}
        <div class="max-w-md">
            <label for="warranty-search" class="sr-only">Search warranties</label>
            <input type="text"
                   id="warranty-search"
                   placeholder="Search warranties…"
                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
        </div>

        {{-- Warranties grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
                $sampleWarranties = [
                    ['warrantyCode' => 'WRT-001', 'name' => 'Standard Warranty', 'duration' => '12 months', 'type' => 'Manufacturer'],
                    ['warrantyCode' => 'WRT-002', 'name' => 'Extended Warranty', 'duration' => '24 months', 'type' => 'Extended'],
                    ['warrantyCode' => 'WRT-003', 'name' => 'Parts Only', 'duration' => '6 months', 'type' => 'Limited'],
                    ['warrantyCode' => 'WRT-004', 'name' => 'Full Coverage', 'duration' => '36 months', 'type' => 'Comprehensive'],
                    ['warrantyCode' => 'WRT-005', 'name' => 'Labor Warranty', 'duration' => '12 months', 'type' => 'Labor'],
                    ['warrantyCode' => 'WRT-006', 'name' => 'Lifetime Warranty', 'duration' => 'Lifetime', 'type' => 'Lifetime'],
                ];
            @endphp
            @foreach ($sampleWarranties as $warranty)
                <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white">{{ $warranty['name'] }}</p>
                                <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">{{ $warranty['duration'] }}</p>
                                <p class="mt-0.5 text-xs text-slate-400 dark:text-slate-500">{{ $warranty['type'] }}</p>
                            </div>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-2 py-1 rounded shrink-0">{{ $warranty['warrantyCode'] }}</span>
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

    {{-- Add Warranty: full-screen overlay with right-side drawer (90–100% width) --}}
    <div class="add-warranty-modal-wrap fixed inset-0 z-[110] flex flex-row justify-end bg-black/50 transition-opacity duration-300" id="add-warranty-overlay">
        {{-- Backdrop: blocks interaction with warranty list; click to close (via JS for slide-out) --}}
        <div class="absolute inset-0 cursor-pointer add-warranty-backdrop" aria-hidden="true" id="add-warranty-backdrop"></div>
        {{-- Drawer panel: slides in from right, covers 90–100% of viewport --}}
        <div class="add-warranty-drawer-panel relative w-full min-w-0 sm:max-w-[90%] sm:w-[90%] h-full overflow-y-auto bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 shadow-2xl flex flex-col" id="add-warranty-modal-panel">
            <div class="sticky top-0 z-10 flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shrink-0">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add Warranty</h3>
                <button type="button" class="add-warranty-close-btn p-2 rounded-lg text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer" aria-label="Close (X)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="add-warranty-form" class="p-6 space-y-5 flex-1 min-h-0 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="warranty_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Warranty Name</label>
                        <input type="text" id="warranty_name" name="warranty_name" placeholder="e.g. Standard Warranty, Extended Warranty" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="warranty_code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Warranty Code</label>
                        <input type="text" id="warranty_code" name="warranty_code" readonly placeholder="Auto generated" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/70 px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 focus:ring-0 cursor-default" tabindex="-1" aria-readonly="true">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Auto-generated warranty code.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="warranty_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Warranty Type</label>
                        <select id="warranty_type" name="warranty_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select warranty type</option>
                            <option value="manufacturer">Manufacturer Warranty</option>
                            <option value="extended">Extended Warranty</option>
                            <option value="limited">Limited Warranty</option>
                            <option value="comprehensive">Comprehensive Warranty</option>
                            <option value="labor">Labor Warranty</option>
                            <option value="parts">Parts Only Warranty</option>
                            <option value="lifetime">Lifetime Warranty</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="warranty_duration" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Duration</label>
                        <div class="flex gap-2">
                            <input type="number" id="warranty_duration_value" name="warranty_duration_value" min="0" step="0.01" placeholder="e.g. 12" class="flex-1 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <select id="warranty_duration_unit" name="warranty_duration_unit" class="w-32 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months" selected>Months</option>
                                <option value="years">Years</option>
                                <option value="lifetime">Lifetime</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="terms_conditions" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Terms & Conditions</label>
                    <textarea id="terms_conditions" name="terms_conditions" rows="4" placeholder="Enter warranty terms and conditions..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Coverage</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/30 p-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="parts" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Parts</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="labor" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Labor</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="shipping" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Shipping</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="replacement" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Replacement</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="repair" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Repair</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="refund" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Refund</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="maintenance" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Maintenance</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="coverage[]" value="technical_support" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Technical Support</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="void_conditions" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Void Conditions</label>
                    <textarea id="void_conditions" name="void_conditions" rows="3" placeholder="Conditions that void the warranty (e.g., misuse, unauthorized repairs, water damage)..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>

                <div>
                    <label for="claim_method" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Claim Method</label>
                    <select id="claim_method" name="claim_method" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select claim method</option>
                        <option value="online">Online Claim Form</option>
                        <option value="email">Email Support</option>
                        <option value="phone">Phone Call</option>
                        <option value="in_person">In-Person Visit</option>
                        <option value="authorized_service_center">Authorized Service Center</option>
                        <option value="mail">Mail/Postal Service</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Applies To</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/30 p-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="all_products" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">All Products</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="specific_categories" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Specific Categories</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="specific_brands" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Specific Brands</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="specific_products" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Specific Products</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="product_groups" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Product Groups</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="applies_to[]" value="custom_selection" class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Custom Selection</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="internal_notes" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Internal Notes</label>
                    <textarea id="internal_notes" name="internal_notes" rows="3" placeholder="Internal notes for staff reference (not visible to customers)..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">These notes are for internal use only and will not be displayed to customers.</p>
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
                    <button type="button" class="add-warranty-cancel-btn px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function() {
    var form = document.getElementById('add-warranty-form');
    var modalToggle = document.getElementById('add-warranty-modal-toggle');
    var modalWrap = document.querySelector('.add-warranty-modal-wrap');
    var modalPanel = document.getElementById('add-warranty-modal-panel');

    function resetForm() {
        if (form) {
            form.reset();
            var activeRadio = form.querySelector('input[name="status"][value="active"]');
            if (activeRadio) activeRadio.checked = true;
            var durationUnit = form.querySelector('#warranty_duration_unit');
            if (durationUnit) durationUnit.value = 'months';
        }
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
        var backdrop = document.getElementById('add-warranty-backdrop');
        if (backdrop) backdrop.addEventListener('click', closeWithTransition);
        var closeBtn = modalWrap.querySelector('.add-warranty-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeWithTransition);
        var cancelBtn = modalWrap.querySelector('.add-warranty-cancel-btn');
        if (cancelBtn) cancelBtn.addEventListener('click', closeWithTransition);
    }
})();
</script>
@endsection
