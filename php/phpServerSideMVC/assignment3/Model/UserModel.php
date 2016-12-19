<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("User.php");

/**
 * Class UserModel
 */
class UserModel extends Model
{
    private $user;

    /**
     * @param $userName
     * @param $accPassword
     * @return bool|mixed if input correct name and password, redirect return user id, else return false
     */
    public function getValidation($userName, $accPassword)
    {
        $md5Password = md5($userName + $accPassword);
        $sql = "select * from user where USER_NAME='$userName' and USER_PASSWORD='$md5Password'";

        if (count($this->query($sql)) == 1) {
            $user = new User($this->query($sql)[0]['ID'], $this->query($sql)[0]['USER_NAME'], $this->query($sql)[0]['USER_PASSWORD'], $this->query($sql)[0]['USER_FULL_NAME'], $this->query($sql)[0]['USER_EMAIL']);
            $this->user = $user;
            return $this->user;
        } else {
            return false;
        }
    }

    /**
     * @param $userName
     * @param $userPassword
     * @param $userFullName
     * @param $userEmail
     * @throws BadRegisterException
     */
    public function register($userName, $userPassword, $userFullName, $userEmail)
    {
        $sql = "select * from user where USER_NAME='$userName'";
        if (count($this->query($sql)) == 1) {
            throw new BadRegisterException("Existed User! Redirect in 2 seconds!", 201);
        } else {
            $data['USER_NAME'] = $userName;
            $data['USER_PASSWORD'] = md5($userName + $userPassword);
            $data['USER_FULL_NAME'] = $userFullName;
            $data['USER_EMAIL'] = $userEmail;
            $this->add($data);
        }
    }

    /**
     * @param $userName
     * @throws BadRegisterException
     */
    public function getIfExisted($userName)
    {
        $sql = "select * from user where USER_NAME='$userName'";
        if (count($this->query($sql)) == 1) {
            throw new BadRegisterException("Existed User!", 201);
        }
    }
}
