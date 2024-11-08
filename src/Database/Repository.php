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
    $this->conn = mysqli_connect($HOST, $USERNAME, '', $DATABASE);
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

    if ($sort) $sql .= " ORDER BY " . implode(", ", $sort);
    if ($option) $sql .= " LIMIT " . implode(", ", $option);

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

  public function insertOne(array $data = []): bool {
    return $this->createOne($data);
  }

  public function updateOne(array $data = [], string $where): bool {
    $set = [];
    foreach ($data as $key => $value) {
      $set[] = "$key = '" . mysqli_real_escape_string($this->conn, $value) . "'";
    }
    $sql = "UPDATE " . $this->table . " SET " . implode(", ", $set) . " WHERE id = " . mysqli_real_escape_string($this->conn, $where);

    // Check if the query succeeded
    if (!$this->conn->query($sql)) {
      die("Error in updateOne: " . $this->conn->error);
    }

    return true;
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

    return $result->num_rows > 0 ? $result->fetch_assoc() : false;
  }

  public function deleteOne($id): bool {
    $sql = "DELETE FROM " . $this->table . " WHERE id= " . mysqli_real_escape_string($this->conn, $id);

    // Check if the query succeeded
    if (!$this->conn->query($sql)) {
      die("Error in deleteOne: " . $this->conn->error);
    }

    return true;
  }
}
