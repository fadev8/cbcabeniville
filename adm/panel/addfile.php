<?php
include_once('header.php');
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Predication.php">Predication</a></li>
                <li class="breadcrumb-item active">Ajouter Predication</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Update file -->
            <div class="col-md-8">
                <div class="card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Reports <span>/Today</span></h5>

                        <!-- Formulaire -->
                        <form method="POST" enctype="multipart/form-data">
                            <!-- Select la predication -->
                            <div class="col-md-8">
                                <div class="form-floating mb-3">
                                    <select name="id-predication" id="id-predication">
                                        <option value="">Choisir Predication</option>
                                        <?php
                            $dataset = $con->findAllPredicationDESC();
                            while ($pred = $dataset->fetch()) {
                                echo '
                                <option value="' . $pred['idPredication'] . '">' . $pred['titre'] . '</option>
                                ';
                            }
                            ?>
                                        
                                    </select>
                                </div>
                            </div>
                            

                            <!--Radio buttons-->
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="file-type" id="audio" value="Audio" checked>
                                    <label for="audio"> Audio</label>
                                </div>

                                <div class="col-md-3">
                                    <input type="radio" name="file-type" id="photo" value="Photo">
                                    <label for="photo"> Photo</label>
                                </div>

                                <div class="col-md-3">
                                    <input type="radio" name="file-type" id="document" value="Document">
                                    <label for="document"> Document</label>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-10 form-floating">
                                    <label for="fichier"> Ficher</label>
                                    <input type="file" name="fichier" id="fichier"/>
                                    
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Upload">
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div><!-- End Update file -->
            </select>
</main>
<?php

// HANDLING ADD THE AUDIO
//echo $_POST['id-predication'];
if (
    isset($_POST['id-predication']) //&&
    //isset($_POST['file-type']) &&
    //isset($_FILES['fichier'])
) {
    echo 'iko2';
    $type = $_POST['file-type'];
    $fichier = $_FILES['fichier'];
    $idPredication = (int) $_POST['id-predication'];

    if ($type == "Audio") {
        $lienAudio = $file->uploadAudio($fichier);
        $done = $con->updateAudioPredication($idPredication, $lienAudio);
        if ($done) {
            echo 'uploaded';

        } else {
            echo 'faled';
        }
    }elseif($type == "Photo"){
        $lienPhoto = $file->uploadPhoto($fichier);
        $done = $con->updatePhotoPredication($idPredication, $lienPhoto);
        if ($done) {
            echo 'uploaded';

        } else {
            echo 'faled';
        }
    }elseif($type == "Document"){
        $lienAudio = $file->uploadDocument($fichier);
        $done = $con->updateDocumentPredication($idPredication, $lienAudio);
        if ($done) {
            echo 'uploaded';

        } else {
            echo 'faled';
        }
    }else{
        echo 'de nada';
    }
    

}else{
    echo 'nada';
}

include_once('footer.php');
?>