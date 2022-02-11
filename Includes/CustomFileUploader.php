<?php

include_once "Utils.php";
/**
 * CustomFileUploader module used to upload multiple image files.
 *
 * @version 1.3
 * @author Guy Bami W.
 * Last changes: 05.04.20
 *  - 1.3: Added .pdf file type
 */
class CustomFileUploader
{

    private $targetDirectory = "../UploadedFiles/Images";
    private $filesListToUpload =  array();
    private $maxFileSize = 1024; // max size in bytes
    private $generateCopiedFileName = false;
    private static $currentFileNameUploaded = "";
    
    public function __construct($filesListToUpload, $targetDirectory = "../UploadedFiles/Images",
            $generateCopiedFileName = false){
        $this->filesListToUpload = $filesListToUpload;
        $this->maxFileSize = 1024 * 1024 * 5; // default 5Mbytes
        $this->targetDirectory = $targetDirectory;
        $this->generateCopiedFileName = $generateCopiedFileName;
        CustomFileUploader::$currentFileNameUploaded = "";
    }

            
    public function uploadAllImageFiles(){
        $resultObject = false;
        $jsonArray = array();
        
        if(isset($this->filesListToUpload) &&  count($this->filesListToUpload) > 0){
            foreach($this->filesListToUpload as $fileToUpload)
            {
                $resultObject = $this->uploadImageFile($fileToUpload);
                array_push($jsonArray, $resultObject);
            }
        }
        return $jsonArray;
    }
    
    
    public function uploadAllBillFiles(){
        $resultObject = false;
        $jsonArray = array();
        
        if(isset($this->filesListToUpload) &&  count($this->filesListToUpload) > 0){
            foreach($this->filesListToUpload as $fileToUpload)
            {
                $resultObject = $this->uploadBillFile($fileToUpload);
                array_push($jsonArray, $resultObject);
            }
        }
        return $jsonArray;
    }

    public function getNewFileSuffix($size = 8){
        $buffGUID = uniqid() . uniqid();
        $randomString = substr($buffGUID, 0,  $size);
        return $randomString;
    }


    public function uploadImageFile($fileToUpload){

        if(!isset($this->targetDirectory) || strlen($this->targetDirectory) <= 5){
            $this->targetDirectory = "../UploadedFiles/Images";
        }
        $this->maxFileSize = 1024 * 1024 * 5;  // 5 Mbytes for images
        $resultObject = new UploadFileStatus();
        $uploadStatus = $this->uploadFile($fileToUpload, "IMAGE");
                
        switch ($uploadStatus) {
            case "INVALID_IMAGE_FILE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, your file is fake or invalid.";
                $resultObject->status = false;
                break;
            case "FILE_TOO_LARGE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, your file is too large.";
                $resultObject->status = false;
                break;
            case "INVALID_IMAGE_TYPE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $resultObject->status = false;
                break;
            case "UNKNOWN_ERROR":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, there was an error uploading your image file.";
                $resultObject->status = false;
                break;
            case "UPLOAD_SUCCESS":
                $resultObject->entryKey = CustomFileUploader::$currentFileNameUploaded;
                $resultObject->status = true;
                $resultObject->message =  "The image file ". CustomFileUploader::$currentFileNameUploaded. " has been uploaded.";
                break;
        }
        return $resultObject;
    }


    public function uploadVideoFile($fileToUpload){

        if(!isset($this->targetDirectory) || strlen($this->targetDirectory) <= 5){
            $this->targetDirectory = "../UploadedFiles/Videos";
        }
        
        $this->maxFileSize = 1024 * 1024 * 30;  // 30 Mbytes for videos
        $resultObject = new UploadFileStatus();
        $uploadStatus = $this->uploadFile($fileToUpload, "VIDEO");
        switch ($uploadStatus) {
            case "FILE_TOO_LARGE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, your file is too large.";
                $resultObject->status = false;
                break;
            case "INVALID_VIDEO_TYPE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, only Video .avi, MOV, MPEG files are allowed.";
                $resultObject->status = false;
                break;
            case "UNKNOWN_ERROR":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, there was an error uploading your video file.";
                $resultObject->status = false;
                break;
            case "UPLOAD_SUCCESS":
                $resultObject->entryKey = CustomFileUploader::$currentFileNameUploaded;
                $resultObject->status = true;
                $resultObject->message =  "The video file ". CustomFileUploader::$currentFileNameUploaded. " has been uploaded.";
                break;
        }
        return $resultObject;
        
    }


