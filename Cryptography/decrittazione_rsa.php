<?php
require 'function.php';



//recupero dati dal form
if(isset($_POST["decritta"]) && $_POST["decryptmode"] == 0)
{
    {
    $ciphertext = $_POST["decritta"];
    $temp4 = base64_decode($ciphertext);
    $cifra_temp = explode("-", $temp4);

    }
    if(isset($_POST["key"]))
    {
        $temp = $_POST["key"];
        $n = between_word($temp,'(',',');
        $d = between_word($temp,',',')');
        $n = intval($n);
        $d = intval($d);
    }
    if(isset($_POST["key"]))
    {

        //decifratura messaggio
        $decifra = decifratore($cifra_temp,$d,$n);
        //conversione ascii to character
        for($i = 0; $i != count($decifra); $i++)
        {
        $temp = $decifra[$i];
        $output[$i] = chr($temp);
        }
        $decifrato = implode("",$output);   
    }
}
?>