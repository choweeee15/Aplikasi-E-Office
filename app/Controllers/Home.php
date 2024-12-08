<?php

namespace App\Controllers;

use App\Models\Model_belajar;
use App\Models\CutiModel;
use TCPDF;
use Dompdf\Dompdf;

class Home extends BaseController
{
    protected $Model_belajar;
    public function index()
    {
        return view('pages-login.php');
    }
    public function verifikasi_pengganti()
    {
        $nama = session()->get('nama'); // Ambil nama dari sesi
        $db = \Config\Database::connect();

        // Buat query dengan join tabel karyawan
        $query = $db->table('cuti')
            // ->join('karyawan', 'karyawan.id_user = cuti.guru_pengganti')
            ->select('cuti.*') // Ambil semua kolom cuti dan nama pengganti
            ->where('cuti.guru_pengganti', $nama); // Filter berdasarkan nama dari sesi

        $data['cuti'] = $query->get()->getResult(); // Ambil hasil query

        // Load views dengan data
        echo view('header.php');
        echo view('menu.php');
        echo view('verifikasi_pengganti.php', $data);
        echo view('footer.php');
    }


    public function cuti()
    {
        $id_user = session()->get('id'); // Ambil id_user dari sesi
        $level = session()->get('level'); // Ambil level dari sesi
        $db = \Config\Database::connect();

        // Buat query dasar dengan join tabel karyawan
        $query = $db->table('cuti')
            ->join('karyawan', 'karyawan.id_user = cuti.id_user')
            ->select('cuti.*, karyawan.nama');

        // Jika level bukan 2 atau 1, filter berdasarkan id_user
        if (!in_array($level, [1, 2])) {
            $query->where('cuti.id_user', $id_user);
        }

        $data['cuti'] = $query->get()->getResult(); // Ambil hasil query

        // Load views dengan data
        echo view('header.php');
        echo view('menu.php');
        echo view('cuti.php', $data);
        echo view('footer.php');
    }


    public function tambahcuti()
    {
        $Joyce = new Model_belajar();
        $data['karyawan'] = $Joyce->tampil('karyawan', 'id_karyawan');
        echo view('header.php');
        echo view('menu.php');
        echo view('tambahcuti.php', $data);
        echo view('footer.php');
    }

    public function simpancuti()
    {
        $cutiModel = new CutiModel();

        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'jenis_cuti' => $this->request->getPost('jenis_cuti'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_sampai' => $this->request->getPost('tanggal_sampai'),
            'alasan' => $this->request->getPost('alasan'),
            'alamat_cuti' => $this->request->getPost('alamat_cuti'),
            'guru_pengganti' => $this->request->getPost('guru_pengganti'),
            'status' => 'Menunggu Verifikasi',
            'komentar' => null
        ];

        $cutiModel->save($data);

        return redirect()->to('/home/cuti')->with('message', 'Cuti berhasil diajukan.');
    }

