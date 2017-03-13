<?php

/**
 * Created by Madzmar Ullang.
 * User: madzmar
 * Date: 12/3/17
 * Time: 7:56 AM
 *
 * Class for USER table.
 */
class UserModel extends CI_Model
{
    private $table = 'users';

    /**
     * Get the user record depending on the ID submitted.
     * Record will just retrieve a single data if ID is submitted.
     * But if no ID is submitted a whole record is listed out.
     * This will only retrieve record that is not softdeleted or the deleted_at is null
     *
     * @param int $id - If no ID is given, will replace it with null value
     * @return null
     */
    public function get($id = null)
    {
        // This will retrieve a single record
        if ($id) {
            $result = $this->db
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('id', $id)
                ->get()
                ->row();

            return $result;
        }

        // This will retrieve all list records. This returns multiple record
        $result = $this->db
            ->from($this->table)
            ->where('deleted_at', NULL)
            ->get()
            ->result();

        if (!$result) {
            return null;
        }

        return $result;
    }

    /**
     * Insert a new record of user.
     * Also this will regenerate a UID.
     * UID should always be the reference to the user record and not the ID.
     *
     * @param $params
     * @return null
     */
    public function add($params)
    {
        if (!$params) {
            return null;
        }

        // Just using a random generation of number since library for generating UID is not yet available here
        if (!$params['uid']) {
            $params['uid'] = rand(1, 1000);
        }

        $result = $this->db->insert($this->table, $params);
        return $result;
    }

    /**
     * Update a user record. But UID will not be updated and deleted_at will also not be updated
     *
     * @param $params - array of user record
     * @param $id - user id. This should be uid but since uid is not yet available
     * @return object - user record
     */
    public function update($params, $id)
    {
        if (!$params) {
            return null;
        }

        $result = $this->db
            ->where('id', $id)
            ->set('name', $params['name'])
            ->set('email', $params['email'])
            ->set('link', $params['link'])
            ->update($this->table);
        return $result;
    }

    /**
     * Deleted the user record depending on the ID submitted.
     * ID should not be used instead we should use UID.
     * But since UID is not yet stable we are going to use ID instead
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $result = $this->db
            ->where('id', $id)
            ->set('deleted_at', date('Y-m-d H:i:s'))
            ->update($this->table);

        return $result;
    }

}