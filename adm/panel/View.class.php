<?php
class View{
    
    public function subMenu($icon, $title,$href){
        $menu = '
            <li>
                <a href="'.$href.'">
                    <i class="'.$icon.'"></i><span>'.$title.'</span>
                </a>
            </li>
            ';
        return $menu;
    }

    public function sidePredListItem($date, $titre, $orateur){
        $pred = '
            <div class="activity-item d-flex">
                <div class="activite-label">'.$date.'</div>
                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark">
                            '.$titre.'
                        </a><br>'.$orateur.'
                    </div>
            </div>
        ';
        return $pred;
    }
}