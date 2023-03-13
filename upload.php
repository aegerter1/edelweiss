<?php
include("Controller/Upload.php");
$upload = new Upload;
$title_error = "";
$description_error = "";
$publish_by_error = "";
$license_error = "";
$email_error = "";
$img_error = "";
$msg = "";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $src = isset($_POST['image']);
    $publish_by = $_POST['publish_by'];
    $license = $_POST['license'];
    $email = $_POST['email'];
    if (empty($title)) {
        $title_error = "Title is requislred!";
    } else if (empty($description)) {
        $description_error = "description is requislred!";
    } else if (empty($publish_by)) {
        $publish_by_error = "Publish By is requislred!";
    } else if (empty($license)) {
        $license_error = "License is requislred!";
    } else if (empty($email)) {
        $email_error = "email is requislred!";
    } else {
        if (!isset($_FILES["image"])) {
            $img_error = "Please upload an image file!";
            return;
        }

        $fileInformation = $_FILES["image"];



        if ($fileInformation["size"] > 50000000) {
            $img_error = "The file is too big! Max 50 MB!";
            return;
        }

        // var_dump(mime_content_type($fileInformation["tmp_name"]));
        $imageType = mime_content_type($fileInformation["tmp_name"]);

        // Array Variante

        if (!in_array($imageType, array("image/png", "image/jpeg", "image/webp", "image/gif"))) {

            $img_error = "The file must be in one of these formats: PNG, JPEG, WebP, Gif";
            return;
        }

        $fileName    = $_FILES["image"]['name'];
        $fileExtArr  = explode('.', $fileName); //make array of file.name.ext as    array(file,name,ext)
        $fileExt    = strtolower(end($fileExtArr));
        // 1. Datei lesen
        $destinationFile = uniqid() . '.' . $fileExt; //microtime();
        // Funktion, die Dateien verschiebt: move_uploaded_file
        //main image move to uploads folder
        if (!move_uploaded_file($fileInformation["tmp_name"], "uploads/" . $destinationFile)) {
            $img_error = "The file could not be saved.";
            return;
        }

        // Datei speichern
        $image = null;
        if ($imageType == "image/jpeg") {
            $image = imagecreatefromjpeg("uploads/" . $destinationFile);
        } else if ($imageType == "image/png") {
            $image = imagecreatefrompng("uploads/" . $destinationFile);
        } else if ($imageType == "image/webp") {
            $image = imagecreatefromwebp("uploads/" . $destinationFile);
        } else if ($imageType == "image/gif") {
            $image = imagecreatefromgif("uploads/" . $destinationFile);
        }

        // Image scale und in Variable speichern
        //for thumbnail image generate
        $scaledImage = imagescale($image, 150, 150);

        // Für webp
        //for thumbnail image move to thumb folder
        imagewebp($scaledImage, "uploads/thumnails/" . $destinationFile, 40);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $publish_by = $_POST['publish_by'];
        $license = $_POST['license'];

        //call store method with perameter
        $row = $upload->store($title, $description, $publish_by, $license, $destinationFile, $email);
        if ($row) {
            $msg = $row;
        }
    }
}


include("header.php");

?>
<div class="container">
    <div class="row justify-content-start">
        <div class="col-12 col-md-6">
            <h2>Neue Edelweiss-Bilder einfügen</h2>
            <br>
            <p><?php echo $msg; ?></p>
            <form enctype="multipart/form-data" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                <div class="form-group">
                    <label for="title">Titel</label>
                    <input id="title" type="text" name="title" class="form-control" placeholder="Titel schreiben">
                    <div class="text-danger"><?php echo $title_error; ?></div>
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <input id="description" type="text" name="description" class="form-control" placeholder="Beschreiben Sie das Bild">
                    <div class="text-danger"><?php echo $description_error; ?></div>
                </div>
                <br>
                <div class="form-group">
                    <label for="publish_by">Veröffentlichen von</label>
                    <input id="publish_by" type="text" name="publish_by" class="form-control" placeholder="Vorname Nachname">
                    <div class="text-danger"><?php echo $publish_by_error; ?></div>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Enter Email">
                    <div class="text-danger"><?php echo $email_error; ?></div>
                </div>
                <br>
                <div class="form-group">
                    <label for="license">Lizenz</label>
                    <select class="form-control" name="license">
                        <option value="Creative Commons-Lizenz">Creative Commons-Lizenz</option>
                        <option value="All Right reserved (Standard)">All Right reserved (Standard)</option>
                    </select>
                    <!--<input id="license" type="text" name="license" class="form-control" placeholder="Fügen Sie die Lizenz ein">-->

                    <div class="text-danger"><?php echo $license_error; ?></div>
                </div>
                <br>
                <div class="form-group py-3">
                    <input type="file" name="image" accept="image/png,image/jpeg,image/webp,image/gif" required>
                    <div class="text-danger"><?php echo $img_error; ?></div>
                </div>
                <div class="form-group py-3">
                    <input type="submit" name="submit" value="Absenden" class="btn btn-primary btn1">
                </div>

                <?php //require_once "controller/upload.php"; 
                ?>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>