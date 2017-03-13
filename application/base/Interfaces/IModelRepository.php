<?php
/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 7:18 AM
 */

interface IModelRepository
{
    public function getModel();
    public function getByUid($uid);
    public function get();
    public function update($params, $id);
    public function save($params);
}