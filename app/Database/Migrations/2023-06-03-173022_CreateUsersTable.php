<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
          ],            
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'is_deleted' => [
              'type' => 'BOOLEAN',
              'default' => false,
          ],            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
              'type' => 'DATETIME',
              'null' => true,
            ],            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');

        $this->db->query("
          CREATE FUNCTION update_users_updated_at()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.updated_at = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_update_users_updated_at
          BEFORE UPDATE ON users
          FOR EACH ROW
          EXECUTE FUNCTION update_users_updated_at();
      ");

      // Create trigger for soft deleting users
      $this->db->query("
          CREATE FUNCTION soft_delete_users()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.is_deleted = true;
              NEW.deleted_on = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_soft_delete_users
          BEFORE DELETE ON users
          FOR EACH ROW
          EXECUTE FUNCTION soft_delete_users();
      ");
    }

    public function down()
    {
      $this->db->query("DROP TRIGGER IF EXISTS trigger_update_users_updated_at ON users");
        $this->db->query("DROP TRIGGER IF EXISTS trigger_soft_delete_users ON users");
        $this->forge->dropTable('users');

    }
}
