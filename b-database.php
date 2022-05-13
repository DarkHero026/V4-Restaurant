<?php

class PostB extends Dbh
{
    public function getPost()
    {
        $sql = "SELECT * FROM besteling";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getEndPost()
    {
        $sql = "SELECT * FROM besteling ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

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

    public function addPost($b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs)
    {
        $sql = "INSERT INTO besteling(product_eten, product_drank, aantal_eten, aantal_drank, tafel, prijs) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs]);
    }

    public function editPost($id)
    {
        $sql = "SELECT * FROM besteling WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs, $id)
    {
        $sql = "UPDATE besteling SET product_eten = ?, product_drank = ?, aantal_eten = ? , aantal_drank = ? , tafel = ?, prijs = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs, $id]);
    }

    public function delPost($id)
    {
        $sql = "DELETE FROM besteling WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
