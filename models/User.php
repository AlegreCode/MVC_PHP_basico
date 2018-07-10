<?php

namespace models;

use db\Conexion;

class User
{
    private $con;

    public function __construct() {
        $conn = new Conexion('localhost', 'root', '', 'socketservice');
        $this->con = $conn->conectar();
    }

    public function getUser($id)
    {
        $query = 'SELECT * FROM usuarios LEFT JOIN direcciones ON usuarios.direccion_id = direcciones.id WHERE usuarios.id = ?;';
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        $stmt->close();
    }

    public function getUsers()
    {
        $query = 'SELECT * FROM usuarios LEFT JOIN direcciones ON usuarios.direccion_id = direcciones.id;';
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = [];
        while ($data = $result->fetch_assoc()) {
            $datos[] = $data;
        }
        return $datos;
    }

    public function addUser($datos)
    {
        $query = 'INSERT INTO direcciones (calle, ciudad, provincia, pais) VALUES (?, ?, ?, ?);';
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ssss', $datos['calle'], $datos['ciudad'], $datos['provincia'], $datos['pais']);

        if ($stmt->execute()) {
            $dir_last_id = $this->con->insert_id;
            $query2 = 'INSERT INTO usuarios (nombre, apellido, email, edad, direccion_id) VALUES (?, ?, ?, ?, ?);';
            $stmt = $this->con->prepare($query2);
            $stmt->bind_param('sssii', $datos['nombre'], $datos['apellido'], $datos['email'], $datos['edad'], $dir_last_id);
            if ($stmt->execute()) {
                return [
                    'status'        => true,
                    'msg'           => 'Los datos han sido registrados'
                ];
            } else {
                return [
                    'status'    => false,
                    'msg'       => 'Error :' . $stmt->error
                ];
            }

        } else {
            return [
                'status'    => false,
                'msg'       => 'Error: ' . $stmt->error
            ];
        }
        $stmt->close();
    }

    public function updateUser($datos)
    {
        $query = 'UPDATE direcciones SET calle=?, ciudad=?, provincia=?, pais=? WHERE id=?;';
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ssssi', $datos['calle'], $datos['ciudad'], $datos['provincia'], $datos['pais'], $datos['direccion_id']);

        if ($stmt->execute()) {
            $query2 = 'UPDATE usuarios SET nombre=?, apellido=?, email=?, edad=? WHERE id=?;';
            $stmt = $this->con->prepare($query2);
            $stmt->bind_param('sssii', $datos['nombre'], $datos['apellido'], $datos['email'], $datos['edad'], $datos['id']);
            if ($stmt->execute()) {
                return [
                    'status'        => true,
                    'msg'           => 'Los datos han sido actualizados'
                ];
            } else {
                return [
                    'status'        => false,
                    'msg'           => 'Error: ' . $stmt->error
                ];
            }
        } else {
            return [
                'status'        => false,
                'msg'           => 'Error: ' . $stmt->error
            ];
        }
        $stmt->close();
    }

    public function deleteUser($datos)
    {
        $query = 'DELETE FROM usuarios WHERE id=?;';
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $datos['id']);
        if ($stmt->execute()) {
            $query2 = 'DELETE FROM direcciones WHERE id=?;';
            $stmt = $this->con->prepare($query2);
            $stmt->bind_param('i', $datos['direccion_id']);
            if ($stmt->execute()) {
                return [
                    'status'        => true,
                    'msg'           => 'El registro ha sido borrado'
                ];
            } else {
                return [
                    'status'        => false,
                    'msg'           => 'Error: ' . $stmt->error
                ];
            }

        } else {
            return [
                'status'        => false,
                'msg'           => 'Error: ' . $stmt->error
            ];
        }
        $stmt->close();

    }
}

