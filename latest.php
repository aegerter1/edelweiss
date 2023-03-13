<?php
include("Controller/Upload.php");
$upload = new Upload;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'DESC';
$rows = $upload->index($sort);

include_once('Controller/Votes.php');
$votes = new Votes();

include("header.php");




?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Edelweiss Bilder</h1>
            <br>
            <form>
                <div class="">
                    <label>
                        <h3>Sortieren</h3>
                    </label>
                    <select name="sort">
                        <option value="ASC">Am beliebtesten</option>
                        <option value="DESC">Neueste</option>
                    </select>
                </div>
                <br>
                <label>
                    <h3>Anzeige</h3>
                </label>
                <select name="type">
                    <option value="thumbnail">Miniaturansicht</option>
                    <option value="list">Liste</option>
                </select>
                <br>
                <br>
                <br>
                <input type="submit" value="Laden" class="btn btn-primary btn1">
            </form>

            <div class="row py-3">
                <?php if (!empty($rows)) {
                    foreach ($rows as $row) {
                ?>
                        <?php if ((($_GET['type'])) == "list") { ?>
                            <!-- Show list image -->
                            <div class="col-md-12 py-3">
                                <div class="vote">
                                    <div class="up-vote">
                                        <i class="fa fa-angle-up fa-3x" onclick="upvote(<?php echo $row['id']; ?>)"></i>
                                        <span id="up_<?php echo $row['id']; ?>"><?php echo $votes->get_upvotes($row['id']); ?></span>
                                    </div>
                                    <div class="down-vote">
                                        <i class="fa fa-angle-down fa-3x" onclick="downvote(<?php echo $row['id']; ?>)"></i>
                                        <span id="down_<?php echo $row['id']; ?>"><?php echo $votes->get_downvotes($row['id']); ?></span>
                                    </div>
                                    created date: <?php echo $row['created_at']; ?>
                                </div>

                                <a href="post.php?id=<?php echo $row['id']; ?>">
                                    <picture class="card-image1" data-image-full="uploads/<?php echo $row['src']; ?>">
                                        <source src="<?php echo "uploads/" . $row['src'] ?>">
                                        <img class="img-fluid star" src="<?php echo "uploads/" . $row['src'] ?>" alt="<?php echo $row['title']; ?>" loading="lazy">
                                    </picture>
                                </a>
                            </div>
                            <!-- end list image -->
                        <?php } else { ?>
                            <!-- Show list thumdnail -->
                            <div class="col-md-4 py-3">
                                <div class="vote">
                                    <div class="up-vote">
                                        <i class="fa fa-angle-up fa-3x" onclick="upvote(<?php echo $row['id']; ?>)"></i>
                                        <span id="up_<?php echo $row['id']; ?>"><?php echo $votes->get_upvotes($row['id']); ?></span>
                                    </div>
                                    <div class="down-vote">
                                        <i class="fa fa-angle-down fa-3x" onclick="downvote(<?php echo $row['id']; ?>)"></i>
                                        <span id="down_<?php echo $row['id']; ?>"><?php echo $votes->get_downvotes($row['id']); ?></span>
                                    </div>
                                    created date: <?php echo $row['created_at']; ?>
                                </div>

                                <a href="post.php?id=<?php echo $row['id']; ?>">
                                    <picture class="card-image1" data-image-full="uploads/thumnails/<?php echo $row['src']; ?>">
                                        <source src="<?php echo "uploads/thumnails/" . $row['src'] ?>">
                                        <img class="img-fluid star" src="<?php echo "uploads/thumnails/" . $row['src'] ?>" alt="<?php echo $row['title']; ?>" loading="lazy">
                                    </picture>
                                </a>
                            </div>
                            <!-- end thumbnail image-->
                <?php }
                    }
                } ?>

            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>