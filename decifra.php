<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style media="screen">.hide  {display: none;}</style>
        <title>Decifra</title>
        
    </head>

    <body class="cifra">
        <nav>
            <ul>
                <div class="animazioneNav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="chiSiamo.php">CHI SIAMO</a></li>
                    <li class="algoritmi"><a href="#">ALGORITMI</a>
                </div>
            </ul>
        </nav>
        <div class="container">
            <script src="copy.js"></script>

            <?php require 'decrittazione_rsa.php'; require 'RSA.php'; require 'elaborazione1.php'; require 'SYM.php'?>          
            <form method="POST" id="form">
                <div class="testi">
                    <aside>
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
                        
                        <select id="RSAmode" name="RSAmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="PKCS1">PKCS1</option>
                                <option value="OEAP">OEAP</option>
                            </optgroup>
                        </select>

                        <select id="SYMmode" name="SYMmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="CBC">CBC (Cipher Blocker Chaining)</option>
                                <option value="CTR">CTR</option>
                                <option value="OFB">OFB</option>
                                <option value="CFB">CFB</option>
                                <option value="ECB">ECB (Electronic Codebook)</option>
                            </optgroup>
                        </select>
                    </aside>

                        <div class="testoDaCifrare">
                            <h1>TESTO DA DECIFRARE</h1>
                            <textarea type="textarea" name="decritta" placeholder="inserire testo da decifrare qui" class="testoPadding"><?php if(isset($_POST["decritta"])){echo $ciphertext;}else{}?></textarea><br>
                        </div>      

                        <div class="switch">
                            <a href="cifra.php">
                                <script>setTimeout(7000);</script>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </a>
                        </div>

                        <div class="testoCifrato">
                            <h1>TESTO DECIFRATO</h1>
                            <textarea type="text" name="useless" placeholder="visualizzazione testo decifrato" style="color:white;font-size: 18px;" id="myInput" class="testoPadding"><?php 
                                if(isset($_POST["decritta"]))
                                    {echo $decifrato;}else{} 
                            ?></textarea><br>
                            <button type="button" class="copy-text" onclick="myFunction()">  
                                Copia il Testo
                            </button> 
                            <input type="text" name="key" style='width:240px;' id="decryptkey" placeholder="inserire chiave" value="<?php if(isset($_POST['key'])){echo $_POST['key'];}?>"></input><br>
                        </div>
                        <div class="testoApparizione">
                            <h1>Cos'è RSA?</h1>
                            <p>
                                RSA è un algoritmo che utilizza una chiave privata ed una pubblica 
                                per criptare il testo, questa operazione viene eseguita per rendere 
                                il messaggio incompresibile a chi non ha l'autorizzazione di leggerlo.
                            </p>
                        </div>
                    </div>
        </div>
                <div class="invia">
                    <input type='submit' value='Decifra'>
                    <p><span id="demo"></span><span id="blink">|</span></p>
                </div>    

            </form>  
        <script type="text/javascript">
            //salva la selezione precedente
            document.getElementById('decryptmode').value = "<?php echo $_POST['decryptmode'];?>";
            document.getElementById('RSAmode').value = "<?php echo $_POST['RSAmode'];?>";
            document.getElementById('SYMmode').value = "<?php echo $_POST['SYMmode'];?>";
        </script>
        <script>
            //
            (function onaction() {
            var d=document;
            var s1=d.getElementById('RSAmode');
            var s2=d.getElementById('SYMmode');
            var lo=d.getElementById('decryptmode')
            var temp;
            s1.className='hide';
            s2.className='hide';

            lo.onmousemove=function(){
            if(this.value==='1') s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            lo.onchange=function(){
            if(this.value==='1')s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            }());
        </script>
    
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

        <div id="spazioBianco"></div>
        <div class="descrizioneAlgoritmi"></div>
        <footer></footer>
    </body>
</html>