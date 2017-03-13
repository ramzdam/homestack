<?php
/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 13/3/17
 * Time: 10:03 AM
 */
$config = array(
    'add_record' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required|valid_email'
        ),
    )
);