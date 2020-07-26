<?php
function getUniqId($in=false) {
  if ($in===false) $in=microtime(1)*10000;
  static $a = [0,1,2,3,4,5,6,7,8,9
    ,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
    ,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
  ];
  $base = sizeof($a);
  $h = '';
  while($in>=$base) {
    $d1 = floor($in/$base);
    $ost = $in-$d1*$base;
    $in = $d1;
    $h .= $a[$ost];
  }//while
  return strrev($h.$a[$in]);
}
function encode($text, $key)
{
    $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
    $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
    if (mcrypt_generic_init ($td, $key, $iv) != -1) 
        {
        $enc_text=base64_encode(mcrypt_generic ($td,$iv.$text));
        mcrypt_generic_deinit ($td);
        mcrypt_module_close ($td);
        return $enc_text;
        }       
}

function strToHex($string)
{
    $hex='';
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }

    return $hex;
}

function decode($text, $key)
{        
        $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
        $iv_size = mcrypt_enc_get_iv_size ($td);
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);     
        if (mcrypt_generic_init ($td, $key, $iv) != -1) {
                $decode_text = substr(mdecrypt_generic ($td, base64_decode($text)),$iv_size);
                mcrypt_generic_deinit ($td);
                mcrypt_module_close ($td);
                return $decode_text;
        }
}

function hexToStr($hex)
{
    $string = "";
    for ($i=0; $i < strlen($hex) - 1; $i+=2)
    {
        $string .= chr(hexdec($hex[$i]."".$hex[$i+1]));
    }
    return $string;
}
?>