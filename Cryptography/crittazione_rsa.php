<?php 
require 'function.php';



//recupero dati dal form
if(isset($_POST["critta"]) && $_POST["cryptmode"] == 0)
{
    $plaintext = $_POST["critta"];

    $msg = (unpack("C*",$plaintext));


    //generazione casuale dei numeri primi p e q
    $pver = false;
    $qver = false;

    while ($pver != true)
    { 
        $p = rand(380,2048);
        if (gmp_prob_prime("$p") != 0){
            $pver == true;
            //echo "p =".$p."<br>";
            break;
        }
        else{$pver == false;}
    }
    while ($qver != true)
    { 
        $q = rand(380,2048);
        if ((gmp_prob_prime("$q") != 0) and ($p != $q)){
            $qver == true;
            //echo "q =".$q."<br>";
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
    $cifrato = base64_encode(implode("-",$cifra));

    
}
?>