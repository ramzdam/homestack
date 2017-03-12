<?php

/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 7:56 AM
 */
class UserModel extends CI_Model
{
    private $table = 'users';

    public function get()
    {
        $result = $this->db
            ->from($this->table)
            ->where('deleted_at !=', 'NULL')
            ->get()
            ->result();

        if (!$result) {
            return null;
        }

        return $result;
    }

    public function add($params)
    {
        if (!$params) {
            return null;
        }

        if (!$params['uid']) {
            $params['uid'] = rand(1, 1000);
        }

        $result = $this->db->insert($this->table, $params);
        return $result;
    }

}