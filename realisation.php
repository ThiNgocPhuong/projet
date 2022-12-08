<?php
    include_once('fonctionDAL.inc.php');
    try{
        $request_method = $_SERVER["REQUEST_METHOD"];
        switch($request_method)
        {
            case 'GET':
                getRealisation();
                break;
            case 'PUT':
                putRealisation();
                break;
            default:
				http_response_code(405);
				break;
        }
    }
    catch (Exception $e) {
		echo $e->getMessage();
		http_response_code(500);
	}
    function getRealisation()
	{
		header('Content-type: application/json');
		$lesRealisation = DAL_getRealisation();
		echo json_encode($lesRealisation);
	}
    function putRealisation(){

        $json =  file_get_contents('php://input');
        $errJson=true;
        if(!empty($json)){
            $obj = json_decode($json);
            if (property_exists($obj,"Realisation")){
                $res = $obj->Reaisation;
                $errUpdate = false;
                foreach($res as $uneRealisation){
                    if(property_exists($uneRealisation,"id_realisation")&& 
                    property_exists($uneRealisation,"titre_realisation")&&
                    property_exists($uneRealisation,"description_realisaton")){
                        $id = $uneRealisation->id_realisation;
                        $titre = $uneRealisation->titre_realisation;
                        $description = $uneRealisation->description_realisation;
                        $retourUpdate = DAL_InsertSQLiteDatabase($id,$titre,$description);
                        if($retourUpdate == 1){
                            $message .= "Realisation" .$id. "ajouter avec succès.";
                        }
                        $errJson=false;
                    }
                }
                if($errUpdate == false){
                    header('Content-Type: application/json');
					echo json_encode($messageInfo);
					http_response_code(200);
                }
            }
        }
        if($errJson){
            header('Content-Type: application/json');
			echo json_encode("JSON Object empty or invalid");
			http_response_code(400);
        }
    }
    
?>