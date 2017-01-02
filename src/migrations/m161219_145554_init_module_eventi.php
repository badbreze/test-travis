<?php

use yii\db\Schema;

/**
 * Default migration for the `eventi` plugin
 */
class m161219_145554_init_module_eventi extends \yii\db\Migration
{

    const TABLE_ASSIGNMENT_AMOS = '{{%auth_assignment}}';
    const TABLE_RULE_AMOS = '{{%auth_rule}}';
    const TABLE_PERMISSION_AMOS = '{{%auth_item}}';
    const TABLE_PERMISSION_CHILD_AMOS = '{{%auth_item_child}}';
    const TABLE_USER_AMOS = '{{%user}}';
    const TABLE_WIDGET_AMOS = '{{%widgets}}';
    const TABLE_EVENTI = '{{%eventi}}';
    const TABLE_TIPO_EVENTO = '{{%tipo_evento}}';
    const TABLE_STATI_EVENTO = '{{%stati_evento}}';

    public function safeUp()
    {
        $this->execute("SET FOREIGN_KEY_CHECKS=0;");


        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI, true) === null) {

            $this->createTable(self::TABLE_EVENTI, [
                'id' => Schema::TYPE_PK,
                'titolo' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'Titolo'",
                'descrizione' => Schema::TYPE_TEXT . "  NULL COMMENT 'Descrizione'",
                'data_inizio' => Schema::TYPE_DATE . "  NOT NULL COMMENT 'Data inizio'",
                'data_fine' => Schema::TYPE_DATE . "  NOT NULL COMMENT 'Data fine'",
                'ora_inizio' => Schema::TYPE_DECIMAL . "  NOT NULL COMMENT 'Ora inizio'",
                'ora_fine' => Schema::TYPE_DECIMAL . "  NOT NULL COMMENT 'Ora fine'",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_TIPO_EVENTO, true) === null) {

            $this->createTable(self::TABLE_TIPO_EVENTO, [
                'id' => Schema::TYPE_PK,
                'denominazione' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'Denominazione'",
                'colore' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'Colore'",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_STATI_EVENTO, true) === null) {

            $this->createTable(self::TABLE_STATI_EVENTO, [
                'id' => Schema::TYPE_PK,
                'nome' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'Nome'",
                'created_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Creato il'",
                'updated_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Aggiornato il'",
                'deleted_at' => Schema::TYPE_DATETIME . " NULL DEFAULT NULL COMMENT 'Cancellato il'",
                'created_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Creato da'",
                'updated_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Aggiornato da'",
                'deleted_by' => Schema::TYPE_INTEGER . " NULL DEFAULT NULL COMMENT 'Cancellato da'",
            ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=1' : null);
        }

        $this->execute("SET FOREIGN_KEY_CHECKS=1;");
    }

    public function safeDown()
    {
        $this->execute("SET FOREIGN_KEY_CHECKS=0;");

        if ($this->db->schema->getTableSchema(self::TABLE_EVENTI, true) !== null) {
            $this->dropTable(self::TABLE_EVENTI);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_TIPO_EVENTO, true) !== null) {
            $this->dropTable(self::TABLE_TIPO_EVENTO);
        }

        if ($this->db->schema->getTableSchema(self::TABLE_STATI_EVENTO, true) !== null) {
            $this->dropTable(self::TABLE_STATI_EVENTO);
        }

        $this->execute("SET FOREIGN_KEY_CHECKS=1;");
    }
}