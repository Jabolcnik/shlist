<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemsTable extends Migration
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
            'shopping_list_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'is_bought' => [
                'type' => 'BOOLEAN',
                'default' => false,
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
        $this->forge->addForeignKey('shopping_list_id', 'shopping_lists', 'id');
        $this->forge->createTable('items');

        $this->db->query("
          CREATE FUNCTION update_items_updated_at()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.updated_at = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_update_items_updated_at
          BEFORE UPDATE ON items
          FOR EACH ROW
          EXECUTE FUNCTION update_items_updated_at();
      ");

      // Create trigger for soft deleting items
      $this->db->query("
          CREATE FUNCTION soft_delete_items()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.is_deleted = true;
              NEW.deleted_on = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_soft_delete_items
          BEFORE DELETE ON items
          FOR EACH ROW
          EXECUTE FUNCTION soft_delete_items();
      ");          
    }

    public function down()
    {
      $this->db->query("DROP TRIGGER IF EXISTS trigger_update_items_updated_at ON items");
      $this->db->query("DROP TRIGGER IF EXISTS trigger_soft_delete_items ON items");
        $this->forge->dropTable('items');
    }
}
