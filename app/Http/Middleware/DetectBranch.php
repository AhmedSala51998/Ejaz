<?php

namespace App\Http\Middleware;

use Closure;

class DetectBranch
{
    public function handle($request, Closure $next)
    {
        $branches = ['yanbu', 'riyadh', 'jeddah'];

        // إذا عندك prefix للغة، الفرع ممكن يكون في segment(2)
        $segmentIndex = 1; // بدون locale
        if(app()->getLocale() && $request->segment(1) == app()->getLocale()) {
            $segmentIndex = 2;
        }

        $branch = $request->segment($segmentIndex);

        if(in_array($branch, $branches)) {
            session(['branch' => $branch]);
        }

        // إذا مافيش فرع في session، ممكن تستخدم fallback حسب locale
        if(!session()->has('branch')) {
            $localeBranchMap = [
                'ar' => 'riyadh',
                'en' => 'yanbu'
            ];
            session(['branch' => $localeBranchMap[app()->getLocale()] ?? 'riyadh']);
        }

        // حفظ الفرع في request attributes
        $request->attributes->set('branch', session('branch'));

        return $next($request);
    }
}
