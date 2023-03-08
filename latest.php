<?php
include("Controller/Upload.php");
$upload = New Upload;
$rows = $upload->index();

include("header.php");

?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">  
              <h2>Latest artworks</h2>
              <form>
                <div class="">
                <label>Sorting</label>
                <select>
                    <option>Most Popular</option>
                    <option>Most Recent</option>
                </select>
                </div>
                <label>Dispaly</label>
                <select name="type">
                    <option value="thumbnail">Thumbnail</option>
                    <option value="list">List</option>
                </select>
                <input type="submit" value="Load"  class="btn btn-primary"> 
                </form>
                <div class="row py-3">
                    <?php if(!empty($rows)){
                        foreach($rows as $row){
                        ?>
                    <?php if((($_GET['type']))=="list"){ ?>
                        <!-- Show list image -->
                        <div class="col-md-12 py-3">
                         <div class="vote">
                            <div class="up-vote">
                        <i class="fa fa-angle-up fa-3x"></i>
                    </div>
                    <div class="down-vote">
                        <i class="fa fa-angle-down fa-3x"></i>
                    </div>
                    </div>
                        <a href="post.php?id=<?php echo $row['id'];?>"><img class="img-fluid" src="<?php echo "uploads/".$row['src']?>"></a>
                    </div>
                     <!-- end list image -->
                        <?php }  else { ?>
                            <!-- Show list thumdnail -->
                    <div class="col-md-4 py-3">
                    <div class="vote">
                            <div class="up-vote">
                        <i class="fa fa-angle-up fa-3x"></i>
                    </div>
                    <div class="down-vote">
                        <i class="fa fa-angle-down fa-3x"></i>
                    </div>
                    </div>
                        <a href="post.php?id=<?php echo $row['id'];?>"><img class="img-fluid" src="<?php echo "uploads/thumnails/".$row['src']?>"></a>
                    </div>
                    <!-- end thumbnail image-->
                    <?php } }
                }?>

                </div>
                </div>
                </div>
        </div>
<?php include("footer.php");?>