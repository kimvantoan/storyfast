@extends('layouts.app')

@section('title', '- Disclaimer')

@section('content')
<main class="max-w-[800px] mx-auto px-6 py-16 font-body text-[#1c1b1b] dark:text-[#fcf9f8] leading-relaxed">
    <div class="text-center mb-16">
        <h1 class="font-headline font-black text-5xl tracking-tighter mb-4 text-on-surface">Disclaimer</h1>
    </div>

    <article class="space-y-12 text-lg text-secondary">
        <section>
            <p>Welcome to <strong>OnlineFreeNovels</strong>, proudly operated by <strong>Kolsup Limited</strong>. All information provided on this website is strictly for general informational and entertainment purposes only.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                Accuracy of Information
            </h2>
            <p class="mb-4">While we continuously strive to keep the literature and platform information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability with respect to the website or the information, stories, products, or related services contained on the website.</p>
            <p>Any reliance you place on such fictional or non-fictional information is therefore strictly and entirely at your own risk. Conditions like story updates, chapter availability, and platform features may frequently change after an article or manuscript has been published.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                Limitation of Liability
            </h2>
            <p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the continuous use of this digital reading platform.</p>
        </section>

        <section>
            <h2 class="font-headline font-bold text-2xl text-on-surface mb-3">
                External Links
            </h2>
            <p class="mb-4">Through this website, you are able to link to other external websites which are not under the control of <strong>Kolsup Limited</strong>. We have no control over the nature, content, and availability of those sites.</p>
            <p>The inclusion of any third-party links does not necessarily imply a recommendation or endorse the views expressed within them.</p>
        </section>
    </article>
</main>
@endsection
