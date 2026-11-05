<?php

namespace App\HTTP;

use CodeIgniter\HTTP\RedirectResponse as BaseRedirectResponse;
use CodeIgniter\HTTP\URI;

/**
 * Keeps the CI 4.0.3 behaviour of redirect()->to(): a relative URL is resolved
 * against the current page (from /Siaportal/login, 'dashboard' goes to
 * /Siaportal/dashboard). CI 4.7 builds it from the site root instead, which
 * would break the redirects used across the controllers.
 */
class RedirectResponse extends BaseRedirectResponse
{
    public function to(string $uri, ?int $code = null, string $method = 'auto')
    {
        if (! str_starts_with($uri, 'http')) {
            $current = preg_replace('#/index\.php(/|$)#', '/', current_url());
            $uri     = (string) (new URI($current))->resolveRelativeURI($uri);
        }

        return $this->redirect($uri, $method, $code);
    }
}
