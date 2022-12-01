<?php
include_once('header.php')
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

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">

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
                                <h5 class="card-title">Predication <span>| New </span></h5>

                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="predicateur" id="predicateur">
                                                <option value="">Choisir Orateur</option>
                                                <?php
                                                $dataset = $con->findAllOrateurs();
                                                while ($orateur = $dataset->fetch()) {
                                                    echo '
                                <option value="' . $orateur['id'] . '">' . $orateur['titre'] . ' ' . $orateur['prenom'] . ' ' . $orateur['postnom'] . '</option>
                                ';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <select name="categorie" id="categorie">
                                                <option value="">Choisir Categorie</option>
                                                <?php
                                                $dataset = $con->findAllCategorie();
                                                while ($categorie = $dataset->fetch()) {
                                                    echo '
                                <option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>
                                ';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Titre Predication-->
                                    <div class="col-md-10">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingCity"
                                                    placeholder="City" name="titre">
                                                <label for="floatingCity">Titre</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <!-- Reference Predication-->
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingCity"
                                                    placeholder="City" name="reference">
                                                <label for="floatingCity">Référence</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Date Predication-->
                                    <div class="col-md-10">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="floatingCity"
                                                    placeholder="City" name="ladate">
                                                <label for="floatingCity">Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Tags Predication-->
                                    <div class="col-md-10">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingCity"
                                                    placeholder="City" name="tags">
                                                <label for="floatingCity">Tags</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Resume Predication-->
                                    <div class="col-md-10">
                                        <div class="col-md-12">
                                        <label for="floatingCity">Resume</label>
                                            <div class="form-floating">
                                                <textarea name="resume" id="resume" cols="30" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Photo Predication-->
                                    <div class="col-md-10">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="file" class="form-control" id="floatingCity"
                                                    placeholder="City" name="photo">
                                                <label for="floatingCity">Photo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>



                            <div class="col-md-6">
                                <input type="submit" value="Enregister">
                            </div>

                            </form>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <!-- Reports -->
                <div class="col-12">
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

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>


                        </div>

                    </div>
                </div><!-- End Reports -->


            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Recent Activity -->
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
                    <h5 class="card-title">Predications <span>| Today</span></h5>

                    <div class="activity">
                       <?php
                            $dataset = $con->findAllPredicationDESC();
                            while($predication = $dataset->fetch()){
                                echo $view->sidePredListItem(
                                    $predication['jour'].' '.$predication['mois'].' '.$predication['annee'],
                                    $predication['titre'],
                                    $predication['titreOrateur'].' '.$predication['prenomOrateur'].' '.$predication['postnomOrateur']
                                );
                            }
                       ?>
                    </div>

                </div>
            </div><!-- End Recent Activity -->



        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include_once('footer.php');

//HANDLING THE PREDICATION FORM
if (
    isset($_POST['predicateur']) && !empty($_POST['predicateur']) &&
    isset($_POST['categorie']) && !empty($_POST['categorie']) &&
    isset($_POST['titre']) && !empty($_POST['titre']) &&
    isset($_POST['reference']) && !empty($_POST['reference']) &&
    isset($_POST['resume']) && !empty($_POST['resume']) &&
    isset($_POST['ladate']) && !empty($_POST['ladate']) &&
    isset($_POST['tags']) && !empty($_POST['tags']) &&
    isset($_FILES['photo'])
) {
    $lienPhoto = $file->uploadPhoto($_FILES['photo']);
    $done = $con->addPredication(
        $_POST['predicateur'],
        $_POST['categorie'],
        $_POST['titre'],
        $_POST['reference'],
        $_POST['ladate'],
        $_POST['resume'],
        $_POST['tags'],
        $lienPhoto
    );
    if ($done) {
        echo 'good';
    } else {
        echo 'bad';
    }

} else {
    echo 'not sent';
}
?>