<html>
<style>

.nmargin{
    margin-top: 0.3em;
    margin-bottom: 0;
    padding-top: 0.5em;
    padding-bottom: 0;
    line-height: 1.6;
    margin: 0;
    padding-top: 0.5em;
    font-family: sans-serif;
    display: block;
    overflow: hidden;
    font-weight: bold;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
h1{
	font-size: 1.8em;
	font-family: 'Linux Libertine','Georgia','Times',serif;
    line-height: 1.3;
    font-weight: normal;
	margin-bottom: 0.25em;
    border-bottom: 1px solid #a2a9b1;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;

}

h2{
    margin-top: 1em;
    font-weight: normal;
    font-size: 1.5em;
    margin-bottom: 0.25em;
    font-family: 'Linux Libertine','Georgia','Times',serif;
    line-height: 1.3;
    border-bottom: 1px solid #a2a9b1;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;

}


h3{
    font-size: 1.2em;
	margin-block-start: 1em;
    margin-block-end: 1em;
}

h4{
    font-size: 100%;
	margin-block-start:1em;
    margin-block-end: 1em;
}

h5{
    font-size: 100%;
	margin-block-start: 0.8em;
    margin-block-end: 0.8em;

}

h6{
    font-size: 100%;
	margin-block-start: 0.6em;
    margin-block-end: 0.6em;
}


</style>


<?php

function test($filename) {
	$pattern = array(
		//heading
		"/^= (.+?) =$/m",

		
		// horizontal rule
		"/----/",
		
		// line break
		"/\n\n/",
		"/^\n$/",		
		
		// identation
		"/[\n]?^:(?!:) *(.+)$/m",
		"/[\n]?^::(?!:) *(.+)$/m",
		"/[\n]?^:::(?!:) *(.+)$/m",
		"/[\n]?^::::(?!:) *(.+)$/m",
		"/[\n]?^:::::(?!:) *(.+)$/m",
		"/[\n]?^::::::(?!:) *(.+)$/m",
		
		// blockquote
        "/^\{\{Quote\n\|text=(.+)\n}}$/m",
        "/^\{\{Quote\n\|text=(.+)\n\|author=(.+)\n}}/m",	

		// unordered list
		"/^\*(?!\*) (.*)/m",
		"/^\*\*(?!\*) (.*)/m",	
		"/^\*\*\*(?!\*) (.*)/m",	
		"/^\*\*\*\*(?!\*) (.*)/m",	
		
		
	);
	$replace = array(
		//heading
		"<h1>$1</h1>",

		
		// horizontal rule
		"<hr />",
		
		// line break
		"<br>",
		"<br>",
		
		// identation
		"\n<blockquote>$1</blockquote>",
		"\n<blockquote><blockquote>$1</blockquote></blockquote>",
		"\n<blockquote><blockquote><blockquote>$1</blockquote></blockquote></blockquote>",
		"\n<blockquote><blockquote><blockquote><blockquote>$1</blockquote></blockquote></blockquote></blockquote>",
		"\n<blockquote><blockquote><blockquote><blockquote><blockquote>$1</blockquote></blockquote></blockquote></blockquote></blockquote>",
		"\n<blockquote><blockquote><blockquote><blockquote><blockquote><blockquote>$1</blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>",
		
		// blockquote			
        "<blockquote>$1<blockquote>",
        "<blockquote>$1<br>  <blockquote>-$2<blockquote>",	

		//unordered list
		"<ul><li> $1 </li></ul>",
		"<ul><blockquote><li> $1 </li></blockquote></ul>",
		"<ul><blockquote><blockquote><li> $1 </li></blockquote></blockquote></ul>",
		"<ul><blockquote><blockquote><blockquote><li> $1 </li></blockquote></blockquote></blockquote></ul>",
		
	);
	$handle = fopen($filename,"r") or die("Cannot open" . $filename);
	
	while ($data = fgets($handle)){
		//echo $data ;
		echo preg_replace($pattern,$replace,$data);
		
	}

}


?>

<html>