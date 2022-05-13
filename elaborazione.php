<?php 

require 'function.php';
require 'RSAR.php';



//recupero dati dal form
if(isset($_POST["input_value"]))
  $msg_string = $_POST["input_value"];
else
  echo "inserire un valore";


//conversione da character ad ascii
$msg = (unpack("C*",$msg_string));





//generazione casuale dei numeri primi p e q
$pver = false;
$qver = false;

while ($pver != true)
{ 
  $p = rand(380,2048);
  if (gmp_prob_prime("$p") != 0){
      $pver == true;
      echo "p =".$p."<br>";
      break;
  }
  else{$pver == false;}
}

while ($qver != true)
{ 
  $q = rand(380,2048);
  if ((gmp_prob_prime("$q") != 0) and ($p != $q)){
      $qver == true;
      echo "q =".$q."<br>";
      break;
  }
  else{$qver == false;}
}



//calcolo di n
$n = $p * $q;

// calcolo di z
$phi = ($p - 1) * ($q - 1);

// generazione esponente pubblico e
$e = e($phi);

// generazione esponente privato d
$d = algEuclide($phi, $e);

//cifratura messaggio
$cifra = cifratore($msg,$e,$n);

//decifratura messaggio
$decifra = decifratore($cifra,$d,$n);









//conversione ascii to character
for($i = 1; $i != count($decifra)+1; $i++)
{
  $temp = $decifra[$i];
  $output[$i] = chr($temp);
}




//output 
echo"n =".$n."<br>";
echo"phi(z) =".$phi."<br>";
echo "e =".$e."<br>";
echo "d =".$d;
echo "<br> messaggio :";
print_r($msg);
echo "<br> cifrato :";
print_r($cifra);
echo "<br> decifrato :";
print_r($decifra);
echo "<br> convertito in carattere :";
print_r($output);

?>