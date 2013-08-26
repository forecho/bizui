<?php

namespace Topxia\Component\OEmbed;

class SinavideoProvider extends AbstractProvider implements Provider {
    
    const PROVIDER_NAME = 'sinavideo';
    
    protected $patterns = array(
        'p1' => '/^http:\/\/video\.sina\.com\.cn\/[vpm]\/.*\.html/s' , 
        'p2' => '/^http:\/\/you\.video\.sina\.com\.cn\/b\/.*.html/s');

    public function detect ($url) {
        return $this->detectWithPatterns($this->patterns, $url);
    }

    
    public function parse ($url) {
        $data = $this->fetchText($url);
        if ($data['code'] != 200) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] Fetch failure(HTTP CODE: {%s}).', self::PROVIDER_NAME, $data['code']));
        }
        
        $matched = preg_match('/video\s:.*?<\/script>/s', $data['content'], $matches);
        if ($matched) {
            $content = $matches[0];
            preg_match('/title\s*:\s*["\'](.*?)["\']/s', $content, $titleMatch);
            preg_match('/swfOutsideUrl\s*:\s*["\'](.*?)["\']/s', $content, $mediaUrlMatch);
            preg_match('/pic\s*:\s*["\'](.*?)["\']/s', $content, $thumbMatch);
            
            if (empty($titleMatch) || empty($mediaUrlMatch) || empty($thumbMatch)) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse title/swfOutsideUrl/pic failure.', self::PROVIDER_NAME));
            }
            
            return $this->createResult(self::VIDEO, self::PROVIDER_NAME, $titleMatch[1], $mediaUrlMatch[1], $url, $thumbMatch[1]);
        }
        
        $matched = preg_match('/mInfo\s*:\s*{.*?}/s', $data['content'], $matches);
        if ($matched) {
            $content = $matches[0];
            preg_match('/name\s*:\s*["\'](.*?)["\']/s', $content, $nameMatch);
            preg_match('/episode\s*:\s*["\'](.*?)["\']/s', $content, $episodeMatch);
            preg_match('/vid\s*:\s*["\'](.*?)["\']/s', $content, $vidMatch);
            preg_match('/pic\s*:\s*["\'](.*?)["\']/s', $content, $thumbMatch);
            
            if (empty($nameMatch) || empty($vidMatch) || empty($thumbMatch)) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse name/episode/vid/pic failure.', self::PROVIDER_NAME));
            }
            
            $vid = (int) array_shift(explode('|', $vidMatch[1]));
            if (empty($vid)) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse vid failure.', self::PROVIDER_NAME));
            }
            
            $episode = (int) $episodeMatch[1];
            $title = $nameMatch[1] . (empty($episode) ? '' : " 第{$episode}集");
            $mediaUrl = "http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid={$vid}_0/s.swf";
            
            return $this->createResult(self::VIDEO, self::PROVIDER_NAME, $title, $mediaUrl, $url, $thumbMatch[1]);
        
        }
        
        return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse failure.', self::PROVIDER_NAME));
    
    }

    public function render ($url, $params = array()) {
    	$params = array('width' => 480, 'height' => 400);
    	return $this->renderFlash($url, $params);
    }


}