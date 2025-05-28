<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        } // также наш Middleware нужно подключить в файле kernel.php в самом низу в алиасах подключаем 'admin' => \App\Http\Middleware\AdminMiddleware::class, и готово, наша группа готова
        abort('404');
    }
}
