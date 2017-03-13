<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Dashboard
 *
 * This class display the admin portal and do updates and storing of records via the admin panel
 * This also uses Guzzle to perform a CURL request to the API URL.
 * It is not advisable to directly connect frontend ajax to api url as this my introduce security issue
 *
 * URL: http://homestack/dashboard
 *      or
 *      http://homestack
 */
class Dashboard extends CI_Controller {


    function __construct()
    {
        parent::__construct();
    }

    /**
     * Display the list of user records in the Admin Dashboard
     *
     * @return View - admin/dashboard
     */
	public function index()
    {
        $list = $this->getList();
        $this->load->view('admin/dashboard', ['list' => $list]);
    }

    /**
     * Retrieved the list of user records. This can be used in an AJAX request
     *
     * @return View - partials/list. This contains the list of user records
     */
    public function getList()
    {
        $items = GuzzleService::sendGet('user/list');
        if ($items['success']) {
            $items = $items['data'];
        }

        return $this->load->view('partials/list', compact('items'), TRUE);
    }

    /**
     * Add a new user record or update it if a parameter of ID is passed.
     * Passing ID means that a request came from a valid user records.
     *
     * @return redirect - this will redirect to the dashboard.
     */
    public function add()
    {

        $params = $this->input->post();

        if ($this->form_validation->run('add_record') == FALSE)
        {
            $list = $this->getList();

            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect('dashboard');
        }


        if (!empty($params['id'])) {

            $items = GuzzleService::sendPut('user/'. $params['id'] . '/update', $params);

            redirect('dashboard');
        }

        $items = GuzzleService::sendPost('user/store', $params);
        // TODO: redirecting is not really the best way its better to reload the portion of the view insted of redirecting
        redirect('dashboard');
    }

    /**
     * Get the user record depending on the ID submitted.
     *
     * @param $id - user ID
     * @return json_encode - This can have multiple record
     */
    public function user($id)
    {
        $items = GuzzleService::sendGet('user/' . $id);

        echo json_encode($items);exit;
    }

    /**
     * Delete a user record. This does not really request for the record to be deleted but it just set
     * the deleted_at to a date
     *
     * @param $id - user ID
     */
    public function delete($id)
    {
        GuzzleService::sendPut('user/' . $id . '/delete');
        redirect('dashboard');
    }

    public function migrate()
    {
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */