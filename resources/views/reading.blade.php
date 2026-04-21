@extends('layouts.app', ['hideHeaderFooter' => true])

@section('title', '- Chapter 12: Whisper of the Wind')

@section('main_class', 'min-h-screen pt-32 pb-48 flex flex-col items-center')

@section('content')
<!-- Reading View Header -->
<header class="reading-header fixed top-0 left-0 right-0 h-12 bg-white/80 backdrop-blur-xl z-50 flex items-center justify-between px-6 opacity-0 -translate-y-full header-transition border-none shadow-sm hover:opacity-100 hover:translate-y-0 group">
    <div class="flex items-center gap-3">
        <span class="text-primary font-black tracking-tighter text-sm uppercase"><a href="{{ url('/') }}">The Silent Narrative</a></span>
        <span class="w-px h-3 bg-outline-variant/30"></span>
        <div class="flex items-center gap-2 font-headline text-[13px] font-medium text-secondary truncate max-w-[200px] md:max-w-none">
            <a class="hover:text-on-surface cursor-pointer" href="{{ url('/story') }}">Summer Symphony</a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="text-on-surface font-semibold">Chapter 12</span>
        </div>
    </div>
    <div class="flex items-center gap-6">
        <button class="flex items-center gap-2 text-secondary hover:text-primary transition-colors text-[13px] font-headline font-medium">
            <span class="material-symbols-outlined text-[18px]">settings</span>
            <span class="hidden md:inline">Settings</span>
        </button>
        <button class="flex items-center gap-2 text-secondary hover:text-primary transition-colors text-[13px] font-headline font-medium">
            <span class="material-symbols-outlined text-[18px]">format_list_bulleted</span>
            <span class="hidden md:inline">Chapters</span>
        </button>
        <button class="flex items-center gap-2 text-secondary hover:text-error transition-colors text-[13px] font-headline font-medium">
            <span class="material-symbols-outlined text-[18px]">report</span>
            <span class="hidden md:inline">Report</span>
        </button>
    </div>
</header>

<article class="w-full max-w-[680px] px-6 relative z-10">
    <!-- Chapter Metadata -->
    <header class="mb-16">
        <h2 class="font-headline text-primary text-xs font-bold tracking-[0.2em] uppercase mb-4">Chapter 12</h2>
        <h1 class="font-serif text-[42px] leading-[1.2] font-medium text-on-surface mb-8 tracking-tight">Whisper of the Wind Among the Clouds</h1>
        <div class="flex items-center gap-4 text-secondary font-headline text-sm">
            <span>12 min read</span>
            <span class="w-1 h-1 rounded-full bg-outline-variant"></span>
            <span>1,420 words</span>
        </div>
    </header>

    <!-- Chapter Content -->
    <div class="font-serif text-[17px] leading-[1.9] text-[#222] space-y-8 text-justify antialiased">
        <p>
            Ánh nắng buổi chiều tà rải nhẹ lên những rặng thông già, tạo nên những vệt sáng dài loang lổ trên mặt đất. Không gian tĩnh mịch của khu rừng chỉ thỉnh thoảng bị phá vỡ bởi tiếng lá khô xào xạc dưới chân. Minh dừng lại, hít một hơi thật sâu cái không khí trong lành mang theo mùi nhựa thông nồng nàn. Anh cảm nhận được nhịp tim mình đang dần ổn định lại sau chuyến hành trình dài.
        </p>
        <p>
            Dưới chân đồi, ngôi làng nhỏ nằm im lìm trong làn khói bếp mờ ảo. Những mái ngói rêu phong xen lẫn giữa màu xanh của cây cối, trông xa như một bức tranh thủy mặc được vẽ bởi một nghệ nhân tài ba. Đó là nơi anh đã sinh ra và lớn lên, nơi lưu giữ những ký ức tuổi thơ tươi đẹp nhưng cũng đầy những nỗi niềm khó tả.
        </p>
        <div class="py-12 flex justify-center">
            <div class="w-16 h-px bg-outline-variant/40"></div>
        </div>
        <p>
            Anh nhớ lại lời kể của bà nội về những thanh âm của gió. Bà nói rằng, nếu ai có tâm hồn đủ tĩnh lặng, họ có thể nghe thấy những câu chuyện mà gió mang về từ những miền đất xa xôi. Lúc ấy anh chỉ cười, cho đó là những câu chuyện cổ tích để dỗ dành trẻ nhỏ. Nhưng giờ đây, đứng giữa đại ngàn bao la, anh chợt nhận ra mình đang lắng nghe một điều gì đó thật lạ lùng.
        </p>
        <p>
            Cơn gió luồn qua các kẽ lá, tạo thành một bản nhạc du dương, trầm bổng. Nó không đơn thuần là âm thanh vật lý, mà dường như là tiếng vọng của quá khứ, là lời thì thầm của những người đã khuất, hay có lẽ là lời mời gọi của tương lai đang chờ đón phía trước. Minh nhắm mắt lại, để mặc cho cảm xúc trôi đi theo từng làn gió.
        </p>
        <p>
            "Cậu đã về rồi sao?" Một giọng nói trầm thấp vang lên phía sau lưng khiến Minh giật mình. Anh quay lại và thấy một bóng dáng quen thuộc đang đứng dưới gốc cây cổ thụ. Đó là ông già gác rừng, người duy nhất còn bám trụ lại nơi đây khi hầu hết thanh niên trong làng đã rời đi tìm kiếm cơ hội ở thành phố.
        </p>
        <p>
            Minh gật đầu, nở một nụ cười nhẹ: "Vâng, cháu đã về. Cuối cùng thì nơi đây vẫn là nơi yên bình nhất, ông ạ." Ông già nhìn anh bằng đôi mắt đục mờ nhưng chứa đựng sự thấu hiểu sâu sắc, khẽ gật đầu rồi chậm rãi bước đi, để lại Minh với bầu không khí tịch liêu của hoàng hôn đang dần buông xuống.
        </p>
    </div>

    <!-- Navigation Shell -->
    <nav class="mt-32 pt-16 border-t border-outline-variant/15">
        <div class="grid grid-cols-3 gap-4 font-headline text-sm font-medium">
            <a class="flex flex-col items-start gap-2 p-6 rounded-[6px] bg-surface-container-low hover:bg-surface-container-high transition-all group border border-transparent" href="#">
                <span class="text-secondary text-[11px] uppercase tracking-widest">Previous</span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1">11: The Ancient Curse</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-2 p-6 rounded-[6px] bg-surface-container-low hover:bg-surface-container-high transition-all text-secondary hover:text-on-surface border border-transparent" href="{{ url('/story') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span class="text-[11px] uppercase tracking-widest text-center">Chapter List</span>
            </a>
            <a class="flex flex-col items-end gap-2 p-6 rounded-[6px] bg-surface-container-low hover:bg-surface-container-high transition-all text-right group border border-transparent" href="#">
                <span class="text-secondary text-[11px] uppercase tracking-widest">Next</span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1">13: Sunrise on the Peak</span>
            </a>
        </div>
    </nav>
