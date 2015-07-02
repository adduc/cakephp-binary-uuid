<?php

namespace Adduc\Cake\BinaryUuid;

class MysqlSchema extends \Cake\Database\Schema\MysqlSchema
{

    /**
     * Convert a MySQL column type into an abstract type.
     *
     * The returned type will be a type that Cake\Database\Type can handle.
     *
     * @param string $column The column type + length
     * @return array Array of column information.
     * @throws \Cake\Database\Exception When column type cannot be parsed.
     */
    protected function _convertColumn($column)
    {
        preg_match('/([a-z]+)(?:\(([0-9,]+)\))?\s*([a-z]+)?/i', $column, $matches);
        if (empty($matches)) {
            throw new Exception(sprintf('Unable to parse column type from "%s"', $column));
        }

        $col = strtolower($matches[1]);
        $length = $precision = null;
        if (isset($matches[2])) {
            $length = $matches[2];
            if (strpos($matches[2], ',') !== false) {
                list($length, $precision) = explode(',', $length);
            }
            $length = (int)$length;
            $precision = (int)$precision;
        }

        if ($col === 'binary' && $length === 36) {
            return ['type' => 'uuid', 'length' => null];
        }

		return parent::_convertColumn($column);
	}
}

