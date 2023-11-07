<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Barang_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session            = session();
        $usernameAkses      = $session->get('username');
        $token              = $session->get('token');
        $namaBarang         = $this->request->getPost('namaBarang');
        $jenisBarang        = $this->request->getPost('jenisBarang');
        $stok               = $this->request->getPost('stok');
        $hargaJual          = $this->request->getPost('hargaJual');
        $hargaModal         = $this->request->getPost('hargaModal');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/TambahBarang',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "namaBarang" : "'.$namaBarang.'",
            "jenisBarang" : "'.$jenisBarang.'",
            "stok" : "'.$stok.'",
            "hargaJual" : "'.$hargaJual.'",
            "hargaModal" : "'.$hargaModal.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }
    }

    public function editBarang()
    {
        $session            = session();
        $usernameAkses      = $session->get('username');
        $token              = $session->get('token');
        $idBarang           = $this->request->getPost('idBarang');
        $namaBarang         = $this->request->getPost('namaBarang');
        $jenisBarang        = $this->request->getPost('jenisBarang');
        $stok               = $this->request->getPost('stok');
        $hargaJual          = $this->request->getPost('hargaJual');
        $hargaModal         = $this->request->getPost('hargaModal');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/EditBarang/'.$idBarang,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "namaBarang" : "'.$namaBarang.'",
            "jenisBarang" : "'.$jenisBarang.'",
            "stok" : "'.$stok.'",
            "hargaJual" : "'.$hargaJual.'",
            "hargaModal" : "'.$hargaModal.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }
    }

    public function hapusBarang($id)
    {
        $session        = session();
        $usernameAkses  = $session->get('username');
        $token          = $session->get('token');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/APINacos/api/HapusBarang/'.$id.'/'.$usernameAkses,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Barang');
        }
    }
 
}