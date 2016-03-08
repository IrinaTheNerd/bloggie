<?php

	include_once('php/config.php');
//based on the previous class and procedural code
class BLOG
{
    private $db;

    function __construct($conn)
    {
      $this->db =$conn;
    }
		public function insert($title, $subtitle, $preview, $main_text){
			try {
				$stmt = $conn->prepare("INSERT INTO blogposts (title, subtitle, preview, main_text )
				VALUES (:title, :subtitle, :preview, :main_text)");
				$stmt->bindParam(':title', $_POST['title']);
				$stmt->bindParam(':subtitle', $_POST['subtitle']);
				$stmt->bindParam(':main_text', $_POST['main_text']);
				$stmt->bindParam(':preview', $_POST['preview']);

				$stmt->execute();

				return $stmt;
				}

				catch(PDOException $e)
					{
							echo $e->getMessage();
					}

			}
		}

?>
