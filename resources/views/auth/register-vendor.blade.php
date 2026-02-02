@extends('layouts.public')

@section('title', 'Register as Vendor — ' . config('app.name', 'AgriStack'))

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <div class="max-w-3xl mx-auto">
        {{-- Page header --}}
        <div class="mb-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Vendor registration</h1>
            <p class="mt-2 text-slate-600 dark:text-slate-400">Complete the form below to register your business. All fields marked with * are required.</p>
        </div>

        <form action="{{ route('register.vendor') }}" method="post" class="space-y-8">
            @csrf

            {{-- 1) Account Information --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">1. Account information</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Login credentials for your vendor account.</p>
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

            {{-- 2) Business / Company Identity --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">2. Business / company identity</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Legal and official business details.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label for="legal_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Legal business name *</label>
                        <input type="text" name="legal_name" id="legal_name" required placeholder="As registered with authorities"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div>
                        <label for="trading_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Trading name / DBA</label>
                        <input type="text" name="trading_name" id="trading_name" placeholder="Name used for commerce (if different)"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="registration_number" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Company registration number</label>
                            <input type="text" name="registration_number" id="registration_number" placeholder="e.g. CRN, Company No."
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="tax_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Tax ID / VAT number</label>
                            <input type="text" name="tax_id" id="tax_id" placeholder="e.g. VAT, EIN, GST"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="date_incorporation" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Date of incorporation</label>
                        <input type="date" name="date_incorporation" id="date_incorporation"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                </div>
            </section>

            {{-- 3) Business Type & Category --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">3. Business type & category</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">How you operate and what you sell.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Business type *</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="business_type" value="b2b" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">B2B</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="business_type" value="b2c" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">B2C</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="business_type" value="both" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Both</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="primary_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Primary industry / category *</label>
                        <select name="primary_category" id="primary_category" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                            <option value="">Select category</option>
                            <option value="crops">Crops & grains</option>
                            <option value="livestock">Livestock & dairy</option>
                            <option value="seeds">Seeds & inputs</option>
                            <option value="machinery">Farm machinery & equipment</option>
                            <option value="agrochemicals">Agrochemicals & fertilizers</option>
                            <option value="produce">Fresh produce</option>
                            <option value="processed">Processed foods</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="secondary_categories" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Secondary categories (optional)</label>
                        <input type="text" name="secondary_categories" id="secondary_categories" placeholder="Comma-separated or leave blank"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                </div>
            </section>

            {{-- 4) Address & Location --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">4. Address & location</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Physical address and business location.</p>
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
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="region" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Region / state</label>
                            <input type="text" name="region" id="region" placeholder="State, province, or region"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">City *</label>
                            <input type="text" name="city" id="city" required placeholder="City or town"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Postal / ZIP code</label>
                            <input type="text" name="postal_code" id="postal_code" placeholder="Postal code"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="street_address" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Street address *</label>
                            <input type="text" name="street_address" id="street_address" required placeholder="Building, street, number"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Location map</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 flex items-center justify-center min-h-[180px] text-slate-500 dark:text-slate-400 text-sm">
                            Map placeholder — integration can be added later
                        </div>
                    </div>
                </div>
            </section>

            {{-- 5) Contact & Online Presence --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">5. Contact & online presence</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Phone, website, and social links.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="phone_primary" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Primary phone *</label>
                            <input type="tel" name="phone_primary" id="phone_primary" required placeholder="+1 234 567 8900"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="phone_secondary" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Secondary phone</label>
                            <input type="tel" name="phone_secondary" id="phone_secondary" placeholder="Optional"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="website" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Website</label>
                        <input type="url" name="website" id="website" placeholder="https://www.example.com"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="linkedin" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">LinkedIn (company)</label>
                            <input type="url" name="linkedin" id="linkedin" placeholder="https://linkedin.com/company/..."
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="other_social" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Other (social / profile)</label>
                            <input type="url" name="other_social" id="other_social" placeholder="Optional URL"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                </div>
            </section>

            {{-- 6) Business Details --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">6. Business details</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Description and company profile.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div>
                        <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Short business description *</label>
                        <textarea name="description" id="description" rows="4" required placeholder="What does your business do? (2–4 sentences)"
                                  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors resize-y"></textarea>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="year_established" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Year established</label>
                            <input type="number" name="year_established" id="year_established" min="1900" max="{{ date('Y') }}" placeholder="e.g. 2015"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="employee_count" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Number of employees</label>
                            <select name="employee_count" id="employee_count"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                                <option value="">Select range</option>
                                <option value="1-10">1–10</option>
                                <option value="11-50">11–50</option>
                                <option value="51-200">51–200</option>
                                <option value="201-500">201–500</option>
                                <option value="500+">500+</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="revenue_range" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Annual revenue range (optional)</label>
                        <select name="revenue_range" id="revenue_range"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                            <option value="">Select range</option>
                            <option value="under_1m">Under 1M</option>
                            <option value="1m_5m">1M – 5M</option>
                            <option value="5m_25m">5M – 25M</option>
                            <option value="25m_100m">25M – 100M</option>
                            <option value="over_100m">Over 100M</option>
                        </select>
                    </div>
                    <div>
                        <label for="certifications" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Certifications (optional)</label>
                        <input type="text" name="certifications" id="certifications" placeholder="e.g. Organic, ISO 9001, Fair Trade"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
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
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Business license / registration certificate</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-8 text-center">
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Drag and drop or click to upload</p>
                            <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">PDF, JPG, PNG — max 10 MB</p>
                            <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" disabled aria-hidden="true">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Tax certificate / VAT registration</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-8 text-center">
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Drag and drop or click to upload</p>
                            <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">PDF, JPG, PNG — max 10 MB</p>
                            <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" disabled aria-hidden="true">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">ID document (authorized signatory)</label>
                        <div class="rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/30 px-4 py-8 text-center">
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Drag and drop or click to upload</p>
                            <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">PDF, JPG, PNG — max 10 MB</p>
                            <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" disabled aria-hidden="true">
                        </div>
                    </div>
                </div>
            </section>

            {{-- 8) Banking & Payment Details --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">8. Banking & payment details</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Bank account and payment preferences.</p>
                </div>
                <div class="p-6 sm:p-8 space-y-5">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="bank_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Bank name</label>
                            <input type="text" name="bank_name" id="bank_name" placeholder="Name of bank"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="account_holder" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account holder name</label>
                            <input type="text" name="account_holder" id="account_holder" placeholder="As on bank account"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="iban" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">IBAN</label>
                            <input type="text" name="iban" id="iban" placeholder="International Bank Account Number"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                        <div>
                            <label for="swift_bic" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">SWIFT / BIC</label>
                            <input type="text" name="swift_bic" id="swift_bic" placeholder="e.g. DEUTDEFF"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="currency" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Preferred settlement currency</label>
                        <select name="currency" id="currency"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 dark:focus:border-emerald-400 transition-colors">
                            <option value="">Select currency</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="PKR">PKR</option>
                            <option value="INR">INR</option>
                            <option value="AED">AED</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Payment methods accepted</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="payment_bank_transfer" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Bank transfer</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="payment_letter_of_credit" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Letter of credit</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="payment_cheque" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Cheque</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="payment_online" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Online / card</span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 9) Agreements & Consent --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="px-6 sm:px-8 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">9. Agreements & consent</h2>
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
                        <input type="checkbox" name="agree_marketing" value="1" class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">I agree to receive product updates and marketing communications (optional).</span>
                    </label>
                    <label class="flex gap-3 cursor-pointer">
                        <input type="checkbox" name="declare_accuracy" value="1" required class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">I declare that the information provided is accurate and complete to the best of my knowledge. *</span>
                    </label>
                </div>
            </section>

            {{-- 10) Final Submit --}}
            <section class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                    <p class="text-sm text-slate-600 dark:text-slate-400">By submitting, you confirm that all details are correct and you accept our terms.</p>
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/30">
                        <span class="text-lg" aria-hidden="true">🏪</span>
                        Submit vendor registration
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
