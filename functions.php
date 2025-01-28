<?php

/*
 *
 * This function checks if a domain is valid or not.
 * This function was copied from:
 * https://stackoverflow.com/questions/1755144/how-to-validate-domain-name-in-php
 * 
 */
function is_valid_domain($url) 
{
    
    $validation = false; 
    $urlparts = parse_url(filter_var($url, FILTER_SANITIZE_URL));

    if(!isset($urlparts['host']))
    {
        $urlparts['host'] = $urlparts['path'];
    }

    if($urlparts['host']!='')
    {

        if (!isset($urlparts['scheme']))
        {
            $urlparts['scheme'] = 'http';
        }

        if(checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'],array('http','https')) && ip2long($urlparts['host']) === false)
        {
            $urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
            $url = $urlparts['scheme'].'://'.$urlparts['host']. "/";            

            if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) 
            {
                $validation = true;
            }
        }
    }

    return $validation;

}