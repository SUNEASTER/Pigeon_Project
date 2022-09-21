<?php

    class User{

        public $Open_Id;
        public $User_Id;
        public $Password;
        public $Email;

        public function __construct($Open_Id, $User_Id, $Password, $Email){
            $this->Open_Id = $Open_Id;
            $this->User_Id = $User_Id;
            $this->Password = $Password;
            $this->Email = $Email;
        }

        public static function getByOpenID($Open_ID){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM useraccount where userId = 'pao' AND password = '1234'";
                $getProducts = sqlsrv_query($conn, $tsql);
                if ($getProducts == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $productCount = 0;
                while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
                {
                    $Open_Id = $row['userOpenId'];
                    $User_Id = $row['userId'];
                    $Password = $row['password'];
                    $Email = $row['email'];
                }
                sqlsrv_free_stmt($getProducts);
                sqlsrv_close($conn);
                return new User($Open_Id, $User_Id, $Password, $Email);
            }
            catch(Exception $e)
            {
                echo("Error!");
                return null;
            }
            // require("connectionConnect.php");
            // $sql = "SELECT * FROM useraccount WHERE useraccount.openID = '$Open_ID'";
            // $result = $conn->query($sql);
            // $my_row = $result->fetch_assoc();
            // if( is_null($my_row) ) {
            //     require("connectionClose.php");
            //     return null;
            // }
            // $Open_Id = $my_row["openID"];
            // $User_Id = $my_row["userID"];
            // $Password = $my_row["password"];
            // $FirstName = $my_row["firstName"];
            // $LastName = $my_row["lastName"];
            // $Student_Id = $my_row["studentID"];
            // $Student_Faculty = $my_row["studentFaculty"];
            // $Student_Branch = $my_row["studentBranch"];
            // $Student_Status = $my_row["studentStatus"];
            // $YOS = $my_row["YOS"];
            // $Gender = $my_row["gender"];
            // $User_Role = $my_row["userRole"];

            // require("connectionClose.php");
            //return new User($Open_Id, $User_Id, $Password, $FirstName, $LastName, $Student_Id, $Student_Faculty, $Student_Branch, $Student_Status, $YOS, $Gender, $User_Role);
        }

        // public static function getByUserID($User_ID){
        //     require("connectionConnect.php");
        //     $sql = "SELECT * FROM useraccount WHERE useraccount.userID = '$User_ID'";
        //     $result = $conn->query($sql);
        //     $my_row = $result->fetch_assoc();
        //     if( is_null($my_row) ) {
        //         require("connectionClose.php");
        //         return null;
        //     }
        //     $Open_Id = $my_row["openID"];
        //     $User_Id = $my_row["userID"];
        //     $Password = $my_row["password"];
        //     $FirstName = $my_row["firstName"];
        //     $LastName = $my_row["lastName"];
        //     $Student_Id = $my_row["studentID"];
        //     $Student_Faculty = $my_row["studentFaculty"];
        //     $Student_Branch = $my_row["studentBranch"];
        //     $Student_Status = $my_row["studentStatus"];
        //     $YOS = $my_row["YOS"];
        //     $Gender = $my_row["gender"];
        //     $User_Role = $my_row["userRole"];

        //     require("connectionClose.php");
        //     return new User($Open_Id, $User_Id, $Password, $FirstName, $LastName, $Student_Id, $Student_Faculty, $Student_Branch, $Student_Status, $YOS, $Gender, $User_Role);   
        // }

    }
