<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryStorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Xuanhuan', 'slug' => 'xuanhuan', 'description' => 'Mystical fantasy eastern stories'],
            ['name' => 'Cultivation', 'slug' => 'cultivation', 'description' => 'Focuses on cultivating qi and becoming immortal'],
            ['name' => 'System', 'slug' => 'system', 'description' => 'Protagonist gains a game-like system'],
            ['name' => 'Romance', 'slug' => 'romance', 'description' => 'Focuses on romantic relationships'],
            ['name' => 'Fantasy', 'slug' => 'fantasy', 'description' => 'Western or general fantasy'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        $catModels = Category::all();

        $stories = [
            ['title' => 'Kiếm Đạo Độc Tôn', 'author' => 'Kiếm Du Thái Hư', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAwrF-6G2df7Xl9v-rNK2m0ONp7P5wY3DE66iDylosE40h7-v9leSk9SyP2iG51vA2eAYdN1IGuS4wzUdlSoKjGCclgo-QNS5DNtqV9fHk-kn-EI-9a7OBqR9Tv6GmXMlXM5TYeuV_Mvm8RBtHXvExF0u-c01U_u21A4qtMBA4mi96aYw9C1XmYl05nyunFYlWL2TEPFezwYc_yyH7plhQpdVV6IEQZhFmXpdd990Ng3M12C0_ZR9JZ-Khh93QU_NubPbWAmZFL_nqi'],
            ['title' => 'Phàm Nhân Tu Tiên', 'author' => 'Vong Ngữ', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBRut2MXYwySCARaimTkp3p1glzZQhXw1o3XEKY0Yg8kMQzLPu2Qb1vRfug6PDcBosucNR7dqron5OFjMwKc5OzG58QC9GYdpbpCn9_HlDryobXmZif2QlO4OrqwNJqqHWGOiIbVBMfSIa5n6slFvaTImEDm0gNi9yAlu2xkHr0q-qwrW9XSGlLtlrbMcgrH06I8oLqXqP2q80250JgNYnalzrrtKFlLo6PumvAqXbhBGrLkLwmy-hNeqbQW4QdRUd7yOA39HJr_GtH'],
            ['title' => 'Tiên Nghịch', 'author' => 'Nhĩ Căn', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC16YjiImi--AXmaYK0r2oiwe1LUoI-VwnPjxMdhs_rB7z1Ci6WDwcE3JL5U0hbhRiZtsyByxLhbw-IPcxF0cCbI9YT66-qRpiI8VIK5cyotcKzsKFd56QXD-KLtlS5B3oH4cV70eJbx4l7P8SSm-jyyrEX2MS3p0DJug3MY7csSVobFBrzEiR12L2Bbe61GokQ8kJIXXhhnCRYbVwoxnHjl8iRKr7gx9LAF7kquq6P8brS_L_jWuBT271Svr5ZKOYOa1czdfGk6RUU'],
            ['title' => 'Thần Khống Thiên Hạ', 'author' => 'Ngã Ăn Tây Hồng Thị', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCJaw9zsW1eOFUpWNxiqwvt7i5nS3zi1dCOwwDUoeUb8TFTIu3RomaPtyyehLLzflika2htGUwoU6zWiiRHRZJdFW5Y72Tgv-V_byTZGPfDgu4CfYzJ5XFKsMQGrX1EB1BMzQVyvFORfdqyzTFYWRfRDUfadLjHLmsG1GEJx3h0mvT1k0f3kzbk82b2bvsIEHx6zrZOD3sHZhyag8CkD8oB2kW7Fp_P3NhQh1Nis4ubsuPtPh2tQoQKxo709xM3w32oa377lZ1D1Uqg'],
            ['title' => 'Vũ Động Càn Khôn', 'author' => 'Thiên Tằm Thổ Đậu', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCQgp0Nr_OScQQTnckrW7dFpj06CZVLIRS1qTR8-eFYwY1tQXGdLJW7C3zNyh6TlAWucOb5Gzajo8Salqv04fTH8bjGSjosXorNLVNusXKySQ0gsJupnHOEf8Di8NhEn1CzX0bUV6Nst6UHWncofaekltAjZRFWA9_qz3rBP4quG6sLQu_o-FejWB9-OaPOyTdre_Z8yWoRXAdOPAhGUUBD9N4qIOlMlGFHWQ3DnnYZL1nqeSHIl7SGMsfiU0U-nQAFUu557w8v5cOZ'],
            ['title' => 'Đấu La Đại Lục', 'author' => 'Đường Gia Tam Thiếu', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCxUAwmS5r4R8-tbH5eJPeODyj1x1EpqCzBe8KOt926KKwEnIZZ4GVIlHJ65vPapi7uPHfdORkv0nRjhdCo425taqBU6bRvQUx7hp8K6bMZ1dRf_tmec8h675byjkqMFAH8l0vD8cLjHdQ9l8E3NqwEXZcqCOX26FxiBv5sxEEyFDlJrPewFm-CoeCjXmo9ocus7cbI0j3JAxlozoTe5_PAnSrSXa--sX0aw7wCbJNhBffRmX20Z9no2K4_3m3nHiCN_PIxx8aVYxx4'],
            ['title' => 'Tuyệt Thế Đường Môn', 'author' => 'Đường Gia Tam Thiếu', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCs8XI5oAS3ertUIbGIdVRBMPim9nAyEQzklFWlY7HHue49xB60GV8pNMo6Z-uJVyZQ2fw34ZxNebqCTNGqhRjeMeC8ITqhDfgyy9pAyQJvRGncKI3xQO1I8sLDgh7CaYU2p79IHZJRGUkrhqQKhzG8fK8lChbBUAOXuT9K3-aMMl7erItzkm5Inp0mcHVLWBWnZjiwA1G9AtuMAiB3zU711VsvEg4n-Fj2Fm3YiijKwNIv8Kig6ZHGGj9Iu8DeHvjg2tGw5cFztx91'],
            ['title' => 'Linh Vũ Thiên Hạ', 'author' => 'Vũ Phong', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD0sQBb5hF6ZqAGW3dji5qV8hqeSzluf27yenjdysTFmrmmxer90eAUcDHc_mUtnZuZel3p1lNvIfDH6tp0H-pgNWpCDnlQFoKJyug4O8R3exFfopbbAFWIaefNzX2fQuImU5WS8KhL39furx9AALLoP0tj6YglJIjVZAWUkDPcGeS-yPWDM6AnxdGRHcuc4fuPXJqzG9z-6QZSdMmg1jpAQ5vB1JxzvoG-1LYufYJCEiQJ5TXCN3RtNc7c4nKXtZ3ZwDDBY1wU5Prr'],
            ['title' => 'Huyền Giới Chi Môn', 'author' => 'Vong Ngữ', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCh1-gtfhtByJr5O55SAgOQTJ0kC0aVK-cz-8-vM0I_XmcWFnaZNzV-T3QBlIAun_pSn0a_aKcQeQZ8rSD5mXYrjygRJXzjB0f78Y1-wBYuthkfJyALdbFtZrwu0s-Cg2U24L5zxyS3tePPCBJDzX7H4pE3IGGVZQ8_8ZfJUZDuPyR0vUN6wpExh3Bfezj8r1Nt5iwCfa3ZY35KGpWQt29-1PBSSWFbDjgvYwPMI8eWXbDtyKQHW7eoYoaRe345mNb64w4RDmz1zgxw'],
            ['title' => 'Đại Chúa Tể', 'author' => 'Thiên Tằm Thổ Đậu', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAIqFF5l07nOLsZ1q8C5NJyWxzrflHjXv3q4kPRWkpiTp2CX1IdQ0qJpJASA_PcaFbLlDVjAzKlfcFoPOoJxyvNptzF2vLsjyquFlgZBpk0ERK7r_JLGwNWQ-yghYwuhvoKEqg6liMHxh781lmy_xwlNyxyCgdM_c2itzk4QJSim3OfK8w-pVmjlB7cV9gAfTg1PA-KUrb1wC-h4Tht67ycetGkWwnqyk5NFvzKZO0xIhVxYmg_etWVZAlj7NEelxa6620E97-cHWPA'],
        ];

        for ($i = 0; $i < 30; $i++) {
            $base = $stories[$i % count($stories)];
            $title = $base['title'] . ($i >= count($stories) ? ' Part ' . floor($i/count($stories) + 1) : '');
            
            $statusOptions = ['ongoing', 'completed', 'dropped'];
            
            $story = Story::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'author' => $base['author'],
                    'cover_image' => $base['img'],
                    'description' => 'A wonderful story about ' . $title,
                    'status' => $statusOptions[array_rand($statusOptions)],
                    'views' => rand(100, 1000000),
                    'created_at' => Carbon::now()->subDays(rand(1, 365)),
                    'updated_at' => Carbon::now()->subDays(rand(0, 30)),
                ]
            );

            // attach 1-2 random categories
            $story->categories()->syncWithoutDetaching(
                $catModels->random(rand(1, 2))->pluck('id')->toArray()
            );
        }
    }
}
