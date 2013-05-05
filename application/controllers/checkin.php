<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

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
				echo "null<br>";
			}
		}

		if(isset($result)){
			$str = urldecode(json_encode($result));
			echo $str;
		}
		else{
			echo "null";
		}
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
