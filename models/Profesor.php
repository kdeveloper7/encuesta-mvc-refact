<?php
class Profesor {
    public $id;
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public static function all($conn) {
        $result = $conn->query("SELECT * FROM profesores");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function create($conn, $nombre) {
        $stmt = $conn->prepare("INSERT INTO profesores (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
    }

    public static function update($conn, $id, $nombre) {
        $stmt = $conn->prepare("UPDATE profesores SET nombre=? WHERE id=?");
        $stmt->bind_param("si", $nombre, $id);
        $stmt->execute();
    }

    public static function delete($conn, $id) {
        $stmt = $conn->prepare("DELETE FROM profesores WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
