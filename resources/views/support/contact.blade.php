@extends('layouts.app')

@section('title', 'Contact Support')
@section('page-title', 'Contact Support')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Contact Support</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Get in touch with our support team</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Contact Form --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Send us a Message</h3>
            <form class="space-y-4">
                <div>
                    <label for="contact_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Your Name <span class="text-red-500">*</span></label>
                    <input type="text" id="contact_name" required class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" id="contact_email" required class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="contact_subject" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Subject <span class="text-red-500">*</span></label>
                    <input type="text" id="contact_subject" required class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="contact_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                    <select id="contact_category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select category</option>
                        <option value="technical">Technical Support</option>
                        <option value="billing">Billing Inquiry</option>
                        <option value="feature">Feature Request</option>
                        <option value="general">General Inquiry</option>
                    </select>
                </div>
                <div>
                    <label for="contact_message" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Message <span class="text-red-500">*</span></label>
                    <textarea id="contact_message" required rows="5" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none"></textarea>
                </div>
                <button type="submit" class="w-full px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Send Message</button>
            </form>
        </div>

        {{-- Contact Information --}}
        <div class="space-y-6">
            {{-- Support Hours --}}
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Support Hours</h3>
                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                    <div class="flex justify-between">
                        <span>Monday - Friday</span>
                        <span class="font-medium text-slate-900 dark:text-white">9:00 AM - 6:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Saturday</span>
                        <span class="font-medium text-slate-900 dark:text-white">10:00 AM - 4:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Sunday</span>
                        <span class="font-medium text-slate-900 dark:text-white">Closed</span>
                    </div>
                </div>
            </div>

            {{-- Contact Methods --}}
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Other Ways to Reach Us</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="text-xl">📧</span>
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Email</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">support@agristack.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-xl">📞</span>
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Phone</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-xl">💬</span>
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Live Chat</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Available during support hours</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('app.support.raise-ticket') }}" class="block w-full px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors text-center">Create Support Ticket</a>
                    <a href="{{ route('app.support.faqs') }}" class="block w-full px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">View FAQs</a>
                    <a href="{{ route('app.support.ticket-history') }}" class="block w-full px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">My Tickets</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
