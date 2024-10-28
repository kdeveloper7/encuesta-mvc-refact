<?php
class Usuario {
    public $id;
    public $nombre;
    public $correo;
    public $provincia;
    public $ciudad;
    public $telefono;
    public $dni;
    public $contraseña;

    public function __construct($nombre, $correo, $provincia, $ciudad, $telefono, $dni, $contraseña) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->provincia = $provincia;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->contraseña = $contraseña;
    }

    public static function create($conn, $nombre, $correo, $provincia, $ciudad, $telefono, $dni, $contraseña) {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, provincia, ciudad, telefono, dni, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssss", $nombre, $correo, $provincia, $ciudad, $telefono, $dni, $hashed_password);
        $stmt->execute();
    }

    public static function find_by_email($conn, $correo) {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo=?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
