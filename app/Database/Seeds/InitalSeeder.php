<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'peter@example.com',
                'username' => 'peter',
                'password' => password_hash('password1', PASSWORD_DEFAULT),
            ],
            [
                'email' => 'miha@example.com',
                'username' => 'miha',
                'password' => password_hash('password2', PASSWORD_DEFAULT),
            ],
            [
                'email' => 'john@example.com',
                'username' => 'john',
                'password' => password_hash('password3', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('users')->insertBatch($data);


        $data = [
          [
              'name' => 'Grocery Shopping',
              'description' => 'List of items for grocery shopping',
          ],
          [
              'name' => 'Home Improvement',
              'description' => 'List of items for home improvement projects',
          ],
          [
              'name' => 'Office Supplies',
              'description' => 'List of items for office supplies',
          ],
      ];

      $this->db->table('shopping_lists')->insertBatch($data);


      $data = [
        [
            'shopping_list_id' => 1,
            'name' => 'Apples',
            'is_bought' => false,
        ],
        [
            'shopping_list_id' => 1,
            'name' => 'Milk',
            'is_bought' => true,
        ],
        [
            'shopping_list_id' => 2,
            'name' => 'Paint',
            'is_bought' => false,
        ],
        [
            'shopping_list_id' => 2,
            'name' => 'Brushes',
            'is_bought' => false,
        ],
        [
            'shopping_list_id' => 3,
            'name' => 'Notebooks',
            'is_bought' => false,
        ],
    ];

    $this->db->table('items')->insertBatch($data);
    }
}
