<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class SQL
{
    /**
     * The handler of database;
     */
    protected $_dbHandle;

    /**
     * The query result;
     */
    protected $_result;

    /**
     * Function used to the database
     * @param string $host hostname
     * @param string $user username
     * @param string $pass password
     * @param string $dbname name of database
     */
    public function connect($host, $user, $pass, $dbname)
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
            $this->_dbHandle = new PDO($dsn, $user, $pass, array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            exit('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Function used to select all from the table
     * @return array of the result
     */
    public function selectAll()
    {
        $sql = sprintf("select * from `%s`", $this->_table);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Function used to select data from the table by id
     * @param int $id id of data
     * @return array of the result
     */
    public function select($id)
    {
        $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Function used to delete data of the table by id
     * @param int $id id of data
     * @return int count of deleted rows
     */
    public function delete($id)
    {
        $sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * Function used to get data by customise query
     * @param string $sql the customise query
     * @return array data of the query
     */
    public function query($sql)
    {
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
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
