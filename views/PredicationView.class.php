<?php
class PredicationView
{

    public function singlePredication($titre, $predicateur, $tags, $image, $jour, $mois, $annee, $lienVideo, $audio, $document)
    {
        $content = ' 
        <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-latest-sermons mb-100">
                        <div class="sermons-thumbnail">
                        <a href="sermons-details.php?s=' . str_replace(' ', '_', $titre) . '"><img src="' . $image . '" alt=""></a>
                            <!-- Date -->
                            <div class="sermons-date">
                                <h6><span>' . $jour . '</span>' . $mois . '</h6>
                            </div>
                        </div>
                        <div class="sermons-content">
                            <div class="sermons-cata">
                                <a href="' . $lienVideo . '" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                            </div>
                            <a href="sermons-details.php?s=' . str_replace(' ', '_', $titre) . '"><h4>' . $titre . '</h4></a>
                            <div class="sermons-meta-data">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Orateur: <span>' . $predicateur . '</span></p>
                                <p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span>' . $tags . '</span></p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> ' . $jour . ' ' . $mois . ' ' . $annee . '</p>
                            </div>
                        </div>
                    </div>
                </div>
        ';

        return $content;
    }

    public function latestPredication($titre, $predicateur,$reference, $resume, $tags, $image, $jour, $mois, $annee, $lienVideo, $audio, $document,$service)
    {

        $content = '<div class="sermons-content-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sermons-content-thumbnail">
                        <img src="' . $image . '" alt="">
                    </div>
                    <!-- Sermons Text -->
                    <div class="sermons-text text-center">
                        <a href="sermons-details.php?s=' . str_replace(' ', '_', $titre) . '"><h2>' . $titre . '</h2></a>
                        <div class="sermons-meta-data d-flex flex-wrap justify-content-center">
                            <p><i class="fa fa-book" aria-hidden="true"></i> Refs : <b> ' . $reference . '</b></p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Orateur: <b>' . $predicateur . '</b></p>
                            <p><i class="fa fa-group" aria-hidden="true"></i>  <b>' . $service . '</b></p>
                            <p><i class="fa fa-tag" aria-hidden="true"></i> Mots Clefs: <b>' . $tags . '</b></p>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <b>' . $jour . ' ' . $mois . ' ' . $annee . '</b></p>
                        </div>
                        <div class="sermons-cata">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                        </div>
                        <p>' . $resume . '</p>
                        <div class="read-more-share d-flex flex-wrap justify-content-between">
                            <div class="read-more-btn">
                                <a href="sermons-details.php?s=' . str_replace(' ', '_', $titre) . '"> Voir plus <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>';

        return $content;
    }

    public function aucunePredication(){
        $content = '<div class="sermons-content-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sermons-content-thumbnail">
                        <img src="img/bg-img/1.jpg" alt="">
                    </div>
                    <!-- Sermons Text -->
                    <div class="sermons-text text-center">
                        <a href="#"><h2> Aucune Predication </h2></a>
                        <div class="sermons-meta-data d-flex flex-wrap justify-content-center">
                           
                        </div>
                        <div class="sermons-cata">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

        return $content;
    }

    public function singlieSidePredication()
    {
        $contenu = '
            <div class="single-latest-post">
                <a href="#" class="post-title">
                    <h6>Weekly meeting in companies...</h6>
                </a>
                <div class="sermons-meta-data">
                    <p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span>Jorge Malone</span></p>
                    <p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span>God, Pray</span></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> March 10 on <span>9:00 am - 11:00 am</span></p>
                </div>
            </div>
            ';
            //view of a singleSidePredication
        return $contenu;
    }
}