<?php 

class DetailMK_model {
    private $table = 'mk_mhs';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDetailMK()
    {
        $this->db->query('SELECT * FROM mk_mhs JOIN matakuliah ON matakuliah.id=mk_mhs.id_mk JOIN mahasiswa ON mahasiswa.id=mk_mhs.id_mhs');
        return $this->db->resultSet();
    }

    public function getDetailMKById($id)
    {
        $this->db->query('SELECT * FROM mahasiswa WHERE id=:id');
        $this->db->bind('id', $id);
        // return $this->db->resultSet();
        return $this->db->single();
    }

    public function getDetailMK2ById($id)
    {
        $this->db->query('SELECT matakuliah.kode, matakuliah.nama_mk, matakuliah.sks FROM mk_mhs JOIN matakuliah ON matakuliah.id=mk_mhs.id_mk JOIN mahasiswa ON mahasiswa.id=mk_mhs.id_mhs WHERE id_mhs=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
        // return $this->db->single();
    }

    public function tambahDataDetailMK($data)
    {
        $query = "INSERT INTO mk_mhs
                    VALUES
                  ('', :id_mk, :id_mhs)";
        
        $this->db->query($query);
        $this->db->bind('id_mk', $data['id_mk']);
        $this->db->bind('id_mhs', $data['id_mhs']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDetailMK($id)
    {
        $query = "DELETE FROM mk_mhs WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataDetailMK($data)
    {
        $query = "UPDATE mk_mhs SET
                    kode = :kode,
                    nama_mk = :nama_mk,
                    sks = :sks
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataDetailMK()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mk_mhs JOIN matakuliah ON matakuliah.id=mk_mhs.id_mk JOIN mahasiswa ON mahasiswa.id=mk_mhs.id_mhs WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}