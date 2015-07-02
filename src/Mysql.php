<?php

namespace Adduc\Cake\BinaryUuid;

class Mysql extends \Cake\Database\Driver\Mysql
{

    /**
     * Get the schema dialect.
     *
     * Used by Cake\Database\Schema package to reflect schema and
     * generate schema.
     *
     * @return \Cake\Database\Schema\MysqlSchema
     */
    public function schemaDialect()
    {
        if (!$this->_schemaDialect) {
            $this->_schemaDialect = new MysqlSchema($this);
        }
        return $this->_schemaDialect;
    }
}
