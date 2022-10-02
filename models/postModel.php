<?php

    class Post{

        public $Post_Id;
        public $Content;
        public $UserOpen_Id;
        public $CreateDate;
        public $UpdateDate;
        public $Status;
        public $StatusName;
        public $Tag;
        public $CommentCount;

        public function __construct($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $Tag_Id, $ChkReport){
            require_once("./models/tagModel.php");
            require_once("./models/commentModel.php");
            $this->Post_Id = $Post_Id;
            $this->Content = $Content;
            $this->UserOpen_Id = $UserOpen_Id;
            $this->CreateDate = $CreateDate;
            $this->UpdateDate = $UpdateDate;
            $this->Status = $Status;
            if($Status == 2){
                $this->Status = "อยู่ระหว่างตรวจสอบ";
            }
            else if($Status == 3){
                $this->Status = "แบน";
            }
            else {
                $this->Status = "ปกติ";
            }
            $this->Tag = Tag::getByTagId($Tag_Id);
            $this->CommentCount = Comment::countByPostId($Post_Id, $ChkReport);

        }

        public static function getPost($Tag_Id){
            try {
                $PostList = [];
                require("connectionConnect.php");
                $tsql = "SELECT * FROM post "
                ."WHERE status = 1 "
                ."AND (tagId = $Tag_Id OR $Tag_Id = 0) "
                ."ORDER BY createDate DESC";
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
                    $Tag_Id = $row['tagId'];
                    $PostList[] = new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $Tag_Id, 0);
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);

                return $PostList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByUserOpenId($UserOpenId ,$Tag_Id){
            try {
                $PostList = [];
                require("connectionConnect.php");
                $tsql = "SELECT * FROM post "
                ."WHERE status = 1 "
                ."AND (tagId = $Tag_Id OR $Tag_Id = 0) "
                ."AND userOpenId = $UserOpenId "
                ."ORDER BY createDate DESC";
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
                    $Tag_Id = $row['tagId'];
                    $PostList[] = new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $Tag_Id, 0);
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);
                
                return $PostList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getReportPost($Tag_Id){
            try {
                $PostList = [];
                require("connectionConnect.php");
                $tsql = "SELECT DISTINCT post.* FROM post "
                ."LEFT JOIN comment ON post.postId = comment.postId "
                ."WHERE (post.status = 2 OR comment.status = 2) "
                ."AND (post.tagId = $Tag_Id OR $Tag_Id = 0) "
                ."ORDER BY createDate DESC";
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
                    $Tag_Id = $row['tagId'];
                    $PostList[] = new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $Tag_Id, 1);
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);

                return $PostList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByPostId($Post_Id, $ChkReport){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM post WHERE postId = $Post_Id"
                ."AND (status = 1 OR ( $ChkReport = 1 AND status = 2))";
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
                    $Tag_Id = $row['tagId'];
                    $Count++;
                }
                sqlsrv_free_stmt($getPost);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new Post($Post_Id, $Content, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $Tag_Id, $ChkReport);
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

        public static function updateStatus($PostId, $Status){
            try{
                require("connectionConnect.php");

                $tsql = "UPDATE post SET status = $Status, updateDate = sysdatetimeoffset() AT TIME ZONE 'SE Asia Standard Time' WHERE postId = $PostId";
                $updatePost = sqlsrv_query($conn, $tsql);
                if($updatePost == FALSE)
                    die(FormatErrors( sqlsrv_errors()));
                sqlsrv_free_stmt($updatePost);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

    }