@extends('layouts.app')

@section('title', '- Privacy Policy')

@section('content')
<main class="max-w-[800px] mx-auto px-6 py-16 font-body text-[#1c1b1b] dark:text-[#fcf9f8] leading-relaxed">
    <div class="text-center mb-16">
        <h1 class="font-headline font-black text-5xl tracking-tighter mb-4 text-on-surface">Privacy Policy</h1>
    </div>

    <article class="space-y-12 text-lg text-secondary">
        <section>
            <p><strong>StoryFast</strong> (developed by Kolsup Limited) is committed to protecting the privacy and personal information of our users when accessing and using our digital reading platform. This policy explains how we collect, use, and safeguard your information.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                1. Information We Collect
            </h2>
            <p class="mb-4">We may collect the following types of information when you interact with StoryFast:</p>
            <div class="space-y-4">
                <div class="bg-surface-container-low p-6 rounded-lg border border-stone-100">
                    <h3 class="font-bold text-on-surface mb-2">Personal Information</h3>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Full name</li>
                        <li>Email address</li>
                        <li>Profile information (avatar, reading preferences)</li>
                    </ul>
                </div>
                <div class="bg-surface-container-low p-6 rounded-lg border border-stone-100">
                    <h3 class="font-bold text-on-surface mb-2">Technical Information</h3>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>IP address</li>
                        <li>Browser type & device information</li>
                        <li>Behavioral data (cookies, reading history, session logs)</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                2. Purpose of Using Information
            </h2>
            <p class="mb-4">Your information is utilized to to ensure the best possible experience:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600]">
                <li>Provide, operate, and continuously improve our reading services.</li>
                <li>Process requests and personalize content recommendations.</li>
                <li>Contact you for customer support or administrative notices.</li>
                <li>Send promotional information and literary updates (if you opt in).</li>
                <li>Analyze and optimize user experience across the platform.</li>
            </ul>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                3. Information Sharing
            </h2>
            <p class="mb-4">StoryFast may share your information only in specific circumstances:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>With trusted service providers (e.g., authentication services like Google Login) to facilitate platform functions.</li>
                <li>When formally requested by competent authorities under applicable law.</li>
                <li>When strictly necessary to protect our legitimate rights and property.</li>
            </ul>
            <p class="font-medium text-on-surface">We do not sell or exchange your personal data to third parties for commercial gain.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                4. Information Security
            </h2>
            <p class="mb-4">We implement appropriate security measures to:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>Prevent unauthorized access to your account.</li>
                <li>Protect reading data and credentials from loss or leakage.</li>
                <li>Ensure safety during data transmission via SSL encryption.</li>
            </ul>
            <p class="italic">However, please note that no system can guarantee absolute security on the Internet.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                5. Cookies & Tracking Technologies
            </h2>
            <p class="mb-4">StoryFast uses cookies to:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>Remember your reading preferences (e.g., font sizes, dark mode).</li>
                <li>Analyze traffic behavior to improve page load speeds.</li>
                <li>Enhance overall website performance.</li>
            </ul>
            <p>You can choose to disable cookies in your browser settings; however, certain interactive features of our platform might become limited.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                6. User Rights
            </h2>
            <p class="mb-4">As a reader and user of StoryFast, you have the right to:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600]">
                <li>Request access to, modify, or permanently delete your personal information.</li>
                <li>Decline receiving marketing emails or newsletters.</li>
                <li>Request restricted data processing in certain applicable cases.</li>
            </ul>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                7. Data Retention & Policy Changes
            </h2>
            <p class="mb-4">Personal information will be stored only for the time necessary to serve the purposes stated above, or as strictly required by law.</p>
            <p>We reserve the right to update this Privacy Policy at any time. Any new revisions will be posted directly on this website and will take effect immediately upon publication.</p>
        </section>

        <section class="bg-stone-50 p-8 rounded-xl border border-stone-200 mt-12">
            <h2 class="font-headline font-bold text-xl text-on-surface mb-2">
                8. Contact Us
            </h2>
            <p class="text-sm mb-4">If you have any questions regarding this Privacy Policy or your data, please contact:</p>
            <div class="text-xl font-bold font-headline text-[#a53600] mb-6">
                Hotline: (+852) 5170 7620
            </div>
            <p class="text-xs font-medium text-stone-500 uppercase tracking-widest border-t border-stone-200 pt-4">
                Continuing to use StoryFast signals that you have read, understood, and agreed to this Privacy Policy.
            </p>
        </section>
    </article>
</main>
@endsection
