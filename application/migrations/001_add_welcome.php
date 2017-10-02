<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_welcome extends CI_Migration
{

    private $table = 'welcome'

    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'create_at' => [
                'type' => 'DATETIME',
            ],
            'update_at' => [
                'type' => 'DATETIME',
            ],
        ];
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }

}
