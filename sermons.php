<?php
	//including the header
	include_once('shared/header.php');
    include_once('views/PredicationView.class.php');
    $predView = new PredicationView();
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
            $resume = "Lorem 20";
            echo $predView->latestPredication("L'amour de Dieu","Francine Kazi",$resume,"salut, pardon, péché","./img/bg-img/1.jpg","27","NOV","2022","#","#","#");
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
                    for($i = 1; $i <9; $i++){
                        $titre = "L'armee de Dieu";
                        echo $predView->singlePredication($titre,'Faden Sibamtaki','hope, surrender, faith','./img/bg-img/6.jpg','27','NOV','2022','','',''); 
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
                        <h3>Subscribe To Our Newsletter</h3>
                        <h6>Subcribe Us And Tell Us About Your Story</h6>
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