    public function editCuti($id_cuti)
    {
        $db = \Config\Database::connect();

        // Ambil data cuti berdasarkan id_cuti
        $cuti = $db->table('cuti')->where('id_cuti', $id_cuti)->get()->getRow();

        if ($cuti) {
            $data['cuti'] = $cuti; // Kirim data ke view
            return view('header.php')
                . view('menu.php')
                . view('edit_cuti.php', $data)
                . view('footer.php');
        } else {
            session()->setFlashdata('error', 'Data cuti tidak ditemukan.');
            return redirect()->to('/home/cuti');
        }
    }
    public function verifikasiCuti($id_cuti)
    {
        $db = \Config\Database::connect();

        // Ambil data cuti berdasarkan id_cuti
        $cuti = $db->table('cuti')->where('id_cuti', $id_cuti)->get()->getRow();

        if ($cuti) {
            $data['cuti'] = $cuti; // Kirim data ke view
            return view('header.php')
                . view('menu.php')
                . view('verifikasi_cuti.php', $data)
                . view('footer.php');
        } else {
            session()->setFlashdata('error', 'Data cuti tidak ditemukan.');
            return redirect()->to('/home/cuti');
        }
    }
    public function updateStatusPengganti($id_cuti)
    {
        $db = \Config\Database::connect();

        // Data yang akan diupdate
        $data = [
            'status_pengganti' => 'Disetujui',
        ];

        // Proses update data cuti
        $db->table('cuti')->where('id_cuti', $id_cuti)->update($data);

        // Set pesan flash
        session()->setFlashdata('success', 'Data cuti berhasil diperbarui.');
        return redirect()->to('/home/verifikasi_pengganti');
    }
    public function updateStatusPengganti2($id_cuti)
    {
        $db = \Config\Database::connect();

        // Data yang akan diupdate
        $data = [
            'status_pengganti' => 'Ditolak',
        ];

        // Proses update data cuti
        $db->table('cuti')->where('id_cuti', $id_cuti)->update($data);

        // Set pesan flash
        session()->setFlashdata('success', 'Data cuti berhasil diperbarui.');
        return redirect()->to('/home/verifikasi_pengganti');
    }
    public function updateCuti($id_cuti)
    {
        $db = \Config\Database::connect();

        // Data yang akan diupdate
        $data = [
            'jenis_cuti' => $this->request->getPost('jenis_cuti'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_sampai' => $this->request->getPost('tanggal_sampai'),
            'alasan' => $this->request->getPost('alasan'),
            'status' => $this->request->getPost('status'),
            'status_pengganti' => $this->request->getPost('status_pengganti'),
            'komentar' => $this->request->getPost('komentar'),
        ];

        // Proses update data cuti
        $db->table('cuti')->where('id_cuti', $id_cuti)->update($data);

        // Set pesan flash
        session()->setFlashdata('success', 'Data cuti berhasil diperbarui.');
        return redirect()->to('/home/cuti');
    }

    public function hapusCuti($id_cuti)
    {
        $db = \Config\Database::connect();

        // Periksa apakah data cuti dengan id_cuti tersebut ada
        $cuti = $db->table('cuti')->where('id_cuti', $id_cuti)->get()->getRow();

        if ($cuti) {
            // Jika data cuti ditemukan, lakukan penghapusan
            $db->table('cuti')->where('id_cuti', $id_cuti)->delete();

            // Berikan pesan sukses
            session()->setFlashdata('success', 'Data cuti berhasil dihapus.');
        } else {
            // Jika data cuti tidak ditemukan, beri pesan error
            session()->setFlashdata('error', 'Data cuti tidak ditemukan.');
        }

        // Redirect kembali ke halaman cuti
        return redirect()->to('/home/cuti');
    }

    public function printcuti($id_cuti)
    {
        $db = \Config\Database::connect();
        $query = $db->table('cuti')
            ->join('karyawan', 'karyawan.id_user = cuti.id_user')  // Join dengan tabel karyawan
            ->join('user', 'user.id_user = cuti.id_user')  // Join dengan tabel user jika perlu
            ->where('cuti.id_cuti', $id_cuti)
            ->get();

        $cuti = $query->getRow(); // Ambil data cuti berdasarkan id_cuti

        if (!$cuti) {
            // Jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data Cuti tidak ditemukan');
        }

        // Mengatur data untuk view
        $data = [
            'cuti' => $cuti,
            'jenis_cuti' => $cuti->jenis_cuti,
            'nama' => $cuti->nama,
            'nik' => $cuti->NIK, // NIK diambil dari tabel karyawan
            'level' => session()->get('level'),
            'tanggal_mulai' => $cuti->tanggal_mulai,
            'tanggal_sampai' => $cuti->tanggal_sampai
        ];

        // Memanggil view yang berisi layout surat
        return view('print_surat_cuti', $data);
    }


    public function aksi_login()
    {
        $a = $this->request->getPost('email');
        $b = $this->request->getPost('pswd');

        $Q = new Model_belajar;
        $D = array('username' => $a, 'password' => $b);

        $cek = $Q->getWhere('user', $D);

        if ($cek != null) {
            // Ambil nama pengguna dari tabel karyawan berdasarkan id_user
            $db = \Config\Database::connect();
            $query = $db->table('karyawan')->where('id_user', $cek->id_user)->get();
            $karyawan = $query->getRow();

            // Simpan data ke dalam sesi
            session()->set('id', $cek->id_user);
            session()->set('u', $cek->username);
            session()->set('level', $cek->level);
            session()->set('nama', $karyawan->nama); // Tambahkan nama ke sesi

            return redirect()->to('home/dashboard');
        } else {
            return redirect()->to('home/index');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home');
    }
    public function user()
    {
        if (session()->get('id') > 0) {
            $data['takdirestui'] = $this->model_belajar->tampil('user');
            echo view('header.php');
            echo view('menu.php');
            echo view('user.php', $data);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }
    public function tambahUser()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_user.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanUser()
    {
        if (session()->get('id') > 0) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
            ];

            $this->model_belajar->simpanUser($data);
            return redirect()->to(base_url('home/user'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editUser($id)
    {
        if (session()->get('id') > 0) {
            $data['user'] = $this->model_belajar->getUserById($id);
            echo view('header.php');
            echo view('menu.php');
            echo view('edit_user.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateUser($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),

            ];

            $this->model_belajar->updateUser($id, $data);
            return redirect()->to(base_url('home/user'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusUser($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('user', ['id_user' => $id]);
            return redirect()->to(base_url('home/user'));
        } else {
            return redirect()->to('home');
        }
    }


    public function karyawan()
    {
        if (session()->get('level') == 1) {
            $Model_belajar = new Model_belajar();
            $data['takdirestui'] = $Model_belajar->join('karyawan', 'user', 'karyawan.id_user = user.id_user');
            echo view('header.php');
            echo view('menu.php');
            echo view('karyawan.php', $data);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/karyawan');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahKaryawan()
    {
        if (session()->get('level') == 1) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_karyawan.php');
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/karyawan');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanKaryawan()
    {
        if (session()->get('level') == 1) {

            $a = $this->request->getPost('nama');
            $b = $this->request->getPost('email');
            $c = $this->request->getPost('password');
            $d = $this->request->getPost('level');
            $e = $this->request->getPost('NIK');
            $f = $this->request->getPost('tempat_lahir');
            $g = $this->request->getPost('tanggal_lahir');
            $h = $this->request->getPost('jenis_kelamin');
            $i = $this->request->getPost('alamat');
            $j = $this->request->getPost('no_hp');

            $Joyce = new Model_belajar;

            $data = array(
                "username" => $b,
                "password" => $c,
                "level" => $d
            );
            $Joyce->input('user', $data);

            $where = array(
                "username" => $b
            );
            $wendy = $Joyce->getWhere('user', $where);
            echo $wendy->id_user;
            $data2 = array(
                "id_user" => $wendy->id_user,
                "nama" => $a,
                "NIK" => $e,
                "tempat_lahir" => $f,
                "tanggal_lahir" => $g,
                "jenis_kelamin" => $h,
                "alamat" => $i,
                "no_hp" => $j
            );
            $Joyce->input('karyawan', $data2);



            return redirect()->to(base_url('home/karyawan'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editKaryawan($id_user)
    {
        if (session()->get('level') == 1) {
            $model = new Model_belajar();
            $data['karyawan'] = $model->getWhere('karyawan', ['id_user' => $id_user]);
            if ($data['karyawan'] !== null) {
                echo view('header.php');
                echo view('menu.php');
                echo view('edit_karyawan', $data);
                echo view('footer.php');
            } else {
                return redirect()->to('home/karyawan');
            }
        } else {
            return redirect()->to('home');
        }
    }


    public function edit_karyawan($id)
    {

        $Joyce = new Model_belajar;
        $wece = array('karyawan.id_user' => $id);
        $wendy['takdirestui'] = $Joyce->joinw('karyawan', 'user', 'karyawan.id_user=user.id_user', $wece);
        echo view('header.php');
        echo view('menu.php');
        echo view('karyawan', $wendy);
        echo view('footer.php');
    }
    public function hapus_karyawan($id)
    {
        $Joyce = new Model_belajar;
        $wece = array('id_user' => $id);
        $Joyce->hapus('karyawan', $wece);
        $Joyce->hapus('user', $wece);
        return redirect()->to('home/karyawan');
    }

    public function simpan_kry()
    {
        $a = $this->request->getPost('nama');
        $b = $this->request->getPost('email');
        $c = $this->request->getPost('password');
        $d = $this->request->getPost('level');
        $e = $this->request->getPost('NIK');
        $f = $this->request->getPost('tempat_lahir');
        $g = $this->request->getPost('tanggal_lahir');
        $h = $this->request->getPost('jenis_kelamin');
        $i = $this->request->getPost('alamat');
        $j = $this->request->getPost('no_hp');

        $where = array(
            "id_user" => $id
        );
        $Joyce = new Model_belajar;
        $data = array(
            "username" => $b,
            "level" => $d
        );
        $Joyce->edit('user', $data, $where);
        // echo $wendy->id_user;
        $data2 = array(
            "nama" => $a,
            "NIK" => $e,
            "tempat_lahir" => $f,
            "tanggal_lahir" => $g,

            "alamat" => $i,
            "no_hp" => $j,
        );
        print_r($where);
        $Joyce->edit('karyawan', $data2, $where);
        return redirect()->to('home/karyawan');
    }

    public function updateKaryawan($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'NIK' => $this->request->getPost('NIK'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
            ];

            $this->model_belajar->edit('karyawan', $data, ['id_karyawan' => $id]);
            return redirect()->to(base_url('home/karyawan'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusKaryawan($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('karyawan', ['id_karyawan' => $id]);
            return redirect()->to(base_url('home/karyawan'));
        } else {
            return redirect()->to('home');
        }
    }
    public function usr()
    {
        if (session()->get('level') == 1) {
            $Joyce = new Model_belajar;
            $wendy['takdirestui'] = $Joyce->tampil('user');
            echo view('header.php');
            echo view('menu.php');
            echo view('reset.php', $wendy);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }
    // public function rpl()
    // { 
    //     echo "Sim";
    // }
    // public function rpl1()
    // { 
    //     echo "Kevin";
    // }
    // public function rpl2()
    // { 
    //     echo "Chloe";
    // }
    // public function rpl3()
    // { 
    //     echo "Antoni";
    // }
    // public function rpl4()
    // {
    //     echo "Reyhan";
    // }
    // public function formbarang()
    // {
    //     return view('formtambahdata.php');
    // }
    // public function tugasvideo()
    // {
    //     return view('tugasvideo.php');
    // }
    public function suratkeluar()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $Joyce = new Model_belajar;
            $where = ('id_suratkeluar');
            $wendy['takdirestui'] = $Joyce->join('surat_keluar', 'surat', 'surat_keluar.id_surat = surat.id_surat', $where);
            echo view('header.php');
            echo view('menu.php');
            echo view('suratkeluar.php', $wendy);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }
    public function dashboard()
    {
        if (in_array(session()->get('level'), [1, 2, 3, 4])) {

            // Access the database service
            $db = \Config\Database::connect();

            // Query the Surat Masuk count
            $suratMasukCount = $db->table('surat_masuk')->countAllResults();

            // Query the Surat Keluar count
            $suratKeluarCount = $db->table('surat_keluar')->countAllResults();

            // Query the Cuti count
            $cutiCount = $db->table('cuti')->countAllResults();

            // Pass data to view
            $data = [
                'suratMasukCount' => $suratMasukCount,
                'suratKeluarCount' => $suratKeluarCount,
                'cutiCount' => $cutiCount
            ];

            // Load views
            echo view('header.php');
            echo view('menu.php');
            echo view('dashboard.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }


    public function reset()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('reset.php');
        echo view('footer.php');
    }
    public function aksireset()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('aksireset.php');
        echo view('footer.php');
    }
    public function ls()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('ls.php');
        echo view('footer.php');
    }
    public function lsm()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('lsm.php');
        echo view('footer.php');
    }
    public function lapsm()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->filter('surat_masuk', 'surat', 'surat_masuk.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);
        echo view('lap_sm.php', $wendy);
    }
    public function lapsk()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->filter('surat_keluar', 'surat', 'surat_keluar.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);
        echo view('lap_sk.php', $wendy);
    }
    public function laps()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->tampil('surat');
        echo view('lap_s.php', $wendy);
    }
    public function pdfsm()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy = $Joyce->filter('surat_masuk', 'surat', 'surat_masuk.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);

        $pdf = new TCPDF();


        $pdf->SetCreator('TCPDF');
        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('Laporan Surat Masuk Office');
        $pdf->SetSubject('Laporan PDF');
        $pdf->SetKeywords('TCPDF, PDF, laporan, surat, masuk');


        $pdf->AddPage();


        $html = view('pdf_sm', ['takdirestui' => $wendy]);


        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->Output('laporan_surat_masuk.pdf', 'D');
    }

    public function pdfsk()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy = $Joyce->filter('surat_keluar', 'surat', 'surat_keluar.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);

        $pdf = new TCPDF();


        $pdf->SetCreator('TCPDF');
        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('Laporan Surat Keluar Office');
        $pdf->SetSubject('Laporan PDF');
        $pdf->SetKeywords('TCPDF, PDF, laporan, surat, keluar');


        $pdf->AddPage();


        $html = view('pdf_sk', ['takdirestui' => $wendy]);


        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->Output('laporan_surat_keluar.pdf', 'D');
    }
    public function pdfs()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->tampil('surat');

        $pdf = new TCPDF();

        // Setel metadata dasar PDF
        $pdf->SetCreator('TCPDF');
        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('Laporan Surat');
        $pdf->SetSubject('Laporan PDF');
        $pdf->SetKeywords('TCPDF, PDF, laporan, surat');

        // Atur halaman PDF
        $pdf->AddPage();

        // Load view and capture output
        $html = view('pdf_s', ['takdirestui' => $wendy]);

        // Render HTML ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output file PDF
        $pdf->Output('laporan_surat.pdf', 'D'); // 'D' untuk download, 'I' untuk menampilkan di browser
    }
    public function excelsm()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->filter('surat_masuk', 'surat', 'surat_masuk.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);
        echo view('excel_sm.php', $wendy);
    }
    public function excelsk()
    {
        $Joyce = new Model_belajar;
        $a = $this->request->getpost('tanggalawal');
        $b = $this->request->getpost('tanggalakhir');
        $wendy['takdirestui'] = $Joyce->filter('surat_keluar', 'surat', 'surat_keluar.id_surat = surat.id_surat', 'tanggal >=', 'tanggal <=', $a, $b);
        echo view('excel_sk.php', $wendy);
    }
    public function dompdfsm()
    {
        // Ambil input tanggal dari form
        $a = $this->request->getPost('tanggalawal');
        $b = $this->request->getPost('tanggalakhir');

        // Validasi tanggal
        if (!$a || !$b) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong.');
        }

        // Menggunakan model untuk filter data
        $model = new Model_belajar();

        // Memanggil method filter dari model untuk mengambil data sesuai tanggal
        // Ganti parameter sesuai dengan kebutuhan query Anda
        $wendy = $model->filter(
            'surat_masuk',           // Nama tabel pertama
            'surat',                 // Nama tabel kedua untuk join
            'surat_masuk.id_surat = surat.id_surat',  // Kondisi join
            'tanggal >=',       // Kondisi where tanggal awal
            'tanggal <=',       // Kondisi where tanggal akhir
            $a,                       // Nilai tanggal awal
            $b                        // Nilai tanggal akhir
        );

        // Memuat Dompdf
        $dompdf = new Dompdf();

        // Menyusun HTML untuk laporan menggunakan view
        $html = view('dom_pdfsm', ['takdirestui' => $wendy, 'tanggalawal' => $a, 'tanggalakhir' => $b]);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set ukuran kertas dan orientasi (landscape)
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('laporan_masuk.pdf', ["Attachment" => false]);  // "false" untuk membuka di browser, "true" untuk download otomatis
    }
    public function dompdfsk()
    {
        // Ambil input tanggal dari form
        $a = $this->request->getPost('tanggalawal');
        $b = $this->request->getPost('tanggalakhir');

        // Validasi tanggal
        if (!$a || !$b) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong.');
        }

        // Menggunakan model untuk filter data
        $model = new Model_belajar();

        // Memanggil method filter dari model untuk mengambil data sesuai tanggal
        // Ganti parameter sesuai dengan kebutuhan query Anda
        $wendy = $model->filter(
            'surat_keluar',           // Nama tabel pertama
            'surat',                 // Nama tabel kedua untuk join
            'surat_keluar.id_surat = surat.id_surat',  // Kondisi join
            'tanggal >=',       // Kondisi where tanggal awal
            'tanggal <=',       // Kondisi where tanggal akhir
            $a,                       // Nilai tanggal awal
            $b                        // Nilai tanggal akhir
        );

        // Memuat Dompdf
        $dompdf = new Dompdf();

        // Menyusun HTML untuk laporan menggunakan view
        $html = view('dom_pdfsk', ['takdirestui' => $wendy, 'tanggalawal' => $a, 'tanggalakhir' => $b]);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set ukuran kertas dan orientasi (landscape)
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('laporan_keluar.pdf', ["Attachment" => false]);  // "false" untuk membuka di browser, "true" untuk download otomatis
    }
    public function lsk()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('lsk.php');
        echo view('footer.php');
    }
    public function surat()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $Joyce = new Model_belajar;
            $where = ('id_surat');
            $wendy['takdirestui'] = $Joyce->tampil('surat', $where);
            echo view('header.php');
            echo view('menu.php');
            echo view('surat.php', $wendy);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }
    public function suratmasuk()
    {
        if (in_array(session()->get('level'), [1, 2, 3, 4])) {
            $Joyce = new Model_belajar;

            // Nama dari session
            $sessionNama = session()->get('nama');

            // Filter untuk mengambil data berdasarkan pengirim atau penerima
            $where = [
                'surat_masuk.penerima' => $sessionNama,
                'surat_masuk.pengirim' => $sessionNama
            ];

            $wendy['takdirestui'] = $Joyce->joinWhere(
                'surat_masuk',
                'surat',
                'surat_masuk.id_surat = surat.id_surat',
                $where
            );

            echo view('header.php');
            echo view('menu.php');
            echo view('suratmasuk.php', $wendy);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }

    public function download_surat($id_suratmasuk)
    {
        $Joyce = new Model_belajar(); // Ganti dengan model Anda

        // Ambil data surat berdasarkan ID
        $surat = $Joyce->getWhere('surat_masuk', ['id_suratmasuk' => $id_suratmasuk])->getRow();

        if ($surat && !empty($surat->file)) {
            // Perbarui status menjadi "Sudah Dibaca"
            $Joyce->update('surat_masuk', ['status' => 'Sudah Dibaca'], ['id_suratmasuk' => $id_suratmasuk]);

            // Path file
            $filePath = WRITEPATH . 'uploads/' . $surat->file;

            if (file_exists($filePath)) {
                return $this->response->download($filePath, null); // Mengunduh file
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Data surat tidak valid atau file tidak tersedia.');
        }
    }
    public function updateStatusSuratMasuk($id_suratmasuk)
    {
        // Mengecek apakah user sudah login dan session nama sesuai penerima
        if (session()->get('nama')) {
            // Load the SuratMasukModel
            $model = new \App\Models\SuratMasukModel();

            // Call the updateStatus method to update the 'status'
            if ($model->updateStatus($id_suratmasuk, 'Sudah Dibaca')) {
                // Redirect back to the Surat Masuk page if update is successful
                return redirect()->to(base_url('home/suratmasuk'));
            } else {
                // Handle update failure
                return redirect()->to(base_url('home/suratmasuk'))->with('error', 'Failed to update status');
            }
        } else {
            // If session is not valid, redirect to home
            return redirect()->to(base_url('home'));
        }
    }

    public function updateStatusSuratKeluar($id_suratkeluar)
    {
        // Mengecek apakah user sudah login dan session nama sesuai penerima
        if (session()->get('nama')) {
            // Load the SuratKeluarModel
            $model = new \App\Models\SuratKeluarModel();

            // Call the updateStatus method to update the 'status' field
            if ($model->updateStatus($id_suratkeluar, 'Sudah Dibaca')) {
                // Redirect back to the Surat Keluar page if update is successful
                return redirect()->to(base_url('home/suratkeluar'));
            } else {
                // Handle update failure
                return redirect()->to(base_url('home/suratkeluar'))->with('error', 'Failed to update status');
            }
        } else {
            // If session is not valid, redirect to home
            return redirect()->to(base_url('home'));
        }
    }



    public function gudanglogin()
    {
        return view('gudanglogin.php');
    }
    public function gudanguser()
    {
        echo view('header.php');
        echo view('gudanguser.php');
        echo view('footer.php');
    }

    public function userr()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar;
            $wendy['takdirestui'] = $Joyce->tampil('user');
            echo view('header.php');
            echo view('menu.php');
            echo view('user.php', $wendy);
            echo view('footer.php');
        } else if (session()->get('level') > 0) {
            return redirect()->to('home/error');
        } else {
            return redirect()->to('home');
        }
    }
    public function hapus_surat($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $wece = array('id_surat' => $id);
            $wendy['takdirestui'] = $Joyce->hapus('surat', $wece);
            return redirect()->to('home/surat');
        } else {
            return redirect()->to('home');
        }
    }
    public function hapus_suratt($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $wece = array('id_suratmasuk' => $id);
            $wendy['takdirestui'] = $Joyce->hapus('surat_masuk', $wece);
            return redirect()->to('home/suratmasuk');
        } else {
            return redirect()->to('home');
        }
    }
    public function hapus_surattt($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $wece = array('id_suratkeluar' => $id);
            $wendy['takdirestui'] = $Joyce->hapus('surat_keluar', $wece);
            return redirect()->to('home/suratkeluar');
        } else {
            return redirect()->to('home');
        }
    }
    public function hapus_barangggg($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $wece = array('id_user' => $id);
            $wendy['takdirestui'] = $Joyce->hapus('user', $wece);
            return redirect()->to('home/userr');
        } else {
            return redirect()->to('home');
        }
    }
    public function hapus_baranggggg($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $wece = array('id_karyawan' => $id);
            $wendy['takdirestui'] = $Joyce->hapus('karyawan', $wece);
            return redirect()->to('home/karyawan');
        } else {
            return redirect()->to('home');
        }
    }
    public function tambahsuratkeluar()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();

            // Ambil data surat
            $data['surat'] = $Joyce->tampil('surat', 'id_surat');

            // Ambil daftar karyawan
            $data['karyawan'] = $Joyce->tampil('karyawan', 'id_karyawan');

            echo view('header.php');
            echo view('menu.php');
            echo view('tambahsuratkeluar.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }


    public function simpansuratkeluar()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();

            // Ambil data dari form
            $id_surat = $this->request->getPost('id_surat');
            $jumlah = $this->request->getPost('jumlah');
            $tanggal = $this->request->getPost('tanggal');
            $pengirim = $this->request->getPost('pengirim');
            $status = "Belum Dibaca"; // Default status

            // Ambil penerima dari form
            $penerimaList = [
                $this->request->getPost('penerima1'),
                $this->request->getPost('penerima2'),
                $this->request->getPost('penerima3'),
                $this->request->getPost('penerima4'),
                $this->request->getPost('penerima5'),
            ];

            // Filter penerima yang tidak kosong
            $penerimaList = array_filter($penerimaList, function ($penerima) {
                return !empty($penerima);
            });

            // Handling file upload
            $file = $this->request->getFile('file'); // Ambil file dari input
            $fileName = '';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName(); // Generate nama file acak

                // Tentukan path folder upload
                $uploadPath = ROOTPATH . 'public/uploads/';

                // Pastikan folder uploads ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true); // Buat folder jika belum ada
                }

                // Simpan file ke folder public/uploads
                $file->move($uploadPath, $fileName);
            }

            // Iterasi melalui setiap penerima dan simpan data ke database
            foreach ($penerimaList as $penerima) {
                // Siapkan data untuk disimpan
                $data = [
                    "id_surat" => $id_surat,
                    "pengirim" => $pengirim,
                    "penerima" => $penerima,
                    "jumlah" => $jumlah,
                    "tanggal" => $tanggal,
                    "file" => $fileName, // Nama file yang sudah diunggah
                    "status" => $status,
                ];

                // Simpan ke database
                $Joyce->input('surat_keluar', $data);
            }

            // Redirect ke halaman surat masuk dengan pesan sukses
            return redirect()->to(base_url('home/suratkeluar'))->with('success', 'Surat keluar berhasil disimpan.');
        } else {
            return redirect()->to('home');
        }
    }


    public function update_suratkeluar($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $data = [
                'id_surat' => $this->request->getPost('id_surat'),
                'jumlah' => $this->request->getPost('jumlah'),
                'tanggal' => $this->request->getPost('tanggal'),
            ];

            $Joyce->edit('surat_keluar', $data, ['id_suratkeluar' => $id]);
            return redirect()->to(base_url('home/suratkeluar'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapus_suratkeluar($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $Joyce->hapus('surat_keluar', ['id_suratkeluar' => $id]);
            return redirect()->to(base_url('home/suratkeluar'));
        } else {
            return redirect()->to('home');
        }
    }

    public function inputsuratkeluar()
    {
        if (session()->get('id') > 0) {
            $model = new M_belajar();
            $data = array(
                'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
                'id_surat' => $this->request->getPost('id_surat'),
                'id_user' => $this->request->getPost('id_user'),
                'jumlah' => $this->request->getPost('jumlah'),
                'tanggal' => $this->request->getPost('tanggal_keluar')
            );

            $model->input('surat_keluar', $data);
            return redirect()->to('suratkeluar');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahsurat()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambahsurat.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }


    public function simpansurat()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $data = [
                'nama_surat' => $this->request->getPost('nama_surat'),
                'kode_surat' => $this->request->getPost('kode_surat'),
                'total_dokumen' => $this->request->getPost('total_dokumen'),
            ];

            $Joyce->input('surat', $data);
            return redirect()->to(base_url('home/surat'));
        } else {
            return redirect()->to('home');
        }
    }


    public function editsurat($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $surat = $Joyce->getWhere('surat', ['id_surat' => $id]);

            if (!$surat) {
                throw new \Exception("Surat with ID: $id not found.");
            }

            $data['surat'] = $surat;
            echo view('header.php');
            echo view('menu.php');
            echo view('editsurat.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updatesurat($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $data = [
                'nama_surat' => $this->request->getPost('nama_surat'),
                'kode_surat' => $this->request->getPost('kode_surat'),
                'total_dokumen' => $this->request->getPost('total_dokumen'),
            ];

            $Joyce->edit('surat', $data, ['id_surat' => $id]);
            return redirect()->to(base_url('home/surat'));
        } else {
            return redirect()->to('home');
        }
    }


    public function hapussurat($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $Joyce->hapus('surat', ['id_surat' => $id]);
            return redirect()->to(base_url('home/surat'));
        } else {
            return redirect()->to('home');
        }
    }


    public function tambahsuratmasuk()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();

            // Ambil data surat
            $data['surat'] = $Joyce->tampil('surat', 'id_surat');

            // Ambil daftar karyawan
            $data['karyawan'] = $Joyce->tampil('karyawan', 'id_karyawan');

            echo view('header.php');
            echo view('menu.php');
            echo view('tambahsuratmasuk.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }


    public function simpansuratmasuk()
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();

            // Ambil data dari form
            $id_surat = $this->request->getPost('id_surat');
            $jumlah = $this->request->getPost('jumlah');
            $tanggal = $this->request->getPost('tanggal');
            $pengirim = $this->request->getPost('pengirim');
            $status = "Belum Dibaca"; // Default status

            // Ambil penerima dari form
            $penerimaList = [
                $this->request->getPost('penerima1'),
                $this->request->getPost('penerima2'),
                $this->request->getPost('penerima3'),
                $this->request->getPost('penerima4'),
                $this->request->getPost('penerima5'),
            ];

            // Filter penerima yang tidak kosong
            $penerimaList = array_filter($penerimaList, function ($penerima) {
                return !empty($penerima);
            });

            // Handling file upload
            $file = $this->request->getFile('file'); // Ambil file dari input
            $fileName = '';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName(); // Generate nama file acak

                // Tentukan path folder upload
                $uploadPath = ROOTPATH . 'public/uploads/';

                // Pastikan folder uploads ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true); // Buat folder jika belum ada
                }

                // Simpan file ke folder public/uploads
                $file->move($uploadPath, $fileName);
            }

