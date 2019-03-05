<?php 
function CreerDir($path)
{

    if(is_dir($path)) {
        return true;
    } else {
        if(mkdir($path)) {
            return true;
        } else {
            return false;
        }
    }

}
function CopyDir($origine, $destination) {
    $test = opendir($origine);
 	
 	
    $file = 0;
    $file_tot = 0;
 	
    while(false !== ($val = readdir($test)))
 {
    	
        if($val!="." && $val!="..") {
            if(is_dir($origine."/".$val)) {

            	CreerDir($destination."/".$val);
                CopyDir($origine."/".$val, $destination."/".$val);
                
            } else {
                $file_tot++;
                if($val != $_POST["page1"] and $val != $_POST["page2"])
                {

                if(copy($origine."/".$val, $destination."/".$val)) {
                    $file++;
                } else {
                    if(!file_exists($origine."/".$val)) {
                        
                    }
                }
            }
            }
        }
    }
    return true;
}



if(isset($_POST["request"]) and $_POST["request"] =="ActiverPage1" )
{
CreerDir("./Modelutilisateur");
CopyDir("Modelfil","Modelutilisateur");
}



?>