<?php
	//Strips links in a terrifying and confusing way.
    $var = fread_url($url);
            
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?/)?<\/a>/", 
                    $var, &$matches);
        
    $matches = $matches[1];
    $list = array();

    foreach($matches as $var)
    {    
        print($var."<br>");
    }

    function fread_url($url,$ref="")
    {
        if(function_exists("curl_init")){
            $ch = curl_init();
            $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; ".
                          "Windows NT 5.0)";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
            curl_setopt( $ch, CURLOPT_HTTPGET, 1 );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_REFERER, $ref );
            curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            $html = curl_exec($ch);
            curl_close($ch);
        }
        else{
            $hfile = fopen($url,"r");
            if($hfile){
                while(!feof($hfile)){
                    $html.=fgets($hfile,1024);
                }
            }
        }
        return $html;
    }
	$url = "http://184.95.47.165/latest/";
	
	
	 $var = fread_url($url);
            
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                    $var, &$matches);
        
    $matches = $matches[1];
    $list = array();

    foreach($matches as $var)
    {   
	//EXCLUDES
	/* 
		if($var != "/"){
		if($var != "../"){
		if($var != "Changelog.txt"){
		if($var != "old/"){
		if($var != "md5checksums.txt"){
        echo($var."|");
    }}}}}*/
	}
	echo($url);
	
?>