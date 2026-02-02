@extends('layouts.public')

@section('title', 'Register as Staff — ' . config('app.name', 'AgriStack'))

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <div class="max-w-3xl mx-auto">
        {{-- Page header --}}
        <div class="mb-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Staff registration</h1>
            <p class="mt-2 text-slate-600 dark:text-slate-400">Complete the form below to register as staff. All fields marked with * are required.</p>
        </div>

        <form action="{{ route('register.staff') }}" method="post" class="space-y-8">
            @csrf

            {{-- 1) Account Information --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">1. Account information</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Login credentials for your staff account.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email address *</label>
                        <input type="email" name="email" id="email" required autofocus placeholder="you@company.com"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Password *</label>
                            <input type="password" name="password" id="password" required placeholder="••••••••"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Confirm password *</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="••••••••"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="preferred_language" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Preferred language</label>
                            <select name="preferred_language" id="preferred_language"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select language</option>
                                <option value="en">English</option>
                                <option value="ar">Arabic</option>
                                <option value="es">Spanish</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="hi">Hindi</option>
                                <option value="ur">Urdu</option>
                            </select>
                        </div>
                        <div>
                            <label for="timezone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Timezone</label>
                            <select name="timezone" id="timezone"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select timezone</option>
                                <option value="UTC">UTC</option>
                                <option value="America/New_York">Eastern (US)</option>
                                <option value="Europe/London">London</option>
                                <option value="Europe/Paris">Paris</option>
                                <option value="Asia/Dubai">Dubai</option>
                                <option value="Asia/Karachi">Karachi</option>
                                <option value="Asia/Kolkata">India</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 2) Personal Information --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">2. Personal information</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Your name and identity details.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">First name *</label>
                            <input type="text" name="first_name" id="first_name" required placeholder="Given name"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Last name *</label>
                            <input type="text" name="last_name" id="last_name" required placeholder="Family name"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Date of birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="nationality" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Nationality</label>
                            <select name="nationality" id="nationality"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select nationality</option>
                                <option value="US">United States</option>
                                <option value="GB">United Kingdom</option>
                                <option value="PK">Pakistan</option>
                                <option value="IN">India</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="OTHER">Other</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Gender</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="gender" value="male" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Male</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="gender" value="female" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Female</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="gender" value="other" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Other / Prefer not to say</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="id_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">ID document type</label>
                            <select name="id_type" id="id_type"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select type</option>
                                <option value="passport">Passport</option>
                                <option value="national_id">National ID</option>
                                <option value="driving_license">Driving license</option>
                            </select>
                        </div>
                        <div>
                            <label for="id_number" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">ID number</label>
                            <input type="text" name="id_number" id="id_number" placeholder="Document number"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                </div>
            </section>

            {{-- 3) Employment Details --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">3. Employment details</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Job title, department, and contract type.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="job_title" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Job title *</label>
                            <input type="text" name="job_title" id="job_title" required placeholder="e.g. Sales Manager"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="department" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Department</label>
                            <select name="department" id="department"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select department</option>
                                <option value="sales">Sales</option>
                                <option value="operations">Operations</option>
                                <option value="finance">Finance</option>
                                <option value="hr">Human Resources</option>
                                <option value="procurement">Procurement</option>
                                <option value="warehouse">Warehouse</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="employment_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Employment type *</label>
                            <select name="employment_type" id="employment_type" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select type</option>
                                <option value="full_time">Full-time</option>
                                <option value="part_time">Part-time</option>
                                <option value="contract">Contract</option>
                                <option value="temporary">Temporary</option>
                            </select>
                        </div>
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Expected start date</label>
                            <input type="date" name="start_date" id="start_date"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="reporting_to" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Reports to (manager name or role)</label>
                        <input type="text" name="reporting_to" id="reporting_to" placeholder="Optional"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                </div>
            </section>

            {{-- 4) Vendor / Company Association --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">4. Vendor / company association</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Link this staff account to a vendor or company.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label for="associated_vendor" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Associated vendor / company *</label>
                        <select name="associated_vendor" id="associated_vendor" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                            <option value="">Select vendor or company</option>
                            <option value="1">Acme Farms Ltd</option>
                            <option value="2">Green Valley Ag</option>
                            <option value="3">Global Grain Co</option>
                            <option value="other">Other (specify below)</option>
                        </select>
                    </div>
                    <div id="vendor_other_wrap" class="hidden">
                        <label for="vendor_other_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Company name</label>
                        <input type="text" name="vendor_other_name" id="vendor_other_name" placeholder="Enter company name"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div>
                        <label for="employee_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Employee / staff ID (if assigned)</label>
                        <input type="text" name="employee_id" id="employee_id" placeholder="Optional internal ID"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                </div>
            </section>

            {{-- 5) Address & Contact --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">5. Address & contact</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Where to reach you and emergency contact.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label for="country" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Country *</label>
                        <select name="country" id="country" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                            <option value="">Select country</option>
                            <option value="US">United States</option>
                            <option value="GB">United Kingdom</option>
                            <option value="PK">Pakistan</option>
                            <option value="IN">India</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="city" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">City *</label>
                            <input type="text" name="city" id="city" required placeholder="City or town"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Postal / ZIP code</label>
                            <input type="text" name="postal_code" id="postal_code" placeholder="Postal code"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="street_address" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Street address *</label>
                        <input type="text" name="street_address" id="street_address" required placeholder="Building, street, number"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Primary phone *</label>
                        <input type="tel" name="phone" id="phone" required placeholder="+1 234 567 8900"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div>
                        <label for="emergency_contact_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Emergency contact name</label>
                        <input type="text" name="emergency_contact_name" id="emergency_contact_name" placeholder="Full name"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div>
                        <label for="emergency_contact_phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Emergency contact phone</label>
                        <input type="tel" name="emergency_contact_phone" id="emergency_contact_phone" placeholder="+1 234 567 8900"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                </div>
            </section>

            {{-- 6) Skills & Permissions (UI only) --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">6. Skills & permissions</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">UI only — roles and permissions are assigned after approval.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Default role (informational)</label>
                        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-3 text-sm text-slate-500 dark:text-slate-400">
                            Role will be assigned by your administrator after registration.
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Available permission areas (read-only)</label>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Inventory</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Orders</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Reports</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Settings</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Users</span>
                        </div>
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Your administrator will grant access to the relevant areas.</p>
                    </div>
                </div>
            </section>

            {{-- 7) Documents Upload (UI only) --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">7. Documents upload</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Upload required documents (UI only — no files are stored).</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">ID document (passport / national ID)</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-8 text-center">
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Drag and drop or click to upload</p>
                            <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">PDF, JPG, PNG — max 10 MB</p>
                            <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" disabled aria-hidden="true">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Resume / CV (optional)</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-8 text-center">
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Drag and drop or click to upload</p>
                            <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">PDF, DOC, DOCX — max 10 MB</p>
                            <input type="file" class="hidden" accept=".pdf,.doc,.docx" disabled aria-hidden="true">
                        </div>
                    </div>
                </div>
            </section>

            {{-- 8) Agreements & Consent --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">8. Agreements & consent</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Please read and accept the following.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <label class="flex gap-3 cursor-pointer">
                        <input type="checkbox" name="agree_terms" value="1" required class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">I have read and accept the <a href="{{ route('terms') }}" class="font-medium text-emerald-600 dark:text-emerald-400 hover:underline">Terms &amp; Conditions</a> *</span>
                    </label>
                    <label class="flex gap-3 cursor-pointer">
                        <input type="checkbox" name="agree_privacy" value="1" required class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">I have read and accept the <a href="{{ route('privacy') }}" class="font-medium text-emerald-600 dark:text-emerald-400 hover:underline">Privacy Policy</a> *</span>
                    </label>
                    <label class="flex gap-3 cursor-pointer">
                        <input type="checkbox" name="declare_accuracy" value="1" required class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">I declare that the information provided is accurate and complete. *</span>
                    </label>
                </div>
            </section>

            {{-- 9) Final Submit --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                    <p class="text-sm text-slate-600 dark:text-slate-400">By submitting, you confirm that all details are correct and you accept our terms.</p>
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/30">
                        <span class="text-lg" aria-hidden="true">👤</span>
                        Submit staff registration
                    </button>
                </div>
            </section>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
            Already have an account? <a href="{{ route('login') }}" class="font-medium text-emerald-600 dark:text-emerald-400 hover:underline">Sign in</a>.
        </p>
    </div>
</div>
@endsection
