<?php
require_once 'Repository.php';
class UserRepository extends Repository {
    protected string $table = "users";

    public function create(array $data): void {
        $stmt = $this->db->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->execute(['name' => $data['name']]);
    }
}

