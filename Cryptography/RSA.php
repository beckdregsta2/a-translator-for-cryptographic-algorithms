<?php 
//phpseclib-2.0\phpseclib\Crypt\RSA.php

require __DIR__ . '/vendor/autoload.php';
use phpseclib\Crypt\RSA;
$rsa = new RSA();

function keygen()
{
    $rsa = new RSA();
    //$rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_PKCS1);
    //$rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_PKCS1);
    $keys = $rsa->createKey(1024);
    /*$priv = $keys['privatekey'];
    $pub = $keys['publickey'];*/


    $current = file_get_contents(getKeyPubFile());
    $current = $keys['publickey'];
    $pub = file_put_contents(getKeyPubFile(), $current);

    $current = file_get_contents(getKeyPrivFile());
    $current = $keys['privatekey'];
    $priv = file_put_contents(getKeyPrivFile(), $current);
    return $priv && $pub;
}



function encryptRSA($plaintext)
{
    keygen();
    $rsa = new RSA();
    $rsa->loadKey(file_get_contents(getKeyPubFile()));
    if($_POST['RSAmode'] == 'OEAP')
        $rsa->setEncryptionMode(RSA::ENCRYPTION_OAEP);
    $ciphertext = $rsa->encrypt($plaintext);
    $ciphertext = base64_encode($ciphertext);
    return $ciphertext;
}
function decryptRSA($ciphertext)
{
    $rsa = new RSA(); 
    $rsa->loadKey(file_get_contents(getKeyPrivFile()));
    $ciphertext = base64_decode($ciphertext);
    $decryptedText = $rsa->decrypt($ciphertext);
    return $decryptedText;
}


function getKeyPubFile()
{return 'pub.txt';}

function getKeyPrivFile()
{return 'priv.txt';}

function RSAenMode()
{
    //creazione della scelta dell algoritmo encrypt da usare RSa OEAP o prks1
}

if(isset($_POST["critta"]) && $_POST["cryptmode"] == 1)
{
    $plaintext = $_POST["critta"];
    $cifrato = encryptRSA($plaintext);
}
if(isset($_POST["decritta"]) && $_POST["decryptmode"] == 1)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptRSA($ciphertext);
}





?>
