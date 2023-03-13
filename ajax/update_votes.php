<?php

include_once('../Controller/Database.php');
include_once('../Controller/Votes.php');

if (isset($_GET['type']) && isset($_GET['img'])) {
    $vote_type = $_GET['type'];
    $img_id = $_GET['img'];

    $votes = new Votes();
    $ip_address = $votes->get_ip_address();

    if (($vote_type == 0) || ($vote_type == 1)) {

        $votes->delete_previous_vote($img_id, $ip_address);
        $votes->add_new_vote($img_id, $ip_address, $vote_type);

        $get_upvotes = $votes->get_upvotes($img_id);
        $get_downvotes = $votes->get_downvotes($img_id);

        echo json_encode([$get_upvotes, $get_downvotes]);
    }
}
