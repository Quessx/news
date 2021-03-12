<?php


class Curl
{

	protected function get_contents($url){
		return file_get_contents($url);
	}

    protected function getDataByOrder($text, $limit1, $limit2, $order) {
        for ( $i = 1; $i <= $order; $i++ ) {
            $pos = strpos($text, $limit1);
            if ( $pos === false )
                return false;
            else {
                $pos += strlen($limit1);
                $text = substr($text, $pos);
                if ( $i == $order )
                {
                    $pos = strpos($text, $limit2);
                    if ( $pos === false )	return false;
                    else	$text = substr($text, 0, $pos);
                }
            }
        }
        return $text;
    }

}