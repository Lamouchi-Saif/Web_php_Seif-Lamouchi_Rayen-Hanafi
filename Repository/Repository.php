<?php
require_once 'ConnexionBD.php';

abstract class Repository {
    protected PDO $db;
    protected string $table;

    public function __construct() {
        $this->db = ConnexionBD::getConnection();
    }

    public function findAll(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function delete(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    abstract public function create(array $data): void;
}
