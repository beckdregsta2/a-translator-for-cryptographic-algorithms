<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <script src="hackerStyle.js"></script>
            <?php require 'decrittazione_rsa.php';require 'RSA.php';require 'elaborazione1.php';require 'SYM.php'?>          
            <form method="POST">
                <div class="testi">
                <div>
                <select name="decryptmode" id="decryptmode">
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
                </div>
                    <div class="testoDaCifrare">
                        <h1>TESTO DA DECIFRARE</h1>
                        <textarea type="textarea" name="decritta" placeholder="inserire testo da decifrare qui"><?php if(isset($_POST["decritta"])){echo $ciphertext;}else{}?></textarea><br>
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>      

                    <div class="testoCifrato">
                        <h1>TESTO DECIFRATO</h1>
                        <textarea type="text" name="useless"placeholder="visualizzato qui" style="color:white;font-size: 18px;"><?php 
                            if(isset($_POST["decritta"]))
                                {echo $decifrato;}else{} 
                        ?></textarea><br>
                        <input type="text" name="key" style='width:240px;' placeholder="inserire chiave" value="<?php if(isset($_POST['key'])){echo $_POST['key'];}?>"></input><br>

                    </div>
                </div>
                </div>
                <div class="invia">
                    <input type='submit' value='Decifra'>
                    <p><span id="demo"></span><span id="blink">|</span></p>
                </div>    
            </form>  
    </body>
</html>