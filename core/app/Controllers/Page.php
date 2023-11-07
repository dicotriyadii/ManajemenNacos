<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilBarang',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseBarang   = json_decode($response,true);
        $dataBarang            = $hasilResponseBarang['data'];
        return view('dashboard',compact('dataBarang'));
    }

    public function keuanganPenjualan()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilByJenisTransaksi/2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponsePenjualan   = json_decode($response,true);
        $dataPenjualan            = $hasilResponsePenjualan['data'];
        return view('keuangan_Penjualan',compact('dataPenjualan'));
    }

    public function keuanganPengeluaran()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilByJenisTransaksi/3',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponsePengeluaran   = json_decode($response,true);
        $dataPengeluaran            = $hasilResponsePengeluaran['data'];
        return view('keuangan_pengeluaran',compact('dataPengeluaran'));
    }

    public function keuanganModal()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilByJenisTransaksi/4',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseModal   = json_decode($response,true);
        $dataModal            = $hasilResponseModal['data'];
        return view('keuangan_modal',compact('dataModal'));
    }

    public function barang()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Barang
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilBarang',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseBarang   = json_decode($response,true);

        // Api Tampil jenis barang
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilJenisBarang',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseJenisBarang   = json_decode($response,true);
        $dataBarang                 = $hasilResponseBarang['data'];
        $dataJenisBarang            = $hasilResponseJenisBarang['data'];
        return view('barang',compact('dataBarang','dataJenisBarang'));
    }

    public function masterAkses()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilAkses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseAkses   = json_decode($response,true);
        $dataAkses            = $hasilResponseAkses['data'];
        return view('master_akses',compact('dataAkses'));
    }

    public function masterTransaksi()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilTransaksi',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseTransaksi   = json_decode($response,true);
        $dataTransaksi            = $hasilResponseTransaksi['data'];
        return view('master_transaksi',compact('dataTransaksi'));
    }

    public function masterStatus()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilStatus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseStatus   = json_decode($response,true);
        $dataStatus            = $hasilResponseStatus['data'];
        return view('master_status',compact('dataStatus'));
    }

    public function masterJenisBarang()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilJenisBarang',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseJenisBarang   = json_decode($response,true);
        $dataJenisBarang            = $hasilResponseJenisBarang['data'];
        return view('master_jenis_barang',compact('dataJenisBarang'));
    }

    public function user()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilAkses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseHakAkses   = json_decode($response,true);

        // Api Tampil User
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TampilUser',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseUser   = json_decode($response,true);

        $dataHakAkses       = $hasilResponseHakAkses['data'];
        $dataUser           = $hasilResponseUser['data'];
        return view('user',compact('dataHakAkses','dataUser'));
    }
}
