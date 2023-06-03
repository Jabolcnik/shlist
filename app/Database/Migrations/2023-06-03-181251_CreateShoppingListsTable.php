<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShoppingListsTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
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
        $this->forge->createTable('shopping_lists');

        $this->db->query("
          CREATE FUNCTION update_shopping_lists_updated_at()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.updated_at = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_update_shopping_lists_updated_at
          BEFORE UPDATE ON shopping_lists
          FOR EACH ROW
          EXECUTE FUNCTION update_shopping_lists_updated_at();
      ");

      // Create trigger for soft deleting shopping lists
      $this->db->query("
          CREATE FUNCTION soft_delete_shopping_lists()
          RETURNS TRIGGER AS $$
          BEGIN
              NEW.is_deleted = true;
              NEW.deleted_on = NOW();
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;

          CREATE TRIGGER trigger_soft_delete_shopping_lists
          BEFORE DELETE ON shopping_lists
          FOR EACH ROW
          EXECUTE FUNCTION soft_delete_shopping_lists();
      ");
       
    }

    public function down()
    {
      $this->db->query("DROP TRIGGER IF EXISTS trigger_update_shopping_lists_updated_at ON shopping_lists");
      $this->db->query("DROP TRIGGER IF EXISTS trigger_soft_delete_shopping_lists ON shopping_lists");
        $this->forge->dropTable('shopping_lists');
    }
}
