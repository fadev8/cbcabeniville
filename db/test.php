
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
        <input type="file" name="document" id="document">
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
    $nom = "C'est maintenant son appel";
    $nom = str_replace(' ','_',$nom);
    echo $nom;
    //$data = $con->findCategorieById(2);
    //$con->deleteOrateur(1);
    //$con->editOrateur(1,'Faden','Sibamtaki','Ir.')
    //$data = $con->findOrateur('sib');
    //echo $data['nom'].' '.$data['obligatoire'].' -'.$data['createdAt'];
    // if($data != null || $data->fetch()){
    //     echo $data
    // }else{
    //     echo 'nooo';
    // }

    $file->uploadAudio($_FILES['document']);
?>