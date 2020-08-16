<?php
    //caesar chiper is 3 backward
    //rot13 is 13 forward
    $encryptions = array('No Encryption','Caesar','Rot13');

    function caesarChipper($thetext) {
        $cryptedtext='';
        for ($i=0; $i < strlen($thetext) ; $i++) { 
            if(ord($thetext[$i]) < 68){
                $cryptedtext .= chr(ord($thetext[$i])+23);
            }else{
                $cryptedtext .= chr(ord($thetext[$i])-3);   
            }
        }
        echo $cryptedtext;
    }

    function rot13Chipper($thetext) {
        // I could do it by hand but it has same algorithm with caesar.
        echo str_rot13($thetext);
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>q1</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>..The Text You Want To Encrypt.. </h1>
        <form action="" method="post">
            <div class="colText">
                <textarea type="text" name="text" class="textarea" ><?php if (isset($_POST['text'])){echo $_POST['text'];}?></textarea>
            </div>
            <div class="colSelBtn">
                <select name="select" class="selection">
                    <?php for ($i=0; $i < sizeof($encryptions); $i++) { 
                        echo '<option>'.$encryptions[$i].'</option>';
                        echo 'asdfas: '+$encryptions[$i];
                    }?>
                </select>
 
                <input type="submit" name="submit" class="btn" value="Encrypt"></input>
            </div>
        </form>
        
        <?php
            $text= $_POST['text']; 
            $select= $_POST['select'];
            
            if (!preg_match("/^[a-zA-Z ]*$/", $text)) {//check if text has numbers or characters
                echo '<div class=colText><div class="warning">';
                    echo 'This Text Includes Some Special Characters. <br>
                    Please Use Only  Letters';
                echo'</div></div>';
                exit();
            }

            $justtext= str_replace(' ', '', $text);//delete whitespace
            $justtext= strtoupper($justtext); // make all string Uppercase
            echo '<div class="colText">';
                echo '<div class="textarea">';
                    switch($select){
                        case $encryptions[0]:  echo $justtext;
                            break;
                        
                        case $encryptions[1]:  caesarChipper($justtext);
                            break;
                        
                        case $encryptions[2]: rot13Chipper($justtext);
                            break;
                        
                        default: echo'wtf?'; break;
                    }
                echo '</div>';
            echo '</div>';
            //echo '<script>console.log("'.$text.'")</script>';
        ?>
    </body>
</html>