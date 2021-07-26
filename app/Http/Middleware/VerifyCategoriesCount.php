<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //? Prevent that user can create a post, if there are no categories yet!
        if (Category::all()->count() === 0) {

            session()->flash('error', 'Create a category first, before u can create a post!');
            return redirect(route('categories.create'));
        }

        return $next($request);
    }
}
