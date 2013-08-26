<?php
namespace Topxia\Component\OEmbed;


class TudouProvider extends AbstractProvider implements Provider{
    
    const PROVIDER_NAME = 'tudou';
    
    protected $patterns = array(
        'p1' => '/^http:\/\/www\.tudou\.com\/programs\/view\//s' , 
        'p2' => '/^http:\/\/www\.tudou\.com\/playlist\//s');

    public function detect ($url) {
        return $this->detectWithPatterns($this->patterns, $url);
    }

    public function parse ($url) {
        $data = $this->fetchText($url);
        if ($data['code'] != 200) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] Fetch failure(HTTP CODE: {%s}).', self::PROVIDER_NAME, $data['code']));
        }
        
        $matched = preg_match('/pageId.*?=.*?(\d+)/s', $data['content'], $matches);
        
        if (empty($matched) || ! ctype_digit($matches[1])) {
            return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse pageId failure.', self::PROVIDER_NAME));
        }
        
        $pageId = (int) $matches[1];
        switch ($pageId) {
        case 1:
            $matched = preg_match('/icode\s*=\s*[\'\"](.*?)[\'\"].*?pic\s*=\s*[\'\"](.*?)[\'\"].*?title\s*=\s*[\'\"](.*?)[\'\"]/s', $data['content'], $matches);
            
            if (empty($matched)) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse icode/pic/title failure(PAGE_ID:%s).', self::PROVIDER_NAME, $pageId));
            }
            
            $title = $matches[3] = iconv('GBK', 'UTF8', $matches[3]);
            $mediaUrl = 'http://www.tudou.com/v/' . $matches[1] . '/v.swf';
            $pageUrl = 'http://www.tudou.com/programs/view/' . $matches[1] . '/';
            $thumb = $matches[2];
            
            return $this->createResult(self::VIDEO, self::PROVIDER_NAME, $title, $mediaUrl, $pageUrl, $thumb);
            
            break;
        case 2:
        case 3:
        case 4:
            preg_match('/\/p\/[la]\d+i(\d+).*\.html/s', $url, $matches);
            if (empty($matches) || empty($matches[1])) {
                preg_match('/defaultIid\s*=\s*(\d+)/s', $data['content'], $matches);
                if (empty($matches) || empty($matches[1])) {
                    return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse iid failure(PAGE_ID:%s).', self::PROVIDER_NAME, $pageId));
                }
            }
            
            $iid = $matches[1];
            preg_match("/{\s*iid:{$iid}.*?}/s", $data['content'], $matches);
            if (empty($matches) || empty($matches[0])) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse iid(%s) item data failure(PAGE_ID:%s).', self::PROVIDER_NAME, $iid, $pageId));
            }
            
            $utf8data = iconv('GBK', 'UTF8', $matches[0]);
            preg_match('/title:\"(.*?)\"/s', $utf8data, $titleMatches);
            preg_match('/pic:\"(.*?)\"/s', $utf8data, $thumbMatches);
            preg_match('/icode:\"(.*?)\"/s', $utf8data, $icodeMatches);
            
            if (empty($titleMatches[1]) || empty($thumbMatches[1]) || empty($icodeMatches[1])) {
                return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse title/thumb/icode failure(PAGE_ID:%s).', self::PROVIDER_NAME, $pageId));
            }
            
            if ($pageId == 4) {
                preg_match('/atitle\s*=\s*[\"\'](.*?)[\"\']/s', $data['content'], $atitleMatches);
                if (empty($atitleMatches)) {
                    return $this->createError(self::PARSE_ERROR, sprintf('[%s] Parse atitle failure(PAGE_ID:%s).', self::PROVIDER_NAME, $pageId));
                }
                $atitle = iconv('GBK', 'UTF8', $atitleMatches[1]) . ' ';
            } else {
                $atitle = '';
            }
            
            $icode = $icodeMatches[1];
            $title = $atitle . $titleMatches[1];
            $mediaUrl = 'http://www.tudou.com/v/' . $icode . '/v.swf';
            $pageUrl = 'http://www.tudou.com/programs/view/' . $icode . '/';
            $thumb = $thumbMatches[1];
            
            return $this->createResult(self::VIDEO, self::PROVIDER_NAME, $title, $mediaUrl, $pageUrl, $thumb);
        }
        
        return $this->createError(self::PARSE_ERROR, sprintf('[%s] PageId(%s) is not support now.', self::PROVIDER_NAME, $pageId));
    
    }

    public function render ($url, $params = array()) {
        $params = array('width' => 480 , 'height' => 400);
        return $this->renderFlash($url, $params);
    }
}