<?php

    class User{
        public $Open_Id;
        public $User_Id;
        public $Password;
        public $Email;
        public $Role;
        public $Status;

        public function __construct($Open_Id, $User_Id, $Password, $Email, $Role, $Status){
            $this->Open_Id = $Open_Id;
            $this->User_Id = $User_Id;
            $this->Password = $Password;
            $this->Email = $Email;
            $this->Role = $Role;
            $this->Status = $Status;
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
                    $Password = null;
                    $Email = $row['email'];
                    $Role = $row['role'];
                    $Status = $row['status'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Role, $Status);
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
                    $Password = null;
                    $Email = $row['email'];
                    $Role = $row['role'];
                    $Status = $row['status'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Role, $Status);
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
                    $Password = null;
                    $Email = $row['email'];
                    $Role = $row['role'];
                    $Status = $row['status'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Role, $Status);
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
                    $Password = null;
                    $Email = $row['email'];
                    $Role = $row['role'];
                    $Status = $row['status'];
                    $Count++;
                }
                sqlsrv_free_stmt($getUser);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new User($Open_Id, $User_Id, $Password, $Email, $Role, $Status);
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
                sqlsrv_free_stmt($insertUser);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

        public static function updateStatus($Open_ID, $Status){
            try{
                require("connectionConnect.php");

                $tsql = "UPDATE useraccount SET status = $Status WHERE userOpenId = $Open_ID";
                $updateUser = sqlsrv_query($conn, $tsql);
                if($updateUser == FALSE)
                    die(FormatErrors( sqlsrv_errors()));
                sqlsrv_free_stmt($updateUser);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

    }
