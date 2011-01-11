<?php

/**
 * Site Director Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/site_director.xhtml>
 *
 * Copyright (C) 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */

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

class SiteDirectorController extends PluginController
{
    public function __construct()
    {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/site_director/views/sidebar'));
    }
	
	public function index($page = 0)
    {
	$this->display('site_director/views/index', array(/*
            'tags' => $tags,
            'currentpage' => $CurPage,
            'lastpage' => $lastpage*/
        ));
    }
}
?>