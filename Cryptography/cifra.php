<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>RSA</title>
    </head>

    <body class="cifra">
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="chiSiamo.php">CHI SIAMO</a></li>
                <li class="algoritmi"><a href="#">ALGORITMI</a>
            </ul>
        </nav>
        <div class="container">
            <script src="hackerStyle.js";></script>
            
            <?php require 'crittazione_rsa.php';require 'RSA.php';require 'elaborazione1.php';require 'SYM.php'?>            
            <form method="POST">
                <div class="testi">
                <div>
                <select name="cryptmode" id="cryptmode">
                <optgroup label ="Simmetrici">
                        <option value="0">RSA creato da noi</option>
                        <option value="1">RSA librerie</option>
                    </optgroup>
                    <optgroup label ="Asimmetrici">
                        <option value="2">AES</option>
                        <option value="3">Rijndael</option>
                        <option value="4">Twofish</option>
                        <option value="5">Blowfish</option>
                        <option value="6">RS4</option>
                        <option value="7">RS2</option>
                        <option value="8">Triple DES</option>
                        <option value="9">DES</option>
                    </optgroup>
                </select>
                <?php
                /*if($_POST['cryptmode'] == 1)
                    echo 
                    "<select required  name='rsamode' id='rsamode'>
                        <option value='OAEP'>OAEP</option>
                        <option value='PKCS1'>PKCS1</option>
                    </select>";*/
                ?>
                </div>
                    <div class="testoDaCifrare">
                        <h1>TESTO DA CIFRARE</h1>
                            <!-- inserimento testo da crittare -->
                        <textarea type="textarea" name="critta" placeholder="inserire testo da cifrare qui" id="myInput"><?php if(isset($_POST["critta"])){echo $plaintext;}else{}?></textarea><br>
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                           <!-- barre di visualizzazione dati --> 
                        <?php if(isset($_POST["critta"]))
                        {
                            if($rsa_propietario == true)
                            {echo "<input type='text' name='useless' value='Public Key(".$n.",".$d.")' style='width:240px;'></input><br>";}
                            if($rsa_librerie == true)
                            {echo "<input type='text' name='useless' value='".file_get_contents("pub.txt")."' style='width:240px;'></input><br>";}
                            if($AES || $RIJ || $TWF || $BLF || $RC4 || $RC2 || $DES3 || $DES == true)
                            {echo "<input type='text' name='useless' value='".$keydec."' style='width:240px;'></input><br>";}
                        }
                        
                        ?>
                    <div class="testoCifrato">
                        <h1>TESTO CIFRATO</h1>
                            <!-- visualizzazione testo cifrato -->
                        <textarea type="text" name="useless" placeholder="qui visualizzazione testo cifrato" style="color:white;font-size: 18px;"><?php 
                            if(isset($_POST["critta"]))
                                {echo $cifrato;}else{} 
                        ?></textarea><br>
                    </div>
                </div>
                </div>
                <div class="invia">
                        <!-- submit del programma -->
                    <input type='submit' value='Cifra'>
                    <p><span id="demo"></span><span id="blink">|</span></p>
                </div>
     
            </form>
            
           <!-- <div class='spinner-wrapper'>
                <div class="spinner"></div>
            </div>
           
            <div class="main-content"></div>
        
            <script> 
                let spinnerWrapper = document.querySelector('.spinner-wrapper');
            
                window.addEventListener('load', function () {
                    spinnerWrapper.parentElement.removeChild(spinnerWrapper); 
                });
            </script>   -->
    </body>
</html>