<?php

namespace Topxia\Component\OEmbed;

class ProviderManager {
    
    private $options;

    public function __construct ($options = array()) {
        $default = array(
            'providers' => 'youku,tudou,sinavideo,ku6' , 
            'timeout' => 5 , 
            'connection_timeout' => 5 , 
            'user_agent' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0)');
        $options = array_merge($default, $options);
        
        $providers = array();
        foreach (explode(',', $options['providers']) as $provider) {
            if (empty($provider)) {
                throw new \Exception('`supports` option is error!');
            }
            $providers[] = trim($provider);
        }
        $options['providers'] = $providers;
        
        $this->options = $options;
    }

    public function parse ($url) {
        foreach ($this->options['providers'] as $provider) {
            $class = __NAMESPACE__ . '\\' . ucfirst($provider) . 'Provider';
            
            $p = new $class($this->options);
            if (! $p->detect($url)) {
                continue;
            }
            
            return $p->parse($url);
        }
        
        return null;
    }

    public function render ($provider, $url, $params = array()) {
        if (! in_array($provider, $this->options['providers'])) {
            throw new \Exception("Provider `{$provider}` is not support.");
        }
        $class = __NAMESPACE__ . '\\' . ucfirst($provider) . 'Provider';
        $provider = new $class($this->options);
        return $provider->render($url, $params);
    }
}