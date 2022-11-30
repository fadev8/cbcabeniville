<?php
	//including the header
	include_once('shared/header.php');
    include_once('views/PredicationView.class.php');
    include_once('./db/DB.class.php');
    //use objets
    $predView = new PredicationView();
    $con = new DB();
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pr&eacute;dications</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Sermons Area Start ##### -->
        <?php
            $predication = $con->getLatestPredication();
            //$predication = null;
            if($predication != null){
                $titre = $predication['titre'];
                $orateur = $predication['titreOrateur'].' '.$predication['prenomOrateur'].' '.$predication['postnomOrateur'];
                $resume = $predication['details'];
                $tags = $predication['tags'];
                $image = $predication['photo'];
                $jour = $predication['jour'];
                $mois = $predication['mois'];
                $annee = $predication['annee'];
                $document = $predication['document'];
                $video = $predication['video'];
                $audio = $predication['audio'];

                //affichage de la predication
                echo $predView->latestPredication($titre,$orateur,$resume,$tags,$image,$jour,$mois,$annee,$video,$audio,$document);
            }else{
                echo $predView->aucunePredication();
            }
            
        ?>
    <!-- ##### Sermons Area End ##### -->

    <!-- ##### Latest Sermons Area Start ##### -->
    <section class="latest-sermons-area">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Recentes predications</h2>
                        <p>Sous forme de texte et de son</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Latest Sermons -->
                <?php
                //Liste des anciennces videos
                    $stmt = $con->findAllPredicationDESC();
                    if($stmt != null){
                        $stmt->fetch();
                        
                        while($predication = $stmt->fetch()){
                            
                            $titre = $predication['titre'];
                            $orateur = $predication['titreOrateur'].' '.$predication['prenomOrateur'].' '.$predication['postnomOrateur'];
                            $resume = $predication['details'];
                            $tags = $predication['tags'];
                            $image = $predication['photo'];
                            $jour = $predication['jour'];
                            $mois = $predication['mois'];
                            $annee = $predication['annee'];
                            $document = $predication['document'];
                            $video = $predication['video'];
                            $audio = $predication['audio'];

                            
                            //affichage de la predication
                            echo $predView->singlePredication($titre,$orateur,$tags, $image,$jour, $mois, $annee,$video,$audio,$document);
                        }
                    }else{
                        echo "<h3> Aucune prédication disponible</h3>";
                    }                
                ?>
            </div>
                
        </div>
    </section>
    <!-- ##### Latest Sermons Area End ##### -->

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Subscribe Text -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-text">
                        <h3>S'abonner &agrave; notre Newsletter</h3>
                        <h6>Recevez les mails concernant les activites chez nous</h6>
                    </div>
                </div>
                <!-- Subscribe Form -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form text-right">
                        <form action="#">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Your Email">
                            <button type="submit" class="btn crose-btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->

<?php
   	include_once('shared/footer.php');
?>