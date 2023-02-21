<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostComments extends Migration
{
    public function up()
    {
        //
        $this->forge->addField( [
            'commentId' => [
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
            'post_id' => [
                'type' => 'INT',
                'constraint' => 16,
                'unsigned' => true,
            ],
            'comment' => [
                'type' => 'LONGTEXT',
                'null' => false
            ],
            'createdAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updatedAt timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
        ] );

        $this->forge->addKey( 'commentId', true );
        $this->forge->addForeignKey( 'post_id', 'posts', 'postId', 'CASCADE', 'CASCADE' );
        $this->forge->addForeignKey( 'user_id', 'users', 'userId', 'CASCADE', 'CASCADE' );
        $this->forge->createTable( 'comments', true );
    }

    public function down()
    {
        //
        $this->forge->dropTable( 'comments' );
    }
}
