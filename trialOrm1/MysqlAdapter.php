<?php
    class MysqlAdapter implements DatabaseInterface
    {
    private $host = '';
    
    private $username = '';
    
    private $password = '';
    
    private $dbName = '';
    
    private $port = '';
    
    private $socket = '';
    
    private $_mysqli;
    
    function __construct($host, $username, $password, $dbName, $port = null, $socket = null)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;
        $this->socket = $socket;
    }
    
    function connect()
    {
        $this->_mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbName, $this->socket);
        if ($this->_mysqli->connect_error) {
            return false;
        }
        return true;
    }
    
    function disconnect()
    {
        if (isset($this->_mysqli)) {
            $this->_mysqli->close();
        }
    }
    
    /**
     * @param string $tableName
     * @param array $columns
     * @param array $values
     * @return mixed
     */
    function insert($tableName, $columns, $values)
    {
        $query = "INSERT INTO $tableName $columns VALUES $values";
        return $this->_mysqli->query($query);
    }
    
    /**
     * @param string $tableName
     * @param array $conditions structure -> column => (operator, value, logical_operator) e.g id => (>, 5, AND)
     * @param array $columns
     * @param array $values
     * @return mixed
     */
    function update($tableName, $columns, $values, $conditions)
    {
        $updateString = $this->generateUpdateString($columns, $values);
        $whereString = $this->generateWhereString($conditions);
        $query = "UPDATE $tableName SET  $updateString WHERE  $whereString";
        $result = $this->_mysqli->query($query);
        return $result;
    }
    
    /**
     * @param string $tableName
     * @param string $columns
     * @param array $conditions
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    function select($tableName, $columns, $conditions, $limit = null, $offset = null)
    {
        $query = "SELECT $columns FROM product";
        $query = "show tables";
        // if (!empty($conditions)) {
        //     $whereString = $this->generateWhereString($conditions);
        //     $query .= " WHERE $whereString";
        // }
        // if (isset($limit) && isset($offset)) {
        //     $query .= "LIMIT $limit OFFSET $offset";
        // }
        $result = $this->_mysqli->query($query);
        $response = [];
        if($result){
            print_r($result);
            $response['fields'] = $this->fetchFields($result);
            $response['values'] = mysqli_fetch_all($result);
        }
        return $response;
    }
    
    /**
     * @param string $tableName
     * @param array $conditions
     * @return mixed
     */
    function delete($tableName, $conditions)
    {
        $whereString = $this->generateWhereString($conditions);
        $query = "DELETE FROM $tableName WHERE $whereString";
        return $query;
    }
    
    /**
     * @param array $keys
     * @param array $values
     * @return string
     */
    function generateUpdateString($keys, $values)
    {
        $len = count($keys);
        $buildString = '';
        for ($i = 0; $i < $len - 1; $i++) {
            $buildString .= $keys[$i] . '=' . $values[$i] . ',';
        }
        $buildString .= $keys[$len - 1] . '=' . $values[$len - 1];
        return $buildString;
    }
    
    /**
     * @param array $arrayValues
     * @return string
     */
    public function generateWhereString($arrayValues)
    {
        $buildString = '';
        foreach ($arrayValues as $key => $arrayValue) {
            $buildString .= $key . $arrayValue[0] . $arrayValue[1] . " " . $arrayValue[2];
        }
        return $buildString;
    }
    
    /**
     * @param string $queryResult
     * @return array
     */
    function fetchFields($queryResult)
    {
        if ($queryResult) {
            $fieldsData = $queryResult->fetch_fields();
            $fields = [];
            foreach ($fieldsData as $fieldData) {
                $fields[] = $fieldData->name;
            }
            return $fields;
        }
        return [];
    }
    }
?>