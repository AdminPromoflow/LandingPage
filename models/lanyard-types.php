<?php
class LanyardTypes {
  // Private variables
  private $connection; // The database connection
  private $idManterial;
  private $lanyardType;


  // Constructor that initializes the connection.
  function __construct($connection) {
    $this->connection = $connection;
  }

  // Set the user's name
  public function setIdMaterial($idManterial) {
    $this->idManterial = $idManterial;
  }
  public function setLanyardType($lanyardType) {
    $this->lanyardType = $lanyardType;
  }

  public function getInfoLanyardTypeByIdMaterial() {
      try {

          // Prepare the SQL query with placeholders
          $sql = $this->connection->getConnection()->prepare("SELECT `type`, `price`  FROM `LanyardTypes` WHERE `idLanyard`  =  :idMaterial AND  `type`  =  :lanyardType");


          // Bind the email parameter
          $sql->bindParam(':idMaterial', $this->idManterial, PDO::PARAM_STR);
          $sql->bindParam(':lanyardType', $this->lanyardType, PDO::PARAM_STR);

        //  echo json_encode($this->material);exit;

          // Execute the query
          $sql->execute();

          // Fetch the password
          $response = $sql->fetch(); // Retrieve the password as a single value

          // Close the database connection
          $this->connection->closeConnection();

          return $response;

      } catch (PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();
          throw new Exception("Error in the user verification query.");
      }
  }

  public function getAllLanyardsType() {
      try {

          // Prepare the SQL query with placeholders
          $sql = $this->connection->getConnection()->prepare("SELECT DISTINCT `type`, `price`  FROM `LanyardTypes`");


        //  echo json_encode($this->material);exit;

          // Execute the query
          $sql->execute();

          // Fetch the password
          $response = $sql->fetch(); // Retrieve the password as a single value

          // Close the database connection
          $this->connection->closeConnection();

          return $response;

      } catch (PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();
          throw new Exception("Error in the user verification query.");
      }
  }

    /*
   * Get a list of all Materia's lanyards from the database.
   *
   * @return array An array of customer data, or an empty array if no customers are found.
   */




}
?>
