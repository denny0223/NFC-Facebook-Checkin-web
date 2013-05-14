<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin extends CI_Controller {

	public function getStoreInfo($tagId = null)
	{
		$this->load->model("Checkin_model", '', TRUE);
		$this->output->set_content_type('application/json');

		$data = $this->Checkin_model->getStoreInfo($tagId);

		if($data->num_rows() == 0) return;

		foreach($data->result() as $row) {
			$storeId 				= $row->id;
			$result['page_id']		= $row->page_id;
			$result['store_name']	= $row->store_name;
			$result['coupon_msg']	= $row->coupon_msg;
			$result['feedback_url']	= $row->feedback_url;
		}

		if(isset($result)){
			$str = urldecode(json_encode($result));
			echo $str;
		}
	}

	public function checkedin($tagId = null, $fbId = null)
	{
		$this->load->model("Checkin_model", '', TRUE);
		$this->output->set_content_type('application/json');

		$data = $this->Checkin_model->getStoreInfo($tagId);

		if($data->num_rows() == 0) return;

		$storeInfo = $data->row_array();
		$storeId = $storeInfo['id'];

		if(isset($fbId)){
			if($this->Checkin_model->isFBIdValid($fbId)){
				$this->Checkin_model->userCheckin($fbId, $storeId);
			}
		}
	}

}
