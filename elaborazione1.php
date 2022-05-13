<?php
$tmp = 0;
if (isset($_POST['cryptmode']))
    $mode = $_POST['cryptmode'];
else{$mode = 0;$tmp = 1;}
if (isset($_POST['decryptmode']))
    $mode = $_POST['decryptmode'];
else
    if ($tmp == 1){$mode = 0;$tmp = 0;}
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
//BLF
if($mode == 5)
    $BLF = true;
else
    $BLF = false;
//RC4
if($mode == 6)
    $RC4 = true;
else
    $RC4 = false;
//RC2
if($mode == 7)
    $RC2 = true;
else
    $RC2 = false;
//3DES
if($mode == 8)
    $DES3 = true;
else
    $DES3 = false;
//3DES
if($mode == 9)
    $DES = true;
else
    $DES = false;



// selezione metodo di cifratura
if (isset($_POST['RSAmode']))
    $RSAmode = $_POST['RSAmode'];
else{$RSAmode = 'PKCS1';}

if (isset($_POST['SYMmode']))
    $SYMmode = $_POST['SYMmode'];
else{$SYMmode = 'CBC';}
?>