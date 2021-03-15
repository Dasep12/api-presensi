<?php

	require APPPATH . '/libraries/REST_Controller.php';

	// use namespace
	use Restserver\Libraries\REST_Controller;


class Upload extends REST_Controller
{


	public function index_post()
	{
                $this->load->library('upload');
                $file = $_FILES['file']['name'];
                $exe   = pathinfo($file ,PATHINFO_EXTENSION);
                $config['allowed_types']        = 'jpeg|png|jpg';
                $config['upload_path']          = './assets/';
                $config['file_name']            = md5("his". $file) . "." . $exe;
                $link                           = $config['upload_path'];
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('file')){
                        $this->set_response([
                                'status' => $this->upload->display_errors() 
                        ],400);
                }else {
                        $this->set_response(
                        	[
                                        "status"        => "successfuly uploaded" ,
                        		"nama" 		=> $this->post("nama") ,
                        		"file"	 	=> $this->upload->data()  ,
                                        "url_img"       => base_url('assets/' . $this->upload->data('file_name'))
                        	] , 
                        200);

                }
	}


}