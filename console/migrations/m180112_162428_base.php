<?php

use yii\db\Migration;

/**
 * Class m180112_162428_base
 */
class m180112_162428_base extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180112_162428_base cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('visit', [
            'id' => $this->primaryKey(),
            'ga' => $this->string(100),
            'ip' => $this->integer(),
            'session' => $this->string()->unique(),
            'datetime' => $this->dateTime(),
            'utm_source' => $this->string(),
            'utm_medium' => $this->string(),
            'utm_campaign' => $this->string(),
            'utm_term' => $this->string(),
            'utm_content' => $this->string()
        ]);

        $this->createTable('wallet', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'datetime' => $this->dateTime(),
            'type' => $this->string(7),
            'addr' => $this->string('42'),
            'amount' => $this->float(),
        ]);

        $this->addForeignKey(
            'fk-wallet-visit-id',
            'wallet',
            'visit_id',
            'visit',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-wallet-visit-id', 'wallet');
        $this->dropTable('visit');
        $this->dropTable('wallet');

        return true;
    }
}
