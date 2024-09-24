<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller {
    
    public function index(Request $request) {

        $search = $request->input('search');          // Search term
        $category = $request->input('category');      // Selected category
        $min_budget = $request->input('min_budget', 0); // Default to 0 if not provided
        $max_budget = $request->input('max_budget', 5000); // Default to 5000 if not provided

        $categories = Category::get();

        $activities = Activity::when($search, function($query) use ($search) {
                                        $query->where('name', 'like', '%' . $search . '%');
                                })
                                ->when($category, function($query) use ($category) {
                                        $query->whereHas('categories', function($q) use ($category) {
                                        $q->where('id', $category);
                                        });
                                })
                                ->whereHas('packages', function($query) use ($min_budget, $max_budget) {
                                        $query->where(function($q) use ($min_budget, $max_budget) {
                                        $q->whereBetween('price', [$min_budget, $max_budget])
                                        ->orWhereBetween('adult_price', [$min_budget, $max_budget]);
                                        });
                                })
                                ->get();

        return view('pages.search-result', compact('activities','categories'));
    }
    
   
}
