<?php
namespace Topxia\Component\OEmbed;

interface Provider {
    
    const VIDEO = 'video';
    const AUDIO = 'audio';
    const LINK = 'link';
    
    const FETCH_ERROR = 'OEmbedFetchError';
    
    const PARSE_ERROR = 'OEmbedParseError';
    
    const NOT_SUPPORT_ERROR = 'OEmbedNotSupportError';

    function detect ($url);

    function parse ($url);

    function render ($url, $params = array());

}