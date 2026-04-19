<?php
class Applicant {
    private $conn;
    private $table = "applicants";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO $this->table 
        (first_name, last_name, email, password, specialization, experience_level, certification) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function getAll() {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $query = "SELECT * FROM $this->table WHERE applicant_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE $this->table SET 
        first_name=?, last_name=?, email=?, password=?, specialization=?, experience_level=?, certification=? 
        WHERE applicant_id=?";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([...$data, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE applicant_id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>