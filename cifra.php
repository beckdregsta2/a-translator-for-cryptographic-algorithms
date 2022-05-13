<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <style media="screen">.hide  {display: none;}</style>
        <title>Cifra</title>
        
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
            
            <?php require 'crittazione_rsa.php'; require 'RSA.php'; require 'elaborazione1.php'; require 'SYM.php'?>            
            <form method="POST" id="form">
                <div class="testi">
                    <aside>
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

                        <select id="RSAmode" name="RSAmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="PKCS1">PKCS1</option>
                                <option value="OEAP">OEAP</option>
                            </optgroup>
                        </select>

                        <select id="SYMmode" name="SYMmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="CBC">CBC (Cipher Blocker Chaining)</option>
                                <option value="CTR">CTR (Cipher Counter)</option>
                                <option value="OFB">OFB (Output FeedBack)</option>
                                <option value="CFB">CFB (Cipher FeedBack)</option>
                                <option value="ECB">ECB (Electronic Codebook)</option>
                            </optgroup>
                        </select>
                    </aside>

                        <div class="testoDaCifrare">
                            <h1>TESTO DA CIFRARE</h1>
                                <!-- inserimento testo da crittare -->
                            <textarea type="textarea" name="critta" placeholder="inserire testo da cifrare qui" class="testoPadding"><?php if(isset($_POST["critta"])){echo $plaintext;}else{}?></textarea><br>
                        </div>
                            <!-- barre di visualizzazione dati --> 
                            <?php if(isset($_POST["critta"]))
                            {
                                if($rsa_propietario == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='Public Key(".$n.",".$d.")' style='width:240px;'></input><br>";}
                                if($rsa_librerie == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='".file_get_contents("pub.txt")."' style='width:240px;'></input><br>";}
                                if($AES || $RIJ || $TWF || $BLF || $RC4 || $RC2 || $DES3 || $DES == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='".$keydec."' style='width:240px;'></input><br>";}
                            }
                            
                            ?>

                        <div class="switch">
                            <a href="decifra.php">
                                <script>setTimeout(7000);</script>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </a>
                        </div>
                        
                        <div class="testoCifrato">
                            <h1>TESTO CIFRATO</h1>
                                <!-- visualizzazione testo cifrato -->
                            <textarea type="text" name="useless" placeholder="visualizzazione testo cifrato" style="color:white;font-size: 18px;" id="myInput" class="testoPadding"><?php 
                                if(isset($_POST["critta"]))
                                    {echo $cifrato;}else{} 
                            ?></textarea><br>
                            <button type="button" class="copy-text" onclick="myFunction()">  
                                Copia il Testo
                            </button> 
                        </div>
                    </div>
        </div>                 
                <div class="testoApparizione">
                <?php if($rsa_propietario == true && empty($_POST["critta"])!= false )
                   echo "
                   <div class='spazioBianco'></div>
                   <!-- <div class='informazioni'><h1>PROCEDIMENTO</h1></div> -->
                   <div class='informazioniAlgoritmi'>
                       <div class='descrizioneAlgoritmo'>
                           <h1>RSA</h1>
                           <p>RSA è un algoritmo a chiave asimmetrica<br> inventato nel 77, e permette di
                               criptare<br> un testo per renderlo illegibile<br> a chi non è autorizzato.
                           </p>
                       </div>
           
                       <div class='procedimento'>
                           <h1>PROCEDIMENTO</h1>
                           <p>
                           si scelgono due numeri primi p e q<br> tipicamente molto grandi, 
                           <br>in questo caso |p=$p q=$q|<br>
                           successivamente si calcola n,<br> 
                           moltiplicando p e q |$n=$p*$q|<br>
                           si calcola n, moltiplicando p e q (n=p*q)<br>
                           si calcola 𐌘(phi) con la formula (p-1)*(q-1)<br>
                           si sceglie l'esponente pubblico coprimo<br> 
                           e più piccolo di 𐌘(phi) |$e|<br>
                           si calcola l'esponente privato d in questo caso<br> 
                           con il metodo di eculide esteso |$d|<br>
                           A questo punto si procede con la cifratura<br> 
                           del messaggio -cifrato = messaggio^e mod n<br>  
                           |$cifrato=$plaintext^$e mod $n|<br>
                           -messaggio = cifrato^d mod n<br>
                           la sicurezza di RSA che l'esponente modulare n<br> 
                           sia una funzione difficilmente invertibile<br> 
                           all'aumentare della sua grandezza<br>  
                           e quindi usando numeri p,q sufficientemente grandi<br> 
                           (1024bit) la sicurezza è molto elevata
           
                           </p>
                       </div>
                   </div>
                   ";
                   if($rsa_propietario == true && empty($_POST["critta"])!= true )
                       echo 
                       "
                       <div class='spazioBianco'></div>
                       <!-- <div class='informazioni'><h1>PROCEDIMENTO</h1></div> -->
                       <div class='informazioniAlgoritmi'>
                           <div class='descrizioneAlgoritmo'>
                               <h1>RSA</h1>
                               <p>RSA è un algoritmo a chiave asimmetrica<br> inventato nel 77, e permette di
                                   criptare<br> un testo per renderlo illegibile<br> a chi non è autorizzato.
                               </p>
                           </div>
                       <h1>Cosa è RSA?</h1>
                        <p>
                           RSA è un algoritmo a chiave asimmetrica inventato nel 77, e permette di
                           criptare un testo per renderlo illegile a chi non è autorizzato.
                           <br>
                           <br>
                           Per l'effettiva implementazione del linguaggio è necessario inanzitutto creare entrambe le chiavi
                           <br>
                           <br>
                           si scelgono due numeri primi p e q tipicamente molto grandi, in questo caso |p=$p q=$q|
                           <br>
                           successivamente si calcola n, moltiplicando p e q |$n=$p*$q|
                           <br>
                           si calcola 𐌘(phi) con la formula (p-1)*(q-1) |$phi=($p-1)*($q-1)|
                           <br>
                           si sceglie l'esponente pubblico e, coprimo e più piccolo di 𐌘(phi) |$e|
                           <br>
                           si calcola l'esponente privato d in questo caso con il metodo di eculide esteso |$d|
                           <br>
                           <br>
                           A questo punto si procede con la cifratura del messaggio
                           <br>
                            -cifrato = messaggio^e mod n |$cifrato=$plaintext^$e mod $n|
                            -messaggio = cifrato^d mod n
                            <br>
                            <br>
                            la sicurezza di RSA che l'esponente modulare n sia una funzione difficilmente invertibile all'aumentare della sua grandezza e quindi usando numeri p,q sufficientemente grandi (1024bit) la sicurezza è molto elevata
                            <br>
                            
                        </p>";
                   if($rsa_librerie == true && empty($_POST["critta"])!= true )
                   echo "
                       RSA è un algoritmo a chiave asimmetrica inventato nel 1977 da scienziati del MIT, che permette la creazione
                       di due chiavi tramite una funzione facile da computare ma difficile da invertire a meno che non si conosca la chiave.
                       La sicurezza di RSA si basa sul fatto che l'esponente modulare n sia una funzione difficilmente invertibile all'aumentare 
                       della sua grandezza e quindi usando numeri p,q sufficientemente grandi ( tipicamente 1024bit) la sicurezza è estremamente alta
                       con le tecnologie attuali.


                       <br>
                       <br>
                       <br>
                       <br>

                       Per l'effettiva implementazione del linguaggio è necessario inanzitutto creare entrambe le chiavi
                       <br>
                       <br>
                       si scelgono due numeri primi p e q molto grandi
                       <br>
                       si calcola n, moltiplicando p e q (n=p*q)
                       <br>
                       si calcola 𐌘(phi) con la formula (p-1)*(q-1)
                       <br>
                       si sceglie l'esponente pubblico e, coprimo e più piccolo di 𐌘(phi)
                       <br>
                       si calcola l'esponente privato d usando una delle formule possibili, con il metodo di euclide esteso (d*e mod 𐌘 ≡ 1)

                       ed in fine creando le chiavi ////////qui se vuoi puoi mettere due textarea con le chiavi publica e privata sono estremamente grandi fai conto//////
                       <br>
                       <br>
                       A questo punto si procede con la cifratura messaggio
                       <br>
                       ////////////qui fai la stessa cosa di rsa proprietario nostro con le input//////////
                        <br>
                        <br>
                   ";
                   if($AES = true && empty($_POST["critta"])!= true )
                   echo "
                       AES (Advanced Encryption Standard) è uno standard di cifratura a chiave simmetrica adottato dalla 
                       <a href='https://it.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology'>NIST</a>
                       dopo vari anni di studi e selezione tra vari algiritmi proposti venne scelto Rijndael.
                       I criteri per cui è stato scelto sono la sua capacità di poter essere impiegato in un ampia gamma di applicazioni,
                       uso di risorse elaborative minime, semplice, veloce, sicuro e multiplatform.
                       

                       AES è un cifrario a blocchi di lunghezza fissa a 128 bits con chiavi che variano da 128, 192, 256 bits
                       (si differenzia da Rijndael perchè quest'ultimo usa chiavi a multipli di 32 con minimo 128 max 256, 
                       <a href='https://csrc.nist.gov/csrc/media/projects/cryptographic-standards-and-guidelines/documents/aes-development/rijndael-ammended.pdf'> qui</a>)la lista dei cambiamenti

                       
                       Le operazioni eseguite da AES consistono in una serie di permutazioni spostamenti e sostituzioni

                       La prima fase AddRaundKey consiste nella creazione di una matrice 4x4 di 128 bits e da qui si procede con la cifratura
                       -SubBytes in cui si sostituiscono in maniera non lineare tutti i byte della tabella
                       -ShiftRows in cui si spostano le caselle di un certo numero di posizioni seguendo le righe
                       -MixColumns combinazione delle righe in maniera lineare
                       -AddRoundKey in cui ogni byte della tabella viene combinato dalla chiave di sessione generata 
                       Tutte queste operazioni vengono effettuate per 10 cicli
                       (cifratura e decifratura si differenziano dall'ordine di esecuzione inverso)
                   ";

                   if($RIJ = true && empty($_POST["critta"])!= true )
                   echo "
                       Rijindael (combinazione dai nomi dei creatori) è un algoritmo di cifratura a chiave simmetrica adottato da
                       <a href='https://it.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology'>NIST</a>
                       e usato per AES dopo vari anni di studi e selezione tra vari algiritmi proposti.
                       I criteri per cui è stato scelto sono la sua capacità di poter essere impiegato in un ampia gamma di applicazioni,
                       uso di risorse elaborative minime, semplice, veloce, sicuro e multiplatform.
                       

                       Rijindael è un cifrario a blocchi di lunghezza variabile che usa chiavi a multipli di 32 con minimo 128 max 256 bits
                       (si differenzia da AES per via che quest'ultimo utilizza lunghezza fissa a 128 con chiavi che variano da 128, 192, 256 bits 
                       <a href='https://csrc.nist.gov/csrc/media/projects/cryptographic-standards-and-guidelines/documents/aes-development/rijndael-ammended.pdf'> qui</a>)la lista dei cambiamenti

                       
                       Le operazioni eseguite da Rijhindael consistono in una serie di permutazioni spostamenti e sostituzioni

                       La prima fase AddRaundKey consiste nella creazione di una matrice 4x4 di 128 bits e da qui si procede con la cifratura
                       -ByteSub in cui si sostituiscono in maniera non lineare tutti i byte della tabella
                       -ShiftRow in cui si spostano le caselle di un certo numero di posizioni seguendo le righe
                       -MixColumn combinazione delle righe in maniera lineare
                       -AddRoundKey in cui ogni byte della tabella viene combinato dalla chiave di sessione generata 
                       Tutte queste operazioni vengono effettuate per 10 cicli
                       (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
                   ";
                   if($TWF = true && empty($_POST["critta"])!= true )
                   echo "
                       TwoFish è un algoritmo di cifratura a chiave simmetrica privo di brevetto ideato da Bruce Schineier e versione aggiornata di BlowFish,
                       è stato candidato come semifinalista per AES, con cui ha pressocchè pari velocità, inoltre non si conoscono metodi di attacco
                       se non il bruteforce, sancendone la sua invulnerabilità odierna

                       Twofish è un cifrario a blocchi + e una chiave di lunghezza da 128 a 256 bits 
                       ottimizzato per cpu a 32 bit 

                       il suo funzionamento prevede la stessa struttura di Faistel come DES reiterata per 16 cicli dando in ingresso blocchi di 
                       128 bit e successivamente effettuandone la cifratura con la funzione bettiva F
                       (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
                   ";
                   if($BLF = true && empty($_POST["critta"])!= true )
                   echo "
                       BlowFish è un algoritmo di cifratura a chiave simmetrica ideato nel 1993 da Bruce Schineier, un famoso esperto di crittografia
                       nato per soppiantare DES e libero da qualsiasi brevetto.
                       I lati positivi di questo algoritmo sono il suo essere elaborativamente leggero ed essere sicuro contro attacchi di bruteforce,
                       tuttavia le operazioni eseguite impiegano molto tempo per essere eseguite.

                       BlowFish è un cifrario a blocchi e utilizza una chiave di lunghezza tra 32 e 448 bits

                       Il suo funzionamento prevede che la divisione dei dati in due categorie, che suddivise a loro volta 
                       formeranno 5 array che verranno elaborati a loro volta per un numero di cicli per poi essere sostituiti 
                       con gli originali e ricombinati in un unica parte
                       (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
                   ";
                   if($DES = true && empty($_POST["critta"])!= true )
                   echo "
                       DES (Data Encryption Standard) è un algoritmo di cifratura a chiave simmetrica ideato nel 1976 per IBM, 
                       è il precursore dei moderni algoritmi e usato come standard dagli USA, ma ormai deprecato per via della sua chiave
                       di soli 56 bit valicabile in poche ore

                       DES è un cifrario a blocchi di lunghezza fissa a 64 bits con chiave da 64 di cui 8 di controllo 

                       Il suo funzionamento prevede che al blocco di 64 bit venga trasposta la chiave che tramite la funzione di cifratura 
                       viene ruotata di determinate posizioni per 16 cicli
                       (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
                   ";
                   if($DES3 = true && empty($_POST["critta"])!= true )
                   echo "
                       Triple-DES è un algoritmo di cifratura a chiave asimmetrica ideato per soppiantare DES nel 1999

                       3-DES è un cifraio a blocchi 3 chiavi da 56 bit che ne formano una da 168 di cui 22 di controllo,
                       offrendo tre possibilità di scelta:
                       -le tre chiavi sono tutte diverse
                       -due chiavi sono identiche e la terza distinta
                       -le tre chiavi sono tutte uguali 

                       Il suo funzionamento prevede che il testo venga prima cifrato con la prima chiave decifrato con la seconda e cifrato con la terza(EDE)
                       per un totale di 48 cicli
                       (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
                   ";
                ?> -->
                </div>
        <!-- </div> -->

                <div class="invia">
                        <!-- submit del programma -->
                    <input type='submit' value='Cifra'>
                    <p><span id="demo"></span><span id="blink">|</span></p>
                </div>
            </form>

        <script type="text/javascript">
            //salva la selezione precedente
            document.getElementById('cryptmode').value = "<?php echo $_POST['cryptmode'];?>";
            document.getElementById('RSAmode').value = "<?php echo $_POST['RSAmode'];?>";
            document.getElementById('SYMmode').value = "<?php echo $_POST['SYMmode'];?>";
        </script>

        <script>
            (function onaction() {
            var d=document;
            var s1=d.getElementById('RSAmode');
            var s2=d.getElementById('SYMmode');
            var lo=d.getElementById('cryptmode')
            var temp;
            s1.className='hide';
            s2.className='hide';

            lo.onmousemove=function (){
            if(this.value==='1') s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            lo.onchange=function (){
            if(this.value==='1')s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            }());
        </script>
    </body>
</html>