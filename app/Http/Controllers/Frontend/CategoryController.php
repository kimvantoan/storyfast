<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $query = $category->stories();

        $filter = $request->get('filter', 'newest');

        switch ($filter) {
            case 'hottest':
                $query->orderBy('views', 'desc');
                break;
            case 'full':
                $query->where('status', 'completed')->orderBy('updated_at', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('updated_at', 'desc');
                break;
        }

        $stories = $query->paginate(15)->appends(['filter' => $filter]);

        return view('category', compact('category', 'stories', 'filter'));
    }
}
