<?php
class Blogging {
	public $id = null;
	public $publicationDate = null;
	public $title = null;
	public $subtitle = null;
	public $preview = null;
	public $main_text = null;


public function __construct( $data=array()){
	if (isset($data['id'])) $this->id=(int) $data['id'];
	if (isset($data['publicationDate'])) $this->publicationDate=(int)$data['publicationDate'];
	if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title']);
	if ( isset( $data['subtitle'] ) ) $this->subtitle = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['subtitle'] );
	if ( isset( $data['preview'] ) ) $this->preview = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['preview'] );
	if ( isset( $data['main_text'] ) ) $this->main_text = $data['main_text'];
}

public function storeVal ($param) {
	$this->__construct($params);
	if(isset($param['publicationDate'])){
		$publicationDate= explode('-', $param['publicationDate']);
		if(count($publicationDate)==3){
			list($y,$m,$d) = $publicationDate;
			$this->publicationDate=mktime(0,0,0,$y,$m,$d);
		}
	}
}
public static function getByID ($id){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM blogposts WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
}
 public static function getList( $numRows=1000000, $order="publicationDate DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM blogposts
            ORDER BY " . mysqli_real_escape_string($order) . " LIMIT :numRows";
 
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();
 
    while ( $row = $st->fetch() ) {
      $Blogging = new Blogging( $row );
      $list[] = $Blogging;
    }
 
    // Now get the total number of articles that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
 
 
  /**
  * Inserts the current Article object into the database, and sets its ID property.
  */
 
  public function insert() {
 
    // Does the Article object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Blogging::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
 
    // Insert the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO blogposts ( publicationDate, title, subtitle, preview, main_text ) VALUES ( FROM_UNIXTIME(:publicationDate), :title, :subtitle, :preview, :main_text )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":subtitle", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":preview", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":main_text", $this->content, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }
 
 
  /**
  * Updates the current Article object in the database.
  */
 
  public function update() {
 
    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Blogging::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
    
    // Update the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE articles SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, subtitle=:subtitle, preview=:preview, main_text=:main_text WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":subtitle", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":preview", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":main_text", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }
 
 
  /**
  * Deletes the current Article object from the database.
  */
 
  public function delete() {
 
    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Blogging::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );
 
    // Delete the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM blogposts WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }
 
}
?>