<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware {
    public function handle(Request $request, Closure $next) {
        // Jika sudah login, izinkan masuk
        if (auth()->check()) {
            return $next($request);
        }
        // Jika belum, lempar ke halaman login
        return redirect()->route('admin.login');
    }
}