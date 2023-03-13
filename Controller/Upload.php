<?php
include('Database.php');
/**
 * 
 * Image Upload Class
 * 
 * 
 * 
 */
class Upload
{

    private $table_name = "images";
    protected $db;
    /**
     * Zeig alle Bilder
     */
    public function __construct()
    {
        $this->db = new Database;
    }
    /**
     * Zeigt alle Posts
     */
    public function index($sort)
    {

        $sql_query = "SELECT * FROM " . $this->table_name . " ORDER BY id " . $sort;
        $rows = $this->db->getAll($sql_query);
        return $rows;
    }
    /**
     * Einzeln Bild
     */
    public function single($id)
    {
        $sql_query = "SELECT * FROM " . $this->table_name . " WHERE id=" . $id;
        $row = $this->db->getSingle($sql_query);

        return $row;
    }
    /**
     * 
     * Bilder einfügen
     */
    public function store($title, $description, $publish_by, $license, $image, $email)
    {

        try {
            $sql_query = "SELECT * FROM " . $this->table_name . " WHERE title='$title'";

            $duplicate_check = $this->db->duplicateCheck($sql_query);

            if (empty($duplicate_check)) {
                $sql = "INSERT INTO images (title,src,publish_by,description,license,email) VALUES('$title','$image','$publish_by','$description','$license','$email')";
                $row = $this->db->store($sql);
                return "Image Uploaded Successfully";
            } else {
                return "Already Exist!!!";
            }
        } catch (PDOException $e) {
        }
    }

    public function commentStore($id, $name, $email, $comment)
    {
        $sql = "INSERT INTO comments(image_id,name,email,comment) VALUES('$id','$name','$email','$comment')";
        $row = $this->db->storeComment($sql);
        return $row;
    }
    public function getAllCommentByImage($image_id)
    {
        $sql_query = "SELECT * FROM comments WHERE image_id=" . $image_id . " ORDER BY created_at DESC";
        $rows = $this->db->getAll($sql_query);
        return $rows;
    }
}
