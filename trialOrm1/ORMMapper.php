<?php
    class ORMMapper implements MapperInterface
    {
    
    private $_tableName = '';
    
    private $_adapter;
    
    function __construct()
    {
        $this->_adapter = new MysqlAdapter('localhost', 'soke', '', 'product_db');
        if (!$this->_adapter->connect()) {
            echo "Something Terribly went wrong";
            return;
        }
        $this->loadClassProperties();
    }
    
    /**
     * @return object
     */
    function findAll()
    {
        $result = $this->_adapter->select($this->_tableName, '*', []);
        return $this->buildResponseObject($result);
    }
    
    /**
     * @param $id
     * @return object
     */
    function findById($id)
    {
        $result = $this->_adapter->select($this->_tableName, '*', ['id' => ['=', $id, '']]);
        $result = $this->buildResponseObject($result);
        if ($result){
            return $result[0];
        }
        return (object)[];
    }
    
    
    /**
     * @return mixed
     */
    function save()
    {
        // todo: Complete the Implementation of this method
        $fields = $this->_adapter->fetchFields($this->_tableName);
        if (isset($this->id)) {
            return $this->_adapter->update($this->_tableName, $fields, (array)$this, ['id' => ['=', $this->id, '']]);
        }
        return $this->_adapter->insert($this->_tableName, $fields, (array)$this);
    }
    
    function loadClassProperties()
    {
        $fields = $this->_adapter->fetchFields($this->_tableName);
        foreach ($fields as $field) {
            $this->$field = null;
        }
    }
    
    /**
     * @param $result
     * @return object
     */
    function buildResponseObject($result)
    {
        $response = [];
        if ($result) {
            $fields = $result['fields'];
            $values = $result['values'];
            $num_of_rows = count($result['values']);
            $num_of_fields = count($result['values'][0]);
    
            $buildResponse = [];
            for ($i = 0; $i < $num_of_rows; $i++) {
                for ($j = 0; $j < $num_of_fields; $j++) {
                    $buildResponse[$fields[$j]] = $values[$i][$j];
                }
                $response[] = $buildResponse;
            }
        }
        return json_decode(json_encode($response));
    }
    
    
    /**
     * @param $tableName
     */
    public function setTableName($tableName)
    {
        $this->_tableName = $tableName;
    }
    }
?>