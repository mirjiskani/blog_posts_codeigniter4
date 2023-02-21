<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration {
    public function up() {
        //
        $this->forge->addField( [
            'userId' => [
                'type' => 'INT',
                'constraint' => 16,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => false
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'createdAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updatedAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',

        ] );
        $this->forge->addKey( 'userId', true );
        $this->forge->createTable( 'users', true );
    }

    public function down() {
        //
        $this->forge->dropTable( 'users' );
    }
}
