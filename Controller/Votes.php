<?php

include_once('Database.php');
class Votes
{
    private $table_name = "image_votes";
    protected $db;
    /**
     * Zeig alle Bilder
     */
    public function __construct()
    {
        $this->db = new Database;
    }


    // get all upvotes
    function get_upvotes($image_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE `image_id` = '$image_id' AND `vote_type` = '1'";
        $rows = $this->db->getAll($query);
        return count($rows);
    }


    // get all downvotes
    function get_downvotes($image_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE `image_id` = '$image_id' AND `vote_type` = '0'";
        $rows = $this->db->getAll($query);
        return count($rows);
    }

    function get_ip_address()
    {
        $ip_address = "";
        if (getenv('HTTP_CLIENT_IP')) {
            $ip_address = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ip_address = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ip_address = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ip_address = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ip_address = getenv('REMOTE_ADDR');
        } else {
            $ip_address = "UNKNOWN";
        }
        return $ip_address;
    }

    function delete_previous_vote($image_id, $ip_address)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE `ip_address` = '$ip_address' AND `image_id` = '$image_id'";
        $this->db->storeComment($query);
    }


    function add_new_vote($image_id, $ip_address, $vote_type)
    {
        $query = "INSERT INTO " . $this->table_name . " (`vote_type`, `ip_address`, `image_id`) VALUES ('$vote_type','$ip_address','$image_id')";
        $this->db->storeComment($query);
    }
}
