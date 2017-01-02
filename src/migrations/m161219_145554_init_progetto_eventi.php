<?php

use yii\db\Schema;

/**
 * Default migration for the `eventi` Application Project
 */
class m161219_145554_init_progetto_eventi extends \yii\db\Migration
{

    const TABLE_ASSIGNMENT_AMOS = '{{%auth_assignment}}';
    const TABLE_RULE_AMOS = '{{%auth_rule}}';
    const TABLE_PERMISSION_AMOS = '{{%auth_item}}';
    const TABLE_PERMISSION_CHILD_AMOS = '{{%auth_item_child}}';
    const TABLE_USER_AMOS = '{{%user}}';
    const TABLE_WIDGET_AMOS = '{{%widgets}}';
    const TABLE_AMOS_USER_PROFILE = '{{%user_profile}}';

    public function safeUp()
    {

        $this->execute("SET FOREIGN_KEY_CHECKS=0;");
        if ($this->db->schema->getTableSchema(self::TABLE_USER_AMOS, true) !== null) {
            $this->insert(self::TABLE_USER_AMOS, [
                'username' => 'alessio.deluigi',
                'auth_key' => '1cd87f5976c0893cb50d0758f528963f',
                'password_hash' => '$2y$13$76oNWmUm7XRTXGUPSJNcI.UZ1Ni5Pg475ZiDcpr0/6T4FVwh9cRQe',
                'password_reset_token' => NULL,
                'email' => 'admin5@dominio.it',
                'status' => 10,
                'created_at' => '2016-12-19 14:55:54',
                'updated_at' => '2016-12-19 14:55:54'
            ]);
        }
        $lastId = $this->db->createCommand("select max(id) as user_id from user")->queryOne();
        if ($this->db->schema->getTableSchema(self::TABLE_AMOS_USER_PROFILE, true) !== null) {
            $this->batchInsert(self::TABLE_AMOS_USER_PROFILE, ['nome', 'cognome', 'sesso', 'user_id'], [
                ['Alessio', 'De Luigi', 'Maschio', $lastId['user_id']]
            ]);
        }
        if ($this->db->schema->getTableSchema(self::TABLE_PERMISSION_AMOS, true) !== null && $this->db->schema->getTableSchema(self::TABLE_PERMISSION_CHILD_AMOS, true) !== null) {
//    //Aggiunge i permessi   
//    $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
//        'parent' => 'ADMIN', 
//        'child' => 'WIDGETICONPADRE_VIEW',
//    ]);  
//    $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
//        'parent' => 'ADMIN', 
//        'child' => 'WIDGETICONFIGLIO_VIEW',
//    ]);  
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'EVENTI_READ',
                'type' => '2',
                'description' => 'Permesso di read sul model Eventi'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'EVENTI_READ'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'EVENTI_CREATE',
                'type' => '2',
                'description' => 'Permesso di create sul model Eventi'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'EVENTI_CREATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'EVENTI_UPDATE',
                'type' => '2',
                'description' => 'Permesso di update sul model Eventi'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'EVENTI_UPDATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'EVENTI_DELETE',
                'type' => '2',
                'description' => 'Permesso di delete sul model Eventi'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'EVENTI_DELETE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'TIPOEVENTO_READ',
                'type' => '2',
                'description' => 'Permesso di read sul model TipoEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'TIPOEVENTO_READ'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'TIPOEVENTO_CREATE',
                'type' => '2',
                'description' => 'Permesso di create sul model TipoEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'TIPOEVENTO_CREATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'TIPOEVENTO_UPDATE',
                'type' => '2',
                'description' => 'Permesso di update sul model TipoEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'TIPOEVENTO_UPDATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'TIPOEVENTO_DELETE',
                'type' => '2',
                'description' => 'Permesso di delete sul model TipoEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'TIPOEVENTO_DELETE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'STATIEVENTO_READ',
                'type' => '2',
                'description' => 'Permesso di read sul model StatiEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'STATIEVENTO_READ'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'STATIEVENTO_CREATE',
                'type' => '2',
                'description' => 'Permesso di create sul model StatiEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'STATIEVENTO_CREATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'STATIEVENTO_UPDATE',
                'type' => '2',
                'description' => 'Permesso di update sul model StatiEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'STATIEVENTO_UPDATE'
            ]);
            $this->insert(self::TABLE_PERMISSION_AMOS, [
                'name' => 'STATIEVENTO_DELETE',
                'type' => '2',
                'description' => 'Permesso di delete sul model StatiEvento'
            ]);
            $this->insert(self::TABLE_PERMISSION_CHILD_AMOS, [
                'parent' => 'ADMIN',
                'child' => 'STATIEVENTO_DELETE'
            ]);

//Aggiunge i ruoli
        }
        $this->execute("SET FOREIGN_KEY_CHECKS=1;");
    }

    public function safeDown()
    {
        return false;
    }
}