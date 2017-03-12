<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Apicontroller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	protected $model_repository;

    function __construct()
    {
        parent::__construct();
        $this->model_repository = new UserRepository();

    }

	public function add_post()
    {
//        $client = new \GuzzleHttp\Client();
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

    public function list_get()
    {
        $list = $this->model_repository->get();
        $this->response(['data' => $list, 'success' => true], 200);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */