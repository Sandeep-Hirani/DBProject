<?php
$target_dir = "uploads/";
// $sid = $_POST['fileToUpload'];
$target = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = str_replace(' ', '', $target);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                require 'vendor/autoload.php'; // include Composer's autoloader
                    $name = $_POST['assigned'];
                    echo $name;
                    $client = new MongoDB\Client("mongodb://localhost:27017");
                    $collection = $client->survery_13142->survery;
                    $result = $collection->insertOne( [ 'name' => $name, 'pAvailable' => isset($_POST['pA']), 'pPositioned' => isset($_POST['pP']),
                    'pCompetitors' => isset($_POST['pC']) ,'Cords' => '1,1','time' => time(),'path' => $target_file ]);

                    echo "Inserted with Object ID '{$result->getInsertedId()}'";
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("Location:survey.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>