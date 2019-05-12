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
      $this->load->view('sidenavbar');
    if ($this->form_validation->run() === FALSE)
    {
            $this->load->view('adminlogin');
    }
    else
    {
        if($this->admin_model->login_check($this->input->post('username'),$this->input->post('password'))) {
            $adminData = array('adminusername' => $this->input->post('username'));
            $this->session->set_userdata($adminData);
            redirect(base_url('/index.php/admin/dashboard'));
        }
        else {
            $data['error'] = 'Invalid credentials';
            $this->load->view('adminlogin',$data);
        }
    }
		$this->load->view('footer');
  }

  public function dashboard(){
      $data['title'] = "Rahul Textiles";

      $this->load->view('header',$data);
      $this->load->view('sidenavbar');
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

  public function changeusername(){
      $data['title'] = "Rahul Textiles";

      $this->load->view('header',$data);
      $this->load->view('sidenavbar');
      if($this->session->has_userdata('adminusername')) {
          try {
              if($this->input->post('username')!="" OR $this->input->post('username')!=NULL){
                  $this->form_validation->set_rules('username', 'Username', array('required'));
                  $this->form_validation->set_rules('password', 'Password', array('required','min_length[8]'));

                  if ($this->form_validation->run() === FALSE) {
                      $this->load->view('changeusername');
                  }
                  else {
                      if($this->admin_model->get_password() == $this->input->post('password')) {
                          if ($this->admin_model->change_username($this->input->post('username'))) {
                              $this->session->set_userdata('adminusername',$this->input->post('username'));
                              $this->session->set_flashdata('update_username_message', 'Username successfully updated');
                              redirect(base_url('index.php/admin/changeusername'));
                          } else {
                              $data['error'] = 'Failed to update database';
                              $this->load->view('changeusername',$data);
                          }
                      }
                      else {
                          $data['error'] = 'Incorrect old password';
                          $this->load->view('changeusername',$data);
                      }
                  }
              }
              else {
                  $this->load->view('changeusername');
              }
          } catch (Exception $e) {
              $data['heading'] = "Error in loading data";
              $data['description'] = "Products retrival failed from database";
              $this->load->view('empty_view', $data);
          }
      }
      else {
          redirect(base_url('index.php/admin/'));
      }
      $this->load->view('footer');
  }

    public function changepassword(){
        $data['title'] = "Rahul Textiles";

        $this->load->view('header',$data);
        $this->load->view('sidenavbar');
        if($this->session->has_userdata('adminusername')) {
            try {
                if($this->input->post('password')!="" OR $this->input->post('password')!=NULL){
                    $this->form_validation->set_rules('oldpassword', 'OldPassword', array('required','min_length[8]'));
                    $this->form_validation->set_rules('password', 'Password', array('required','min_length[8]'));
                    $this->form_validation->set_rules('confirmpassword', 'ConfirmPassword', array('required','min_length[8]'));

                    if ($this->form_validation->run() === FALSE) {
                        $this->load->view('changepassword');
                    }
                    else {
                        if($this->input->post('password') == $this->input->post('confirmpassword')) {
                            if ($this->admin_model->get_password() == $this->input->post('oldpassword'))
                            {
                                if ($this->admin_model->change_password($this->input->post('password'))) {
                                    $this->session->set_flashdata('update_password_message', 'Password successfully updated');
                                    redirect(base_url('index.php/admin/changepassword'));
                                } else {
                                    $data['error'] = 'Failed to update database';
                                    $this->load->view('changepassword', $data);
                                }
                            } else {
                                $data['error'] = 'Incorrect old password';
                                $this->load->view('changepassword', $data);
                            }
                        }
                        else {
                            $data['error'] = "New password and confirm password did not matching";
                            $this->load->view('changepassword', $data);
                        }
                    }
                }
                else {
                    $this->load->view('changepassword');
                }
            } catch (Exception $e) {
                $data['heading'] = "Error in loading data";
                $data['description'] = "Products retrival failed from database";
                $this->load->view('empty_view', $data);
            }
        }
        else {
            redirect(base_url('index.php/admin/'));
        }
        $this->load->view('footer');
    }
}
