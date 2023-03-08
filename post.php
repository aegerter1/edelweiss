<?php 
include("Controller/Upload.php");
$upload = New Upload;
$id = $_GET['id'];
$row = $upload->single($id);

if(!empty($_GET['name'])){
    $id= $_GET['id'];
    $name= $_GET['name'];
    $email= $_GET['email'];
    $comment= $_GET['comment'];
    $upload->commentStore($id,$name,$email,$comment);
}
$allComments = $upload->getAllCommentByImage($id);
include("header.php");

?>
        <div class="content">  
        <a href="latest.php" style="text-decoration:none; color:#000;background:#fff;padding:10px;">Back</a> 
        <?php if($row){ ?>   
        <div class="p-2">
            <h4><?php echo $row['title'];?></h4>
            up down
                    <img src="uploads/<?php echo $row['src'];?>" style="width:100%;"></a>
        </div>  
        <?php } ?>
        <div class="publish-by">
            <p>Publish By Aggggg</p>
            <p>All Rights Reserved!</p>
        </div> 
        <div class="comment">
            <h4>Comment Here</h4>
            <div>
                <?php if(!empty($allComments)){
                    foreach($allComments as $comment){
                    ?>
                    <img src="images/dummy-placeholder.jpeg" width="50">
                    <h5><?php echo $comment['name']?></h5>
                    <p class="text-start pl-3 m-0"><?php echo $comment['comment']?></p>
                
               <?php }  
               }else{
               ?>
               <p>No comment</p>
                   <?php }?>      
            </div>
            <form action="" method="GET">
                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                <div>
                    <input type="text" name="name" placeholder="Enter Name" required>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Enter Email">
                </div>
                <div>
                    <textarea name="comment" placeholder="Write Here...." style="width:100%;" rows="7"></textarea>
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
                </div>
            </form>
        </div>
</div>






<?php include("footer.php");?>