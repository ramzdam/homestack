<?php

/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 7:21 AM
 */
abstract class ModelRepository implements IModelRepository
{
    protected $model;
    protected $ci;

    public function __construct()
    {
        $ci =& get_instance();
        $this->ci = $ci;
        $this->ci->load->model($this->model_name);
    }

    public function getModel()
    {
        return $this->ci->{$this->model_name};
    }

    public function getByUid($uid)
    {
        // TODO: Implement getByUid() method.
    }

    public function get()
    {
        return $this->getModel()->get();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function save($params)
    {
        return $this->getModel()->add($params);
    }
}