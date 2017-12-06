<?php

class Projects extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('logged_in'))
        {
            $this->session->set_flashdata('no_access', 'You are not authorized to access that page.');
            redirect('home/index');
        }
    }
    
    public function index()
    {

        $data['projects'] = $this->project_model->get_projects();

        $data['main_view'] = 'projects/index';

        $this->load->view('layouts/main', $data);
    }

    public function display($id)
    {
        $data['project'] = $this->project_model->get_project($id);

        $data['main_view'] = 'projects/display';
        $this->load->view('layouts/main', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('project_name','Project Name','required|min_length[3]');
        $this->form_validation->set_rules('project_body','Project Body','required|min_length[3]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['main_view'] = 'projects/create';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(
                'project_user_id'   =>  $this->session->userdata('user_id'),
                'project_name'		=>	$this->input->post('project_name', TRUE),
                'project_body'		=>	$this->input->post('project_body', TRUE)
            );

            if($this->project_model->create_project($data)) {
                $this->session->set_flashdata('project_created', 'You have created a project!');
                redirect('projects/index');
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('project_name','Project Name','required|min_length[3]');
        $this->form_validation->set_rules('project_body','Project Body','required|min_length[3]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['project'] = $this->project_model->get_project($id);

            $data['main_view'] = 'projects/edit';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(
                'id'                =>  $id,
                'project_user_id'   =>  $this->session->userdata('user_id'),
                'project_name'		=>	$this->input->post('project_name', TRUE),
                'project_body'		=>	$this->input->post('project_body', TRUE)
            );

            if($this->project_model->edit_project($data)) {
                $this->session->set_flashdata('project_edited', 'You have edited a project!');
                redirect('projects/index');
            }
        }
    }

    public function delete($id)
    {
        if($this->project_model->delete_project($id)){
            $this->session->set_flashdata('project_deleted', 'You have deleted a project!');
            redirect('projects/index');
        } else {
            $this->session->set_flashdata('project_not_deleted', 'You were unable to delete a project!');
            redirect('projects/index');
        }
        
    }

}

?>