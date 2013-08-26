<?php
namespace Topxia\Component\OEmbed;

class YoukuProvider extends AbstractProvider implements Provider{
    
    const PROVIDER_NAME = 'youku';
    
    protected $patterns = array(
        'p1' => '/^http:\/\/v\.youku\.com\/v_playlist\/.+\.html$/s' , 
        'p2' => '/^http:\/\/v\.youku\.com\/v_show\/.+\.html$/s' , 
        'swf' => '/^http:\/\/player\.youku\.com\/player\.php\/sid\/(.+)\/v\.swf$/s');

    public function detect ($url) {
        return $this->detectWithPatterns($this->patterns, $url);
    }

    public function parse ($url) {
        $matched = preg_match($this->patterns['swf'], $url, $match);
        if ($matched) {
            $url = 'http://v.youku.com/v_show/id_' . $match[1] . '.html';
        }
        
        $data = $this->fetchText($url);
        if ($data['code'] != 200) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] Fetch failure(HTTP CODE: {%s}).', self::PROVIDER_NAME, $data['code']));
        }
        
        $pattern = '/id="s_msn".*?href="(.*?)"/s';
        preg_match($pattern, $data['content'], $matches);
        if (empty($matches) || empty($matches[1])) {
            return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse pattern `%s` failure. ', self::PROVIDER_NAME, $pattern));
        }
        
        $query = parse_url($matches[1], PHP_URL_QUERY);
        parse_str($query, $values);
        
        $clean = array();
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $clean[strtolower($key)] = $value;
            }
        }
        
        if (empty($clean['url']) || empty($clean['title']) || empty($clean['swfurl']) || empty($clean['screenshot'])) {
            return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse url,title,swfurl,screenshot failure. ', self::PROVIDER_NAME));
        }
        
        return $this->createResult(self::VIDEO, self::PROVIDER_NAME, $clean['title'], $clean['swfurl'], $clean['url'], $clean['screenshot']);
    }
    
    public function render ($url, $params = array()) {
    	$params = array('width' => 480, 'height' => 400);
    	return $this->renderFlash($url, $params);
    }

}