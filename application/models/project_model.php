<?php

class Project_model extends CI_Model
{
    public function get_projects()
    {
       return $this->db->get('projects')->result();
    }

    public function get_project($id)
    {
        return $this->db->get_where('projects', ['id'=>$id])->row();
    }

    public function create_project($data)
    {
		return $this->db->insert('projects', $data);
    }

    public function edit_project($data)
    {
        return $this->db->update('projects', $data, ['id' => $data['id']]);
    }

    public function delete_project($id)
    {
        return $this->db->delete('projects', ['id' => $id]);
    }

    public function get_user_projects($id)
    {
        return $this->db->get_where('projects', ['project_user_id'=>$id])->result();
    }
}

?>