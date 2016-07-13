<?php
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
$fh = fopen('songs.txt','r');
$songs = [];
while ($line = fgets($fh)) {
	if(startsWith($line, '##') == false){


	$lineData = explode('#$#', $line);
	
				$num = $lineData[0];
	    		$songs[$num]['title'] = $lineData[1];//title
                $songs[$num]['cat'] = $lineData[2];//cat
                $songs[$num]['tune'] = $lineData[3];//tune
                $songs[$num]['words'] = $lineData[4];//words
                $songs[$num]['music'] = $lineData[5];//music
                $text = trim(str_replace(['@%', '@$'], "\n", $lineData[6]));
                $text = str_replace(['Припев','Куплет'],['<br><strong>Припев</strong>','<br><strong>Куплет</strong>'],$text);
                
                $songs[$num]['text'] =  $text;//music
        } 
}
	echo '<pre>', var_dump($songs), '</pre>';

fclose($fh);


