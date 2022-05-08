<?php
require __DIR__ . '/vendor/autoload.php';
use phpseclib\Crypt\AES;
use phpseclib\Crypt\Rijndael;
use phpseclib\Crypt\Twofish;
use phpseclib\Crypt\Blowfish;
use phpseclib\Crypt\RC4;
use phpseclib\Crypt\RC2;
use phpseclib\Crypt\TripleDES;
use phpseclib\Crypt\DES;
use phpseclib\Crypt\Random;


//generazione chiave asimmetrica
function SYM_keygen($lenght)
{
    $key = openssl_random_pseudo_bytes($lenght);
    return $key;
}
//crittazione con AES
function encryptAES($encryptionKey, $textInput, $SYMmode)
{
    switch ($SYMmode)
    {
        case 'CBC':
            $cipher = new AES(AES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new AES(AES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new AES(AES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new AES(AES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new AES(AES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $iv = '';
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    $encryptedResult = $iv . $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con AES
function decryptAES($encryptionKey, $encryptedString, $SYMmode)
{
    $data = base64_decode($encryptedString);
    switch ($SYMmode) 
    {
        case 'CBC':
            $cipher = new AES(AES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new AES(AES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new AES(AES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new AES(AES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new AES(AES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $cipherText = $data;
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    return $cipher->decrypt($cipherText);
}





//crittazione con RIJ
function encryptRIJ($encryptionKey, $textInput, $SYMmode)
{
    switch ($SYMmode)
    {
        case 'CBC':
            $cipher = new Rijndael(Rijndael::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new Rijndael(Rijndael::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new Rijndael(Rijndael::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new Rijndael(Rijndael::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new Rijndael(Rijndael::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $iv = '';
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    $encryptedResult = $iv . $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con RIJ
function decryptRIJ($encryptionKey, $encryptedString, $SYMmode)
{
    $data = base64_decode($encryptedString);
    switch ($SYMmode) 
    {
        case 'CBC':
            $cipher = new Rijndael(Rijndael::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new Rijndael(Rijndael::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new Rijndael(Rijndael::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new Rijndael(Rijndael::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new Rijndael(Rijndael::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $cipherText = $data;
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    return $cipher->decrypt($cipherText);
}

//crittazione con Twofish
function encryptTWF($encryptionKey, $textInput)
{
    $cipher = new Twofish();
    $cipher->setKey($encryptionKey);
    $encryptedResult = $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con Twofish
function decryptTWF($encryptionKey, $encryptedString)
{
    $cipher = new Twofish();
    $data = base64_decode($encryptedString);
    $cipher->setKey($encryptionKey);
    $cipherText = $cipher->decrypt($data);
    return $cipherText;
}

//crittazione con Blowfish
function encryptBLF($encryptionKey, $textInput)
{
    $cipher = new Blowfish();
    $cipher->setKey($encryptionKey);
    $encryptedResult = $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con Blowfish
function decryptBLF($encryptionKey, $encryptedString)
{
    $cipher = new Blowfish();
    $data = base64_decode($encryptedString);
    $cipher->setKey($encryptionKey);
    $cipherText = $cipher->decrypt($data);
    return $cipherText;
}

//crittazione con RC4
function encryptRC4($encryptionKey, $textInput)
{
    $cipher = new RC4();
    $cipher->setKey($encryptionKey);
    $encryptedResult = $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con RC4
function decryptRC4($encryptionKey, $encryptedString)
{
    $cipher = new RC4();
    $data = base64_decode($encryptedString);
    $cipher->setKey($encryptionKey);
    $cipherText = $cipher->decrypt($data);
    return $cipherText;
}

//crittazione con RC2
function encryptRC2($encryptionKey, $textInput)
{
    $cipher = new RC2();
    $cipher->setKey($encryptionKey);
    $encryptedResult = $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con RC2
function decryptRC2($encryptionKey, $encryptedString)
{
    $cipher = new RC2();
    $data = base64_decode($encryptedString);
    $cipher->setKey($encryptionKey);
    $cipherText = $cipher->decrypt($data);
    return $cipherText;
}

//crittazione con 3DES
function encrypt3DES($encryptionKey, $textInput, $SYMmode)
{
    switch ($SYMmode)
    {
        case 'CBC':
            $cipher = new TripleDES(DES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new TripleDES(DES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new TripleDES(DES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new TripleDES(DES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new TripleDES(DES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $iv = '';
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    $encryptedResult = $iv . $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con 3DES
function decrypt3DES($encryptionKey, $encryptedString, $SYMmode)
{
    $data = base64_decode($encryptedString);
    switch ($SYMmode) 
    {
        case 'CBC':
            $cipher = new TripleDES(DES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new TripleDES(DES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new TripleDES(DES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new TripleDES(DES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new TripleDES(DES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $cipherText = $data;
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    return $cipher->decrypt($cipherText);
}

//crittazione con DES
function encryptDES($encryptionKey, $textInput, $SYMmode)
{
    switch ($SYMmode)
    {
        case 'CBC':
            $cipher = new DES(DES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new DES(DES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new DES(DES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new DES(DES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = Random::string($cipher->getBlockLength() >> 3);
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new DES(DES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $iv = '';
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    $encryptedResult = $iv . $cipher->encrypt($textInput);
    return base64_encode($encryptedResult);
}

//decrittazione con DES
function decryptDES($encryptionKey, $encryptedString, $SYMmode)
{
    $data = base64_decode($encryptedString);
    switch ($SYMmode) 
    {
        case 'CBC':
            $cipher = new DES(DES::MODE_CBC);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CTR':
            $cipher = new DES(DES::MODE_CTR);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'OFB':
            $cipher = new DES(DES::MODE_OFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'CFB':
            $cipher = new DES(DES::MODE_CFB);
            $cipher->setKey($encryptionKey);
            $iv = substr($data, 0, $cipher->getBlockLength() >> 3);
            $cipherText = substr($data, $cipher->getBlockLength() >> 3, strlen($encryptedString));
            $cipher->setIV($iv);
            break;
        case 'ECB':
            $cipher = new DES(DES::MODE_ECB);
            $cipher->setKey($encryptionKey);
            $cipherText = $data;
            break;
        default:
            throw new \Exception('errore nel metodo di cifratura: ' . $SYMmode, 500);
            break;
    }
    return $cipher->decrypt($cipherText);
}

//gestione algoritmi di crittografia nella crittazione
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 2)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptAES($key,$plaintext,$SYMmode);
}

if (isset($_POST["critta"]) && $_POST["cryptmode"] == 3)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptRIJ($key,$plaintext,$SYMmode);
}

if (isset($_POST["critta"]) && $_POST["cryptmode"] == 4)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptTWF($key,$plaintext);
}
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 5)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptBLF($key,$plaintext);
}
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 6)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptRC4($key,$plaintext);
}
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 7)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptRC2($key,$plaintext);
}
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 8)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encrypt3DES($key,$plaintext,$SYMmode);
}
if (isset($_POST["critta"]) && $_POST["cryptmode"] == 9)
{
    $plaintext = $_POST["critta"];
    $key = SYM_keygen(10);
    $cifrato = encryptDES($key,$plaintext,$SYMmode);
}


//gestione algoritmi di crittografia nella decrittazione

// decodifica la chiave da base64
if (isset($_POST['key'])){$key = base64_decode($_POST['key']);}


if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 2)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptAES($key,$ciphertext,$SYMmode);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 3)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptRIJ($key,$ciphertext,$SYMmode);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 4)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptTWF($key,$ciphertext);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 5)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptBLF($key,$ciphertext);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 6)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptRC4($key,$ciphertext);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 7)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptRC2($key,$ciphertext);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 8)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decrypt3DES($key,$ciphertext,$SYMmode);
}
if (isset($_POST["decritta"]) && $_POST["decryptmode"] == 9)
{
    $ciphertext = $_POST["decritta"];
    $decifrato = decryptDES($key,$ciphertext,$SYMmode);
}


// codifica la chiave in base64 per essere visualizzata
if (isset($key)){$keydec = base64_encode($key);}
?>