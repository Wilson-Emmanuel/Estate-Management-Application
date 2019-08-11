<?php
class Image{
    const BUILDING = "1";
    const ESTATE = "0";

        private $id;//int
    private $type;
    private $type_id;//int
    private $size; //int int KB
    private $width_x;//int
    private $width_y;//int
    private $name;
    private $description;
    private $date;
    
    public function __construct($id=0) {
        if($id <1){
            $this->id =0;
            $this->type = "none";
            $this->type_id=0;
            $this->size=0;
            $this->width_x =0;
            $this->width_y=0;
            $this->name =0;
            $this->description = "none";
            $this->date=date("Y-m-d H:i:s");
        }else{
            $this->fetch_by_id($id);
        }
                
                
    }
    private function set_row($row){
        $this->id =(int)$row['id'];
        $this->type = $row['type'];
        $this->type_id= (int)$row['type_id'];
        $this->size= (int)$row['size'];
        $this->width_x = (int)$row['width_x'];
        $this->width_y= (int)$row['width_y'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->date= $row['date'];
        return $this;
    }
    private function set_row1($row){
        $img = new self();
        $img->id =(int)$row['id'];
        $img->type = $row['type'];
        $img->type_id= (int)$row['type_id'];
        $img->size= (int)$row['size'];
        $img->width_x = (int)$row['width_x'];
        $img->width_y= (int)$row['width_y'];
        $img->name = $row['name'];
        $img->description = $row['description'];
        $img->date= $row['date'];
        return $img;
    }
    private function set_result($result){
        $arr = array();
        foreach($result as $row){
            $arr[]= $this->set_row1($row);
        }
        return $arr;
    }
    public function get_array($include_id = false){
        $arr  = array();
        if($include_id){
            $arr['id'] = $this->id;
        }
        $arr['type']= $this->type;
        $arr['type_id'] = $this->type_id;
        $arr['size'] = $this->size;
        $arr['width_x'] = $this->width_x;
        $arr['width_y']= $this->width_y;
        $arr['name'] = $this->name;
        $arr['description'] = $this->description;
        //$arr['date']= $this->date;
        return $arr;
    }
    public function fetch_by_id($id){
        $row = DB::queryFirstRow("SELECT * FROM image WHERE id=%i",$id);
       return  $this->set_row($row);
    }
    public function fetch_by_type($type, $type_id){
        $result = DB::query("SELECT * FROM image WHERE type = %s AND type_id=%i",$type,$type_id);
        return $this->set_result($result);
    }
    public function fetch_all_images(){
        $result = DB::query("SELECT * FROM image");
        return $this->set_result($result);
    }
    public function fetch_all($type){
        $image = array();
        
        $estates = (new Estate())->fetch_all_estates();
        foreach($estates as $estate){
            $estate_id = $estate->get_id();
            $es_images = $this->fetch_by_type(Image::ESTATE, $estate_id);
           if(count($es_images) ==1){
               $image[] = $es_images[0];
           }elseif(count($es_images) >1){
               $rand = rand(1,  count($es_images));
               $image[] = $es_images[$rand-1];
           }
        }
       return $image;
    }
    public function fetch_by_building($estate_id){
        $result = DB::query("SELECT image.*, building.estate FROM image, building WHERE image.type=%s AND image.type_id = building.id AND building.estate=%i",Image::BUILDING,$estate_id);
        return $this->set_result($result);
    }
    public function fetch_single_all_buildings($estate_id){
        $b_images = array();
        $buildings = (new Building())->fetch_buildings_by_estate($estate_id);
        foreach($buildings as $building){
            $img = (new Image())->fetch_by_type(Image::BUILDING, $building->get_id());
            if(count($img) ==1){
                $b_images[] = $img[0];
            }elseif(count($img) >1){
                $rand = rand(1,  count($img));
                $b_images[] = $img[$rand-1];
            }
        }
        return $b_images;
    }

    public function update_by_type() {
        DB::update('image',  $this->get_array(),'type=%s AND type_id =%i',  $this->type,  $this->type_id);
        return true;
    }
    public function update_by_id() {
        DB::update('image',  $this->get_array(),'id =%i', $this->id);
        return true;
    }
    public function insert(){
        DB::insert('image',  $this->get_array());
        return true;
        
    }
    public function delete_by_id(){
        DB::delete('image','id=%i',  $this->id);
        return true;
    }
    public function delete_by_type(){
        DB::delete('image','type=%s AND type_id=%i',  $this->type,  $this->type_id);
        return true;
    }
    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

        public function get_id() {
        return $this->id;
    }

    public function get_type() {
        return $this->type;
    }

    public function get_type_id() {
        return $this->type_id;
    }

    public function get_size() {
        return $this->size;
    }

    public function get_width_x() {
        return $this->width_x;
    }

    public function get_width_y() {
        return $this->width_y;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_date() {
        return $this->date;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_type($type) {
        $this->type = $type;
    }

    public function set_type_id($type_id) {
        $this->type_id = $type_id;
    }

    public function set_size($size) {
        $this->size = $size;
    }

    public function set_width_x($width_x) {
        $this->width_x = $width_x;
    }

    public function set_width_y($width_y) {
        $this->width_y = $width_y;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_date($date) {
        $this->date = $date;
    }


}
?>

