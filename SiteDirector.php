<?php

/**
 * Site Director Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/site_director.xhtml>
 *
 * Copyright (C) 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */

class SiteDirector
{
	public function __construct()
	{
		
	}
	
	public static function get_settings()
	{
		$pdo = Record::getConnection();
		$assignments = array();
		$settings = array();
		
		$sql = 'SELECT * FROM `'.TABLE_PREFIX.'sd_assignment`';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		
		$assignments = $stmt->fetchAll();
		
		$sql = 'SELECT * FROM `'.TABLE_PREFIX.'sd_settings`';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		
		$settings = $stmt->fetchAll();
		
		$sdsettings = array('assignments' => $assignments, 'settings' => $settings);
		
		return $sdsettings;
	}

}

?>