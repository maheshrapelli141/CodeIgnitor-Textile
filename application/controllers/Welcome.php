<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->model('products_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
        $data['title'] = "Rohit Textiles";

        $this->load->view('header', $data);
	    try {
            $data['products'] = $this->products_model->get_all_products();
            if(empty($data['products'])){
                $data['error'] = "Products not found";
            }
        }catch (Exception $exception){
	        log_message($exception);
	        $data['error'] = "Data retrival failed from database";
        }
        $this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}

	public function contact(){
        $data['title'] = "Rohit Textiles - Contact";
        $this->load->view('header',$data);
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function about(){
        $data['title'] = "Rohit Textiles - About";
        $this->load->view('header',$data);
        $this->load->view('about');
        $this->load->view('footer');
    }
}
