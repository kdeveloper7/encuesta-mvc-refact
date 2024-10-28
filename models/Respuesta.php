<?php
class Respuesta {
    public $id;
    public $usuario_id;
    public $profesor_id;
    public $criterio_id;
    public $respuesta;
    public $comentario;

    public function __construct($usuario_id, $profesor_id, $criterio_id, $respuesta, $comentario) {
        $this->usuario_id = $usuario_id;
        $this->profesor_id = $profesor_id;
        $this->criterio_id = $criterio_id;
        $this->respuesta = $respuesta;
        $this->comentario = $comentario;
    }

    public static function create($conn, $usuario_id, $profesor_id, $criterio_id, $respuesta, $comentario) {
        $stmt = $conn->prepare("INSERT INTO respuestas (usuario_id, profesor_id, criterio_id, respuesta, comentario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiis", $usuario_id, $profesor_id, $criterio_id, $respuesta, $comentario);
        $stmt->execute();
    }

    public static function all($conn) {
        $result = $conn->query("
            SELECT respuestas.id, usuarios.nombre AS usuario, profesores.nombre AS profesor, criterios.descripcion AS criterio, respuestas.respuesta, respuestas.comentario
            FROM respuestas
            JOIN usuarios ON respuestas.usuario_id = usuarios.id
            JOIN profesores ON respuestas.profesor_id = profesores.id
            JOIN criterios ON respuestas.criterio_id = criterios.id
        ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function delete($conn, $id) {
        $stmt = $conn->prepare("DELETE FROM respuestas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

