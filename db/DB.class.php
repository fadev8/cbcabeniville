<?php
class DB{


    public function __construct(){
        //database connection
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=cbcabeniville","root","mysql");
            //$this->db = new PDO("mysql:host=sql301.epizy.com;dbname=epiz_33060880_cbcabeniville","epiz_33060880","r5sjv28q");
            //echo '<h1>ehello</h1>';
        }catch(Exception $e){
            return false;
        }
    }


    //Orateur
    public function addOrateur($prenom, $postnom, $titre){
        if(!empty($prenom) && !empty($postnom) && !empty($titre)){

            $sql = "INSERT INTO Orateur(prenomOrateur, postnomOrateur, titreOrateur) VALUES(:prenom, :postnom,:titre)";
            $req = $this->db->prepare($sql);
            
            if($req->execute(array(
                'prenom'=>htmlentities($prenom),
                'postnom'=>htmlentities($postnom),
                'titre'=>htmlentities($titre)
            ))){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function findOrateurById($id){
        //trouver un orateur par id, retourne un stmt
        if(!empty($id)){
            $id = (int)$id;
            $sql = "SELECT prenomOrateur as prenom, postnomOrateur as postnom, titreOrateur as titre FROM Orateur WHERE idOrateur = :idOrateur";

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'idOrateur'=>htmlentities($id)
            ));

            if($data = $req->fetch()){
                $orateur['prenom'] = $data['prenom'];
                $orateur['postnom'] = $data['postnom'];
                $orateur['titre'] = $data['titre'];
                return $orateur;
            }else{
                return null;
            }

        }else{
            return null;
        }
    }

    public function findAllOrateurs(){
        
        $sql = "SELECT idOrateur as id, prenomOrateur as prenom, postnomOrateur as postnom, titreOrateur as titre 
            FROM Orateur ";
             
        $req = $this->db->prepare($sql);
        $req->execute(array());
        
        return $req;        
    }

    public function findOrateur($motClef){
        //trouver l'orateur par le nom ou le post nom
        if(!empty($motClef)){
            $sql = "SELECT idOrateur as id, prenomOrateur as prenom, postnomOrateur as postnom, titreOrateur as titre 
            FROM Orateur WHERE prenomOrateur LIKE :prenom OR postnomOrateur LIKE :postnom ";
             
            $req = $this->db->prepare($sql);
            $req->execute(array(
                'prenom'=>htmlentities($motClef.'%'),
                'postnom'=> htmlentities($motClef.'%')
            ));
            
            if($data = $req->fetch()){
                $orateur['id'] = $data['id'];
                $orateur['prenom'] = $data['prenom'];
                $orateur['postnom'] = $data['postnom'];
                $orateur['titre'] = $data['titre'];

                return $orateur;
            }else{
                echo 'data error';
                return null;
            }

        }else{
            return null;
        }
    }

    public function editOrateur($idOrateur, $prenom, $postnom, $titre){
        if(!empty($idOrateur) && !empty($prenom) && !empty($postnom) && !empty($titre)){
            $idOrateur = (int) $idOrateur;
            $sql = "UPDATE Orateur SET prenomOrateur = :prenom, postnomOrateur = :postnom, titreOrateur = :titre";

            $req = $this->db->prepare($sql);
            if(
                $req->execute(array(
                    'prenom' => htmlentities($prenom),
                    'postnom' => htmlentities($postnom),
                    'titre' => htmlentities($titre)
                ))
            ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteOrateur($idOrateur){
        if(!empty($idOrateur)){
            $idOrateur = (int) $idOrateur;
            $sql = "DELETE FROM Orateur WHERE idOrateur = :id";
            $req = $this->db->prepare($sql);
            if(
                $req->execute(array(
                    'id' => htmlentities($idOrateur)
                ))
            ){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    //Categorie
    public function addCategorie($nomCategorie, $obligatoire){
        if(!empty($nomCategorie)){
            $obligatoire = (int) $obligatoire;
            $obligatoire = $obligatoire >=1?1:0;
            echo $obligatoire.' this';

            $sql = "INSERT INTO Categorie(nomCategorie, obligatoire, createdAt) VALUES(:nom, :obligatoire,NOW())";
            $req = $this->db->prepare($sql);
            
            if($req->execute(array(
                'nom'=>htmlentities($nomCategorie),
                'obligatoire'=>htmlentities($obligatoire)
            ))){
                return true;
            }else{
                return false;
            }

        }else{
            echo 'echooo';
            return false;
        }
    }

    public function findCategorieById($id){
        if(!empty($id)){
            $id = (int)$id;
            $sql = "SELECT nomCategorie as nom, obligatoire, createdAt FROM Categorie WHERE idCategorie = :idCategorie";

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'idCategorie'=>htmlentities($id)
            ));

            if($data = $req->fetch()){
                $categorie['nom'] = $data['nom'];
                $categorie['obligatoire'] = $data['obligatoire'];
                $categorie['createdAt'] = $data['createdAt'];
                return $categorie;
            }else{
                return null;
            }

        }else{
            return null;
        }
    }

    public function findCategorieByObligatoire($etat){
        if(!empty($etat)){
            $etat = (int)$etat;
            $sql = "SELECT idCategorie as id, nomCategorie as nom, obligatoire, createdAt FROM Categorie WHERE obligatoire = :obligatoire";//

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'obligatoire'=>htmlentities($etat)
            ));
            
            return $req;

        }else{
            return null;
        }
    }

    public function findAllCategorie(){
        
            $sql = "SELECT idCategorie as id, nomCategorie as nom, obligatoire, createdAt FROM Categorie ORDER BY obligatoire DESC";//

            $req = $this->db->prepare($sql);
            $req->execute(array());
            
            return $req;
    }

    public function editCategorie($idCategorie,$nomCategorie,$etat){
        if(!empty($idCategorie) && !empty($nomCategorie) && !empty($etat)){
            $etat = (int) $etat;

            $sql = "UPDATE Categorie SET nomCategorie = :nom, obligatoire =:etat";
            $req = $this->db->prepare($sql);
            if(
                $req->execute(array(
                    'nom' => htmlentities($nomCategorie),
                    'etat' => htmlentities($etat)
                ))
            ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteCategorie($idCategorie){
        if(!empty($idCategorie)){
            $idCategorie = (int) $idCategorie;
            $sql = "DELETE FROM Categorie WHERE idCategorie = :idCategorie";
            $req = $this->db->prepare($sql);

            if(
                $req->execute(array(
                    'idCategorie' => htmlentities($idCategorie)
                ))
            ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //Predication 

    public function addPredication($idOrateur, $idCategorie, $titre, $reference,$date, $details, $tags,$photo){
        //adding a new preaching
        if(
            !empty($idOrateur) &&
            !empty($idCategorie) &&
            !empty($titre) &&
            !empty($reference) &&
            !empty($date) &&
            !empty($details) &&
            !empty($tags) &&
            !empty($photo) //&&
            //!empty($audio) &&
            //!empty($video) &&
            //!empty($document)
        ){
            $idOrateur = (int) $idOrateur;
            $idCategorie = (int) $idCategorie;
            
            $sql = "INSERT INTO Predication(idOrateur, idCategorie, titre, texte, contenu, tags, ladate, photo, createdAt) VALUES(:idOrateur, :idCategorie, :titre, :texte, :contenu, :tags, :ladate, :photo, NOW())";            
            
            $req = $this->db->prepare($sql);
            if($req->execute(array(
               'idOrateur' => htmlentities($idOrateur),
                'idCategorie' => htmlentities($idCategorie),
                'titre' => htmlentities($titre),
                'texte' => htmlentities($reference),
                'contenu' => htmlentities($details),
                'tags' => htmlentities($tags),
                'ladate' => htmlentities($date),
                'photo' => htmlentities($photo)
                //'video' => htmlentities($video),
                //'audio' => htmlentities($audio),
                //'document' => htmlentities($document)
            ))){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function findAllPredication(){
        $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details, p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee 
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie";

        $req = $this->db->prepare($sql);
        $req->execute(array());

        return $req;
            
    }


    public function findAllPredicationDESC(){
        $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details,p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee  
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie 
            ORDER BY p.idPredication DESC";

        $req = $this->db->prepare($sql);
        $req->execute(array());

        return $req;
    }

    public function findAllPreviousPredication(){
        $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details,p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee  
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie 
            ORDER BY p.idPredication DESC OFFSET 1";

        $req = $this->db->prepare($sql);
        $req->execute(array());
        echo 'gooooo';
        return $req;
    }


    public function findPredicationById($idPredication){
        $idPredication = (int) $idPredication;
        if($idPredication > 0){
            $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details,p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee 
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie 
            WHERE p.idPredication = :idPredication";

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'idPredication' => htmlentities($idPredication)
            ));
            
            if($predication = $req->fetch()){
                return $predication;
            }else{
                
                return null;
            }
        }else{
            return null;
        }
    }



    public function findPredicationByTitre($titre){
        if(isset($titre) && !empty($this)){
            //requestion joined with other tables
            $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details,p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee 
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie 
            WHERE p.titre = :titre";

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'titre' => htmlentities($titre)
            ));
            
            if($predication = $req->fetch()){
                return $predication;
            }else{
                
                return null;
            }
        }else{
            return null;
        }
    }

    public function getLatestPredication(){
        $sql = "SELECT p.idPredication, o.idOrateur, o.prenomOrateur, o.postnomOrateur, o.titreOrateur, c.idCategorie, c.nomCategorie, p.titre, p.texte as reference, p.contenu as details,p.tags, p.photo, p.video, p.audio, p.document , DATE_FORMAT(p.ladate,'%d') as jour, DATE_FORMAT(p.ladate,'%b') as mois, DATE_FORMAT(p.ladate,'%Y') as annee 
            FROM Predication p 
            INNER JOIN Orateur o ON o.idOrateur = p.idOrateur 
            INNER JOIN Categorie c ON c.idCategorie = p.idCategorie 
            ORDER BY p.idPredication DESC";

        $req = $this->db->prepare($sql);
        $req->execute(array());

        if($predication = $req->fetch()){
            return $predication;
        }else{
            
            return null;
        }
    }

    public function updatePhotoPredication($idPredication, $lienPhoto){
        
        if(isset($lienPhoto) && !empty($lienPhoto) && isset($idPredication)){
            $idPredication = (int) $idPredication;
            $sql = "UPDATE Predication SET photo = :photo
                    WHERE idPredication = :idPredication";

            $req = $this->db->prepare($sql);
            if($req->execute(array(
                'idPredication' => htmlentities($idPredication),
                'photo' => htmlentities($lienPhoto)
            ))){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function updateAudioPredication($idPredication, $lienAudio){
        
        if(isset($lienAudio) && !empty($lienAudio) && isset($idPredication)){
            $idPredication = (int) $idPredication;
            $sql = "UPDATE Predication SET audio = :audio
                    WHERE idPredication = :idPredication";

            $req = $this->db->prepare($sql);
            if($req->execute(array(
                'idPredication' => htmlentities($idPredication),
                'audio' => htmlentities($lienAudio)
            ))){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function updateVideoPredication($idPredication, $lienVideo){
                
        if(isset($lienVideo) && !empty($lienVideo) && isset($idPredication)){
            $idPredication = (int) $idPredication;
            $sql = "UPDATE Predication SET video = :video
                    WHERE idPredication = :idPredication";

            $req = $this->db->prepare($sql);
            if($req->execute(array(
                'idPredication' => htmlentities($idPredication),
                'video' => htmlentities($lienVideo)
            ))){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function updateDocumentPredication($idPredication, $lienDocument){
        
        if(isset($lienDocument) && !empty($lienDocument) && isset($idPredication)){
            $idPredication = (int) $idPredication;
            $sql = "UPDATE Predication SET document = :document
                    WHERE idPredication = :idPredication";

            $req = $this->db->prepare($sql);
            if($req->execute(array(
                'idPredication' => htmlentities($idPredication),
                'document' => htmlentities($lienDocument)
            ))){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}
