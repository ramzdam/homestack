<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 13/3/17
 * Time: 10:35 AM
 */
class Migration_Add_users extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'uid' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => FALSE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => FALSE,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '75',
                'null' => FALSE,
            ),
            'link' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));

        $this->dbforge->create_table('users');

    }

    public function down()
    {

    }
}