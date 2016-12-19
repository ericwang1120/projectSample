<?php

/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
class dbHandler
{
    /**
     * The handler of database;
     */
    protected $conn;

    /**
     * The query table;
     */
    protected $_table;

    /**
     * The query result;
     */
    protected $_result;

    /**
     * Function used to the database
     */
    public function __construct($table)
    {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
        $this->_table = $table;
    }

    /**
     * Function used to select all from the table
     * @return array of the result
     */
    public function selectAll($condition = null)
    {
        $conditionString = null;
        foreach ($condition as $key => $value) {
            if ($conditionString != null) {
                $conditionString = $conditionString . ' and ' . $key . '_id=' . $value;
            } else {
                $conditionString = $key . '_id=' . $value;
            }
        }

        $sql = sprintf("select * from `%s`" . ($condition ? "where " . $conditionString : ""), $this->_table);
        $sth = $this->conn->query($sql);
        $myArray = array();
        while ($row = $sth->fetch_assoc()) {
            $myArray[] = $row;
        }
        return json_encode($myArray);
    }

    /**
     * Function used to select data from the table by id
     * @param int $id id of data
     * @return array of the result
     */
    public function selectByID($id)
    {
        $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->conn->query($sql);
        $myArray = array();
        while ($row = $sth->fetch_assoc()) {
            $myArray[] = $row;
        }
        return json_encode($myArray);
    }

    /**
     * Function used to delete data of the table by id
     * @param int $id id of data
     * @return int count of deleted rows
     */
    public function delete($id)
    {
        $sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->conn->query($sql);
        return $sth;
    }

    /**
     * Function used to get data by customise query
     * @param string $sql the customise query
     * @return array data of the query
     */
    public function query($sql)
    {
        $sth = $this->conn->query($sql);
        if (is_bool($sth)) {
            return $sth;
        } else {
            $myArray = array();
            while ($row = $sth->fetch_assoc()) {
                $myArray[] = $row;
            }
            return json_encode($myArray);
        }
    }

    /**
     * Function used to add data into the table
     * @param array $data data to be put
     * @return bool the status of the query
     */
    public function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));

        return $this->query($sql);
    }

    /**
     * Function used to update data of the table
     * @param int $id id of data
     * @param array $data data to be updated
     * @return bool the status of the query
     */
    public function update($id, $data)
    {
        $sql = sprintf("update `%s` set %s where `id` = '%s'", $this->_table, $this->formatUpdate($data), $id);

        return $this->query($sql);
    }

    /**
     * Function used to transfer data into inserting format
     * @param array $data data to be inserted
     * @return string sql formatted statement of inserting data
     */
    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }

        $field = implode(',', $fields);
        $value = implode(',', $values);

        return sprintf("(%s) values (%s)", $field, $value);
    }

    /**
     * Function used to transfer data into updating format
     * @param array $data data to be updated
     * @return string sql formatted statement of updating data
     */
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = '%s'", $key, $value);
        }

        return implode(',', $fields);
    }
}
