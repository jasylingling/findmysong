<?php
  class Db {
    protected $dbHost = 'localhost'; /** Database Host */
    protected $dbUser = 'root'; /** Database Root */
    protected $dbPass = ''; /** Database Password => xampp: {empty} / mamp: root */
    protected $dbName = 'findmysong'; /** Database Name */
    protected $dbHandler, $dbStmt;

    /**
      * @param null|void
      * @return null|void
      * @desc Creates or resume an existing database connection
    **/
    public function __construct() {
      // create a DSN Resource (= Data Source Name contains the information required to connect to the database)
      $Dsn = "mysql:host=" . $this->dbHost . ';dbname=' . $this->dbName;
      // create a pdo options array
      $Options = array(
        // create a persistent database connection
        PDO::ATTR_PERSISTENT => true,
        // throw an exception if an error occurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // create a PDO instance
      try {
        $this->dbHandler = new PDO($Dsn, $this->dbUser, $this->dbPass, $Options);
      } catch (Exception $e) {
        var_dump('Database connection failed: ' . $e->getMessage());
      }
    }


    /**
      * @param string
      * @return null|void
      * @desc Creates a PDO statement object
    **/
    public function query($query) {
      $this->dbStmt = $this->dbHandler->prepare($query);
    }


    /**
      * @param string|integer|
      * @return null|void
      * @desc Matches the correct datatype to the PDO Statement Object
    **/
    public function bind($param, $value, $type = null) {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
          break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          break;
          default:
            $type = PDO::PARAM_STR;
          break;
        }
      }

      $this->dbStmt->bindValue($param, $value, $type);
    }


    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object or a db query
    **/
    public function execute()
    {
      $this->dbStmt->execute();
      return true;
    }

    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object an returns a single database record as an associative array
    **/
    public function fetch() {
      $this->execute();
      return $this->dbStmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object an returns multiple database record as an associative array
    **/
    public function fetchAll() {
      $this->execute();
      return $this->dbStmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
 ?>
