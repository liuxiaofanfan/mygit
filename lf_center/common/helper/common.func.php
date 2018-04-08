<?php 
namespace common\helper;

class CommonHelper {

	/**
	 * @author liufan
	 * package for "print_r()"
	 */
	public static function p($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}

	/**
	 * @author liufan
	 * package for "var_dump() & die view"
	 */
	public static function dd($var){
		echo "<pre>";
		var_dump($var);
		echo "</pre>";
		die;
	}

	/**
	 * @author liufan
	 * 生成UUID
	 */
	public static function create_uuid($prefix = ""){    //可以指定前缀
	    $uuid = md5(uniqid(mt_rand(), true));
	    return $prefix.$uuid;
	}
}