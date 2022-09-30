<?php

    class Tag{

        public $Tag_Id;
        public $Name;
        public $Count;

        public function __construct($Tag_Id, $Name){
            $this->Tag_Id = $Tag_Id;
            $this->Name = $Name;
        }

        public static function getAll(){
            try {
                $TagList = [];
                require("connectionConnect.php");
                $tsql = "SELECT * FROM tag";
                $getTag = sqlsrv_query($conn, $tsql);
                if ($getTag == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getTag, SQLSRV_FETCH_ASSOC))
                {
                    $Tag_Id = $row['tagId'];
                    $Name = $row['name'];
                    $TagList[] = new Tag($Tag_Id, $Name);
                    $Count++;
                }
                sqlsrv_free_stmt($getTag);
                sqlsrv_close($conn);

                return $TagList;
            }
            catch(Exception $e) {
                return null;
            }
        }

        public static function getByTagId($Tag_ID){
            try {
                require("connectionConnect.php");
                $tsql = "SELECT TOP(1) * FROM tag where tagId = $Tag_ID";
                $getTag = sqlsrv_query($conn, $tsql);
                if ($getTag == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                $Count = 0;
                while($row = sqlsrv_fetch_array($getTag, SQLSRV_FETCH_ASSOC))
                {
                    $Tag_Id = $row['tagId'];
                    $Name = $row['name'];
                    $Count++;
                }
                sqlsrv_free_stmt($getTag);
                sqlsrv_close($conn);
                if ($Count == 0)
                    return null;
                return new Tag($Tag_Id, $Name);
            }
            catch(Exception $e) {
                return null;
            }
        }

    }
