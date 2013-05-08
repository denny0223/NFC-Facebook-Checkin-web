<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin extends CI_Controller {

	public function getStoreInfo($tagId = null, $fbId = null)
	{
		$this->load->model("Checkin_model", '', TRUE);

		$tagId = addslashes($tagId);

		$data = $this->Checkin_model->getStoreInfo($tagId);

		foreach($data->result() as $row) {
			$result['store_id']		= $row->store_id;
			$result['store_name']	= $row->store_name;
			$result['coupon_msg']	= $row->coupon_msg;
			$result['feedback_url']	= $row->feedback_url;
		}

		if(isset($fbId)){
			// todo: write to user_info DB
			if(!$this->Checkin_model->isFBIdValid($fbId)){
			}
		}

		if(isset($result)){
			$str = urldecode(json_encode($result));
			echo $str;
		}
	}

}
