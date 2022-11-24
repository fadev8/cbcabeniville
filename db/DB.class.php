<?php
class DB{


    public function __construct(){
        //database connection
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=cbcabeniville","root","mysql");
            //$this->db = new PDO("mysql:host=localhost;dbname=epiz_33060880_cbcabeniville","epiz_33060880","r5sjv28q");
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
        if(!empty($id)){
            $id = (int)$id;
            $sql = "SELECT idCategorie as id, nomCategorie as nom, obligatoire, createdAt FROM Categorie WHERE idCategorie = :idCategorie";

            $req = $this->db->prepare($sql);
            $req->execute(array(
                'idCategorie'=>htmlentities($id)
            ));

            return $req;

        }else{
            return null;
        }
    }
}
