<?php
/**
 * An open source application development framework for PHP
 * 
 * @package	CodeIgniter
 * @author	Cristhofer Alencar
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Check with URL if image exist
 *
 * @param null $url
 * @return bool
 */
function img_exist($url = NULL) {
    if (!$url) return FALSE;

    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? $url : false;
}