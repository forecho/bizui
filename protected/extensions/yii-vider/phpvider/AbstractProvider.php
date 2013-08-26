<?php

namespace Topxia\Component\OEmbed;

abstract class AbstractProvider implements Provider {
    
    protected $options;

    public function __construct ($options) {
        $this->options = $options;
    }

    protected function isTextContentType ($url) {
        $type = strtolower($this->fetchContentType($url));
        $matched = preg_match('/^text\//s', $type);
        return $matched > 0;
    }

    protected function fetchContentType ($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->options['connection_timeout']);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->options['timeout']);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->options['user_agent']);
        
        $result = curl_exec($curl);
        $type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        curl_close($curl);
        
        return $type;
    }

    protected function fetchText ($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_ENCODING, "gzip");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->options['connection_timeout']);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->options['timeout']);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->options['user_agent']);
        
        $content = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        return array('code' => $code , 'content' => $content);
    }

    protected function detectWithPatterns ($patterns, $url) {
        foreach ($patterns as $pattern) {
            $matched = preg_match($pattern, $url);
            if ($matched > 0) {
                return true;
            }
        }
        return false;
    }

    protected function createError ($type, $message = '') {
        return array('error' => array('type' => $type , 'message' => $message));
    }

    protected function createResult ($type, $providerName, $title, $url, $webUrl = null, $thumbUrl = null) {
        $result = array();
        $result['type'] = $type;
        $result['version'] = '1.0';
        $result['provider_name'] = empty($providerName) ? '' : $providerName;
        $result['title'] = trim($title);
        $result['url'] = trim($url);
        $result['web_url'] = trim($webUrl);
        $result['thumbnail_url'] = trim($thumbUrl);
        return $result;
    }

    
    protected function renderFlash ($url, $params) {
        $html = '<embed';
        $html .= " src=\"{$url}\"";
        $html .= " quality=\"high\"";
        $html .= " width=\"{$params['width']}\"";
        $html .= " height=\"{$params['height']}\"";
        $html .= " align=\"middle\"";
        $html .= " allowScriptAccess=\"always\"";
        $html .= " allowFullScreen=\"true\"";
        $html .= " mode=\"transparent\"";
        $html .= " type=\"application/x-shockwave-flash\"";
        $html .= "></embed>";
        return $html;
    }


}