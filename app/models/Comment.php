<?php
class Comment
{
  public $id;
  public $comment;

  public function __construct($row) {
    $this->id = isset($row['id'])? intval($row['id']) : null;
    $this->comment = $row['comment'];
  }

  public function create() {
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    $sql = 'INSERT INTO Comment (id, comments)
      VALUES (?,?)';

      //something here helps to prevent SQL injection attacks
  $statement = $db->prepare ($sql);
  $success = $statement->execute([
    $this->id,
    $this->comment,
  ]);
      $this->id = $db->lastInsertID();

    //if (!$success) {
      //TODO: Better error handling
      //die ('Bad SQL on insert');
    //}


  }

  public static function fetchAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM comments';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute(
    );
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // 4.a. For each row, make a new work object
      $comment =  new Comment($row);
      array_push($arr, $comment);
    }
    // 4.b. return the array of work objects
    return $arr;
  }
}
