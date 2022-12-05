<?php
class File{
    
    public function uploadAudio($audio){
        if(isset($audio) && $audio['error']==0){ // checking errors of upload
            
            $audioinfos = pathinfo($audio['name']);//gathering infos
            $audioname = $audio['name'];
            $audioname = str_replace(' ','_',$audioname);//replacing spaces by _

            $extension = $audioinfos['extension'];
            $types = array('mp3');//accepted extensions

            $path = "uploads/audios/";//upload folder

            if(in_array($extension, $types)){
               
                if($audio['size'] < 100000000){//
                    //if the file is less than 100mb
                    if(
                        move_uploaded_file($audio['tmp_name'],'../../'.$path.$audioname)
                    ){
                        return $path.$audioname;
                    }else{
                        return null;
                    }
                }else{
                    return null;
                }
            }else{
                return null;
            }   
        }else{
            return null;
        }
    }

    public function uploadPhoto($photo){
        if(isset($photo) && $photo['error']==0){ // checking errors of upload
            
            $photoinfos = pathinfo($photo['name']);//gathering infos
            $photoname = $photo['name'];
            $photoname = str_replace(' ','_',$photoname);//replacing spaces by _

            $extension = $photoinfos['extension'];
            $types = array('jpg','JPG','png','PNG');//accepted extensions

            $path = "uploads/photos/";//upload folder

            if(in_array($extension, $types)){
               
                if($photo['size'] < 10000000){//
                    //if the file is less than 10mb
                    if(
                        move_uploaded_file($photo['tmp_name'],'../../'.$path.$photoname)
                    ){
                        
                        return $path.$photoname;
                    }else{
                        return null;
                    }
                }else{
                    return null;
                }
            }else{
                return null;
            }   
        }else{
            return null;
        }
    }

    public function uploadDocument($document){
        
        if(isset($document) && $document['error']==0){ // checking errors of upload
            
            $docinfos = pathinfo($document['name']);//gathering infos
            $docname = $document['name'];
            $docname = str_replace(' ','_',$docname);//replacing spaces by _

            $extension = $docinfos['extension'];
            $types = array('pptx','ppt','doc','docx','xls','xlsx','odt','pdf');//accepted extensions

            $path = "../uploads/docs/";//upload folder

            if(in_array($extension, $types)){
               
                if($document['size'] < 10000000){//
                    //if the file is less than 10mb
                    if(
                        move_uploaded_file($document['tmp_name'],'../../'.$path.$docname)
                    ){
                        return $path.$docname;
                    }else{
                        return null;
                    }
                }else{
                    return null;
                }
            }else{
                return null;
            }   
        }else{
            return null;
        }
    }
}