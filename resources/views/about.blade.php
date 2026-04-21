@extends('layouts.app')

@section('title', '- About Us')

@section('content')
<main class="max-w-[800px] mx-auto px-6 py-16 font-body text-[#1c1b1b] dark:text-[#fcf9f8] leading-relaxed">
    <div class="text-center mb-16">
        <h1 class="font-headline font-black text-5xl tracking-tighter mb-4 text-on-surface">About StoryFast</h1>
        <p class="text-secondary text-lg">A next-generation digital reading platform by Kolsup Limited.</p>
    </div>

    <article class="space-y-12 text-lg text-secondary">
        <section>
            <p><strong>StoryFast</strong> is a premier online reading platform developed by <strong>Kolsup Limited</strong>, with the core objective of allowing users to discover, read, and share stories quickly, seamlessly, and interactively.</p>
            <p class="mt-4">We focus on building a smart literary ecosystem where you can dive into captivating narratives from around the world in just a few clicks—from finding the perfect fictional world to connecting with incredible authors.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                Our Mission
            </h2>
            <p class="mb-4">StoryFast was born with a simple desire:</p>
            <ul class="list-disc pl-6 space-y-2 marker:text-primary">
                <li>Simplify the reading and publishing experience.</li>
                <li>Provide a vast, accessible library of high-quality stories.</li>
                <li>Utilize advanced technology and AI to personalize reading recommendations for every individual.</li>
            </ul>
            <p class="mt-4">We believe that accessing a great story shouldn't be complicated—and technology is the key to unlocking endless narratives.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                What StoryFast Offers?
            </h2>
            
            <div class="space-y-6">
                <div>
                    <h3 class="font-bold text-on-surface">Discover & Dive In</h3>
                    <p class="mt-1">Users can quickly find stories by genres, authors, and recommendations, diving straight into fast and seamless reading formats.</p>
                </div>
                <div>
                    <h3 class="font-bold text-on-surface">Smart Recommendations (AI)</h3>
                    <p class="mt-1">We are enhancing our platform with personalized reading lists, AI-driven suggestions based on your history, and curated collections for any mood.</p>
                </div>
                <div>
                    <h3 class="font-bold text-on-surface">Premium Reading Experience</h3>
                    <p class="mt-1">Enjoy beautiful, distraction-free reading interfaces and diverse narrative choices without any hidden hassles.</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                Our Commitment
            </h2>
            <ul class="list-disc pl-6 space-y-2 marker:text-primary mb-4">
                <li>Clear, readable, and transparent content structure.</li>
                <li>Collaboration with talented and reputable authors worldwide.</li>
                <li>Always placing the reader's experience at the center of everything we do.</li>
            </ul>
            <p>Recognizing that every great platform needs time to cultivate trust and a vibrant community, StoryFast focuses on sustainable growth. We are refining our product day by day to deliver genuine value to readers and writers alike.</p>
        </section>

        <section class="bg-surface-container-low p-8 rounded-xl border border-stone-200 flex flex-col md:flex-row gap-8 shadow-sm">
            <div class="flex-1">
                <h2 class="font-headline font-bold text-xl text-on-surface mb-4">
                    Company Info
                </h2>
                <ul class="space-y-2 text-sm text-secondary">
                    <li><strong class="text-on-surface">Legal Name:</strong> Kolsup Limited</li>
                    <li><strong class="text-on-surface">Tax Code:</strong> 0110704552 (Issued on 04/05/2024)</li>
                    <li><strong class="text-on-surface">Address:</strong> 398 Kwun Tong Road, Kwun Tong, Hong Kong</li>
                </ul>
            </div>
            <div class="flex-1">
                <h2 class="font-headline font-bold text-xl text-on-surface mb-4">
                    Contact
                </h2>
                <p class="text-sm mb-2">If you need assistance or support with your reading journey:</p>
                <div class="text-xl font-bold font-headline text-primary">
                    Hotline: (+852) 5170 7620
                </div>
            </div>
        </section>

        <section class="text-center pt-8 border-t border-stone-200">
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-4">
                Vision
            </h2>
            <p class="mb-6">In the future, StoryFast aims to become the premier AI-integrated reading platform, empowering users not just to "read" but to experience storytelling in a profoundly smarter way.</p>
            <p class="font-bold text-on-surface italic px-8 py-4 bg-stone-50 rounded-lg">"StoryFast is more than just a reading website — it's your key to exploring infinite worlds in the quickest and most optimal way possible."</p>
        </section>
    </article>
</main>
@endsection
