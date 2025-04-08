<?php
require_once 'db.php';

class User
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getAllUsers()
  {
    $stmt = $this->conn->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserById($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function addUser($username, $email, $password, $role)
  {
    $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$username, $email, $password, $role]);
  }

  public function updateUser($id, $username, $email, $password, $role)
  {
    $stmt = $this->conn->prepare("UPDATE users SET username=?, email=?, password=?, role=? WHERE id=?");
    return $stmt->execute([$username, $email, $password, $role, $id]);
  }

  public function deleteUser($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
