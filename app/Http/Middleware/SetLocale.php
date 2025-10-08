<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si existe un idioma guardado en sesión, lo aplicamos
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        // En caso contrario, usa el idioma por defecto (config/app.php)
        return $next($request);
    }
}
