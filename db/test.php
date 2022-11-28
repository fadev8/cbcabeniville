
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="idOrateur" id="titre"><br><br>

        <input type="text" name="idCategorie" id="titre"><br><br>

        <input type="text" name="titre" id="titre"><br><br>

        <input type="text" name="reference" id="titre"><br><br>

        <input type="text" name="ladate" id="titre"><br><br>

        <input type="text" name="details" id="titre"><br><br>
        
        <input type="text" name="tags" id="titre"><br><br>

        <input type="text" name="video" id="document">
        <br><br>
        <input type="text" name="audio" id="document">
        <br><br>

        <input type="text" name="photo" id="document">
        <br><br>

        <input type="text" name="document" id="document">
        <br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>

<?php
    require_once('DB.class.php');
    require_once('../utils/File.class.php');

    $file = new File();
    $con = new DB();
   if(
    isset($_POST['idOrateur']) &&
    isset($_POST['idCategorie']) &&
    isset($_POST['titre']) &&
    isset($_POST['reference']) &&
    isset($_POST['details']) &&
    isset($_POST['ladate']) &&
    isset($_POST['tags']) &&
    isset($_POST['video']) &&
    isset($_POST['audio']) &&
    isset($_POST['document']) &&
    isset($_POST['photo']) 
   ){
    
    $boo = $con->addPredication($_POST['idOrateur'],$_POST['idCategorie'],$_POST['titre'],$_POST['reference'],$_POST['details'],$_POST['ladate'],$_POST['tags'],$_POST['video'],$_POST['photo'],$_POST['audio'],$_POST['document']);

    echo $boo;
   }
?>