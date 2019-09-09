<!-- números multiplos de 3 del 1 a 105 y colorear los pares de rojo -->
<?php
$limit = 105;
$num = 3;
$par = 2;


for ($i=0; $i<=$limit; $i++) {
	$res = '';
	
    if($i % $num==0) {
        $res= $i;
    } 
	if($i % $num==0 and $i % $par==0) {
        $res = "<font color='red'>".$i."</font>"; 
    }
	
	echo $res . "\n";
}
?>