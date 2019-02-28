<?php
/*
 * Always Look Up For functions.php in the theme folder.
 * 
 * Write Your Custom Functions in Here.
*/

//Intializing cache class.
use Caching\phpFastCache as phpFastCache;
	
//Get Cache Key
function getCache($key)
{
	return phpFastCache::get($key);
}
		
//Set Cache Key and values
function setCache($key, $val, $time = false)
{
	if($time)
	{
		return phpFastCache::set($key, $val, $time);
	}
	else
	{
		$opt = intval( selectSetting('cache_days') ) * 86400000;
					
		return phpFastCache::set($key, $val, $opt);
	}
}

/**
 * Example Using Simple Class Function with Cache.
*/
function SimpleProject($name)
{
    // Create a instance
    $simple = new \SimpleClass\SimpleClass\SimpleClass();
			
	$cachekeyword = 'key' . md5($name);
			
	$cache = getCache($cachekeyword);
	
	//check cache
	if (!is_null($cache))
	{
		return 'My Name is ' . $cache . ' With Cache !';
	}
	
	//some function
	$some = $simple->myProjectByCache($name);
			
	//set cache
	setCache($cachekeyword, $some);

	return 'My Name is ' .  $some  . ' Without Cache ! Try Reload Page And Read Me Again !';
	
}