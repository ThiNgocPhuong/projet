<?php
    include_once('fonctionDAL.inc.php');
    try
    {
        $request_method = $_SERVER["REQUEST_METHOD"];
        switch($request_method)
        {
            case 'GET':
                getRealisation();
                break;
            case 'Update':
                updateRealisation();
                break;
            default:
				http_response_code(405);
				break;
        }
    }
    catch (Exception $e) 
    {
		echo $e->getMessage();
		http_response_code(500);
	}
    function getRealisation()
	{
		header('Content-type: application/json');
		$lesRealisation = DAL_getRealisation();
		echo json_encode($lesRealisation);
	}
    function putRealisation()
    {

        $json =  file_get_contents('php://input');
        $errJson=true;
        if(!empty($json)){
            //echo "if 1";
            $obj = json_decode($json);
          if (property_exists($obj,"Realisation"))
            {
                //echo "if 2";
                $res = $obj->Realisation;
                $errUpdate = false;
                $messageInfo = "";
                foreach($res as $uneRealisation)
                {
                    //echo "foreach";
                    if(property_exists($uneRealisation,"id_realisation")&& 
                    property_exists($uneRealisation,"nbGaime"))
                    {
                        //echo "if 3";
                        $id = $uneRealisation->id_realisation;
                       
                        $nbGaime = $uneRealisation->nbGaime;
                        $retourUpdate = DAL_UpdateRealisation($id,$nbGaime);
                        echo $retourUpdate;
                        if($retourUpdate == 1)
                        {
                            $messageInfo .= "Realisation" .$id. "ajouter avec succès.";
                        }
                        $errJson=false;
                    }
                }
                if($errUpdate == false)
                {
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