<?php
function funstatus(){
	
}
//中文截取
function sub_str($str, $length = 0, $append = true)
  {
     $str = trim($str);
     $strlength = strlen($str);
	 
	 defined('EC_CHARSET')?'':define('EC_CHARSET','utf-8');

     if ($length == 0 || $length >= $strlength)
     {
         return $str;  //截取长度等于0或大于等于本字符串的长度，返回字符串本身
     }
    elseif ($length < 0)  //如果截取长度为负数
    {
        $length = $strlength + $length;//那么截取长度就等于字符串长度减去截取长度
         if ($length < 0)
         {
            $length = $strlength;//如果截取长度的绝对值大于字符串本身长度，则截取长度取字符串本身的长度
        }
    }

    if (function_exists('mb_substr'))
    {
         $newstr = mb_substr($str, 0, $length, EC_CHARSET);
    }
     elseif (function_exists('iconv_substr'))
     {
         $newstr = iconv_substr($str, 0, $length, EC_CHARSET);
     }
     else
     {
         //$newstr = trim_right(substr($str, 0, $length));
         $newstr = substr($str, 0, $length);
     }
 
     if ($append && $str != $newstr)
     {
         $newstr .= '...';
    }
   
     return $newstr;
 }

function GetServerTime()
{
	return date('Y-m-d　H:i:s');
}

/**
 +----------------------------------------------------------
 * 获取服务器解译引擎
 * 例如：Apache/2.2.8 (Win32) PHP/5.2.6
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetServerSoftwares()
{
	return $_SERVER['SERVER_SOFTWARE'];
}

/**
 +----------------------------------------------------------
 * 获取php版本号
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetPhpVersion()
{
	return PHP_VERSION;
}
/**
 +----------------------------------------------------------
 * 获取Http版本号
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetHttpVersion()
{
	return $_SERVER['SERVER_PROTOCOL'];
}

/**
 +----------------------------------------------------------
 * 获取网站根目录
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetDocumentRoot()
{
	return $_SERVER['DOCUMENT_ROOT'];
}

/**
 +----------------------------------------------------------
 * 获取PHP脚本最大执行时间
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetMaxExecutionTime()
{
	return ini_get('max_execution_time').' Seconds';
}

/**
 +----------------------------------------------------------
 * 获取服务器允许文件上传的大小
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetServerFileUpload()
{
	if (@ini_get('file_uploads')) {
		return '允許 '.ini_get('upload_max_filesize');
	} else {
		return '<font color="red">禁止</font>';
	}
}

/**
 +----------------------------------------------------------
 * 获取全局变量 register_globals的设置信息 On/Off
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetRegisterGlobals()
{
	return GetPhpCfg('register_globals');
}

/**
 +----------------------------------------------------------
 * 获取安全模式 safe_mode的设置信息 On/Off
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetSafeMode()
{
	return GetPhpCfg('safe_mode');
}

/**
 +----------------------------------------------------------
 * 获取Gd库的版本号
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetGdVersion()
{
	if(function_exists('gd_info')){
		$GDArray = gd_info();
		$gd_version_number = $GDArray['GD Version'] ? '版本：'.$GDArray['GD Version'] : '不支持';
	}else{
		$gd_version_number = '不支持';
	}
	return $gd_version_number;
}

/**
 +----------------------------------------------------------
 * 获取内存占用率
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetMemoryUsage()
{
	return ConversionDataUnit(memory_get_usage());
}

/**
 +----------------------------------------------------------
 * 对数据单位 (字节)进行换算
 +----------------------------------------------------------
 * @access private
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function ConversionDataUnit($size)
{
	$kb = 1024;       // Kilobyte
	$mb = 1024 * $kb; // Megabyte
	$gb = 1024 * $mb; // Gigabyte
	$tb = 1024 * $gb; // Terabyte
	//round() 对浮点数进行四舍五入
	if($size < $kb) {
		return $size.' Byte';
	}
	else if($size < $mb) {
		return round($size/$kb,2).' KB';
	}
	else if($size < $gb) {
		return round($size/$mb,2).' MB';
	}
	else if($size < $tb) {
		return round($size/$gb,2).' GB';
	}
	else {
		return round($size/$tb,2).' TB';
	}
}

/**
 +----------------------------------------------------------
 * 获取PHP配置文件 (php.ini)的值
 +----------------------------------------------------------
 * @param string $val 值
 * @access private
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function GetPhpCfg($val)
{
	switch($result = get_cfg_var($val)) {
		case 0:
			return '关闭';
			break;
		case 1:
			return '打开';
			break;
		default:
			return $result;
			break;
	}
}