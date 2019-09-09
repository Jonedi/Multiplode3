<!-- FizzBuzz -->
<?php
for ($n = 1; $n <= 100; $n++) {
	$salida= '';
	
	if($n % 3 == 0){
		$salida = 'Fizz';
	}
	if($n % 5 == 0) {
		$salida = 'FizzBuzz';
	}
	if(!$salida) {
		$salida = $n;
	}
	echo $salida . '<br>';
}
?>