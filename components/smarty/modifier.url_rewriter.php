<?php
/*
* Smarty plugin
* -------------------------------------------------------------
* File:     modifier.url_rewriter.php
* Type:     modifier
* Name:     url_rewriter
* Purpose:  rewrite urls if activated
* -------------------------------------------------------------
*/
function smarty_modifier_url_rewriter($string)
{
  if (URL_REWRITER_ACTIVATED) {
    $urlParams = preg_split(
      '/\/index\.php\?c=|\/\?c=|&t=|&p\[|\]=/',
      $string,
      -1
    );

    return implode('/', $urlParams);
  }

  return $string;
}
