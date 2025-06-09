<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id' => ['type'=>'INT', 'unsigned'=>true, 'auto_increment'=>true],
        'name' => ['type'=>'VARCHAR', 'constraint'=>'225'],
        'description' => ['type'=> 'TEXT'],
        'user_id' => ['type'=>'INT', 'unsigned'=>true ],
        'active' => ['type'=>'BOOLEAN', 'default'=> 1],
        
       ]);
       $this->forge->addKey('id', true);
       $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
       $this->forge->createTable('posts');
    }

    public function down()
    {
        //
    }
}
