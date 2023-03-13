<?php
include("Controller/Upload.php");
$upload = new Upload;
$id = $_GET['id'];
$row = $upload->single($id);

include_once('Controller/Votes.php');
$votes = new Votes();

if (!empty($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $comment = $_GET['comment'];
    $upload->commentStore($id, $name, $email, $comment);
}
$allComments = $upload->getAllCommentByImage($id);
include("header.php");

?>
<div class="content">
    <a href="latest.php?type=" style="text-decoration:none; color:#000;background:#fff;padding:10px;">Back</a>


    <?php if ($row) { ?>
        <div class="p-2">
            <h4><?php echo $row['title']; ?></h4>
            <div class="vote">
                <div class="up-vote">
                    <i class="fa fa-angle-up fa-3x" onclick="upvote(<?php echo $row['id']; ?>)"></i>
                    <span id="up_<?php echo $row['id']; ?>"><?php echo $votes->get_upvotes($row['id']); ?></span>
                </div>
                <div class="down-vote">
                    <i class="fa fa-angle-down fa-3x" onclick="downvote(<?php echo $row['id']; ?>)"></i>
                    <span id="down_<?php echo $row['id']; ?>"><?php echo $votes->get_downvotes($row['id']); ?></span>
                </div>
            </div>
            <picture class="card-image1" data-image-full="uploads/<?php echo $row['src']; ?>">
                <source src="uploads/<?php echo $row['src']; ?>">
                <img class="lazy star" src="uploads/<?php echo $row['src']; ?>?nf_resize=fit&w=100" style="width:100%;" alt="<?php echo $row['title']; ?>" loading="lazy">
            </picture>
        </div>
        <div class="publish-by">
            <p>Publish By <?php echo $row['publish_by'] ?></p>
            <p><a href="https://creativecommons.org/licenses/" target="_blank"><?php echo $row['license']; ?></a></p>
        </div>
    <?php } ?>

    <div class="comment">
        <h4>Comment Here</h4>
        <div>
            <?php if (!empty($allComments)) {
                $total = count($allComments);
                foreach ($allComments as $key => $comment) {
            ?>
                    <!--<picture>
                        <img src="images/dummy-placeholder.jpeg" width="50" alt="profile">
                    </picture>-->
                    <h5><?php echo $total - $key; ?> <?php echo $comment['name'] ?></h5>
                    <p class="text-start pl-3 m-0"><?php echo $comment['comment'] ?></p>

                <?php }
            } else {
                ?>
                <p>No comment</p>
            <?php } ?>
        </div>
        <form action="" method="GET">
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
            <div>
                <input type="text" name="name" placeholder="Name einfügen" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email einfügen" required>
            </div>
            <div>
                <textarea name="comment" placeholder="Hier kommentieren" style="width:100%;" rows="7" required></textarea>
            </div>
            <div>
                <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            </div>
        </form>
    </div>
</div>






<?php include("footer.php"); ?>