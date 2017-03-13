<?php

/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 7:21 AM
 *
 * Class ModelRepository
 *
 * This class will be an abstract for all class that extends this
 * This is useful if classes has the same common functions.
 *
 */
abstract class ModelRepository implements IModelRepository
{
    protected $model;
    protected $ci;

    /**
     * ModelRepository constructor.
     * This will initialize the model immediately using the model_name attribute of the class extending this.
     */
    public function __construct()
    {
        $ci =& get_instance();
        $this->ci = $ci;
        $this->ci->load->model($this->model_name);
    }

    /**
     * Retrieve the loaded model based on the model_name attribute.
     *
     * @return user model
     */
    public function getModel()
    {
        return $this->ci->{$this->model_name};
    }

    /**
     * Get the user record based on the UID. But now we are jsut using the ID
     *
     * @param $uid - This is not the UID but now only submits the ID
     * @return object - The usermodel record.
     */
    public function getByUid($uid)
    {
        return $this->getModel()->get($uid);
    }

    /**
     * Get the user record.
     *
     * @return object - The usermodel records
     */
    public function get()
    {
        return $this->getModel()->get();
    }

    /**
     * Update the model record.
     *
     * @param $params - array of parameters to updat
     * @param $id - The model ID
     * @return mixed
     */
    public function update($params, $id)
    {
        return $this->getModel()->update($params, $id);
    }

    /**
     * Delete the ID of the Model Record
     *
     * @param $id - ID to delete
     * @return string
     */
    public function delete($id)
    {
        return $this->getModel()->delete($id);
    }

    /**
     * Save the record of the Model
     *
     * @param $params - The data to be saved
     * @return mixed
     */
    public function save($params)
    {
        return $this->getModel()->add($params);
    }
}