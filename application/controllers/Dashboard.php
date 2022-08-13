<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_users');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		if ($this->session->userdata('strategy')==0) {
			redirect('auth/selection', 'refresh');
		}
		$this->data['total_products'] = $this->model_products->countTotalProducts();
		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		$this->data['products'] = $this->model_products->getActiveProductData();


		$user_id = $this->session->userdata('id');
		$is_admin =true;//($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;


		$dateweek = strtotime(date("Y-m-d", strtotime("-1 week")));
		$datetoday = strtotime(date("Y-m-d"))+86399;

	     $query =  $this->db->query("SELECT SUM(OT.qty) as qty, p.name AS product FROM orders O JOIN orders_item OT ON O.id=OT.order_id JOIN products p ON OT.product_id=p.id WHERE O.date_time BETWEEN $dateweek AND $datetoday GROUP BY p.name ORDER BY (qty) ASC"); 
	 	//var_dump("SELECT SUM(OT.qty) as qty, p.name AS product FROM orders O JOIN orders_item OT ON O.id=OT.order_id JOIN products p ON OT.product_id=p.id WHERE O.date_time BETWEEN $dateweek AND $datetoday GROUP BY p.name ORDER BY (qty) ASC");
	      $record = $query->result();
	      $cdata = [];
	 
	      foreach($record as $row) {
	            $cdata['label'][] = $row->product;
	            $cdata['data'][] = (int) $row->qty;
	      }
	      //var_dump(json_encode($cdata));
      	$this->data['chart_data'] = json_encode($cdata);
      // $this->load->view('pie_chart',$data);


		$this->render_template('dashboard', $this->data);
	}

	public function pie_chart_js() {
   
      // $query =  $this->db->query("SELECT created_at as y_date, DAYNAME(created_at) as day_name, COUNT(id) as count  FROM users WHERE date(created_at) > (DATE(NOW()) - INTERVAL 7 DAY) AND MONTH(created_at) = '" . date('m') . "' AND YEAR(created_at) = '" . date('Y') . "' GROUP BY DAYNAME(created_at) ORDER BY (y_date) ASC"); 

	$dateweek = strtotime(date("Y-m-d", strtotime($date)) . " -1 week");
	$datetoday = strtotime(date("Y-m-d"));

     $query =  $this->db->query("SELECT SUM(OT.qty) as qty, p.name AS product FROM orders O JOIN orders_item OT ON O.id=OT.order_id JOIN products p ON OT.product_id=p.id WHERE O.date_time BETWEEN $dateweek AND $datetoday GROUP BY p.name ORDER BY (qty) ASC"); 
 
      $record = $query->result();
      $data = [];
 
      foreach($record as $row) {
            $data['label'][] = $row->product;
            $data['data'][] = (int) $row->qty;
      }
      // $data['chart_data'] = json_encode($data);
      // $this->load->view('pie_chart',$data);
      echo json_encode($data);
    }
}