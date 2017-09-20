<?php
$fletter = $_REQUEST["first"];
$lletter = $_REQUEST["last"];
$noletter = $_REQUEST["number"];
if($noletter != ""){
	$noletter = ($noletter + 1);
	$numletter = intval($noletter);
}
$nvowel = $_REQUEST["vowel"];


$scrabble = fopen("wordsEn.txt", "r") or die("File not found!");
while(!feof($scrabble)){
	$word = fgets($scrabble);
		if($fletter != "" && preg_match("/^$fletter.*/", $word, $matches)==1)
			if($lletter != "" && preg_match("/^.*".$lletter."\\b/", $word, $matches)==1)
					if($noletter != "" && preg_match("/^.{".$numletter."}$/", $word, $matches)==1)
						if($nvowel != "" && preg_match_all("/[aeiou]/i", $word, $matches)==$nvowel)
							{
								print_r($word);
								print_r("<br>");
							}
}
?>