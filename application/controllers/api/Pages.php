<?php
class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Pages_model', 'page');
    }

    function home()
    {
        $meta = $this->page->getMetaContent('home');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('home');
        if ($data) 
        {
            $this->data['content'] = $content = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['partners']  = $this->master->get_data_rows('partners', ['status'=> '1']); 
            $this->data['sponsors']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1']); 
            $this->data['testimonials']  = $this->master->get_data_rows('testimonials', ['status'=> '1']); 
            $this->data['sec6s'] = getMultiText('home-sec6');
            $this->data['sec7s'] = getMultiText('home-sec7');
            $this->data['sec8s'] = getMultiText('home-sec8');
            $this->data['candidates_images'] = [$content['image1'], $content['image2'], $content['image3'], $content['image4'], $content['image5']];
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function signin()
    {
        $meta = $this->page->getMetaContent('signin');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('signin');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function signup()
    {
        $meta = $this->page->getMetaContent('signup');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('signup');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function about_us()
    {
        $meta = $this->page->getMetaContent('about_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('about_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = $this->master->getRows('faqs', ['status'=> 1], '', '', 'acs', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }
    
    function uk_corporate()
    {
        $meta = $this->page->getMetaContent('uk_corporate_culture');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('uk_corporate_culture');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function terms_and_conditions()
    {
        $meta = $this->page->getMetaContent('terms_and_conditions');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('terms_and_conditions');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function disclaimer()
    {
        $meta = $this->page->getMetaContent('disclaimer');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('disclaimer');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function faq()
    {
        $meta = $this->page->getMetaContent('faq');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('faq');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = $this->master->getRows('faqs', ['status'=> 1], '', '', 'acs', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blogs()
    {
        $meta = $this->page->getMetaContent('blogs');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('blogs');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blogs'] = $this->master->getRows('blogs', ['status'=> 1], '', '', 'desc', 'id');
            $cats  = $this->master->getRows('blog_categories', ['status'=> 1]);
            $this->data['cats'] = [];
            foreach($cats as $index => $cat):
                $num = $this->master->num_rows('blogs', ['blog_cat'=> $cat->id, 'status'=> 1]);
                if($num > 0)
                    $this->data['cats'][] = $cat;
            endforeach;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function work_with_us()
    {
        $meta = $this->page->getMetaContent('work_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('work_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = $this->master->getRows('faqs', ['status'=> 1], '', '', 'acs', 'sort_order');
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'work_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function partner_with_us()
    {
        $meta = $this->page->getMetaContent('partner_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('partner_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = $this->master->getRows('faqs', ['status'=> 1], '', '', 'acs', 'sort_order');
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'partner_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function careers()
    {
        $meta = $this->page->getMetaContent('careers');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('careers');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function job_profile()
    {
        $meta = $this->page->getMetaContent('job_profile');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('job_profile');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['profiles'] = $this->master->getRows('job_profiles', ['status'=> 1], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function events()
    {
        $meta = $this->page->getMetaContent('events');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $this->data['meta_desc'] = json_decode($meta->content);
        $this->data['events'] = $this->master->getRows('events', ['status'=> 1], '', '', 'desc', 'id');
        http_response_code(200);
        echo json_encode($this->data);
        exit;
    }

    function event_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('event_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['event'] = $this->master->getRow('events', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blog_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('blog_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blog'] = $this->master->getRow('blogs', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function job_profile_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('job_profile_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['profile'] = $this->master->getRow('job_profiles', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    

    function jobs()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            $meta = $this->page->getMetaContent('jobs');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('jobs');
            if ($data) 
            {
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $cats     = $this->master->getRows('job_categories', ['status'=> 1], '', '', 'asc', 'id');
                $this->data['cats'] = [];
                foreach($cats as $index => $cat):
                    $num = $this->master->num_rows('jobs', ['job_cat'=> $cat->id]);
                    if($num > 0)
                    {
                        $cat->count = $num; 
                        $this->data['cats'][] = $cat;
                    }
                endforeach;
    
                $types = ['Graduate Jobs', 'Interships', 'Placements', 'Insight Programmes'];
                $this->data['types'] = [];
                foreach($types as $index => $type):
                    $num = $this->master->num_rows('jobs', ['job_type'=> trim($type)]);
                    if($num > 0)
                    {
                        $t = new stdClass();
                        $t->type  = $type;
                        $t->count = $num;
                        $this->data['types'][] = $t;
                    }
                endforeach;
    
                $degree_req = ['Collage Degree', 'University Degree', 'Graduate Diploma', 'Not Specified', 'No Minimum Requirement'];
                $this->data['degree_req'] = [];
                foreach($degree_req as $index => $requirement):
                    $num = $this->master->num_rows('jobs', ['degree_requirement'=> trim($requirement)]);
                    if($num > 0)
                    {
                        $t = new stdClass();
                        $t->type  = $requirement;
                        $t->count = $num;
                        $this->data['degree_req'][] = $t;
                    }
                endforeach;
    
                $cities = $this->page->getJobCities();
                $this->data['cities'] = [];
                foreach($cities as $index => $city):
                    $num = $this->master->num_rows('jobs', ['city'=> $city->city]);
                    if($num > 0)
                    {
                        $city->count = $num; 
                        $this->data['cities'][] = $city;
                    }
                endforeach;
    
                $this->data['jobs'] =  [];
                $jobs = $this->master->getRows('jobs', ['status'=> 1], '', '', 'desc', 'id');
                foreach($jobs as $index => $j):
                    $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
                    $j->saved = false;
                    if($num > 0)
                        $j->saved = true;

                    $this->data['jobs'][] = $j;
                endforeach;
                
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_interview_video()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $videoRecord = [];
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {
                $video = upload_file(UPLOAD_PATH.'interview_videos/', 'video', 'video');
                // generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$video['file_name'],600,'thumb_');
                if(!empty($video['file_name'])){
                    // if(isset($content_row['video']))
                    //     $this->remove_file(UPLOAD_PATH."images/".$content_row['video']);
                    //     $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['video']);
                    if($post['questionNo'] == '0')
                    {
                        $videoRecord['setup_video'] = $video['file_name'];
                    }
                    else
                    {
                        $videoRecord['question_'.$post['questionNo']] = $video['file_name'];
                    }
                }
            }

            if(isset($post['interview_session_id']) && !empty($post['interview_session_id']))
            {
                $this->master->save('video_interview', $videoRecord, 'id', $post['interview_session_id']);
            }
            else
            {
                $videoRecord['mem_id'] = $mem_id;
                $interview_session_id = $this->master->save('video_interview', $videoRecord);
                $res['interview_session_id'] = $interview_session_id;
            }

            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function save_job()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            
            $this->master->save('saved_jobs', ['job_id'=> $post['id'], 'mem_id'=> $mem_id]);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function save_interview()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $submit_for_review = $post['submit_for_review'] == 'yes' ? '1' : '0';

            $this->master->save('video_interview', ['submit_for_review'=> $submit_for_review], 'id', $post['interview_session_id']);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }


    function fetch_jobs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];

            $jobs = $this->page->fetch_jobs_data($post);
            $res['jobs'] =  [];
            foreach($jobs as $index => $j):
                $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
                $j->saved = false;
                if($num > 0)
                    $j->saved = true;

                $res['jobs'][] = $j;
            endforeach;
            
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_blogs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $res['blogs'] = $this->master->getRows('blogs', ['blog_cat'=> $post['cat_id']], '','', 'desc', 'id');
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }
    
    function privacy_policy()
    {
        $meta = $this->page->getMetaContent('privacy_policy');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('privacy_policy');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_contact_message()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[30]', ['min_length'=> 'Please enter full name.', 'max_length'=> 'Name too long.']);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('msg', 'Comment', 'trim|required|min_length[10]|max_length[1000]', ['min_length'=> 'Please enter a complete Comment.', 'max_length'=> '1000 character limit reached.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $is_added = $this->master->save('contact', $post);
                if($is_added)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

}
