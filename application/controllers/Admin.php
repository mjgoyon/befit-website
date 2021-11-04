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
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
 
        //get all users
        $this->data['admins'] = $this->admin_model->getAllUsers();
	}

	public function index() {
		if ($this->session->userdata('adminusername')) {
			redirect(base_url().'admin/dashboard');
		} else {
			$this->load->view("admin_login");
		}
        
		
	}

	public function login_data() {
        $this->form_validation->set_rules('username', 'Username', 'required|callback_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $check = $this->input->post('username');
            $data["admins"] = $this->admin_model->fetch_data($check);
			print_r($data['admins']);
            foreach($data["admins"] as $row) {
				$this->session->set_userdata('adminusername', $row->admins_username);
                redirect(base_url().'admin/dashboard');
            }
        }
    }

	public function validation() {  
        if ($this->admin_model->log_in_correctly()) {  
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;
        }
    }

	public function dashboard() {
		//pagination & users
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url().'admin/dashboard/';
		$config["total_rows"] = $this->admin_model->get_count();
		$config['per_page'] = 4;
		$config["uri_segment"] = 3;

		 //design
		 $config['full_tag_open'] = "<ul class='page'>";
		 $config['full_tag_close'] = '</ul>';
		 $config['num_tag_open'] = '<li class="page__numbers">';
		 $config['num_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="page__numbers active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['prev_tag_open'] = '<li class="page__numbers">';
		 $config['prev_tag_close'] = '</li>';
		 $config['first_tag_open'] = '<li class="page__numbers">';
		 $config['first_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li class="page__numbers">';
		 $config['last_tag_close'] = '</li>';
 
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li class="page__numbers">';
		 $config['prev_tag_close'] = '</li>';
 
		 $config['next_link'] = '&raquo;';
		 $config['next_tag_open'] = '<li class="page__numbers">';
		 $config['next_tag_close'] = '</li>';


		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['trainees'] = $this->admin_model->get_trainee_users($config["per_page"], $page);
		$data['coaches'] = $this->admin_model->get_coach_users($config["per_page"], $page);
		//$this->load->view('admin_dashboard', $data);
		$data['numusers'] = $this->admin_model->get_num_users();
		$data['numservices'] = $this->admin_model->get_num_services();
		$data['numorders'] = $this->admin_model->get_num_orders();
		$data['numcashout'] = $this->admin_model->get_pending_cashout();

		//charts & transactions
		$data['users'] = $this->admin_model->count_users();
		$data['avgs'] = $this->admin_model->get_ratings();
		//print_r($data['ratings']);
		$idArray = array();
		$nameArray = array();
		$tempArray = json_decode(json_encode($data['avgs']), true);
		//print_r($tempArray);
		for ($i = 0; $i < 2; $i++) {
			array_push($idArray, $tempArray[$i]['superavg']);
			array_push($nameArray, $tempArray[$i]['users_name']);
		}
		//print_r($idArray);
		$data['ratings'] = $idArray;
		$data['names'] = $nameArray;
		print_r($data['names']);
		$data['orders'] = $this->admin_model->get_orders();
		//print_r($tempPriceArray);
		$data['prices'] = $this->admin_model->get_prices();
		$data['payments'] = $this->admin_model->get_payments();
		$data['services'] = $this->admin_model->get_services_by_sales();
		//print_r($data['payments']);

		//cashout
		$data['cashout'] = $this->admin_model->get_cashout();
		//view page
		$this->load->view('admin_home', $data);
	}

	public function chart() {
		$data['users'] = $this->admin_model->count_users();
		$data['ratings'] = $this->admin_model->get_ratings();
		$idArray = array();
		$tempArray = json_decode(json_encode($data['ratings']), true);
		for ($i = 0; $i < 3; $i++) {
			array_push($idArray, $tempArray[$i]['services_id']);
		}
		//print_r($idArray);
		$data['names'] = $this->admin_model->get_names($idArray);
		//print_r($data['ratings']);
		$data['orders'] = $this->admin_model->get_orders();
		//print_r($tempPriceArray);
		$data['prices'] = $this->admin_model->get_prices();
		$data['payments'] = $this->admin_model->get_payments();
		$data['services'] = $this->admin_model->get_services_by_sales();
		//print_r($data['payments']);
		$this->load->view('admin_chart', $data);
	}

	public function delete_data() {
		if(isset($_GET['id'])) {
			$id=$_GET['id'];
			$this->admin_model->did_delete_row($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'admin/');
    }

	public function confirm_cashout(){
		if(isset($_GET['cashout_id'])) {
			$cashoutid=$_GET['cashout_id'];
			$this->admin_model->update_cashout($cashoutid);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function add_admin(){
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		$admin = array(
			'admins_username' => $this->input->post('username'),
			'admins_password' => $this->input->post('password'),
		);
		$this->admin_model->add_new_admin($admin);
		redirect($_SERVER['HTTP_REFERER']);

	}
}
