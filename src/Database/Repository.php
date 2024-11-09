<?php
class Repository {
  private $conn;
  private $table;

  public function __construct(
    
    String $Table
  ){
    require "../../config.php";
    $this->conn = mysqli_connect($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD);
    if (!$this->conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $this->table = $Table;
  }

  public function __model() {
    return $this->conn;
  }

  public function createOne(array $data = []) {
    $keys = [];
    $values = [];

    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = "'" . mysqli_real_escape_string($this->conn, $value) . "'";
    }
    $sql = "INSERT INTO " . $this->table . " (" . implode(", ", $keys) . ") VALUES (" . implode(", ", $values) . ")";
    if (!$this->conn->query($sql)) {
      die("Error in createOne: " . $this->conn->error);
    }

    return true;
  }

  public function findAll($columns = "*", $where = [], $sort = [], $option = []): array {
    $sql = "SELECT " . (is_array($columns) ? implode(", ", $columns) : $columns) . " FROM " . $this->table;
    
    if (!empty($where)) {
      $conditions = [];
      foreach ($where as $column => $value) {
        $conditions[] = "$column = '" . mysqli_real_escape_string($this->conn, $value) . "'";
      }
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sort ? $sql .= " ORDER BY ".implode(", ", $sort) : "";
    $option ? $sql .= " ".implode(", ", $option) : "";
    $result = $this->conn->query($sql);

    // Check if the query succeeded
    if (!$result) {
      die("Error in findAll: " . $this->conn->error);
    }

    $data = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }
  public function insertOne( array $data = []): bool {
    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = $value;
    }
    $sql = "INSERT INTO ".$this->table . " (".implode(", ", $keys).") VALUES (".implode(", ", $values).")";
    return $this->conn->query($sql);
  }

  public function updateOne(array $data = [], string $where) {
    foreach ($data as $key => $value) {
      $set[] = "$key = '" . mysqli_real_escape_string($this->conn, $value) . "'";
    }
    $set = [];
    foreach ($data as $key => $value) {
      $set[] = "$key = '$value'";
    }
    $sql = "UPDATE ".$this->table. " SET ".implode(", ", $set)." WHERE id =".$where;
    return $this->conn->query($sql);
  }


  public function findOne($columns = "*", $where = []) {
    $sql = "SELECT " . (is_array($columns) ? implode(", ", $columns) : $columns) . " FROM " . $this->table;

    if (!empty($where)) {
      $conditions = [];
      foreach ($where as $column => $value) {
        $conditions[] = "$column = '" . mysqli_real_escape_string($this->conn, $value) . "'";
      }
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $result = $this->conn->query($sql);

    if (!$result) {
      die("Error in findOne: " . $this->conn->error);
    }
    return empty($data)? False: $data;
  }

  public function deleteOne($id) {
    $sql = "DELETE FROM ".$this->table." WHERE id= ".$id;
    return $this->conn->query($sql);
  }

  public function customFindLike($columns = "*", $where = [], $sort =[], $option = []) {
    $sql = "SELECT ".(is_array($columns) ? implode(", ", $columns) : $columns)." FROM ".$this->table;
    if (!empty($where)) {
      $conditions = [];
      foreach ($where as $column => $value) {
        $conditions[] = "$column like '$value'";
      }
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
      $sort ? $sql .= " ORDER BY ".implode(", ", $sort) : "";
      $option ? $sql .= " ".implode(", ", $option) : "";
      $result = $this->conn->query($sql);
      $data = [];
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
      }
      return $data;
  }
}