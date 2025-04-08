<?php
require_once 'db.php';

class Section
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getAllsection()
  {
    $stmt = $this->conn->query("SELECT * FROM section");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getSectionById($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM section WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function addSection($designation, $description)
  {
    $stmt = $this->conn->prepare("INSERT INTO section (designation, description) VALUES (?, ?)");
    return $stmt->execute([$designation, $description]);
  }

  public function updateSection($id, $designation, $description)
  {
    $stmt = $this->conn->prepare("UPDATE section SET designation = ?, description = ? WHERE id = ?");
    return $stmt->execute([$designation, $description, $id]);
  }

  public function deleteSection($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM section WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
