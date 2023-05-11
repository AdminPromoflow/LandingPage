<?php
// Include required files for database connection and model manipulation
require_once '../config/database.php'; // Path to database configuration
require_once '../../models/lanyards.php'; // Path to lanyards model

// Define the Material class
class Material {
    // Public function to handle incoming HTTP requests
    public function handleRequest() {
        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the raw JSON data from the request body
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            // Validate the JSON data to ensure it contains an "action" field
            if ($data !== null && isset($data->action)) {
                $action = $data->action; // Extract the action from the JSON data

                // Switch case to handle different actions based on the request
                switch ($action) {
                    case "getMaterials":
                        // Handle the retrieval of materials
                        $materials = $this->getMaterials($data);
                        $lanyardType = new LanyardType();
                        $lanyardsType  = $lanyardType->getAllLanyardsType();
                        echo json_encode($lanyardsType);exit;

                        $response = array('materials' => $materials);



                        $materialSelected  = array_rand($response['materials']);
                        $materialSelected = ($response['materials'][$materialSelected]["material"]);
                        $materialSelected =  array("optionSelected" => $materialSelected);
                        $this->setSessionMaterial((object)$materialSelected);



                      //  echo json_encode($response);
                        break;
                    case "setMaterialSelected":
                        // Handle setting the selected material and searching its attributes
                        $this->setSessionMaterial($data);

                        $infoMaterial  = $this->handleSearchMaterialAttributes($data);

                        // Prepare and send the response with material information
                        $response = array('material' => $infoMaterial);
                        echo json_encode($response);
                        break;
                      case "getMaterialSelected":
                        $materialSelecteed = $this->handleGetMaterialSelected($data);
                        $response = array('getMaterial' => $materialSelecteed);
                        break;


                    default:
                        // Respond with an error for unknown actions
                        http_response_code(400); // Bad Request
                        echo json_encode(array("message" => "Unknown action"));
                        break;
                }
            } else {
                // Respond with an error if JSON data is incomplete or missing the action field
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Incomplete JSON data or missing action"));
            }
        } else {
            // Respond with an error if the request method is not POST
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    // Private function to handle the action of setting the selected material
    private function setSessionMaterial($data) {
        session_start(); // Start or resume a session
        $_SESSION['materialSelected'] = $data->optionSelected; // Store the selected material option in the session

      //  echo json_encode($_SESSION['materialSelected']);
    }

    // Private function to handle the action of getting the selected material
    private function handleGetMaterialSelected() {
        session_start(); // Start or resume a session
        return ($_SESSION['materialSelected']) ; // Store the get material option in the session
    }

    // Private function to handle searching for attributes of the selected material
    private function handleSearchMaterialAttributes($data) {
        $connection = new Database(); // Create a new database connection

        $lanyards = new Lanyards($connection); // Instantiate the Lanyards model
        $lanyards->setMaterial($data->optionSelected); // Set the selected material in the model

        $response = $lanyards->getInfoMaterials(); // Retrieve material information

        // Store the retrieved material information
        $infoMaterial = array(
            'material' => $response['material'],
            'link' => $response['linkImg'],
            'description' => $response['description']
        );

        session_start(); // Start or resume a session
        $_SESSION['IdmaterialSelected'] = $response['idLanyard']; // Store the selected material ID in the session

        return $infoMaterial;
    }

    // Private function to handle the retrieval of all materials
    private function getMaterials($data){
        $connection = new Database(); // Create a new database connection

        $lanyards = new Lanyards($connection); // Instantiate the Lanyards model

        $response = $lanyards->getAllLanyardMaterials(); // Retrieve all lanyard materials

        return($response); // Send the response with all materials
    }
}

// Instantiate the Material class and handle the request
$material = new Material();
$material->handleRequest();
?>
