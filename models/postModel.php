<?php

    class Post{

        public $Post_Id;
        public $Content;
        public $UserOpen_Id;
        public $CreateDate;
        public $UpdateDate;
        public $StatusName;
        public $LastOwnerSeen;
        public $Tag;



        public function __construct($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $LastOwnerSeen, $Tag_Id){
            require_once("./models/tagModel.php");
            $this->Post_Id = $Post_Id;
            $this->Content = $Content;
            $this->UserOpen_Id = $UserOpen_Id;
            $this->CreateDate = $CreateDate;
            $this->UpdateDate = $UpdateDate;
            if($Status == 2){
                $this->Status = "อยู่ระหว่างตรวจสอบ";
            }
            else if($Status == 3){
                $this->Status = "แบน";
            }
            else {
                $this->Status = "ปกติ";
            }
            $this->LastOwnerSeen = $LastOwnerSeen;
            $this->Tag_Id = Tag::getByTagId($Tag_Id);
        }

        public static function getAll(){
            try {
                $PostList = [];
                require("connectionConnect.php");
                $tsql = "SELECT * FROM post";
                $getPost = sqlsrv_query($conn, $tsql);
                if ($getPost == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getPost, SQLSRV_FETCH_ASSOC))
                {
                    $Post_Id = $row['postId'];
                    $Content = $row['content'];
                    $UserOpen_Id = $row['userOpenId'];
                    $CreateDate = $row['createDate'];
                    $UpdateDate = $row['updateDate'];
                    $Status = $row['status'];
                    $LastOwnerSeen = $row['lastOwnerSeen'];
                    $Tag_Id = $row['tagId'];
                    $PostList[] = new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $LastOwnerSeen, $Tag_Id);
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return $PostList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByPostId($Post_Id){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM post WHERE postId = $Post_Id";
                $getPost = sqlsrv_query($conn, $tsql);
                if ($getPost == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getPost, SQLSRV_FETCH_ASSOC))
                {
                    $Post_Id = $row['postId'];
                    $Content = $row['content'];
                    $UserOpen_Id = $row['userOpenId'];
                    $CreateDate = $row['createDate'];
                    $UpdateDate = $row['updateDate'];
                    $Status = $row['status'];
                    $LastOwnerSeen = $row['lastOwnerSeen'];
                    $Tag_Id = $row['tagId'];
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $LastOwnerSeen, $Tag_Id);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function addPost($Content, $UserOpenId, $Tag_Id){
            try{
                require("connectionConnect.php");

                $tsql = "INSERT INTO post(content, userOpenId, tagId)"
                ." VALUES (N'$Content', $UserOpenId, $Tag_Id)";
                $insertPost = sqlsrv_query($conn, $tsql);
                if($insertPost == FALSE)
                    die(FormatErrors( sqlsrv_errors()));
                sqlsrv_free_stmt($insertPost);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

    }
