<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTicketsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $users = $this->table('tickets');
        $users->addColumn('event_id', 'integer')
              ->addColumn('ticket_code', 'string', ['limit' => 10])
              ->addColumn('status', 'string', ['limit' => 10, 'default' => 'available'])
              ->addColumn('created_at', 'timestamp')
              ->addColumn('updated_at', 'timestamp', ['null' => true])
              ->addIndex(['event_id'], ['unique' => true])
              ->create();
    }
}
