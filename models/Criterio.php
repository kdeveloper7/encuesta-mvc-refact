<?php
class Criterio {
    public $id;
    public $descripcion;

    public function __construct($descripcion) {
        $this->descripcion = $descripcion;
    }

    public static function all($conn) {
        $result = $conn->query("SELECT * FROM criterios");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function create($conn, $descripcion) {
        $stmt = $conn->prepare("INSERT INTO criterios (descripcion) VALUES (?)");
        $stmt->bind_param("s", $descripcion);
        $stmt->execute();
    }

    public static function update($conn, $id, $descripcion) {
        $stmt = $conn->prepare("UPDATE criterios SET descripcion=? WHERE id=?");
        $stmt->bind_param("si", $descripcion, $id);
        $stmt->execute();
    }

    public static function delete($conn, $id) {
        $stmt = $conn->prepare("DELETE FROM criterios WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
