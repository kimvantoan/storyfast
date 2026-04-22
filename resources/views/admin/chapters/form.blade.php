@extends('layouts.admin')

@section('title', isset($chapter) ? 'Edit Chapter' : 'Write Chapter')

@section('content')
<div class="max-w-[1000px] mx-auto w-full">
    <!-- Header -->
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.chapters.index', $story) }}" class="p-2 text-stone-400 hover:text-stone-800 transition-colors bg-white shadow-sm border border-stone-200 rounded-full hover:bg-stone-50 flex items-center">
            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
        </a>
        <div>
            <p class="text-xs font-headline font-bold text-stone-400 uppercase tracking-widest">{{ $story->title }}</p>
            <h1 class="font-headline font-black text-3xl tracking-tighter text-on-surface">{{ isset($chapter) ? 'Edit Chapter' : 'Write New Chapter' }}</h1>
        </div>
        <div class="ml-auto flex items-center gap-3">
            <p id="wordCount" class="text-xs font-bold text-stone-400 font-headline uppercase tracking-widest hidden md:block mr-2">0 Words</p>
            <button form="chapterForm" type="submit" name="status" value="draft" class="px-6 py-2.5 rounded shadow-sm font-headline font-bold text-sm bg-white border border-stone-200 text-stone-600 hover:border-stone-300 transition-all">Save Draft</button>
            <button form="chapterForm" type="submit" name="status" value="published" class="btn-glow text-white px-8 py-2.5 rounded shadow-sm font-headline font-bold text-sm transition-all hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">publish</span>
                Publish
            </button>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 text-red-700 font-headline font-bold text-sm rounded border border-red-100">
        <ul class="list-disc pl-4 space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Zen Mode Form -->
    <form id="chapterForm" action="{{ isset($chapter) ? route('admin.chapters.update', $chapter) : route('admin.chapters.store', $story) }}" method="POST" class="bg-white rounded-xl shadow-sm border border-stone-100 overflow-hidden flex flex-col min-h-[70vh]">
        @csrf
        @if(isset($chapter))
        @method('PUT')
        @endif

        <div class="p-8 border-b border-stone-100 flex flex-col md:flex-row gap-6 shrink-0 bg-stone-50/30">
            <div class="flex-1">
                <label class="block font-headline text-xs uppercase tracking-widest font-bold text-stone-500 mb-2">Chapter Title</label>
                <input type="text" name="title" value="{{ old('title', $chapter->title ?? '') }}" placeholder="E.g. Chapter 1: The Awakening..." required class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-lg font-headline font-bold outline-none placeholder:font-normal placeholder:text-stone-300 shadow-sm transition-shadow">
            </div>
            <div class="w-full md:w-32">
                <label class="block font-headline text-xs uppercase tracking-widest font-bold text-stone-500 mb-2">Order Index</label>
                <input type="number" name="order_index" value="{{ old('order_index', $chapter->order_index ?? '') }}" placeholder="Auto" class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body outline-none shadow-sm transition-shadow">
            </div>
        </div>

        <div class="flex-1 flex flex-col bg-white">
            <textarea id="chapterEditor" name="content" class="flex-1 w-full border-none focus:ring-0 resize-none font-body text-lg text-stone-800 leading-relaxed outline-none p-0">{{ old('content', $chapter->content ?? '') }}</textarea>
        </div>
    </form>
</div>

<!-- TinyMCE Open Source via CDNJS (Free, No API Key, No Limits) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#chapterEditor',
            height: 600,
            menubar: false,
            statusbar: false,
            skin: 'oxide',
            content_css: 'default',
            plugins: [
                'autoresize', 'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | ' +
                'bold italic underline strikethrough | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | fullscreen',
            content_style: `
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
                body { 
                    font-family: 'Lora', serif; 
                    font-size: 18px; 
                    line-height: 1.8; 
                    color: #333; 
                    padding: 0.5rem !important; 
                    max-width: 800px; 
                    margin: 0 auto; 
                }
                p { margin-bottom: 1.5em; }
            `,
            setup: function(editor) {
                editor.on('keyup change', function() {
                    const count = editor.plugins.wordcount.body.getWordCount();
                    document.getElementById('wordCount').innerText = count + ' Words';
                });
                editor.on('init', function() {
                    const count = editor.plugins.wordcount.body.getWordCount();
                    document.getElementById('wordCount').innerText = count + ' Words';
                });
            }
        });
    });
</script>

<style>
    /* Clean up TinyMCE's default borders to fit our zen mode */
    .tox-tinymce {
        border: none !important;
        border-radius: 0 !important;
    }

    .tox .tox-toolbar__primary {
        background-color: #fcf9f8 !important;
        border-bottom: 1px solid #f5f5f4 !important;
    }

    .tox-editor-header {
        box-shadow: none !important;
    }
</style>
@endsection