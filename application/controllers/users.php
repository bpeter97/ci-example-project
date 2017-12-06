<?php

class Users extends CI_Controller
{

    // public function show($user_id, $username)
    // {
    //     // $this->load->model('user_model');

    //     $data['results'] = $this->user_model->get_users($user_id, $username);
        
    //     $this->load->view('user_view', $data);
    // }

    // public function insert()
    // {
    //     $username = 'peter';
    //     $password = 'secret';

    //     $this->user_model->create_users([

    //         'username'  =>  $username,
    //         'password'  =>  $password

    //     ]);
    // }

    // public function update()
    // {
    //     $id = 3;
    //     $username = 'William';
    //     $password = 'notsosecret';

    //     $this->user_model->update_users($id, [

    //         'username'  =>  $username,
    //         'password'  =>  $password

    //     ]);
    // }

    // public function delete()
    // {
    //     $id = 3;
    //     $this->user_model->delete_users($id);
    // }

    public function register()
    {
        // Form validation
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]',
                     array('matches' => 'The passwords do not match!'));
        $this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[5]|valid_email');
        $this->form_validation->set_rules('confirm_email','Confirm Email','trim|required|min_length[5]|valid_email|matches[email]');

        if($this->form_validation->run() == FALSE){
            $data = array('main_view'   =>  'users/register_view');
            $this->load->view('layouts/main', $data);
        } else {
            if($this->user_model->create_user()){
                $this->session->set_flashdata('user_registered', 'User has been registered!');
                redirect('home/index');
            } else {

            }
        }

        
    }

    public function login()
    {
       $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
       $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
       $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]',
                    array('matches' => 'The passwords do not match!'));
       if ($this->form_validation->run() == FALSE) {
           $data = array('main_view' => 'home_view');
           $this->load->view('layouts/main', $data);
       } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

           $user_id = $this->user_model->login_user($username, $password);

           if($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('login_success', 'You are now logged in.');

                redirect('home');
           } else {

                $this->session->set_flashdata('login_failed', 'You are not logged in.');

                $data = array('main_view' => 'home_view');
                $this->load->view('layouts/main', $data);
           }
       }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

}

?>