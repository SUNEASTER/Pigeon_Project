<?php

    class User{

        public $Open_Id;
        public $User_Id;
        public $Password;
        public $Email;
        public $Count;

        public function __construct($Open_Id, $User_Id, $Password, $Email, $Count){
            $this->Open_Id = $Open_Id;
            $this->User_Id = $User_Id;
            $this->Password = null;
            $this->Email = $Email;
            $this->Count = $Count;
        }

        public static function getByOpenID($Open_ID){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM useraccount where userOpenId = $Open_ID";
                $getUser = sqlsrv_query($conn, $tsql);
                if ($getUser == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getUser, SQLSRV_FETCH_ASSOC))
                {
                    $Open_Id = $row['userOpenId'];
                    $User_Id = $row['userId'];
                    $Password = $row['password'];
                    $Email = $row['email'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Count);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByUserIdAndPassword($UserId, $Password){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM useraccount where userId = '$UserId' AND password = '$Password'";
                $getUser = sqlsrv_query($conn, $tsql);
                if ($getUser == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getUser, SQLSRV_FETCH_ASSOC))
                {
                    $Open_Id = $row['userOpenId'];
                    $User_Id = $row['userId'];
                    $Password = $row['password'];
                    $Email = $row['email'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Count);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByUserId($UserId){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM useraccount where userId = '$UserId'";
                $getUser = sqlsrv_query($conn, $tsql);
                if ($getUser == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getUser, SQLSRV_FETCH_ASSOC))
                {
                    $Open_Id = $row['userOpenId'];
                    $User_Id = $row['userId'];
                    $Password = $row['password'];
                    $Email = $row['email'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Count);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByEmail($Email){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM useraccount where email = '$Email'";
                $getUser = sqlsrv_query($conn, $tsql);
                if ($getUser == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getUser, SQLSRV_FETCH_ASSOC))
                {
                    $Open_Id = $row['userOpenId'];
                    $User_Id = $row['userId'];
                    $Password = $row['password'];
                    $Email = $row['email'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Count);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function addUser($UserId, $Password, $Email){
            try{
                require("connectionConnect.php");

                $tsql = "INSERT INTO useraccount (userId, [password], email)"
                ." VALUES ('$UserId', '$Password', '$Email')";
                $insertUser = sqlsrv_query($conn, $tsql);
                if($insertUser == FALSE)
                    die(FormatErrors( sqlsrv_errors()));
                echo "Product Key inserted is :";
                // while($row = sqlsrv_fetch_array($insertUser, SQLSRV_FETCH_ASSOC))
                // {
                //     echo($row['userOpenId']);
                // }
                sqlsrv_free_stmt($insertReview);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

    }
