<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Points_model extends CI_Model {

	public function get_points($uid)
	{
		$this->db->where("uid", $uid);
		$this->db->where("date=curdate()");
		$points = $this->db->get("points")->row_array();

		return $points;
	}

	public function get_all_points($uid){
		$this->db->order_by('date', 'DESC');
		$this->db->where("uid", $uid);
		$points = $this->db->get("points")->result();

		return $points;
	}

	public function init_points($uid){

		$new_point = array(
			"uid" => $uid,
			"date" => "curdate()"
		);
		$this->db->insert("points", $new_point, false);
	}

	public function insert_points($time, $uid){
		$this->db->set($time, "now()", false);
		$this->db->where('uid', $uid);
		$this->db->where('date=curdate()');
		$this->db->update('points');
	}

}
