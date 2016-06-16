<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

	function get_all_products(){

		return $this->db->query("SELECT * FROM products")->result_array();

	}

	function place_order($form_info, $shirt_qty, $cup_qty){

		$query = "INSERT INTO orders (name, shirt, cup, address, card_number, created_at) VALUES (?,?,?,?,?,?)";
		$values = $values = array($form_info['name'], $cup_qty, $shirt_qty, $form_info['address'], $form_info['card'],  date("Y-m-d H:i:s"));

		return $this->db->query($query, $values);

	}
}