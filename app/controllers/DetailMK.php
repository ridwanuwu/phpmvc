<?php 

class DetailMK extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar DetailMK';
        $data['dmk'] = $this->model('DetailMK_model')->getAllDetailMK();
        $this->view('templates/header', $data);
        $this->view('detailmk/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail DetailMK';
        $data['dmk'] = $this->model('DetailMK_model')->getDetailMKById($id);
        $data['dmk2'] = $this->model('DetailMK_model')->getDetailMK2ById($id);
        $this->view('templates/header', $data);
        $this->view('detailmk/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('DetailMK_model')->tambahDataDetailMK($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('DetailMK_model')->hapusDataDetailMK($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('DetailMK_model')->getDetailMKById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('DetailMK_model')->ubahDataDetailMK($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/detailmk');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar DetailMK';
        $data['dmk'] = $this->model('DetailMK_model')->cariDataDetailMK();
        $this->view('templates/header', $data);
        $this->view('detailmk/index', $data);
        $this->view('templates/footer');
    }

}