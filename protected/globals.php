<?php
/**
 * @author Chris Chen(cdcchen@gmail.com)
 * @version v1.0
 * @since 2010-9-7 10:39
 */
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 * @return CApplication Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 * @return CClientScript Yii::app()->clientScript
 */
function cs()
{
    return Yii::app()->clientScript;
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 * @param string $route
 * @param array $params
 * @param string $anchor
 * @param string $ampersand
 * @return string 相对url地址
 */
function url($route, array $params=array(), $anchor = null, $ampersand='&')
{
    return Yii::app()->createUrl($route, $params, $ampersand) . ($anchor !== null ? '#' . $anchor : '');
}
/**
 * This is the shortcut to Yii::app()->createAbsoluteUrl()
 * @param string $route
 * @param array $params
 * @param string $anchor
 * @param string $ampersand
 * @return string 绝对url地址
 */
function aurl($route, array $params=array(), $schema='', $anchor = null, $ampersand='&')
{
    return Yii::app()->createAbsoluteUrl($route, $params, $schema, $ampersand) . ($anchor !== null ? '#' . $anchor : '');
}
 
/**
 * This is the shortcut to CHtml::encode
 * @param string $text 待处理字符串
 * @return string 使用CHtml::encode(即htmlspecialchars)处理过的字符串
 */
function h($text)
{
    return CHtml::encode($text);
}
 
/**
 * This is the shortcut to CHtml::link()
 * @param string $text 链接显示文本
 * @param string $url 链接地址
 * @param array $htmlOptions <a>标签附加属性
 * @return string <a>链接html代码
 */
function l($text, $url = '#', $htmlOptions = array())
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to CHtml::image()
 * @param string $src 图片url
 * @param string $alt img标签alt属性
 * @param array $htmlOptions <img>标签附加属性
 * @return string <img>html代码
 */
function image($src, $alt='', $htmlOptions=array())
{
    return CHtml::image($src, $alt, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'main', $params = array(), $source = null, $language = null)
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 * @param string $url 相对url地址
 * @return string 返回相对url地址
 */
function bu($url = null)
{
    static $baseUrl = null;
    if ($baseUrl === null)
        $baseUrl = rtrim(Yii::app()->request->baseUrl, '/') . '/';
    return $url === null ? $baseUrl : $baseUrl . ltrim($url, '/');
}

/**
 * This is the shortcut to Yii::app()->request->getBaseUrl(true)
 * If the parameter is given, it will be returned and prefixed with the app absolute baseUrl.
 * @param string $url 相对url地址
 * @return string 返回绝对url地址
 */
function abu($url = null)
{
    static $baseUrl = null;
    if ($baseUrl === null)
        $baseUrl = rtrim(Yii::app()->request->getBaseUrl(true), '/') . '/';
    return $url === null ? $baseUrl : $baseUrl. ltrim($url, '/');
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 * @param string $name 参数名称
 * @return mixed 参数值
 */
function param($name)
{
    return Yii::app()->params[$name];
}
 
/**
 * This is the shortcut to Yii::app()->user.
 * @return CWebUser
 */
function user()
{
    return Yii::app()->user;
}

/**
 * this is the shortcut to Yii::app()->theme->baseUrl
 * @param string $url
 * @return string Yii::app()->theme->baseUrl
 */
function tbu($url = null, $useDefault = true)
{
    if (empty(Yii::app()->theme))
        return sbu($url);
    
    static $themeBasePath;
    static $themeBaseUrl;
    $themeBasePath = rtrim(param('themeResourceBasePath'), DS) . DS . Yii::app()->theme->name . DS;
    $filename = realpath($themeBasePath . $url);
    if (file_exists($filename)) {
        $themeBaseUrl = rtrim(Yii::app()->theme->baseUrl, '/') . '/';
        return ($url === null) ? $themeBaseUrl : $themeBaseUrl . ltrim($url, '/');
    }
    elseif ($useDefault) {
        return sbu($url);
    }
    else
        return 'javascript:void(0);';
}

/**
 * This is the shortcut to Yii::app()->authManager.
 * @return IAuthManager Yii::app()->authManager
 */
function auth()
{
    return Yii::app()->authManager;
}


/**
 * 此函数返回附件地址的BaseUrl
 * @param string $url 附件文件相对url地址
 * @return string
 */
function fbu($url = null)
{
    static $uploadBaseUrl = null;
    if ($uploadBaseUrl === null)
        $uploadBaseUrl = rtrim(param('uploadBaseUrl'), '/') . '/';
    
    return $url === null ? $uploadBaseUrl : $uploadBaseUrl . ltrim($url, '/');
}

/**
 * 此函数返回附件地址的BaseUrl
 * @param string $url 静态资源文件相对url地址
 * @return string
 */
function sbu($url = null)
{
    static $resourceBaseUrl = null;
    if ($resourceBaseUrl === null)
        $resourceBaseUrl = rtrim(param('resourceBaseUrl'), '/') . '/';
    
    return $url === null ? $resourceBaseUrl : $resourceBaseUrl . ltrim($url, '/');
}

/**
 * This is the shortcut to Yii::app()->getStatePersister().
 * @return CStatePersister
 */
function sp()
{
    return Yii::app()->getStatePersister();
}

/**
 * This is the shortcut to Yii::app()->getSecurityManager().
 * @return CSecurityManager
 */
function sm()
{
    return Yii::app()->getSecurityManager();
}

/**
 * This is the shortcut to Yii::app()->request
 * @return CHttpRequest
 */
function request()
{
    return Yii::app()->request;
}
function dp($path = null)
{
    $dp = rtrim(param('dataPath'), DS) . DS;
    return $path ?  $dp . $path : $dp;
}

/**
 * 获取IP 使用淘宝IP地址库得到访客来源信息
 * return $nowurl;
 */
function GetIP() {
    $info = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$_SERVER["REMOTE_ADDR"]);
    $a = CJSON::decode($info);
    return $a['data']['country'].$a['data']['region'].$a['data']['city'].'网友';
}

/**
 * 正则匹配获取URL中的域名
 */
function GetDomain($url){
    // 从 URL 中取得主机名 
    preg_match("/^(http:\/\/)?([^\/]+)/i", $url, $matches); 
    $host = $matches[2]; 
    // 从主机名中取得后面两段 
    preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches); 
    //echo "domain name is: {$matches[0]}\n"; 
    $domain = $matches[0];
    return $domain;
}

/**
 * 获取META信息
 */
function GetSiteMeta($url) {
    
    $data = file_get_contents($url);
         
    $meta = array();
    if (!empty($data)) {
        #Title
        preg_match('/<TITLE>([\w\W]*?)<\/TITLE>/si', $data, $matches);
        if (!empty($matches[1])) {
            $meta['title'] = $matches[1];
        }
    }
    return $meta['title'];
}

/**
 *  把数组加密为URL可传递的字符串，只支持一维数组
 * @param array $params
 * @return string 
 */
function encryptParamsForUrl($params){
    if(is_array($params)){
        $keys = array_keys($params);
        $values = array_values($params);
        $keystr = implode('}^{',$keys);
        $valuestr = implode('}^{',$values);
        $hashstr = $keystr.'{)^.^(}'.$valuestr;
        $hash = Yii::app()->securityManager->encrypt($hashstr);
        return urlencode($hash);
    }
}

/**
 *  把URL加密串解密，返回数组
 * @param string $hash
 * @return array
 */
function decryptParamsForUrl($hash){
    if(is_string($hash)){
        $hash = Yii::app()->securityManager->decrypt(urldecode($hash));
        $arrays = explode('{)^.^(}',$hash);
        $keyarray = explode('}^{',$arrays[0]);
        $valuearray = explode('}^{',$arrays[1]);
        $array = array();
        foreach ($keyarray as $key=>$value){
            $array[$value] = $valuearray[$key];
        }
        return $array;
    }
}

/**
 * 时间轴函数
 */
function tranTime($time) { 
    $rtime = date("m-d H:i",$time); 
    $htime = date("H:i",$time); 
     
    $time = time() - $time; 
 
    if ($time < 60) { 
        $str = '刚刚'; 
    } 
    elseif ($time < 60 * 60) { 
        $min = floor($time/60); 
        $str = $min.'分钟前'; 
    } 
    elseif ($time < 60 * 60 * 24) { 
        $h = floor($time/(60*60)); 
        $str = $h.'小时前 '.$htime; 
    } 
    elseif ($time < 60 * 60 * 24 * 3) { 
        $d = floor($time/(60*60*24)); 
        if($d==1) 
           $str = '昨天 '.$rtime; 
        else 
           $str = '前天 '.$rtime; 
    } 
    else { 
        $str = $rtime; 
    } 
    return $str; 
} 