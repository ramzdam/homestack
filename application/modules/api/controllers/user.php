<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User
 *
 * This class implements a RESTFUL API and needs validation
 * By default validation credential are Authentication: 123456
 *
 * This is also under a modular folder so that we can create multiple API for multiple request type
 */
class User extends Apicontroller
{

	protected $model_repository;

    function __construct()
    {
        parent::__construct();
        $this->model_repository = new UserRepository();

    }

    /**
     * This will list out the user record. Depending on the ID submitted. This is the same as user/(id)
     * This request is set in the route.
     *
     * @param $id - The user record ID
     * @return json - This will return a json in the format below
     *
     * {
     *      "success" : true,
     *      "data" : {
     *
     *      },
     *      "message" : "Record found"
     * }
     */
    public function index_get($id)
    {
        $result = $this->model_repository->getByUid($id);
        $this->response(['success' => true, 'data' => $result, 'message' => 'Record found']);
    }

    /**
     * Store or save a new user record. This requires the field name, email, link.
     * UID is autogenerated here
     *
     * @return json - This will return a json in the format below
     *
     * {
     *      "success" : true,
     *      "message" : "Record found"
     * }
     */
	public function store_post()
    {
        try {
            $is_added = $this->model_repository->save($this->post());

            if ($is_added) {
                $this->response(['message' => 'Saving of record successful', 'success' => true], 200);
            }

            $this->response(['success' => false, 'message' => 'Failed to save record'], 204);
        } catch (Exception $e) {

            $this->response(['success' => false, 'message' => $e->getMessage()], 204);
        }
    }

    /**
     * Delete a user depending on the ID submitted.
     * Note: this is not the proper way to delete a record we should use UID or something to
     * reference a user record instead of using the ID directly.
     *
     * @return json - This will return a json in the format below
     *
     * {
     *      "success" : true,
     *      "message" : "Record delete successfully"
     * }
     */
    public function delete_put($id)
    {
        $is_added = $this->model_repository->delete($id);
        $this->response(['success' => true, 'message' => 'Record delete successfully']);
    }

    /**
     * Update a user record depending on the ID submitted
     * Note: this is not the proper way to delete a record we should use UID or something to
     * reference a user record instead of using the ID directly.
     *
     * @return json - This will return a json in the format below
     *
     * {
     *      "success" : true,
     *      "message" : "Record updated successfully"
     * }
     */
    public function update_put($id)
    {
        $is_added = $this->model_repository->update($this->put(), $id);
        $this->response(['success' => true, 'message' => "Record updated successfully"]);
    }

    /**
     * List out the record of the Users
     *
     * @return json - This will return a json in the format below
     *
     * {
     *      "success" : true,
     *      "data" : { // record list here }
     * }
     */
    public function list_get()
    {
        $list = $this->model_repository->get();
        $this->response(['data' => $list, 'success' => true]);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */