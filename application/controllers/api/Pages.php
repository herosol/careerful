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
            $this->data['news']      = $this->master->getRows('news', ['status'=> 1], 0, 4, 'DESC', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function contact_us()
    {
        $meta = $this->page->getMetaContent('contact');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('contact');
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
            $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[10]|max_length[1000]', ['min_length'=> 'Please enter a complete message.', 'max_length'=> '1000 character limit reached.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                unset($post['callback']);
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

    function what_is_human_traffiking()
    {
        $meta = $this->page->getMetaContent('what_is_human_traffiking');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('what_is_human_traffiking');
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

    function what_is_sex_traffiking()
    {
        $meta = $this->page->getMetaContent('what_is_sex_traffiking');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('what_is_sex_traffiking');
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

    function fact_and_stats()
    {
        $meta = $this->page->getMetaContent('fact_and_stats');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('fact_and_stats');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['news']      = $this->master->getRows('news', ['status'=> 1], 0, 4, 'DESC', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function policy_and_legislation()
    {
        $meta = $this->page->getMetaContent('policy_and_legislation');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('policy_and_legislation');
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

    function corporate_partners()
    {
        $meta = $this->page->getMetaContent('corporate_partners');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('corporate_partners');
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

    function start_a_fundraiser()
    {
        $meta = $this->page->getMetaContent('start_a_fundraiser');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('start_a_fundraiser');
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

    function help_and_resources()
    {
        $meta = $this->page->getMetaContent('help_and_resources');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('help_and_resources');
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

    function traffik_and_sex()
    {
        $meta = $this->page->getMetaContent('traffik_and_sex');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('traffik_and_sex');
        if ($data) 
        {
            $this->data['content']   = unserialize($data->code);
            $this->data['details']   = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['partners']  = $this->master->get_data_rows('partners', ['status'=> '1']); 
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function national_directory()
    {
        $meta = $this->page->getMetaContent('national_directory');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('national_directory');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $tags = $this->master->get_data_rows('tags', ['status'=> 1]);
            foreach($tags as $index => $t):
                $tag_num = check_organization_num($t->id);
                if($tag_num > 0)
                {
                    $t->num = $tag_num;
                    $this->data['tags'][] = $t;
                }
            endforeach;
            $this->data['organizations'] = $this->master->get_data_rows('national_directory_organizations', ['status'=> 1]);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function current_affairs()
    {
        $meta = $this->page->getMetaContent('current_affairs');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('current_affairs');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['news']      = $this->master->getRows('news', ['status'=> 1], 0, 4, 'DESC', 'id');
            $this->data['blogs']     = $this->master->getRows('vlogs', ['status'=> 1], 0, 4, 'DESC', 'id');
            $this->data['main_news'] = $this->master->get_data_row('news', ['status'=> 1, 'is_main'=> 1], 0, 1, 'DESC', 'id');
            $this->data['side_news'] = $this->master->getRows('news', ['status'=> 1, 'is_main <>'=> 1], 0, 3, 'DESC', 'id');

            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function rescue_stories()
    {
        $meta = $this->page->getMetaContent('rescue_stories');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('rescue_stories');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['rescue_stories'] = $this->master->getRows('rescue_stories', ['status'=> 1], 0, 4, 'DESC', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function rescue_story_detail()
    {
        $post = $this->input->post();
        $meta = $this->page->getMetaContent('rescue_story_detail');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('rescue_story_detail');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['story_detail'] = $this->master->get_data_row('rescue_stories', ['id' => $post['id']]);
            $this->data['rescue_stories'] = $this->master->getRows('rescue_stories', ['status'=> 1, 'id <>'=> $post['id']], '', '', 'DESC', 'id');
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
        $post = $this->input->post();
        $meta = $this->page->getMetaContent('blog_detail');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('blog_detail');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blog_detail'] = $this->master->get_data_row('vlogs', ['id' => $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function news_detail()
    {
        $post = $this->input->post();
        $meta = $this->page->getMetaContent('news_detail');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('news_detail');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['news_detail'] = $this->master->get_data_row('news', ['id' => $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }
    

    function share_story()
    {
        $meta = $this->page->getMetaContent('share_story');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('share_story');
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

    function project_unit()
    {
        $meta = $this->page->getMetaContent('project_unit');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('project_unit');
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

    function our_sponsors()
    {
        $meta = $this->page->getMetaContent('our_sponsors');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('our_sponsors');
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

    function donate_now()
    {
        $meta = $this->page->getMetaContent('donate_now');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('donate_now');
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

    function donate_pay_now()
    {
        $meta = $this->page->getMetaContent('donate_pay_now');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('donate_pay_now');
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

    function sign_up()
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
    
    function sign_in()
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

    function events_near_you()
    {
        $meta = $this->page->getMetaContent('events_near_you');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('events_near_you');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['events'] = $this->master->getRows('events', ['status'=> 1], '', '', 'DESC', 'id');
            $this->data['states'] = states_by_country();
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function search_nearby_events()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = html_escape($this->input->post());
            $res['events'] = $this->page->search_nearby_events($post);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function search_organizations()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = html_escape($this->input->post());
            $res['organizations'] = $this->page->search_organizations($post);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function clear_organizations_search()
    {
        $res = [];
        $res['status'] = 0;
        $res['organizations'] = $this->master->get_data_rows('national_directory_organizations', ['status'=> 1]);
        $res['status'] = 1;
        echo json_encode($res);
        exit;
    }

}
