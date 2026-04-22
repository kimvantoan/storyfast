@extends('layouts.app')

@section('title', '- Submit Manuscript')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <!-- Page Header -->
    <header class="mb-12">
        <h1 class="text-4xl font-headline font-black tracking-tight mb-4 text-on-surface">Submit your manuscript</h1>
        <p class="text-secondary font-body leading-relaxed max-w-2xl">Start your creative journey. Your manuscript will be carefully reviewed by our editorial team before official publication.</p>
    </header>

    <!-- Stepper -->
    <div class="flex items-center gap-4 mb-16 overflow-x-auto no-scrollbar pb-2">
        <div class="flex items-center gap-3 shrink-0">
            <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-headline text-sm font-bold">1</span>
            <span class="text-on-surface font-headline font-bold text-sm">Story Information</span>
        </div>
        <div class="w-12 h-[1px] bg-outline-variant/30"></div>
        <div class="flex items-center gap-3 shrink-0 opacity-40">
            <span class="w-8 h-8 rounded-full bg-surface-container-high text-secondary flex items-center justify-center font-headline text-sm font-bold border border-outline-variant/50">2</span>
            <span class="text-secondary font-headline font-medium text-sm">First Chapter</span>
        </div>
        <div class="w-12 h-[1px] bg-outline-variant/30"></div>
        <div class="flex items-center gap-3 shrink-0 opacity-40">
            <span class="w-8 h-8 rounded-full bg-surface-container-high text-secondary flex items-center justify-center font-headline text-sm font-bold border border-outline-variant/50">3</span>
            <span class="text-secondary font-headline font-medium text-sm">Preview &amp; Submit</span>
        </div>
    </div>

    <!-- Form Section: Step 1 -->
    <form action="{{ route('story.submit.post') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
        @csrf
        
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-700 font-headline font-bold text-sm rounded border border-red-100">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Cover Upload -->
            <div class="md:col-span-4">
                <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-4">Cover Image</label>
                <div id="coverUploadArea" class="aspect-[3/4] bg-surface-container-low border border-dashed border-outline-variant hover:border-primary transition-colors cursor-pointer group relative flex flex-col items-center justify-center p-6 text-center rounded-[6px] overflow-hidden">
                    <input type="file" id="coverImageInput" name="cover_image" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-20" accept="image/*">
                    <img id="coverPreview" src="#" alt="Cover Preview" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                    <div id="coverUploadText" class="flex flex-col items-center relative z-0 pointer-events-none transition-opacity duration-300">
                        <span class="material-symbols-outlined text-4xl text-outline mb-3 group-hover:text-primary transition-colors">upload_file</span>
                        <p class="text-xs font-headline font-medium text-secondary group-hover:text-primary">Drag &amp; drop or click to upload</p>
                        <p class="text-[10px] text-outline mt-2">Ratio 3:4</p>
                    </div>
                </div>
            </div>

            <!-- Basic Info -->
            <div class="md:col-span-8 space-y-8">
                <div>
                    <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-2" for="story-title">Story Title</label>
                    <input name="title" value="{{ old('title') }}" required class="w-full bg-surface-container-lowest border-b border-outline-variant focus:border-primary focus:ring-0 py-3 text-lg font-body placeholder:text-outline/50 transition-all outline-none" id="story-title" placeholder="Enter your story title..." type="text"/>
                </div>
                <div>
                    <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-2" for="story-author">Author Name</label>
                    <input name="author" value="{{ old('author') }}" required class="w-full bg-surface-container-lowest border-b border-outline-variant focus:border-primary focus:ring-0 py-3 text-lg font-body placeholder:text-outline/50 transition-all outline-none" id="story-author" placeholder="Enter author or pen name..." type="text"/>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary" for="story-desc">Summary</label>
                    </div>
                    <textarea name="description" required class="w-full bg-surface-container-lowest border border-outline-variant focus:border-on-surface focus:ring-0 p-4 text-base font-body leading-relaxed placeholder:text-outline/50 transition-all outline-none rounded-[6px]" id="story-desc" placeholder="Introduce your story briefly..." rows="4">{{ old('description') }}</textarea>
                </div>
            </div>
        </section>

        <!-- Categorization -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-3">Main Genre</label>
                <select name="category_id" required class="w-full bg-surface-container-lowest border border-outline-variant focus:border-on-surface p-3 font-body outline-none rounded-[6px]">
                    <option value="">Select genre</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-3">Tags (Keywords)</label>
                <div class="flex flex-wrap gap-2 border border-outline-variant bg-surface-container-lowest p-2 min-h-[48px] rounded-[6px]">
                    <input class="border-none focus:ring-0 bg-transparent text-sm py-1 px-2 font-body w-full outline-none" placeholder="Add tag (Coming soon)..." type="text" disabled/>
                </div>
            </div>
        </section>

        <!-- Options -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6">
            <div>
                <p class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-4">Status</p>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input checked class="hidden peer" id="ongoing" value="ongoing" name="status" type="radio"/>
                        <label class="flex items-center justify-center border border-outline-variant py-3 cursor-pointer rounded-[6px] hover:bg-surface-container-low transition-all text-sm font-medium text-secondary peer-checked:border-primary peer-checked:text-primary" for="ongoing">Ongoing</label>
                    </div>
                    <div class="flex-1">
                        <input class="hidden peer" id="completed" value="completed" name="status" type="radio"/>
                        <label class="flex items-center justify-center border border-outline-variant py-3 cursor-pointer rounded-[6px] hover:bg-surface-container-low transition-all text-sm font-medium text-secondary peer-checked:border-primary peer-checked:text-primary" for="completed">Completed</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="block text-sm font-headline font-bold uppercase tracking-widest text-secondary mb-4">Target Audience</p>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input checked class="hidden peer" id="all" value="all" name="audience" type="radio"/>
                        <label class="flex items-center justify-center border border-outline-variant py-3 cursor-pointer rounded-[6px] hover:bg-surface-container-low transition-all text-sm font-medium text-secondary peer-checked:border-primary peer-checked:text-primary" for="all">All ages</label>
                    </div>
                    <div class="flex-1">
                        <input class="hidden peer" id="mature" value="mature" name="audience" type="radio"/>
                        <label class="flex items-center justify-center border border-outline-variant py-3 cursor-pointer rounded-[6px] hover:bg-surface-container-low transition-all text-sm font-medium text-secondary peer-checked:border-primary peer-checked:text-primary" for="mature">18+ (Restricted)</label>
                    </div>
                </div>
            </div>
        </section>

        <!-- Action Area -->
        <footer class="pt-12 flex justify-end gap-6 border-t border-outline-variant/10">
            <button type="button" class="px-8 py-3 text-sm font-headline font-bold text-secondary hover:text-on-surface transition-colors rounded-[6px]">Save draft</button>
            <button type="submit" class="px-10 py-3 bg-primary text-on-primary font-headline font-bold text-sm tracking-wide transition-transform hover:bg-[#812800] active:scale-[0.98] rounded-[6px]">
                Submit Manuscript
            </button>
        </footer>
    </form>

    <!-- Section: Preview / Step 3 Simulation -->
    <div class="mt-32 pt-24 border-t border-outline-variant/20 opacity-50 relative">
        <div class="absolute inset-0 bg-surface/50 z-20 pointer-events-none"></div>
        <h2 class="text-2xl font-headline font-black mb-8 text-on-surface/40">Preview &amp; Confirm (Sample)</h2>
        <div class="bg-surface-container-low p-8 border border-outline-variant/10 rounded-[6px]">
            <div class="flex flex-col md:flex-row gap-12 items-start mb-12">
                <div class="w-48 shrink-0 bg-surface-variant aspect-[3/4] shadow-xl rounded-[6px] overflow-hidden">
                    <img alt="A cinematic 3:4 book cover mockup with a dark, moody atmosphere and elegant typography for a mystery novel." class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAppt7JlHhLnhfX6ZBGBiBJufhF6FFA0RsklL7z_QjgaSCb6pOiYnUS5jlxCc-joAY3Vv4NiAcpxgmKkR8ILDhu4S_blIq1pxk66RwlFDtY6KEC5HZOboY6FwUjERKiiDNYEe6AVRDgePjEDr8Ao7cEMzSbQuEkqAQRori9KZPyrs9Fi0J9K4U1GsaKY1ytaK0-7QxeY0cH4tTk66rgJhnUcfw6rHE31M4-kCNVq1yEgZAyYLfqxoL_IQDJJzwUVxOrBmGcgGFewRy"/>
                </div>
                <div class="flex-1">
                    <span class="text-primary text-xs font-bold uppercase tracking-widest block mb-2">Modern Fiction</span>
                    <h3 class="text-3xl font-headline font-black mb-4">Melody of the Ghosts</h3>
                    <p class="text-secondary leading-[1.9] mb-6">In the silence of the long night, old manuscripts begin to tell the story of an artist who disappeared long ago...</p>
                    <div class="flex gap-4 text-xs font-headline font-medium text-outline">
                        <span>Chapter 01: The Beginning</span>
                        <span>•</span>
                        <span>Est. 1,240 words</span>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mb-8">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input class="mt-1 rounded border-outline-variant text-primary focus:ring-primary w-5 h-5 pointer-events-none" type="checkbox"/>
                    <span class="text-sm text-secondary font-body leading-relaxed">I declare that this is my own original work, and does not copy or violate the copyright of any other individual or organization.</span>
                </label>
                <label class="flex items-start gap-3 cursor-pointer">
                    <input class="mt-1 rounded border-outline-variant text-primary focus:ring-primary w-5 h-5 pointer-events-none" type="checkbox"/>
                    <span class="text-sm text-secondary font-body leading-relaxed">I agree to the <a class="underline text-on-surface" href="#">Terms of Use</a> and <a class="underline text-on-surface" href="#">Community Guidelines</a> of The Silent Narrative.</span>
                </label>
            </div>
            
            <button class="w-full py-5 bg-on-surface text-surface-bright font-headline font-black text-lg tracking-widest uppercase transition-all rounded-[6px] pointer-events-none">
                Submit for Review
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image Preview Logic
        const coverInput = document.getElementById('coverImageInput');
        const coverPreview = document.getElementById('coverPreview');
        const coverUploadText = document.getElementById('coverUploadText');

        if (coverInput) {
            coverInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    coverPreview.src = URL.createObjectURL(file);
                    coverPreview.classList.remove('hidden');
                    coverUploadText.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    coverPreview.src = '#';
                    coverPreview.classList.add('hidden');
                    coverUploadText.classList.remove('opacity-0', 'pointer-events-none');
                }
            });
        }
    });
</script>
@endsection
