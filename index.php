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
 * Define Site Director Variables
 */
define('S_D_VER','0.2.0');
define('S_D_NAME',__('Site Director'));

/**
 * Include SiteDirector class
 */
include_once 'SiteDirector.php';

/**
 * Security measure for Wolf 0.7.0+
 */
if (!defined('CMS_VERSION'))
{
	Flash::set('error', __('Site Director Fatal Error: CMS_VERSION not defined.'));
}
$ver_check = explode('.',CMS_VERSION);

Plugin::setInfos(array(
    'id'          => 'site_director',
    'title'       => S_D_NAME, 
    'description' => __('Allows you to serve a different layout based on which browser is requesting your site.'), 
    'version'     => S_D_VER,
    'license'     => 'MIT',
    'author'      => 'Tyler Beckett',
    'website'     => 'http://www.tbeckett.net/articles/plugins/site_director.xhtml',
    'update_url'  => 'http://www.tbeckett.net/wpv.xhtml',
    'require_wolf_version' => '0.7.0'
));

/**
 * Setting error display depending on debug mode or not
 */
error_reporting((DEBUG ? (E_ALL | E_STRICT) : 0));

/**
 * Add settings page in to backend.
 */
Plugin::addController('site_director', S_D_NAME);

/**
 * Wait for page to be found via notification from Observer class.
 */
Observer::observe('page_found', 'direct_site');

/** 
 * Version check.  Assuming that 0.7.4 will introduce new Observer notification "view_page_edit_tab_links" else, wait for "view_page_edit_plugins"
 * notification.  Will be removed in future versions and this plugin will require 0.7.4+.
 */
if (SiteDirector::getSettings())
{
	if (($ver_check[0] >= 1) || ($ver_check[0] < 1 && $ver_check[1] >= 7 && $ver_check[2] >= 4))
	{
		Observer::observe('view_page_edit_tab_links', 'edit_link');
		Observer::observe('view_page_edit_tabs', 'sd_settings');
	} else {
		Observer::observe('view_page_edit_plugins', 'sd_settings');
	};
};

/**
 * direct_site is fired upon "page_found" notification from Observer class.
 * $args = $page variable passed from notification in main.php.
 */
function direct_site($args)
{
	/**
	 * Still need to create.  Pass args to the Page object thereby replacing the normally defined layout with the one specified by the user
	 * for the specific browser being used to display the site.
	 */
};

function edit_link()
{
	echo('<li class="tab"><a href="#sd_settings">' . __('Site Director Settings') . '</a></li>'."\r\n");
}

function sd_settings($args = FALSE)
{
	/** 
	 * Version check.  Assuming that 0.7.4 will introduce new Observer notification "view_page_edit_tab_links", previous versions require this
	 */
	$ver_check = explode('.',CMS_VERSION);
	if ($ver_check[0] == 0 && $ver_check[1] <= 7 && $ver_check[2] < 4)
	{
		echo ('<div id="metainfo-tabs" class="content tabs">
	<ul class="tabNavigation">'."\r\n");
		echo('<li class="tab"><a href="#sd_settings">' . __('Site Director Settings') . '</a></li>'."\r\n");
		echo ('</ul>
	</div>'."\r\n");
		echo('    <div id="metainfo-content" class="pages">'."\r\n");
	};
	
	/** 
	 * Call for settings from database and set to $params
	 */
	
	$sql = "";
	
	$params = SiteDirector::getSettings();
	
	/**
	 * Call settings layout for Page Edit screen.
	 */
	echo new View(PLUGINS_ROOT . '/site_director/views/sd_settings', $params);
	
	/** 
	 * Version check.  Assuming that 0.7.4 will introduce new Observer notification "view_page_edit_tab_links", previous versions require this
	 */
	if ($ver_check[0] == 0 && $ver_check[1] <= 7 && $ver_check[2] < 4)
	{
		echo('    </div>'."\r\n");
	};
};

?>