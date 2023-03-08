<?php 
include("Controller/Upload.php");
$upload = New Upload;
$title_error="";
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $src = isset($_POST['image']);
    $publish_by = $_POST['publish_by'];
    $src = $_POST['license'];
    if(empty($title)){
       $title_error= "Title is required!";
    }
    else{
        if (!isset($_FILES["image"])) {
            echo "Please upload an image file!";
            return;
        }
        
        $fileInformation = $_FILES["image"];
        
        //var_dump($fileInformation);
        
        if ($fileInformation["size"] > 50000000) {
            echo "The file is too big! Max 50 MB!";
            return;
        }
        
        // var_dump(mime_content_type($fileInformation["tmp_name"]));
        $imageType = mime_content_type($fileInformation["tmp_name"]);
        
        // Array Variante
        
        if(!in_array($imageType, array("image/png", "image/jpeg", "image/webp", "image/gif"))) {
            echo "The file must be in one of these formats: PNG, JPEG, WebP, Gif";
            return;
        }
        $fileName    = $_FILES["image"]['name'];
        $fileExtArr  = explode('.',$fileName);//make array of file.name.ext as    array(file,name,ext)
        $fileExt    = strtolower(end($fileExtArr));
        // 1. Datei lesen
        $destinationFile = uniqid().'.'.$fileExt;//microtime();
        // Funktion, die Dateien verschiebt: move_uploaded_file
        //main image move to uploads folder
        if (!move_uploaded_file($fileInformation["tmp_name"], "uploads/" . $destinationFile)) {
            echo "The file could not be saved.";
            return;
        }
        
        // Datei speichern
        $image = null;
        if ($imageType == "image/jpeg") {
            $image = imagecreatefromjpeg("uploads/" . $destinationFile);
        }
        
        else if ($imageType == "image/png") {
            $image = imagecreatefrompng("uploads/" . $destinationFile);
        }
        
        else if ($imageType == "image/webp") {
            $image = imagecreatefromwebp("uploads/" . $destinationFile);
        }
        
        else if ($imageType == "image/gif") {
            $image = imagecreatefromgif("uploads/" . $destinationFile);
        }
        
        // Image scale und in Variable speichern
        //for thumbnail image generate
        $scaledImage = imagescale($image, 150,150);
        
        // Für webp
        //for thumbnail image move to thumb folder
        imagewebp($scaledImage, "uploads/thumnails/" . $destinationFile, 40);
    
        $title=$_POST['title'];
        $description=$_POST['description'];
        $publish_by=$_POST['publish_by'];
        $license=$_POST['license'];
        //call store method with perameter
    $row = $upload->store($title,$description,$publish_by,$license,$destinationFile);
    }
}


include("header.php");

?>
        <div class="container"> 
            <div class="row justify-content-start">
               <div class="col-6">    
              <h2>Latest artworks</h2>
              <form enctype="multipart/form-data" method="POST">
                  <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                  <div class="form-group">
                        <label for="title">Title</label>
                         <input id="title" type="text" name="title" class="form-control" placeholder="Enter Titile">
                  <div class="text-danger"><?php echo $title_error;?></div>
                        </div>   
                  <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" type="text" name="description" class="form-control" placeholder="Enter Description">
                  </div> 
            <div class="form-group">
            <label for="publish_by">Publish By</label>
            <input id="publish_by" type="text" name="publish_by" class="form-control" placeholder="Enter publish by">
            </div> 
            <div class="form-group">
            <label for="license">License</label>
            <input id="license" type="text" name="license" class="form-control" placeholder="Enter License">
            </div> 
            <div class="form-group py-3">
        <input type="file" name="image" accept="image/png,image/jpeg,image/webp,image/gif">
</div>
        <div class="form-group py-3">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>

        <?php //require_once "controller/upload.php"; ?>
    </form>
      </div>
      </div>
</div>
<?php include("footer.php");?>