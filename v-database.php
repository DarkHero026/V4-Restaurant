<?php

class PostV extends Dbh
{
    public function getPost()
    {
        $sql = "SELECT * FROM vooraad";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function addPost($product, $aantal)
    {
        $sql = "INSERT INTO vooraad(product, aantal) VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product, $aantal]);
    }

    public function editPost($id)
    {
        $sql = "SELECT * FROM vooraad WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($product, $aantal, $id)
    {
        $sql = "UPDATE vooraad SET product = ?, aantal = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product, $aantal, $id]);
    }

    public function delPost($id)
    {
        $sql = "DELETE FROM vooraad WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
