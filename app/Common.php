<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

/**
 * Same result as CI 4.0.3: no trailing slash. The views build links as
 * base_url() . '/path', so the 4.7 trailing slash would give a double slash.
 */
function base_url($relativePath = '', ?string $scheme = null): string
{
    return rtrim(service('request')->getUri()->baseUrl($relativePath, $scheme), '/ ');
}
