<?php
if (isset($_POST['decryptmode']))
{
    $mode = $_POST['decryptmode'];
}
else
{
    $mode = 0;
}
           //algoritmi di crittografia Asimmetrici

//RSA propietario
if($mode == 0)
    $rsa_propietario = true;
else
    $rsa_propietario = false;
//RSA librerie
if($mode == 1)
    $rsa_librerie = true;
else
    $rsa_librerie = false;

            //algoritmi di crittografia simmetrici

//AES
if($mode == 2)
    $AES = true;
else
    $AES = false;
//RIJ
if($mode == 3)
    $RIJ = true;
else
    $RIJ = false;
//TWF
if($mode == 4)
    $TWF = true;
else
    $TWF = false;
?>