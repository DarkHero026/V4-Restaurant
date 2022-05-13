<?php

class PostM extends Dbh
{
    public function getPostEten()
    {
        $sql = "SELECT * FROM eten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getPostDrank()
    {
        $sql = "SELECT * FROM drank";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function addPostEten($naam_eten, $prijs_eten)
    {
        $sql = "INSERT INTO eten(eten, prijs_eten) VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam_eten, $prijs_eten]);
    }

    public function addPostDrank($naam_drank, $prijs_drank)
    {
        $sql = "INSERT INTO drank(drank, prijs_drank) VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam_drank, $prijs_drank]);
    }

    public function editPostEten($id)
    {
        $sql = "SELECT * FROM eten WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function editPostDrank($id)
    {
        $sql = "SELECT * FROM drank WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePostEten($naam_eten, $prijs_eten, $id)
    {
        $sql = "UPDATE eten SET eten = ?, prijs_eten = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam_eten, $prijs_eten, $id]);
    }

    public function updatePostDrank($naam_drank, $prijs_drank, $id)
    {
        $sql = "UPDATE drank SET drank = ?, prijs_drank = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam_drank, $prijs_drank, $id]);
    }

    public function delPostEten($id)
    {
        $sql = "DELETE FROM eten WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function delPostDrank($id)
    {
        $sql = "DELETE FROM drank WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
