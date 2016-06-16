<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function construct__(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->model('Product');

		$products = $this->Product->get_all_products();

		if($this->session->userdata('cart')){
			$shirt = $this->session->userdata('shirt');
			$cup = $this->session->userdata('cup');
			$cart = $shirt + $cup;
		} 
		else {
			$this->session->set_userdata(array('shirt' => 0)); 
			$this->session->set_userdata(array('cup' => 0));
			$shirt = $this->session->userdata('shirt');
			$cup = $this->session->userdata('cup');
			$cart = $shirt + $cup;
		}

		$this->load->view('index', array('products' => $products, 'shirt' => $shirt, 'cup' => $cup, 'cart' => $cart));
	}

	public function add($product)
	{
		$this->load->model('Product');
		$info = $this->input->post();


			if($product == 1){

				$shirt_before = $this->session->userdata('shirt');
				$shirt_after = $shirt_before + $info[1];
				$this->session->set_userdata(array('shirt' => $shirt_after)); 
				
				$shirt = $this->session->userdata('shirt');
				$cup = $this->session->userdata('cup');
				
			} else {

				$cup_before = $this->session->userdata('cup');
				$cup_after = $cup_before + $info[2];
				$this->session->set_userdata(array('cup' => $cup_after));

				$shirt = $this->session->userdata('shirt');
				$cup = $this->session->userdata('cup');

			}

			$cart = $shirt + $cup;

			$products = $this->Product->get_all_products();

			$this->load->view('index', array('products' => $products, 'shirt' => $shirt, 'cup' => $cup, 'cart' => $cart));

			// redirect('/');
		
	}

	public function cart(){

		$this->load->model('Product');

		$this->load->view('cart');

	}

	public function purchase(){
		$this->load->model('Product');

		$form_info = $this->input->post();
		$shirt_qty = $this->session->userdata('shirt');
		$cup_qty = $this->session->userdata('cup');


		$this->Product->place_order($form_info, $shirt_qty, $cup_qty);

		$this->load->view('confirmation');

	}


}