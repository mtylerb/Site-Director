<?php

/**
 * Site Director Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/site_director.xhtml>
 *
 * Copyright (C) 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */
include '/index.php';
$ver = S_D_VER;

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
		Flash::set('error', sprintf(__('Site Director %s is not supported by this version of Wolf CMS.  Wolf CMS version 0.7.0 and higher required.'),$ver));
		exit();
	}
}

/**
 * Setup database connection.
 */
$pdo = Record::getConnection();

/**
 * Create assignments table in database.  Holds information on which layout is assigned to which browser for each page.
 */
$sql = 'CREATE TABLE `'.TABLE_PREFIX.'sd_assignment` (`id` INT NOT NULL, `page_id` INT NOT NULL, `parent_id` INT NOT NULL, `layout_id` INT NOT NULL, `browser_id` INT NOT NULL, UNIQUE (`id`))';
$stmt = $pdo->prepare($sql);
$stmt->execute();

/**
 * Create settings table in database.  Holds information on browser definitions, names, etc.
 */
$sql = 'CREATE TABLE `'.TABLE_PREFIX.'sd_settings` (`id` INT NOT NULL, `browser_id` INT NOT NULL, `browser_def` VARCHAR( 125 ) NOT NULL, `browser_name` VARCHAR( 50 ) NOT NULL, `template_name` VARCHAR( 50 ) NOT NULL, UNIQUE (`id`))';
$stmt = $pdo->prepare($sql);
$stmt->execute();

Flash::set('success', __('Site Director: Plugin was successfully enabled!'));

?>