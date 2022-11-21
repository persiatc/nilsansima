<?php

namespace App\Http\Middleware;

use Closure;

class Minifier
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
    return $this->minifyHTML($response);
  }

  public function minifyHTML($response)
  {
    $replace = [
        '<!--(.*?)-->' => '', //remove comments
        "/<\?php/" => '<?php ',
        "/\n([\S])/" => '$1',
        "/\r/" => '', // remove carriage return
        "/\n/" => '', // remove new lines
        "/\t/" => '', // remove tab
        "/\s+/" => ' ', // remove spaces
    ];
    return preg_replace(array_keys($this->replace), array_values($this->replace), $htmlString);

  }

}
