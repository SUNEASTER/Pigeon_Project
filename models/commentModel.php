<?php

    class Comment{
        
        public $Comment_Id;
        public $Content;
        public $Post_Id;
        public $UserOpen_Id;
        public $CreateDate;
        public $UpdateDate;
        public $Status;
        public $StatusName;
        public $CommentNo;

        public function __construct($Comment_Id, $Content, $Post_Id, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $CommentNo){
            $this->Comment_Id = $Comment_Id;
            $this->Content = $Content;
            $this->Post_Id = $Post_Id;
            $this->UserOpen_Id = $UserOpen_Id;
            $this->CreateDate = $CreateDate;
            $this->UpdateDate = $UpdateDate;
            $this->Status = $Status;
            $this->CommentNo = $CommentNo;
            if($Status == 2){
                $this->StatusName = "อยู่ระหว่างตรวจสอบ";
            }
            else if($Status == 3){
                $this->StatusName = "แบน";
            }
            else {
                $this->StatusName = "ปกติ";
            }
        }

        public static function getByPostId($Post_Id, $ChkReport){
            try {
                $CommentList = [];
                require("connectionConnect.php");
                $tsql = "SELECT comment.* FROM comment "
                ."INNER JOIN useraccount ON comment.userOpenId = useraccount.userOpenId "
                ."WHERE comment.postId = $Post_Id "
                ."AND (comment.status = 1 OR ($ChkReport = 1 AND comment.status = 2)) "
                ."AND ($ChkReport = 1 OR useraccount.status != 2) "
                ."ORDER BY createDate ASC";
                $getComment = sqlsrv_query($conn, $tsql);
                if ($getComment == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getComment, SQLSRV_FETCH_ASSOC))
                {
                    $Comment_Id = $row['commentId'];
                    $Content = $row['content'];
                    $Post_Id = $row['postId'];
                    $UserOpen_Id = $row['userOpenId'];
                    $CreateDate = $row['createDate'];
                    $UpdateDate = $row['updateDate'];
                    $Status = $row['status'];
                    $CommentNo = $row['commentNo'];
                    $CommentList[] = new Comment($Comment_Id, $Content, $Post_Id, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $CommentNo);
                    $Count++;
                }
                sqlsrv_free_stmt($getComment);
                sqlsrv_close($conn);
                
                return $CommentList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function countByPostId($Post_Id, $ChkReport){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT COUNT(commentId) AS count FROM comment "
                ."INNER JOIN useraccount ON comment.userOpenId = useraccount.userOpenId "
                ."WHERE comment.postId = $Post_Id "
                ."AND (comment.status = 1 OR ($ChkReport = 1 AND comment.status = 2)) "
                ."AND ($ChkReport = 1 OR useraccount.status != 2) ";
                $getComment = sqlsrv_query($conn, $tsql);
                
                if ($getComment == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getComment, SQLSRV_FETCH_ASSOC))
                {
                    $Count = $row['count'];
                }
                sqlsrv_free_stmt($getComment);
                sqlsrv_close($conn);

                return $Count;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByCommentId($Comment_Id){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM comment where commentId = $Comment_Id";
                $getComment = sqlsrv_query($conn, $tsql);
                if ($getComment == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getComment, SQLSRV_FETCH_ASSOC))
                {
                    $Comment_Id = $row['commentId'];
                    $Content = $row['content'];
                    $Post_Id = $row['postId'];
                    $UserOpen_Id = $row['userOpenId'];
                    $CreateDate = $row['createDate'];
                    $UpdateDate = $row['updateDate'];
                    $Status = $row['status'];
                    $CommentNo = $row['commentNo'];
                    $Count++;
                }
                sqlsrv_free_stmt($getComment);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new Comment($Comment_Id, $Content, $Post_Id, $UserOpen_Id, $CreateDate, $UpdateDate, $Status, $CommentNo);
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function addComment($Content, $UserOpenId, $PostId){
            try{
                require("connectionConnect.php");

                $tsql = "INSERT INTO comment([content], userOpenId, postId, commentNo)"
                ." VALUES (N'$Content', $UserOpenId, $PostId, (SELECT IIF((SELECT TOP(1) userOpenId FROM post WHERE postId = $PostId) = $UserOpenId, 0," 
                ." (SELECT ISNULL((SELECT TOP(1) commentNo From comment WHERE postId = $PostId AND userOpenId = $UserOpenId), "
                ." ISNULL( (SELECT MAX(commentNo)+1 FROM comment WHERE postId = $PostId), 1 ) ) ) ) ) )";
                $insertComment = sqlsrv_query($conn, $tsql);
                if($insertComment == FALSE)
                    die(FormatErrors( sqlsrv_errors()));
                sqlsrv_free_stmt($insertComment);
                sqlsrv_close($conn);
            }
            catch(Exception $e){
            }
        }

        public static function updateStatus($CommentId, $Status){
            try{
                require("connectionConnect.php");

                $tsql = "UPDATE comment SET status = $Status, updateDate = sysdatetimeoffset() AT TIME ZONE 'SE Asia Standard Time' WHERE commentId = $CommentId";
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