            // Iterasi melalui setiap penerima dan simpan data ke database
            foreach ($penerimaList as $penerima) {
                // Siapkan data untuk disimpan
                $data = [
                    "id_surat" => $id_surat,
                    "pengirim" => $pengirim,
                    "penerima" => $penerima,
                    "jumlah" => $jumlah,
                    "tanggal" => $tanggal,
                    "file" => $fileName, // Nama file yang sudah diunggah
                    "status" => $status,
                ];

                // Simpan ke database
                $Joyce->input('surat_masuk', $data);
            }

            // Redirect ke halaman surat masuk dengan pesan sukses
            return redirect()->to(base_url('home/suratmasuk'))->with('success', 'Surat masuk berhasil disimpan.');
        } else {
            return redirect()->to('home');
        }
    }


    public function update_suratmasuk($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $data = [
                'id_surat' => $this->request->getPost('id_surat'),
                'jumlah' => $this->request->getPost('jumlah'),
                'tanggal' => $this->request->getPost('tanggal'),
            ];

            $Joyce->edit('surat_masuk', $data, ['id_suratmasuk' => $id]);
            return redirect()->to(base_url('home/suratmasuk'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapus_suratmasuk($id)
    {
        if (session()->get('id') > 0) {
            $Joyce = new Model_belajar();
            $Joyce->hapus('surat_masuk', ['id_suratmasuk' => $id]);
            return redirect()->to(base_url('home/suratmasuk'));
        } else {
            return redirect()->to('home');
        }
    }


    public function __construct()
    {
        if (session()->get('id') > 0) {
            $this->model_belajar = new Model_belajar();
            return redirect()->to('home');
        } else {
            return redirect()->to('home');
        }
    }

    public function DetailSuratMasuk()
    {
        $Joyce = new Model_belajar();

        $where = ('id_suratmasuk');
        $data['surat'] = $Joyce->tampil('surat_masuk', $where);
        echo view('header.php');
        echo view('menu.php');
        echo view('detailsuratmasuk.php', $data);
        echo view('footer.php');
    }

    public function arsipSurat()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $data['arsip_surat'] = $this->model_belajar->tampil('arsip_surat', 'tanggal_arsip');

            echo view('header.php');
            echo view('menu.php');
            echo view('arsip_surat.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahArsipSurat()
    {
        if (session()->get('id') > 0) {
            $data['penerima_khusus'] = $this->model_belajar->getPenerimaKhusus();

            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_arsip_surat.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanArsipSurat()
    {
        if (session()->get('id') > 0) {
            $penerima_disposisi = $this->request->getPost('penerima_khusus');

            $data = [
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'tanggal_arsip' => $this->request->getPost('tanggal_arsip'),
                'lokasi_arsip' => $this->request->getPost('lokasi_arsip'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'penerima_disposisi' => $penerima_disposisi,
            ];

            $this->model_belajar->input('arsip_surat', $data);

            return redirect()->to(base_url('home/arsipSurat'))->with('success', 'Arsip Surat berhasil disimpan!');
        } else {
            return redirect()->to('home');
        }
    }

    public function editArsipSurat($id)
    {
        if (session()->get('id') > 0) {
            $data['arsip_surat'] = $this->model_belajar->getWhere('arsip_surat', ['id_arsip' => $id]);
            $data['penerima_khusus'] = $this->model_belajar->getPenerimaKhusus();

            echo view('header.php');
            echo view('menu.php');
            echo view('edit_arsip_surat.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateArsipSurat($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'tanggal_arsip' => $this->request->getPost('tanggal_arsip'),
                'lokasi_arsip' => $this->request->getPost('lokasi_arsip'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'penerima_disposisi' => $this->request->getPost('penerima_khusus')
            ];

            $this->model_belajar->edit('arsip_surat', $data, ['id_arsip' => $id]);
            return redirect()->to(base_url('home/arsipSurat'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusArsipSurat($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('arsip_surat', ['id_arsip' => $id]);
            return redirect()->to(base_url('home/arsipSurat'));
        } else {
            return redirect()->to('home');
        }
    }



    public function dokumenKepegawaian()
    {
        if (session()->get('id') > 0) {
            // Ambil data dokumen kesiswaan berdasarkan tanggal_upload
            $data['dokumen_kepegawaian'] = $this->model_belajar->tampil('dokumen_kepegawaian', 'tanggal_upload');

            // Load tampilan
            echo view('header.php');
            echo view('menu.php');
            echo view('dokumen_kepegawaian.php', $data);  // Nama view 'dokumen_kesiswaan.php'
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahDokumenKepegawaian()
    {
        if (session()->get('id') > 0) {
            // Load form tambah dokumen kesiswaan
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_dokumen_kepegawaian.php');  // Nama view 'tambah_dokumen_kesiswaan.php'
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanDokumenKepegawaian()
    {
        if (session()->get('id') > 0) {
            // Ambil data dari form input
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            // Simpan data ke tabel dokumen_kesiswaan
            $this->model_belajar->input('dokumen_kepegawaian', $data);
            return redirect()->to(base_url('home/dokumenKepegawaian'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editDokumenKepegawaian($id)
    {
        if (session()->get('id') > 0) {
            // Ambil data dokumen kesiswaan berdasarkan ID
            $data['dokumen_kepegawaian'] = $this->model_belajar->getWhere('dokumen_kepegawaian', ['id_dokumen' => $id]);

            // Load form edit dokumen kesiswaan
            echo view('header.php');
            echo view('menu.php');
            echo view('edit_dokumen_kepegawaian.php', $data);  // Nama view 'edit_dokumen_kesiswaan.php'
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateDokumenKepegawaian($id)
    {
        if (session()->get('id') > 0) {
            // Ambil data dari form input
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            // Update data dokumen kesiswaan
            $this->model_belajar->edit('dokumen_kepegawaian', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenKepegawaian'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusDokumenKepegawaian($id)
    {
        if (session()->get('id') > 0) {
            // Hapus data dokumen kesiswaan berdasarkan ID
            $this->model_belajar->hapus('dokumen_kepegawaian', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenKepegawaian'));
        } else {
            return redirect()->to('home');
        }
    }

    public function dokumenKeuangan()
    {
        if (session()->get('id') > 0) {
            // Ambil data dokumen keuangan berdasarkan tanggal_upload
            $data['dokumen_keuangan'] = $this->model_belajar->tampil('dokumen_keuangan', 'tanggal_upload');

            // Load tampilan
            echo view('header.php');
            echo view('menu.php');
            echo view('dokumen_keuangan.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahDokumenKeuangan()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_dokumen_keuangan.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanDokumenKeuangan()
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->input('dokumen_keuangan', $data);
            return redirect()->to(base_url('home/dokumenKeuangan'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editDokumenKeuangan($id)
    {
        if (session()->get('id') > 0) {
            $data['dokumen_keuangan'] = $this->model_belajar->getWhere('dokumen_keuangan', ['id_dokumen' => $id]);

            echo view('header.php');
            echo view('menu.php');
            echo view('edit_dokumen_keuangan.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateDokumenKeuangan($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->edit('dokumen_keuangan', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenKeuangan'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusDokumenKeuangan($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('dokumen_keuangan', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenKeuangan'));
        } else {
            return redirect()->to('home');
        }
    }


    public function dokumenAkademik()
    {
        if (session()->get('id') > 0) {
            // Ambil data dokumen akademik berdasarkan tanggal_upload
            $data['dokumen_akademik'] = $this->model_belajar->tampil('dokumen_akademik', 'tanggal_upload');

            // Load tampilan
            echo view('header.php');
            echo view('menu.php');
            echo view('dokumen_akademik.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahDokumenAkademik()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_dokumen_akademik.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanDokumenAkademik()
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->input('dokumen_akademik', $data);
            return redirect()->to(base_url('home/dokumenAkademik'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editDokumenAkademik($id)
    {
        if (session()->get('id') > 0) {
            $data['dokumen_akademik'] = $this->model_belajar->getWhere('dokumen_akademik', ['id_dokumen' => $id]);

            echo view('header.php');
            echo view('menu.php');
            echo view('edit_dokumen_akademik.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateDokumenAkademik($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->edit('dokumen_akademik', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenAkademik'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusDokumenAkademik($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('dokumen_akademik', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenAkademik'));
        } else {
            return redirect()->to('home');
        }
    }




    public function dokumenUmumSekolah()
    {
        if (session()->get('id') > 0) {
            // Get the documents sorted by upload date
            $data['dokumen_umum_sekolah'] = $this->model_belajar->tampil('dokumen_umum_sekolah', 'tanggal_upload');

            // Load views
            echo view('header.php');
            echo view('menu.php');
            echo view('dokumen_umum_sekolah.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahDokumenUmumSekolah()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_dokumen_umum_sekolah.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanDokumenUmumSekolah()
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->input('dokumen_umum_sekolah', $data);
            return redirect()->to(base_url('home/dokumenUmumSekolah'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editDokumenUmumSekolah($id)
    {
        if (session()->get('id') > 0) {
            $data['dokumen_umum_sekolah'] = $this->model_belajar->getWhere('dokumen_umum_sekolah', ['id_dokumen' => $id]);

            echo view('header.php');
            echo view('menu.php');
            echo view('edit_dokumen_umum_sekolah.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateDokumenUmumSekolah($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'status' => $this->request->getPost('status'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->model_belajar->edit('dokumen_umum_sekolah', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenUmumSekolah'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusDokumenUmumSekolah($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('dokumen_umum_sekolah', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumenUmumSekolah'));
        } else {
            return redirect()->to('home');
        }
    }


    public function dokumen()
    {
        if (session()->get('id') > 0) {
            $data['dokumen'] = $this->model_belajar->tampil('dokumen', 'tanggal_dokumen');
            // Debugging line to check data structure
            // Load views
            echo view('header.php');
            echo view('menu.php');
            echo view('dokumen.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }


    public function tambahDokumen()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_dokumen.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanDokumen()
    {
        if (session()->get('id') > 0) {
            // Handle file upload
            $file = $this->request->getFile('file');
            $filePath = '';
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move('uploads/documents');
                $filePath = 'uploads/documents/' . $file->getName();
            }

            // Prepare data for insertion
            $data = [
                'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'departemen' => $this->request->getPost('departemen'),
                'tanggal_dokumen' => $this->request->getPost('tanggal_dokumen'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $filePath
            ];

            $this->model_belajar->input('dokumen', $data);
            return redirect()->to(base_url('home/dokumen'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editDokumen($id)
    {
        if (session()->get('id') > 0) {
            $data['dokumen'] = $this->model_belajar->getWhere('dokumen', ['id_dokumen' => $id]);

            echo view('header.php');
            echo view('menu.php');
            echo view('edit_dokumen.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function updateDokumen($id)
    {
        if (session()->get('id') > 0) {
            $data = [
                'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
                'kategori' => $this->request->getPost('kategori'),
                'departemen' => $this->request->getPost('departemen'),
                'tanggal_dokumen' => $this->request->getPost('tanggal_dokumen'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $filePath
            ];

            $this->model_belajar->edit('dokumen', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumen'));
        } else {
            return redirect()->to('home');
        }
    }


    public function hapusDokumen($id)
    {
        if (session()->get('id') > 0) {
            $this->model_belajar->hapus('dokumen', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/dokumen'));
        } else {
            return redirect()->to('home');
        }
    }


    public function berkas()
    {
        if (session()->get('id') > 0) {

            $data['berkas'] = $this->model_belajar->eltampil('berkas');

            echo view('header.php');
            echo view('menu.php');
            echo view('berkas.php', $data);
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function tambahBerkas()
    {
        if (session()->get('id') > 0) {
            echo view('header.php');
            echo view('menu.php');
            echo view('tambah_berkas.php');
            echo view('footer.php');
        } else {
            return redirect()->to('home');
        }
    }

    public function simpanBerkas()
    {
        if (session()->get('id') > 0) {
            // Handle file upload
            $file = $this->request->getFile('file');
            $filePath = '';
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move('uploads/documents');
                $filePath = 'uploads/documents/' . $file->getName();
            }


            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'nama_file' => $this->request->getPost('nama_file'),
                'jenis_file' => $this->request->getPost('jenis_file'),
                'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
                'file' => $filePath, // Uploaded file path
                'status' => $this->request->getPost('status'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];


            $this->model_belajar->input('berkas', $data);
            return redirect()->to(base_url('home/berkas'));
        } else {
            return redirect()->to('home');
        }
    }

    public function editBerkas($id)
    {
        if (session()->get('id') > 0) {
            // Ambil dokumen berdasarkan ID
            $berkas = $this->model_belajar->getWhere('berkas', ['id_dokumen' => $id]);

            // Jika dokumen ditemukan, kirim ke view
            if ($berkas) {
                $data['berkas'] = $berkas;
                echo view('header.php');
                echo view('menu.php');
                echo view('edit_berkas.php', $data);
                echo view('footer.php');
            } else {
                return redirect()->to('home/berkas');
            }
        } else {
            return redirect()->to('home');
        }
    }

    public function updateBerkas($id)
    {
        if (session()->get('id') > 0) {
            // Handle file upload if new file is selected
            $file = $this->request->getFile('file');
            $filePath = '';

            // Only move the file if a new one was uploaded
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Menambahkan timestamp untuk menghindari duplikasi file
                $fileName = time() . '_' . $file->getName();
                $file->move('uploads/documents', $fileName);
                $filePath = 'uploads/documents/' . $fileName;
            }

            // Retrieve form data
            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'nama_file' => $this->request->getPost('nama_file'),
                'jenis_file' => $this->request->getPost('jenis_file'),
                'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
                'status' => $this->request->getPost('status'),
                'tanggal_upload' => $this->request->getPost('tanggal_upload'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            // If a new file was uploaded, update the file path
            if ($filePath) {
                $data['file'] = $filePath;
            }


            $this->model_belajar->edit('berkas', $data, ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/berkas'));
        } else {
            return redirect()->to('home');
        }
    }

    public function hapusBerkas($id)
    {
        if (session()->get('id') > 0) {

            $this->model_belajar->hapus('berkas', ['id_dokumen' => $id]);
            return redirect()->to(base_url('home/berkas'));
        } else {
            return redirect()->to('home');
        }
    }
    public function usersprofile()
    {
        echo view('header.php');
        echo view('menu.php');
        echo view('users-profile.php');
        echo view('footer.php');
    }
}
