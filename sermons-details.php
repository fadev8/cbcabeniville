<?php
    include_once('./db/DB.class.php');
    include_once('./views/PredicationView.class.php');
    if(isset($_GET['s']) && !empty($_GET['s'])){
        $slug = $_GET['s'];
        //transforming the slug
        $titre = str_replace('_',' ',$slug);

        //databese search
        $con = new DB();
        $gui = new PredicationView();
        $predication = $con->findPredicationByTitre($titre);
        if($predication == null){
            header('location:sermons.php');
        }
    }else{
        header('location:sermons.php');
    }
	//including the header
	include_once('shared/header.php');
    
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="sermons.php">Pr&eacute;dications</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details des pr&eacute;dication</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Sermons Area Start ##### -->
    <div class="sermons-details-area section-padding-100">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="sermons-details-area">

                        <!-- Sermons Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-content">
                                <h2 class="post-title mb-30">
                                    <?php echo $predication['titre'];//titre de la predication ?>
                                </h2>
                                <img class="mb-30" src="<?php echo $predication['photo'];?>" alt="">
                                <!-- Catagory & Share -->
                                <div class="catagory-share-meta d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="sermons-cata">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                        <a href="<?php echo $predication['audio']; ?>" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                                    </div>
                                    <!-- Share -->
                                    <div class="share">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <p>
                                    <?php echo $predication['details']; //resume de la predicaton?>
                                </p>
                                <!--blockquote>
                                    <div class="blockquote-text">
                                        <h6>“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.” </h6>
                                        <h6>Ollie Schneider - <span>Parson</span></h6>
                                    </div>
                                </blockquote>
                                <p>He assignments are fast-paced and our services address client needs for efficiency and flexibility. Our staff is experienced in working with architects, interior design firms, engineers, developers and clients in the public and private sectors.</p-->
                            </div>
                        </div>

                        </div>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-3">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <div class="search-form">
                                <form action="#" method="get">
                                    <input type="search" name="search" placeholder="Cherchez une prédicatioin">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Derni&egrave;res pr&eacute;dications</h6>
                            </div>
							
							<!-- Last 4 preachings-->
							<!-- Single Latest Posts -->
                            <?php
                                for($i = 0; $i < 3; $i++){
                                    echo $gui->singlieSidePredication();
                                }
                            ?>

    
                            

                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Sermon Speaker</h6>
                            </div>
                            <ol class="crose-catagories">
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Kyleigh Lam</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Thomas Jack</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Garry Rick</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> John Smith</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Sermons Area End ##### -->

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