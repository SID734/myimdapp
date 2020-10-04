<?php

$name = "siddhesh";
$hash = md5($name);
echo $hash;
$nonce = 0;
$t = time();
$prevHash = md5("moresiddheshbharat");
echo "<br>".$prevHash."<br>";

function mineBlock($prevHash,$t,$name,$nonce){
	$hash = "";
while(!(substr($hash,0,6)==="000000")){
	$nonce++;
	$hash = md5($t.$prevHash.$name.$nonce);
}
echo "string";
return array($hash,$nonce);
}

list($result,$nonceV) = mineBlock($prevHash,$t,$name,$nonce);
echo "<br>".$result;
echo "<br>".$nonceV;

?>