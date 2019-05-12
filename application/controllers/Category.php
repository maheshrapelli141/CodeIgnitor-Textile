<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('admin_model');
        $this->load->model('products_model');
        $this->load->model('category_model');
        $this->load->helper('url_helper');
    }
    public function index()
    {
        $data['title'] = 'Rohit Textiles - Category';
        if($this->session->has_userdata('adminusername')){
            $this->load->view('header',$data);
            $this->load->view('sidenavbar');

            try {
                $data['categories'] = $this->category_model->get_all_categories();
                if (empty($data['categories'])) {
                    $data['emptydata'] = 'No Categories were added yet';
                }
                $this->load->view('admincategories', $data);
            }
            catch (Exception $exception){
                log_message($exception);
                $data['heading'] = "Error in loading data";
                $data['description'] = "Categories retrival failed from database";
                $this->load->view('empty_view',$data);
            }
            $this->load->view('footer');
        }
        else {
            redirect('index.php/admin/login');
        }
    }
}
