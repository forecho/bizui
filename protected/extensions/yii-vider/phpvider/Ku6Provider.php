<?php
namespace Topxia\Component\OEmbed;

class Ku6Provider extends AbstractProvider implements Provider {
    
    const PROVIDER_NAME = 'ku6';
    
    protected $patterns = array(
        'p1' => '/^http:\/\/v\.ku6\.com\/show\/.*.html/s' , 
        'p2' => '/^http:\/\/v\.ku6\.com\/special\/show_.*.html/s' , 
        'p3' => '/^http:\/\/v\.ku6\.com\/film\/show_.*.html/s');

    public function detect ($url) {
        return $this->detectWithPatterns($this->patterns, $url);
    }

    public function parse ($url) {
        $url = $this->cleanUrl($url);
        
        $data = $this->fetchText($url);
        if ($data['code'] != 200) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] Fetch failure(HTTP CODE: {%s}).', self::PROVIDER_NAME, $data['code']));
        }
        
        $matched = preg_match('/(\w+)\.VideoInfo\s*=\s*(\\1\.ObjectInfo\s*=\s*){0,1}{.*?};/s', $data['content'], $matches);
        if ($matched > 0) {
            $content = $matches[0];
            
            preg_match('/[\s,{]id\s*:\s*[\"\'](.*?)[\"\']/s', $content, $idMatches);
            preg_match('/[\s,{]title\s*:\s*["\'](.*?)["\']/s', $content, $titleMatches);
            preg_match('/[\s,{]cover\s*:\s*["\'](.*?)["\']/s', $content, $thumbMatches);
            
            $id = $idMatches[1];
            $title = array_pop(json_decode('["' . $titleMatches[1] . '"]'));
            $mediaUrl = "http://player.ku6.com/refer/{$id}/v.swf";
            $thumbUrl = $thumbMatches[1];
            
            return $this->createResult(self::VIDEO, self::ID, $title, $mediaUrl, $url, $thumbUrl);
        }
        
        return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse VideoInfo failure.', self::PROVIDER_NAME));
    }

    public function render ($url, $params = array()) {
    	$params = array('width' => 480, 'height' => 400);
    	return $this->renderFlash($url, $params);
    }
}