</article>

<!-- Settings Overlay (Simulation) -->
<div class="fixed right-8 bottom-8 z-[60] flex flex-col items-end gap-4 group">
    <div class="bg-white rounded-[12px] shadow-2xl w-72 p-6 font-headline transform scale-95 opacity-0 pointer-events-none group-hover:scale-100 group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 border border-outline-variant/10">
        <h3 class="text-xs font-bold text-secondary uppercase tracking-[0.1em] mb-6">Reading Settings</h3>
        <div class="space-y-6">
            <!-- Font Size -->
            <div class="space-y-3">
                <div class="flex justify-between text-[11px] font-bold text-secondary uppercase">
                    <span>Font size</span>
                    <span>17px</span>
                </div>
                <!-- Standard range style using tailwind since pure tailwind range input needs some work or use default -->
                <input class="w-full accent-primary h-1 bg-surface-container-high rounded-full appearance-none outline-none" type="range"/>
            </div>
            <!-- Font Family -->
            <div class="space-y-3">
                <span class="text-[11px] font-bold text-secondary uppercase">Font family</span>
                <div class="grid grid-cols-2 gap-2">
                    <button class="py-2 text-[13px] rounded-[6px] border-2 border-primary bg-primary-fixed text-on-primary-fixed font-serif">Serif</button>
                    <button class="py-2 text-[13px] rounded-[6px] border border-outline-variant/30 text-secondary font-headline bg-surface-container-low">Sans</button>
                </div>
            </div>
            <!-- Background -->
            <div class="space-y-3">
                <span class="text-[11px] font-bold text-secondary uppercase">Background color</span>
                <div class="flex gap-3">
                    <button class="w-8 h-8 rounded-full bg-white border border-outline-variant ring-2 ring-primary ring-offset-2"></button>
                    <button class="w-8 h-8 rounded-full bg-[#f4ecd8] border border-outline-variant cursor-pointer"></button>
                    <button class="w-8 h-8 rounded-full bg-[#1c1b1b] border border-[#333] cursor-pointer"></button>
                </div>
            </div>
        </div>
    </div>
    <button class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-lg hover:bg-[#812800] transition-colors peer cursor-pointer">
        <span class="material-symbols-outlined">tune</span>
        <!-- Tooltip simulation -->
        <span class="absolute right-14 bg-on-surface text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">Customize Reading</span>
    </button>
</div>
@endsection

@section('custom_footer')
<!-- Minimal Footer -->
<footer class="bg-surface-container-low py-24 px-6 mt-12 w-full">
    <div class="max-w-[680px] mx-auto flex flex-col items-center gap-8 text-center">
        <span class="text-on-surface font-black text-xl tracking-tighter">The Silent Narrative</span>
        <p class="font-body text-secondary text-sm leading-relaxed max-w-sm">
            We believe each story is a private journey. Thank you for choosing to experience it with us.
        </p>
        <div class="flex gap-8 text-[11px] font-headline font-bold text-secondary uppercase tracking-widest">
            <a class="hover:text-primary transition-colors" href="#">About Author</a>
            <a class="hover:text-primary transition-colors" href="#">Support</a>
            <a class="hover:text-primary transition-colors" href="#">Comments (128)</a>
        </div>
        <div class="text-[11px] text-outline-variant mt-8">
            © 2024 The Silent Narrative. Crafted for the digital manuscript.
        </div>
    </div>
</footer>
@endsection
