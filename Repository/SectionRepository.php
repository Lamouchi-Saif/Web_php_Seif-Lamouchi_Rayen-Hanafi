<?php
require_once 'Repository.php';
class SectionRepository extends Repository {
    protected string $table = "sections";

    public function create(array $data): void {
        $stmt = $this->db->prepare("INSERT INTO sections (title) VALUES (:title)");
        $stmt->execute(['title' => $data['title']]);
    }
}