<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    private $table;

    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function get($filters = [], $columns = [])
    {
        if ($columns) {
            foreach ($columns as $key => $value) {
                $this->db->select($key, $value);
            }
        }
        if ($filters) {
            foreach ($filters as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        return $this->db->get($this->table)->result();
    }

    public function insert()
    {
        $data['created_at'] = date('Y-m-d h:m:s');
        if ($this->db->insert($this->table, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }

    public function update($id)
    {
        if ($id) {
            return false;
        }

        $this->db->where('id', $id);
        $data['update_at'] = date('Y-m-d h:m:s');
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        if ($id) {
            return false;
        }

        $this->db->where('id', $id);
        if ($this->db->delete($this->table)) {
            return true;
        }
    }
}
