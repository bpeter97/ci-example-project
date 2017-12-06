<?php

class Home extends CI_Controller 
{

    public function index()
    {

        if($this->session->userdata('logged_in')) {
          
            $data['projects'] = $this->project_model->get_user_projects($this->session->userdata('user_id'));

        }

        $data['main_view'] = 'home_view';

        $this->load->view('layouts/main', $data);
    }

}

?>