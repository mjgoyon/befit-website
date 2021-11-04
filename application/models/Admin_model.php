<?php
class Admin_Model extends CI_Model {

    function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function getAllUsers(){
		$query = $this->db->get('admins');
		return $query->result(); 
	}

	public function fetch_data($username){
        $query = $this->db->get_where('admins', array('admins_username' => $username));
        $result = $query->result();
        return $result;
    }

    public function get_trainee_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('users', array('users_account'=>"Trainee"));
		return $query->result();
    }

    public function get_coach_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('users', array('users_account'=>"Coach"));
		return $query->result();
    }

    public function count_users() {
        return $this->db->count_all_results('users');
    }

    public function log_in_correctly() {  
        $this->db->where('admins_username', $this->input->post('username'));  
        $this->db->where('admins_password', $this->input->post('password'));  
        $query = $this->db->get('admins');
  
        if ($query->num_rows() == 1) {  
            return true;  
        } else {  
            return false;  
        }  
    }

    public function get_ratings() {
        /*$this->db->select('services_id, round(avg(ratings_rate),2) as ratings');
        $this->db->from('ratings');
        $this->db->group_by('services_id');
        $this->db->order_by('ratings', 'DESC');*/
        $sql = $this->db->query("SELECT services.users_name, round(avg(avg_),2) as superavg
        FROM (
            SELECT round(avg(ratings_rate),2) as avg_, services_id
            FROM ratings
            GROUP BY services_id
            ORDER BY avg_ DESC
            ) as avgs
            JOIN services
            ON services.services_id = avgs.services_id
            GROUP BY services.users_name
        ");
        $query = $sql->result();
        return $query;
    }

    public function get_names($array) {
        $this->db->select('services.services_title as names');
        $this->db->from('users');
        $this->db->join('services', 'services.users_id = users.users_id');
        $this->db->where_in('services_id', $array);
        $this->db->order_by('names', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }

	public function get_count() {
        return $this->db->count_all('users');
    }

    public function get_orders() {
        $this->db->select('*');
        $this->db->from('orders');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_prices() {
        $this->db->select('services_price');
        $this->db->from('services');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_payments() {
        $this->db->select('payments.payments_id, users.users_id as ids, users.users_username, payments.payments_amount');
        $this->db->from('users');
        $this->db->join('payments', 'payments.users_id = users.users_id');
        $query = $this->db->get()->result();
        return $query;
    }

	public function did_delete_row($id)	{
	    $this->db->where('users_id', $id);
	    $this->db->delete('users');
	}

    public function get_services_by_sales(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->order_by('services_sale', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_num_users(){
        $query = $this->db->query('SELECT * FROM users');
        return $query->num_rows();
    }
    
    public function get_num_services(){
        $query = $this->db->query('SELECT * FROM services');
        return $query->num_rows();
    }

    public function get_num_orders(){
        $query = $this->db->query('SELECT * FROM orders');
        return $query->num_rows();
    }

    public function get_cashout(){
        $this->db->select('*');
        $this->db->from('cashout');
        $query = $this->db->get()->result();
        return $query;
    }

    public function update_cashout($cashoutid){
        $this->db->set('cashout_remarks', '1');
        $this->db->where('cashout_id', $cashoutid);
        $this->db->update('cashout');
    }

    public function get_pending_cashout(){
        $query = $this->db->query('SELECT * FROM cashout WHERE cashout_remarks = 0');
        return $query->num_rows();
    }

    public function add_new_admin($admin){
        $this->db->insert('admins', $admin);
    }
}