<?php

use yii\db\Schema;

/**
 * Default migration for the relations of the Application Project
 */
class m161219_145554_init_relations_eventi extends \yii\db\Migration
{

    const TABLE_ASSIGNMENT_AMOS = '{{%auth_assignment}}';
    const TABLE_RULE_AMOS = '{{%auth_rule}}';
    const TABLE_PERMISSION_AMOS = '{{%auth_item}}';
    const TABLE_PERMISSION_CHILD_AMOS = '{{%auth_item_child}}';
    const TABLE_USER_AMOS = '{{%user}}';
    const TABLE_WIDGET_AMOS = '{{%widgets}}';

    const TABLE_EVENTI_TIPO_EVENTO_MM = '{{%eventi_tipo_evento_mm}}';


    const TABLE_EVENTI_STATI_EVENTO_MM = '{{%eventi_stati_evento_mm}}';


    const TABLE_EVENTI_UTENTI_MM = '{{%eventi_utenti_mm}}';


    public function safeUp()
    {
        $this->execute("SET FOREIGN_KEY_CHECKS=0;");

        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_TIPO_EVENTO_MM, true) === null) {
            $this->createTable(self::TABLE_EVENTI_TIPO_EVENTO_MM, [
                'id' => Schema::TYPE_PK,
                'eventi_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'tipo_evento_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }
        //Aggiungiamo le chiavi esterne
        $this->addForeignKey('fk_eventi_tipo_evento_mm10', self::TABLE_EVENTI_TIPO_EVENTO_MM, 'eventi_id', 'eventi', 'id');
        $this->addForeignKey('fk_tipo_evento_eventi_mm10', self::TABLE_EVENTI_TIPO_EVENTO_MM, 'tipo_evento_id', 'tipo_evento', 'id');
        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_STATI_EVENTO_MM, true) === null) {
            $this->createTable(self::TABLE_EVENTI_STATI_EVENTO_MM, [
                'id' => Schema::TYPE_PK,
                'eventi_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'stati_evento_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }
        //Aggiungiamo le chiavi esterne
        $this->addForeignKey('fk_eventi_stati_evento_mm11', self::TABLE_EVENTI_STATI_EVENTO_MM, 'eventi_id', 'eventi', 'id');
        $this->addForeignKey('fk_stati_evento_eventi_mm11', self::TABLE_EVENTI_STATI_EVENTO_MM, 'stati_evento_id', 'stati_evento', 'id');
        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_UTENTI_MM, true) === null) {
            $this->createTable(self::TABLE_EVENTI_UTENTI_MM, [
                'id' => Schema::TYPE_PK,
                'eventi_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'utenti_id' => Schema::TYPE_INTEGER . " NOT NULL",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }
        //Aggiungiamo le chiavi esterne
        $this->addForeignKey('fk_eventi_utenti_mm12', self::TABLE_EVENTI_UTENTI_MM, 'eventi_id', 'eventi', 'id');
        $this->addForeignKey('fk_utenti_eventi_mm12', self::TABLE_EVENTI_UTENTI_MM, 'utenti_id', 'user_profile', 'id');

        $this->execute("SET FOREIGN_KEY_CHECKS=1;");
    }

    public function safeDown()
    {
        $this->execute("SET FOREIGN_KEY_CHECKS=0;");

        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_TIPO_EVENTO_MM, true) !== null) {
            $this->dropTable(self::TABLE_EVENTI_TIPO_EVENTO_MM);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_STATI_EVENTO_MM, true) !== null) {
            $this->dropTable(self::TABLE_EVENTI_STATI_EVENTO_MM);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI_UTENTI_MM, true) !== null) {
            $this->dropTable(self::TABLE_EVENTI_UTENTI_MM);
        }
        $this->execute("SET FOREIGN_KEY_CHECKS=1;");
    }
}