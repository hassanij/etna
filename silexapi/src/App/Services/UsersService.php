<?php

namespace App\Services;

class UserService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM user");
    }

    function save($note)
    {
        $this->db->insert("user", $note);
        return $this->db->lastInsertId();
    }

    function update($id, $note)
    {
        return $this->db->update('user', $note, ['id' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("user", array("id" => $id));
    }

}
