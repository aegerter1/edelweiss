<?php 
include('Database.php');
/**
 * 
 * Image Upload Class
 * 
 * 
 * 
 */
class Upload {

    private $table_name = "images";
    protected $db;
    /**
     * View All Images
     */
    public function __construct(){
            $this->db= new Database;
    }
    /**
     * All Post Show
     */
    public function index(){

        $sql_query = "SELECT * FROM ".$this->table_name." ORDER BY id DESC";
        $rows = $this->db->getAll($sql_query);      
        return $rows;
    }
    /**
     * Signle image Function
     */
    public function single($id){
        $sql_query = "SELECT * FROM ".$this->table_name." WHERE id=".$id;
        $row = $this->db->getSingle($sql_query);      
        return $row;
    }
    /**
     * 
     *Image Insert here
     */
    public function store($title,$description,$publish_by,$license,$image){
        try{
            $sql = "INSERT INTO images (title,src,publish_by,description,license) VALUES('$title','$image','$publish_by','$description','$license')";
            $row = $this->db->store($sql);      
            return $row;
        }catch(PDOException $e){

        }
    }

    public function commentStore($id,$name,$email,$comment){
        $sql = "INSERT INTO comments(image_id,name,email,comment) VALUES('$id','$name','$email','$comment')";
        $row = $this->db->storeComment($sql);      
        return $row;
    }
    public function getAllCommentByImage($image_id){
        $sql_query = "SELECT * FROM comments WHERE image_id=".$image_id;
        $rows = $this->db->getAll($sql_query);      
        return $rows; 
    }
}