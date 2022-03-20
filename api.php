<?php 

class API{

    protected $username = "foruzeWyjz9g";
    protected $sign = "8a6cbaac-5d5a-5ab2-9e85-8ecdbd2f9f3e";

    public function curl_post($endpoint=null, $data=null)
    {
        $url = 'https://api.digiflazz.com/v1/'.$endpoint;

        $header = array(
            'Content-type: application/json',
            'Accept: application/json'
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data  );

        $result = curl_exec($ch);

        return $result;
    }

    public function getSaldo($cmd=null, $k_cmd=null)
    {
        $username = $this->username;
        $sign = md5($username.$this->sign.$k_cmd);

        $data = [
            "cmd"       => $cmd,
            "username"  => $username,
            "sign"      => $sign
        ];

        $deposit_saldo =  json_decode($this->curl_post("cek-saldo", json_encode($data)));
        
        foreach($deposit_saldo as $key){
            $saldo = $key;
        }
        return json_encode($saldo);
    }

    public function list_harga($cmd=null, $k_cmd=null)
    {
        $username = $this->username;
        $sign = md5($username.$this->sign.$k_cmd);

        $data = [
            "cmd"       => $cmd,
            "username"  => $username,
            "sign"      => $sign
        ];

        $deposit_saldo =  json_decode($this->curl_post("price-list", json_encode($data)));
        
        foreach($deposit_saldo as $key){
            $saldo = $key;
        }
        return json_encode($saldo);
    }

    public function transaksi($k_cmd=null, $sku=null, $no=null, $refid=null, $test = false)
    {
        $username = $this->username;
        $sign = md5($username.$this->sign.$k_cmd);

        $data = [
            "username"       => $username,
            "buyer_sku_code"  => $sku,
            "customer_no"      => $no,
            "ref_id"      => $refid,
            "sign"      => $sign
        ];

        $transaksi =  $this->curl_post("transaction", json_encode($data));
        return $transaksi;
    }

}