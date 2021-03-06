<?php

namespace App\Http\Middleware;

use Closure;
use AetherUpload\ConfigMapper;

class AetherUploadCORS
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
        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', ConfigMapper::get('DISTRIBUTED_DEPLOYMENT_WEB_HOSTS'));//允许的来源域名
        $response->header('Access-Control-Allow-Headers', 'X-CSRF-TOKEN');//允许的自定义头部参数
        $response->header('Access-Control-Allow-Methods', 'POST, OPTIONS');//允许的请求方法
        $response->header('Access-Control-Allow-Credentials', 'true');//是否允许携带cookie
        //添加其它自定义内容

        return $response;
    }
}
