<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Locale
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
        /*
        $language = Session::get('language', config('app.locale'));
           switch ($language) {
            case 'en':
                $language = 'en';
                break;
            
            default:
                $language = 'vi';
                break;
        }
        App::setLocale($language);

        
         $language = \Session::get('website_language', config('app.locale'));
        // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config
     
         config(['app.locales' => $language]);
        //  \App::setLocale($language);
        */
         if($language = $request->session()->get('lang')){
            \App::setLocale($language);
        }
        // Chuyển ứng dụng sang ngôn ngữ được chọn
        return $next($request);
    }
}
