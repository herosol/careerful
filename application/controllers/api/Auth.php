<?php
class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Member_model', 'member');
    }

    function sign_up()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('firstName', 'First Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'First Name should contains only letters and avoid space.',
                    'min_length' => 'First Name should contains atleast 2 letters.',
                    'max_length' => 'First Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'Last Name should contains only letters and avoid space.',
                    'min_length' => 'Last Name should contains atleast 2 letters.',
                    'max_length' => 'Last Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[members.mem_email]', 
                [
                    'valid_email' => 'Please enter a valid email.',
                    'is_unique' => 'This email is already in use.'
                ]);
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|callback_is_password_strong', 
                [
                    'is_password_strong' => 'Password should contains alteast 1 small letter, 1 capital letter, 1 number, and one special characher.'
                ]);
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]', 
                [
                    'matches' => 'Confirm password must be the as the password.'
                ]);

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());

                $rando = doEncode(rand(99, 999) . '-' . $post['email']);
                $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;
                $save_data = [
                    'mem_fname' => ucfirst($post['firstName']),
                    'mem_lname' => ucfirst($post['lastName']),
                    'mem_email' => $post['email'],
                    'mem_pswd' => doEncode($post['password']),
                    'mem_code' => $rando,
                    'mem_type' => $post['applicant'],
                    'mem_status' => 1,
                    'mem_last_login' => date('Y-m-d h:i:s')
                ];
                $mem_id = $this->member->save($save_data);
                // $this->session->set_userdata('mem_id', $mem_id);
                // $this->session->set_userdata('mem_type', $as);

                $res['msg'] = showMsg('success', getSiteText('alert', 'registration'));

                $verify_link = site_url('verification/' . $rando);
                $mem_data = array('name' => ucfirst($post['firstName']) . ' ' . ucfirst($post['lasName']), "email" => $post['email'], "link" => $verify_link);
                $this->send_site_email($mem_data, 'signup');

                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function sign_in()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $data = $this->input->post();
                $row = $this->member->authenticate($data['email'], $data['password']);
                if (count($row) > 0) {
                    // if ($row->mem_status == 0) {
                    //     $res['msg'] = showMsg('error', 'Your account has been blocked!');
                    //     exit(json_encode($res));
                    // }

                    $this->member->save(['mem_first_time_login' => 'no'], $row->mem_id);
                    $this->member->update_last_login($row->mem_id, $remember_token);
                    // $this->session->set_userdata('mem_id', $row->mem_id);
                    // $this->session->set_userdata('mem_type', $row->mem_type);

                    $res['status'] = 1;
                } else {
                    $res['msg'] = 'Worng email or password.';
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function google_sign_in()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['msg'] = '';

            $data = $this->input->post();
            if (!empty($data['name']) && !empty($data['email']))
            {
                if($mem = $this->member->socialEmailExists($data['email']))
                {
                    $res['status'] = 1;
                    $this->member->update_last_login($mem->mem_id);
                }
                else
                {
                    $image='';
                    if(!empty($data['picture'])){
                        $image = file_get_contents($data['picture']);
                        $file_name=md5(rand(100, 1000)) . '_' .time() . '_' . rand(1111, 9999). '.jpg';
                        $dir = UPLOAD_VPATH . 'vp/'.$file_name;
                        @file_put_contents($dir, $image);
                        generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $file_name, 100, 'thumb_');
                        generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $file_name, 300, '300p_');
                        $image = $file_name;
                    }

                    // if($data['email']!='')
                    // {
                    //     $mem_row = $this->member->emailExists($data['email']);
                    //     if (count($mem_row) > 0)
                    //         $data['email']='';
                    // }
    
                    $arr = explode(" ", $data['name']);
                    $new_vals = array(
                        'mem_social_type' => 'google',
                        'mem_fname'    => ucfirst($arr[0]),
                        'mem_lname'    => ucfirst($arr[1]),
                        'mem_email'    => $data['email'],
                        'mem_status'   => '1',
                        'mem_verified' => '1',
                        'mem_image'    => $image
                    );
    
                    $mem_id = $this->member->save($new_vals);
                    $res['status'] =1;
                    $this->member->update_last_login($mem_id);
                }
            }
            echo json_encode($res);
            exit;
        }
    }

	function google_callback() {
		include_once APPPATH . "libraries/Google/autoload.php";

		$client_id = '64946543542-d5qjd9vp2f71qrd62p13l1ftbeon40dg.apps.googleusercontent.com';
		$client_secret = 'h3Fkf00VUVHvSAMf4aLFhefG';
		$redirect_uri = base_url('google-callback');

		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);

		$client->authenticate($_GET['code']);
		$accessToken = $client->getAccessToken();
		$client->setAccessToken($accessToken);

		$service = new Google_Service_Oauth2($client);
		$data = array();
        $user = $service->userinfo->get(); //get user info 

        $data['access_token'] = $accessToken;
        $data['social_id'] = $user->id;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['image'] = $user->picture;
        if (!empty($data['name']) && !empty($data['social_id']) && !empty($data['access_token'])) {


        	if ($mem = $this->member->socialIdExists('google', $data['social_id'])) {

        		$this->member->update_last_login($mem->mem_id);
        		$this->session->set_userdata('mem_type', $mem->mem_type);
        		$this->session->set_userdata('mem_id', $mem->mem_id);
        	} else {

        		$image='';
        		if(!empty($data['image'])){
        			
        			$image = file_get_contents($data['image']);
        			$file_name=md5(rand(100, 1000)) . '_' .time() . '_' . rand(1111, 9999). '.jpg';

        			$dir = UPLOAD_VPATH . 'vp/'.$file_name;
        			@file_put_contents($dir, $image);

        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p50x50/", $file_name, 50);
        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p150x150/", $file_name, 150);
        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p300x300/", $file_name, 300);

        			$image=$file_name;
        		}
        		if($data['email']!=''){
        			$mem_row = $this->member->emailExists($data['email']);
        			if (count($mem_row) > 0)
        				$data['email']='';

        		}

        		$arr = explode(" ", $data['name']);
        		$new_vals = array(
        			'mem_type' => 'student',
        			'mem_social_type' => 'google',
        			'mem_social_id' => $data['social_id'],
        			'mem_fname' => $arr[0],
        			'mem_lname' => $arr[1],
        			'mem_email' => $data['email'],
        			'mem_status' => '1',
        			'mem_verified' => '1',
        			'mem_image' => $image
        		);

        		$this->load->library('my_stripe');
        		$new_vals['mem_stripe_id']=$this->my_stripe->save_customer(array('name' => ucfirst($new_vals['mem_fname']).' '.ucfirst($new_vals['mem_lname']),'email' => $new_vals['mem_email'],"description" => "Crainly Customer ".ucfirst($new_vals['mem_fname']).' '.ucfirst($new_vals['mem_lname'])));

        		$mem_id = $this->member->save($new_vals);

        		$this->member->update_last_login($mem_id);
        		$this->session->set_userdata('mem_type', 'student');
        		$this->session->set_userdata('mem_id', $mem_id);
        		// $this->sendEmail();
        	}
        }
        $redirect_url=$this->session->mem_type=='student'?'account-settings':'dashboard';
        redirect($redirect_url, 'refresh');
        exit;
    }

    ### callback functions
    public function is_password_strong($password)
    {
        $whiteListedSpecial = "\$\@\#\^\|\!\~\=\+\-\_\.";
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password) && preg_match('/[' . $whiteListedSpecial . ']/', $password)) {
            return TRUE;
        }
        return FALSE;
    }

}
