<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once('SQL.php');

/**
 * Class Model
 */
class Model extends Sql
{
    /**
     *The name of model;
     */
    protected $_model;

    /**
     * The name of table
     */
    protected $_table;

    /**
     * Model constructor.
     * Get the name of table and connect the database;
     */
    public function __construct()
    {
        // connect database;
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // get name of model
        $this->_model = get_class($this);
        $this->_model = rtrim($this->_model, 'Model');

        // the name of model is same to the name of table.
        $this->_table = strtolower($this->_model);
    }

    /**
     * Model destruct.
     */
    public function __destruct()
    {
    }
}
