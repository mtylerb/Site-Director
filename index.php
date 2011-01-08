<?php

/**
 * Define Site Director Version
 */
define('S_D_VER','0.0.1');

/**
 * Security measure for Wolf 0.7.0+
 */
if (!defined('CMS_VERSION'))
{
	Flash::set('error', __('Site Director Fatal Error: CMS_VERSION not defined.'));
}
else 
{
	$ver_check = explode('.',CMS_VERSION);
	if (($ver_check[0] >= 1) || ($ver_check[0] < 1 && $ver_check[1] > 6))
	{
		if (!defined('IN_CMS')) 
		{
			Flash::set('error', __('Site Director Fatal Error:  Not In CMS'));
			exit();
		}
	}
	else if ($ver_check[0] < 1 && $ver_check[1] < 7)
	{
		Flash::set('error', __('Site Director ' . S_D_VER . ' is not supported by this version of Wolf CMS.  Wolf CMS version 0.7.0 and higher required.'));
		exit();
	}
}

 /**
 * Site Director Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/site_director.xhtml>
 *
 * Copyright (C) 2008 - 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */

Plugin::setInfos(array(
    'id'          => 'site_director',
    'title'       => __('Site Director'), 
    'description' => __('Allows you to serve a different layout based on which browser is requesting your site.'), 
    'version'     => S_D_VER,
    'license'     => 'MIT',
    'author'      => 'Tyler Beckett',
    'website'     => 'http://www.tbeckett.net/',
    'update_url'  => 'http://www.tbeckett.net/wpv.xhtml',
    'require_wolf_version' => '0.7.0'
));

?>