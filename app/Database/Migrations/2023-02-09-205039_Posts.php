<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration {
    public function up() {
        //
        $this->forge->addField( [
            'postId' => [
                'type' => 'INT',
                'constraint' => 16,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 16,
                'unsigned' => true,
            ],
            'post_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'postContent' => [
                'type' => 'LONGTEXT',
                'null' => false
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => false
            ],
            'createdAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updatedAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
        ] );

        $this->forge->addKey( 'postId', true );
        $this->forge->addForeignKey( 'user_id', 'users', 'userId', 'CASCADE', 'CASCADE' );
        $this->forge->createTable( 'posts', true );
    }

    public function down() {
        //
        $this->forge->dropTable( 'posts' );
    }
}
