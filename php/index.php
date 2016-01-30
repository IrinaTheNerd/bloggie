<?php
 
require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
 
switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'viewArticle':
    viewArticle();
    break;
  default:
    homepage();
}
 
 
function archive() {
  $results = array();
  $data = Blogging::getList();
  $results['blogposts'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Article Archive | Widget News";
  require( TEMPLATE_PATH . "/archive.php" );
}
 
function viewArticle() {
  if ( !isset($_GET["blogId"]) || !$_GET["blogID"] ) {
    homepage();
    return;
  }
 
  $results = array();
  $results['blogposts'] = Article::getById( (int)$_GET["blogID"] );
  $results['pageTitle'] = $results['blogposts']->title . " | Widget News";
  require( TEMPLATE_PATH . "/viewArticle.php" );
}
 
function homepage() {
  $results = array();
  $data = Blogging::getList( HOMEPAGE_NUM_ARTICLES );
  $results['blogposts'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Widget News";
  require( TEMPLATE_PATH . "/homepage.php" );
}
 
?>