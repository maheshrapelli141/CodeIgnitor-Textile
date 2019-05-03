<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
       $this->load->helper('url_helper');
   }
	public function index()
	{
		$data['title'] = "Rahul Textiles - Admin";
        if($this->session->has_userdata('adminusername')){
            redirect(base_url('index.php/admin/dashboard'));
        }
        else {
            $this->load->view('header',$data);
            $this->load->view('adminlogin');
            $this->load->view('footer');
        }
  }
  
  public function login()
  {

		$data['title'] = "Rahul Textiles";
    $this->form_validation->set_rules('username','Username',array('required'));
    $this->form_validation->set_rules('password','Password',array('required','min_length[8]'));

    $this->load->view('header',$data);
    if ($this->form_validation->run() === FALSE OR $this->admin_model->login_check($this->input->post('username'),$this->input->post('password')) === FALSE)
    {
            $this->load->view('adminlogin');
    }
    else
    {
        $adminData = array('adminusername'=>$this->input->post('username'));
        $this->session->set_userdata($adminData);
        redirect(base_url('/index.php/admin/dashboard'));
    }
		$this->load->view('footer');
  }

  public function dashboard(){
      $data['title'] = "Rahul Textiles";

      $this->load->view('header',$data);
       if($this->session->has_userdata('adminusername')){
           try {
               $data['products'] = $this->products_model->get_all_products();

               if (empty($data['products'])) {
                   $data['emptydata'] = "No Products Found";
               }
               $this->load->view('admindashboard', $data);
           }
           catch (Exception $e){
               $data['heading'] = "Error in loading data";
               $data['description'] = "Products retrival failed from database";
               $this->load->view('empty_view',$data);
           }
       }
       else {
           redirect(base_url('index.php/admin/'));
       }
      $this->load->view('footer');
  }

  public function logout(){
      $this->session->unset_userdata('adminusername');
      redirect(base_url('index.php/admin/'));
  }
}
