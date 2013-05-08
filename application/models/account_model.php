<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function isUserValid($username, $password)
	{
		$sql = "SELECT `id`
				FROM `account` 
				WHERE `username` = ?
				AND `password` = MD5(CONCAT(MD5(?), 'nfccheckin'))";

		$query = $this->db->query($sql , array($username, $password));

		return $query;
	}

}

