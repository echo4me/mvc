<?php

namespace MVC\models;
use MVC\core\model;

class user extends model{
    // Get all data from Table
    public function getData()
    {
        $stmt = $this->conn->prepare("SELECT * FROM `tbl_student` ");
        $stmt ->execute();
        $rows = $stmt->fetchAll(2);
        return $rows;
        
    }
    // Get data only for login check
    public function getUserData($email,$password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `tbl_student` WHERE `student_email` = :email AND `password` = :password");
        $stmt->execute([':email'=>$email,':password'=>$password]);
        $rows = $stmt->fetch(2);
        if($stmt->rowCount() > 0)
        {
           return $rows;
        }else{
            return false;
        }
        
    }
    // Insert datetime for last login
    public function lastlogin ($email)
    {
        $stmt = $this->conn->prepare("UPDATE `tbl_student` SET `student_date` = NOW() WHERE `student_email` = '$email' ");
        $stmt->execute();
        if($stmt->rowCount() >0 )
        {
            return true;
        }else{
            return false;
        }
    }
    // update

    public function update($user,$pass,$id)
    {
        $stmt=$this->conn->prepare("UPDATE `tbl_student` SET `username` = :user , `password` = :pass WHERE `student_id` = :id ");
        $stmt->execute([
            ':user'  => $user,
            ':pass'  => $pass,
            ':id'    => $id
        ]);
        if($stmt->rowCount() >0 )
        {
            echo "Updated Successfuly";
        }else{
            return false;
        }
    }
    //insert crud api
    public function insert($user,$pass)
    {
        $stmt=$this->conn->prepare("INSERT INTO `tbl_student` (`username`,`password`) VALUES (:user,:pass)");
        $stmt->execute([
            ':user'  => $user,
            ':pass'  => $pass,
        ]);
        if($stmt->rowCount() >0 )
        {
            echo "Added Successfuly";
        }else{
            return false;
        }
    }
    // delete crud api

    public function delete($id)
    {
        $stmt=$this->conn->prepare("DELETE FROM `tbl_student` WHERE `student_id` = :id ");
        $stmt->execute([
            ':id'  => $id,
        ]);
        if($stmt->rowCount() >0 )
        {
            echo "Deleted Successfuly";
        }else{
            return false;
        }
    }
}