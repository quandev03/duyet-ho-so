<?php
class Repository {

  private $conn;
  private $table;
  public function __construct(
    String $HOST, 
    String $USERNAME,
    String $PASSWORD,
    String $DATABASE,
    String $Table
  ){
    $this -> conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    $this -> table = $Table;
  }


  public function __model(){
    return $this->conn;
  }

  public function createOne(array $data = []) {
    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = $value;
    }
    $sql = "INSERT INTO ".$this->table . " (".implode(", ", $keys).") VALUES (".implode(", ", $values).")";
    return $this->conn->query($sql);
  }



  public function findAll($columns = "*", $where = [], $sort =[], $option = []): array {
    $sql = "SELECT ".(is_array($columns) ? implode(", ", $columns) : $columns)." FROM ".$this->table;
    if (!empty($where)) {
      $conditions = [];
      foreach ($where as $column => $value) {
        $conditions[] = "$column = '$value'";
      }
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sort ? $sql .= " ORDER BY ".implode(", ", $sort) : "";
    $option ? $sql .= " LIMIT ".implode(", ", $option) : "";
    $result = $this->conn->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;

  }
  public function insertOne( array $data = []):bool {
    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = $value;
    }
    $sql = "INSERT INTO ".$this->table . " (".implode(", ", $keys).") VALUES (".implode(", ", $values).")";
    return $this->conn->query($sql);
  }

  public function updateOne(array $data = [], string $where): bool {
    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = $value;
    }
    $sql = "UPDATE ".$this->table. " SET ".implode(", ", $keys)." = ".implode(", ", $values)." WHERE id =".$where;
    return $this->conn->query($sql);
  }


  public function findOne($columns = "*", $where = []) {
    $sql = "SELECT ".(is_array($columns) ? implode(", ", $columns) : $columns)." FROM ".$this->table." WHERE ".implode(" AND ", $where); 
    $result = $this->conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
    }
    return empty($data)? False: $data;
  }
  // public function deleteALL($columns = "*", $where = []) {
  //   $sql = "DELETE FROM "..(is_array($columns) ? implode(
  // }
  public function deleteOne($id) {
    $sql = "DELETE FROM ".$this->table." WHERE id= ".$id;
    return $this->conn->query($sql);
  }
}