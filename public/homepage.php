<!DOCTYPE html>
<!--
Ovo je HTML komentar
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Naslov nase stranice</title>
    </head>
    <body>
        
        <h1>Ovo je prva sekcija</h1>
        
        <h2>ovo je prva podsekcija</h2>
                
        <h3>ovo je prva pod podsekcija</h3>
        
        <p>ovo je neki blok teksta (paragraf)</p>
        <h2>ovo je druga podsekcija</h2>
        <div style="color: crimson; font-weight: bold; font-size: large">
            Ovo je crveni text
        </div>
        <div>
            <form method="POST" action="/test">
                <input type="submit" name="post_test" value="idi na test">
</form>
            
        </div>
        
        <?php
          // ovo je php komentar
        # ovo je isto linijski komentar
        /*
            a ovo je blok komentar
            ima više linija
         */
             echo "Ovo ispisuje text";    
             
             $polje=['jabuka', 'visnja', 'kruske','orah'];
             echo "<ul>";
             foreach ($polje as $key => $value) {
                 
                 echo "<li>".$value." se nalazi pod kljucem:".$key."</li>";
                 
             }
              echo "</ul>";
              
              echo "Kruškovača se pravi od ".$polje[2];
        ?>
        
        
    </body>
</html>
