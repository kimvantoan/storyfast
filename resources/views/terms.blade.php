@extends('layouts.app')

@section('title', '- Terms of Service')

@section('content')
<main class="max-w-[800px] mx-auto px-6 py-16 font-body text-[#1c1b1b] dark:text-[#fcf9f8] leading-relaxed">
    <div class="text-center mb-16">
        <h1 class="font-headline font-black text-5xl tracking-tighter mb-4 text-on-surface">Terms of Service</h1>
    </div>

    <article class="space-y-12 text-lg text-secondary">
        <section>
            <p>Welcome to <strong>StoryFast</strong>. By accessing and using our website, you agree to comply with the terms and conditions outlined below. Please read them carefully before using our services.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                1. Introduction
            </h2>
            <p>StoryFast (developed by Kolsup Limited) is an online platform that provides literature, digital reading materials, and a supportive ecosystem for users to discover, read, and share stories. By continuing to use our website, you signify your full acceptance of these Terms of Service.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                2. Scope of Services
            </h2>
            <p class="mb-4">We provide:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>Access to a vast library of digital manuscripts and narrative stories.</li>
                <li>Interactive reading tools, AI-powered personalized recommendations, and categorized discovery.</li>
                <li>A streamlined platform for authors to submit and showcase their creative works.</li>
            </ul>
            <p>StoryFast does not claim universal ownership of all user-published external content unless specifically contracted. Some literary works may be provided or licensed directly by third parties or author partners.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                3. User Accounts
            </h2>
            <p class="mb-4">When using our services or creating an account, you agree to:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>Provide accurate, current, and complete personal information.</li>
                <li>Not use the website for fraudulent purposes, copyright infringement, or any illegal activities.</li>
                <li>Maintain the strictest confidentiality of your account credentials.</li>
            </ul>
            <p class="font-semibold text-on-surface">We passionately reserve the right to temporarily suspend or permanently terminate your access if we detect severe violations of our terms.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                4. Content & Intellectual Property
            </h2>
            <p class="mb-4">All native platform content on StoryFast, heavily including:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>Interface designs, styling aesthetics, wordmark logos, and source codes.</li>
                <li>Generative structures and AI-powered metadata.</li>
            </ul>
            <p class="mb-4">Belongs to the intellectual property of Kolsup Limited or our explicit partners. You may not relentlessly copy, distribute, or reuse our systematic content without prior written permission.</p>
            <p>However, <em>Authors</em> firmly retain the foundational rights to the original fictional or non-fictional text they independently publish on this platform, subject naturally to our publishing and distribution guidelines.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                5. Links & Third-Party Gateways
            </h2>
            <p class="mb-4">Our website may contain external links pointing to third-party platforms. We do not rigorously control and are absolutely not responsible for:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600]">
                <li>The literary or commercial content residing on those websites.</li>
                <li>Their separate Privacy Policies or independent Terms of Use.</li>
            </ul>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                6. Limitation of Liability
            </h2>
            <p class="mb-4">StoryFast strives for excellence but cannot mathematically guarantee:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-[#a53600] mb-4">
                <li>The absolute validity or accuracy of all community-contributed chapters or narratives.</li>
                <li>That the digital service will be entirely uninterrupted or permanently error-free at all hours.</li>
            </ul>
            <p>We are not liable for any digital or physical damages arising directly or indirectly from your continuous use of the website or related author services.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                7. Changes to Terms
            </h2>
            <p>We actively reserve the right to update or surgically modify these Terms of Service at any time without prior individual notice. New versions will automatically take full legal effect immediately upon being posted globally on the website.</p>
        </section>

        <section class="bg-stone-50 p-8 rounded-xl border border-stone-200 mt-12">
            <h2 class="font-headline font-bold text-xl text-on-surface mb-2">
                8. Governing Law & Contact
            </h2>
            <p class="text-sm mb-4">These overarching terms are governed by and elegantly construed in accordance with the applicable international intellectual property laws. If you have any inquiries regarding these parameters, please contact:</p>
            <div class="text-xl font-bold font-headline text-[#a53600] mb-6">
                Hotline: (+852) 5170 7620
            </div>
            <p class="text-xs font-medium text-stone-500 uppercase tracking-widest border-t border-stone-200 pt-4">
                Continuing to read on StoryFast signifies that you have digested, understood, and agreed to this Agreement.
            </p>
        </section>
    </article>
</main>
@endsection
