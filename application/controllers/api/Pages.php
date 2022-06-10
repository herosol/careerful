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
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['partners']  = $this->master->get_data_rows('partners', ['status'=> '1']); 
            $this->data['sponsors']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1']); 
            $this->data['testimonials']  = $this->master->get_data_rows('testimonials', ['status'=> '1']); 
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
