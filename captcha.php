<?php
$r1=range(0,9);
$r1random=array_rand($r1);

$r2=range(0,9);
$r2random=array_rand($r2);
$pattern= $r1random."+".$r2random."= ?";
$captchasum=$r1random+$r2random;
?>