    public function uploadCustomFile($fileToUpload){
            
        if(!isset($this->targetDirectory) || strlen($this->targetDirectory) <= 5){
            $this->targetDirectory = "../UploadedFiles";
        }
        
        $this->maxFileSize = 1024 * 1024 * 5;  // 5 Mbytes for custom files (.txt, html, cc
        $resultObject = new UploadFileStatus();
        $uploadStatus = $this->uploadFile($fileToUpload, "ANY");
        switch ($uploadStatus) {
            
            case "FILE_TOO_LARGE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, your file is too large.";
                $resultObject->status = false;
                break;
            case "UNKNOWN_ERROR":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, there was an error uploading your custom file.";
                $resultObject->status = false;
                break;
            case "UPLOAD_SUCCESS":
                $resultObject->entryKey = CustomFileUploader::$currentFileNameUploaded;
                $resultObject->message =  "The  file ". CustomFileUploader::$currentFileNameUploaded. " has been uploaded.";
                $resultObject->status = true;
                break;
        }
        return $resultObject;
    }
    
    
    public function uploadBillFile($fileToUpload){

        //$this->targetDirectory = "../UploadedFiles/Bills";
        $this->maxFileSize = 1024 * 1024 * 3;  // 3 Mbytes for custom files (.txt, html, cc
        $resultObject = new UploadFileStatus();
        $uploadStatus = $this->uploadFile($fileToUpload, "ANY");
        switch ($uploadStatus) {
            
            case "FILE_TOO_LARGE":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, your file is too large.";
                $resultObject->status = false;
                break;
            case "UNKNOWN_ERROR":
                $resultObject->entryKey = basename($fileToUpload["name"]);
                $resultObject->message = "Sorry, there was an error uploading your video file.";
                $resultObject->status = false;
                break;
            case "UPLOAD_SUCCESS":
                $resultObject->entryKey = CustomFileUploader::$currentFileNameUploaded;
                $resultObject->message =  "The  file ".CustomFileUploader::$currentFileNameUploaded. " has been uploaded.";
                $resultObject->status = true;
                break;
        }
        return $resultObject;
    }

    /**
     * 
     * @param string $fileToUpload
     * @param string $fileType
     * @return string - upload status
     */
    public function uploadFile($fileToUpload, $fileType){
        
        $targetFile = $this->targetDirectory .  "/" . ($fileToUpload["name"]);
        $uploadStatus = "UPLOAD_SUCCESS";
        // lower extension for comparisons
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileName = strtolower(pathinfo($targetFile, PATHINFO_FILENAME));
        //echo "Only extension: " . $fileExtension;
        //echo "Only full Name: : " . $targetFile;
            
        switch ($fileType) {
            case "IMAGE":
                // Check if image file is a actual image or fake image
                if(isset($targetFile)) {
                    $checkImage = getimagesize($fileToUpload["tmp_name"]);
                    if(!isset($checkImage)){
                        $uploadStatus = "INVALID_IMAGE_FILE";
                        return $uploadStatus;
                    }
                }
                // Allow certain file formats
                if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg"
                    && $fileExtension != "gif"  && $fileExtension != "pdf" ) {
                    $uploadStatus = "INVALID_IMAGE_TYPE";
                    return $uploadStatus;
                }
                break;
            case "VIDEO":
                // Allow certain file formats
                if($fileExtension != "mp4" && $fileExtension != "avi" && $fileExtension != "mov" && $fileExtension != "mpeg"
                    && $fileExtension != "3gp" ) {
                    $uploadStatus = "INVALID_VIDEO_TYPE";
                    return $uploadStatus;
                }
                break;
        }

        // Check file size
        if ($fileToUpload["size"] > $this->maxFileSize) {
            $uploadStatus = "FILE_TOO_LARGE";
            return $uploadStatus;
        }
        //step 2. hier we can upload the file
        
        // get original extension and name
        $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
        $fileName =  pathinfo($targetFile, PATHINFO_FILENAME);
        // check and rename file if already exists
        while(file_exists($targetFile)){
            $fileName = $fileName . "_" . $this->getNewFileSuffix();
            $targetFile = $this->targetDirectory .  "/" . $fileName . "." . $fileExtension;
        }
        try
        {
            if($this->generateCopiedFileName == TRUE){
                $fileName = $this->getNewFileSuffix(4) . "_" . $this->getNewFileSuffix(4);
                $targetFile = $this->targetDirectory .  "/" . $fileName . "." . $fileExtension;
            }
            if (move_uploaded_file($fileToUpload["tmp_name"], $targetFile)) {
                $uploadStatus = "UPLOAD_SUCCESS";
                CustomFileUploader::$currentFileNameUploaded = $fileName . "." . $fileExtension;
            } 
            else {
                $uploadStatus = "UNKNOWN_ERROR";
            }
        } 
        catch(Exception $ex){
            $uploadStatus = "UNKNOWN_ERROR";
        }
        return $uploadStatus;
    }


    public static function getFileUploadMaxSize() {
      static $maxSize = -1;

      if ($maxSize < 0) {
        // Start with post_max_size.
        $maxSize = self::parseSize(ini_get('post_max_size'));
        // If upload_max_size is less, then reduce. Except if upload_max_size is
        // zero, which indicates no limit.
        $uploadMax = self::parseSize(ini_get('upload_max_filesize'));
        if ($uploadMax > 0 && $uploadMax < $maxSize) {
          $maxSize = $uploadMax;
        }
      }
      return $maxSize;
    }


    public static function  parseSize($size) {
      $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
      // Remove the non-numeric characters from the size.
      $size = preg_replace('/[^0-9\.]/', '', $size); 
      if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
      }
      else {
        return round($size);
      }
    }



}

class UploadFileStatus {
    public $entryKey = "-";
    public $status = false;
    public $message = "";
    public function __construct() {
    }
     
}