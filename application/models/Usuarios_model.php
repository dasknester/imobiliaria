<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
    private $banco = 'usuarios';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($dados)
    {
        $this->db->where('id', $dados['id']);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            $this->db->where('id', $dados['id']);
            $this->db->update($this->banco, $dados);
            return true;
        } else {
            $this->db->insert($this->banco, $dados);
            return $this->db->insert_id();
        }
    }

    public function find_all($id = false)
    {
        if ($id) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByEmail($email = false)
    {
        if ($email) {
            $this->db->where('email', $email);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() == 1) {
            return $query->result()[0];
        } else {
            return false;
        }
    }
}