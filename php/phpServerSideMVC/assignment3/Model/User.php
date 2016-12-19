<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("Exceptions.php");

/**
 * Class User
 */
class User
{
    private $userID;
    private $userName;
    private $userPassword;
    private $userFullName;
    private $userEmail;

    /**
     * User constructor.
     * @param $userID
     * @param $userName
     * @param $userPassword
     * @param $userFullName
     * @param $userEmail
     */
    public function __construct($userID, $userName, $userPassword, $userFullName, $userEmail)
    {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->userFullName = $userFullName;
        $this->userEmail = $userEmail;
    }


    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param mixed $userPassword
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    /**
     * @return mixed
     */
    public function getUserFullName()
    {
        return $this->userFullName;
    }

    /**
     * @param mixed $userFullName
     */
    public function setUserFullName($userFullName)
    {
        $this->userFullName = $userFullName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
}
