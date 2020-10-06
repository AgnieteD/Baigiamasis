<?php

namespace Core;

class FileDB
{
    private string $file_name;
    private array $data;

    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
        $this->data = [];
    }

    /**
     * Sets temporary data ($this->data) to passed array
     *
     * @param array $data_array
     */
    public function setData(array $data_array)
    {
        $this->data = $data_array;
    }

    /**
     * Returns temporary data
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Saves temporary data array to file as json-encoded string
     *
     * @return bool
     */
    public function save(): bool
    {
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);
        if ($bytes_written === false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Sets temporary data to decoded json file
     *
     */
    public function load()
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);
            $decoded = json_decode($data, true) ?? [];
            $this->data = $decoded;
        } else {
            $this->data = [];
        }
    }

    /**
     * Creates an empty array in data on index $table_name
     *
     * @param string $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }

    /**
     * Checking if $table_name exists in $data array
     *
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        if (isset($this->data[$table_name])) {
            return true;
        }

        return false;
    }

    /**
     * Deletes indicated table with it's index
     *
     * @param string $table_name
     * @return bool
     */
    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            return true;
        }

        return false;
    }

    /**
     * Empties indicated table
     *
     * @param string $table_name
     * @return bool
     */
    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }

    /**
     * Inserts row with its index in $data array
     *
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool|string
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id === null) {
            $this->data[$table_name][] = $row;
            return array_key_last($this->data[$table_name]);
        } else {
            if (!$this->rowExists($table_name, $row_id)) {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            }
        }

        return false;
    }

    /**
     * Checks if $row exists
     *
     * @param string $table_name
     * @param string|int $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }

        return false;
    }

    /**
     * Rewrites $row_id array to a new $row array
     *
     * @param string $table_name
     * @param string|int $row_id
     * @param array $row
     * @return bool
     */
    public function updateRow(string $table_name, $row_id, array $row): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }

        return false;
    }

    /**
     * Deletes row if that row_id exists
     *
     * @param string $table_name
     * @param int|string $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }

        return false;
    }

    /**
     * Returns $row by $row_id
     *
     * @param string $table_name
     * @param int|string $row_id
     * @return bool|array
     */
    public function getRowById(string $table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }

        return false;
    }

    /**
     * Returns array of rows based on conditions
     *
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowsWhere(string $table_name, array $conditions): array
    {
        $results = [];
        $table = $this->data[$table_name];

        foreach ($table as $row_key => $row) {
            $success = true;

            foreach ($conditions as $cond_key => $comparison_value_1) {
                $comparison_value_2 = $row[$cond_key];
                if ($comparison_value_1 !== $comparison_value_2) {
                    $success = false;
                    break;
                }
            }
            if ($success) {
                $results[$row_key] = $row;
            }
        }
        return $results;
    }

    /**
     * Return first found row according to conditions
     *
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowWhere(string $table_name, array $conditions): array
    {
        $results = [];
        if ($this->tableExists($table_name)) {
            foreach ($this->data[$table_name] as $row_key => $row) {
                $success = true;
                foreach ($conditions as $condition_key => $condition) {
                    if ($row[$condition_key] !== $condition) {
                        $success = false;
                        break;
                    }
                }
                if ($success) return $row;
            }
        }
        return $results;
    }
}