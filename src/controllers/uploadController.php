<?php

namespace cs174\hw4\controllers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UploadController {

    public function uploadController() {
        //create log
        $log = new Logger('logger');
        $log->pushHandler(new StreamHandler('./src/resources/jigsaw.log', Logger::INFO));

        if(isset($_POST["b"])) {
            $action = $_POST["b"];

            switch($action) {
                case "addFile": 
                    $target_dir = "./src/resources/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $limit = 2097152;
                    $maxDim = 360;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $file = $_FILES["file"]["tmp_name"];
                    list($width, $height, $type, $attr) = getimagesize($_FILES["file"]["tmp_name"]);
                    
                    if(file_exists($target_file)) {
                        $log->info("File already exists, overwritting file.");
                        //don't break because we want to overwrite file.
                    }
                    if($_FILES["file"]["size"] > $limit) {
                        $log->info("File upload attempt failed, file size is too big.");
                        break;
                    }
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                        $log->info("File upload attempt failed, file extension must be .jpg, .png, or .gif. File type was $imageFileType.");
                        break;
                    }

                    
                    if($width > $maxDim || $height > $maxDim || $width < $maxDim || $height < $maxDim) {
                        $new_height = $maxDim;
                        $new_width = $maxDim;
                        if($imageFileType == "jpg") {
                            $src = imagecreatefromjpeg($file);
                        }
                        else if($imageFileType == "png") {
                            $src = imagecreatefrompng($file);
                        }
                        else {
                            $src = imagecreatefromgif($file);
                        }
                        $dst = imagecreatetruecolor($new_width, $new_height);
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        imagedestroy($src);
                        imagepng($dst, $file);
                        imagedestroy($dst);
                    }

                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . "active_image.jpg")) {
                        $log->info("File upload success.");

                        $array = range(0, 8);
                        
                        for($i = 0; $i <= 7; $i++) {
                            $j = array_rand($array);
                
                            if($j > $i) {
                                $temp = $array[$i];
                                $array[$i] = $array[$j];
                                $array[$j] = $temp;
                            }
                        }
                        file_put_contents($target_dir . "active_image.txt", serialize($array));
                    }
            }

        }
    }
}
