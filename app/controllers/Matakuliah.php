<?php 

class Matakuliah extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Matakuliah';
        $data['mk'] = $this->model('Matakuliah_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Matakuliah';
        $data['mk'] = $this->model('Matakuliah_model')->getMatakuliahById($id);
        $data['dmk2'] = $this->model('DetailMK_model')->getDetailMK2ById($id);
        $this->view('templates/header', $data);
        $this->view('matakuliah/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Matakuliah_model')->tambahDataMatakuliah($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Matakuliah_model')->hapusDataMatakuliah($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Matakuliah_model')->getMatakuliahById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('Matakuliah_model')->ubahDataMatakuliah($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Matakuliah';
        $data['mk'] = $this->model('Matakuliah_model')->cariDataMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

}