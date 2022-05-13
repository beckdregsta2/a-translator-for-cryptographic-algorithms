<?php


//controlla se un numero è primo o no
function primeChecker($n){
  if ($n == 1)
  return 0;
  for ($i = 2; $i <= $n/2; $i++)
      if ($n % $i == 0)
          return 0;
  return 1;
}


// massimo comune multiplo di due numeri
function gcd($a,$b){
  for($i=2; $i<=$a && $i<=$b; $i++)
  {
  if(($a % $i == 0) && ($b % $i == 0))
    $gcd = $i;
  }
}


//funzione per trovare l'esponente pubblico e coprimo e più piccolo di phi
function e($phi){
  $prime = 0;
  $gcd = 0;
  while($gcd != 1 && $prime != 1){
    $e = rand($phi/2, $phi-1);
    $prime = primeChecker($e);
    $gcd = gcd($phi, $e);
  }
  return $e;
}


//algoritmo di euclide esteso per trovare l'esponente privato d
function algEuclide($phi, $e){
  $temp = null;
  $a = 0;
  $b = 1;
  $z = $phi;
  do{
      $quoziente = intdiv($phi, $e);
      $resto = $phi % $e;
      $temp = $b;
      $b = $a - ($b * $quoziente);
      $a = $temp;
      $phi = $e;
      $e = $resto;
      if($b < 0 && $resto == 1)
          $b += $z;
  }while($resto != 1);
  return $b;
}

//elaborazione chiavi
function powm($msg, $i, $esponente, $n)
{
try{
$powm = pow($msg[$i],2) % $n;
}catch(TypeError $e){}
$temp = 1;
for($k = 0; $k < (intdiv($esponente, 2)); $k++)
  $temp = ($temp * $powm) % $n;
try{
$output = ($temp * $msg[$i]) % $n;
return $output; 
}catch(TypeError $e){echo '<font color="red">errore: valore non inserito correttamente</font>';}
}


// cifratura array messaggio
function cifratore($msg,$e,$n){
  for($i = 1; $i<count($msg)+1; $i++){
    $msg[$i] = powm($msg,$i,$e,$n);
  }
  return $msg;
}
 
// decifratura array crittato
function decifratore($msg,$d,$n){
  for($i = 0; $i<count($msg); $i++){
    $msg[$i] = powm($msg,$i,$d,$n);
  }
  return $msg;
}

// seleziona valori tra delle parole (gestione key)
function between_word($string, $start, $end){
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}

?>