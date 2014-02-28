<?php
class Login_Model extends CI_Model
{
	public function validate($creds)
	{   
		$this->db->where('username', $creds['username']);
		$this->db->where('password', $creds['password']);
		$result = $this->db->get('users');
		if ($result->num_rows == 1)	{ 
			  return true;
			}
		else {
				return false;
			}
	}
//-------------------------------------------------------
	public function write_data($signup)
	{		
		$this->db->set('name', $signup['name']);
		$this->db->set('access_group', $signup['access']);
		$this->db->set('username', $signup['username']);				
		$this->db->set('password', $signup['password']);
		$insert_date = date('m/d/Y');
		$this->db->set('insert_time', $insert_date);
		$this->db->insert('users');	
	}
//-------------------------------------------------------
	public function update_data($item)
	{		
		$data = array (
			'name' => $item['name'],
			'access_group' => $item['access_group'],
			'password' => $item['password'],

			);
		$this->db->where('username', $item['username']);
		$this->db->update('users', $data);	
	}

//-------------------------------------------------------	
	public function getall()
	{	$this->db->select('id, name, access_group, username, password, insert_time');
		$this->db->order_by("id", "asc"); 
		$result = $this->db->get('users');
		if (!$result->num_rows() > 0) 
			{ echo ("No rows were found");
			}
		else
		{   foreach ($result->result() as $row)
				{ $data[] = $row;
				}
			return($data);
		}	
	}
}
?>