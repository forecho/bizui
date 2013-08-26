<?php
namespace Topxia\Component\OEmbed;


class LinkProvider extends AbstractProvider implements Provider {
    
    const PROVIDER_NAME = 'link_provider';

    public function detect ($url) {
        $matched = preg_match('/\.(swf|flv|avi|mov|mp3|exe|)$/s', $url);
        return ! $matched;
    }

    public function parse ($url) {
        
        if (! $this->isTextContentType($url)) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] NOT a text page.', self::PROVIDER_NAME));
        }
        
        $data = $this->fetchText($url);
        if ($data['code'] != 200) {
            return $this->createError(self::FETCH_ERROR, sprintf('[%s] Fetch failure(HTTP CODE: {%s}).', self::PROVIDER_NAME, $data['code']));
        }
        preg_match('/<title>(.*?)<\/title>/si', $data['content'], $titleMatches);
        $title = empty($titleMatches) ? '' : $titleMatches[1];
        
        if (! empty($title)) {
            $matched = preg_match('/<meta.*?charset=(.*?)[\'\"]/si', $data['content'], $charsetMatch);
            if ($matched) {
                $charset = strtoupper($charsetMatch[1]);
                if (in_array($charset, array('GB2312' , 'GBK'))) {
                    $title = @iconv($charset, 'UTF-8', $title);
                }
            } else {
                $encode = mb_detect_encoding($title, array('ASCII' , 'GB2312' , 'GBK' , 'UTF-8'), true);
                if (! empty($encode) && $encode != 'UTF-8') {
                    $title = @iconv($encode, 'UTF-8', $title);
                }
            }
        }
        
        $from = parse_url($url, PHP_URL_HOST);
        
        return $this->createResult(self::PROVIDER_NAME, $from, $title, $url, null);
    }

    public function render ($url, $params = array()) {

    }
}