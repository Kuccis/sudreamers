<?php

use yii\db\Migration;

/**
 * Class m221013_181140_create_user
 */
class m221013_181140_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->unique(),
            'username' => $this->string()->unique(),
            'gender' => $this->integer(),
            'profile_picture' => $this->integer(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
