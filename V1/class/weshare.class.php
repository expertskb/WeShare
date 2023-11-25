<?php

namespace Shakib;

class WeShare
{

    private $url = 'https://xyzcdn.eu.org';
    private $version = 'v1'; // this work for only free user
    public $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    protected function Getload($url, $token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    protected function Postload($url, $token, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    protected function Putload($url, $token, $putData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($putData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    protected function Deleteload($url, $token, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function FileInfo($file_id)
    {
        $apiurl = $this->url . '/api/' . $this->version . '/file/info?file_id=' . $file_id;
        $apiuser = $this->url . '/api/' . $this->version . '/user/status';

        $userver = $this->Getload($apiuser, $this->authToken);
        $userverify = json_decode($userver, true);

        if ($userverify['status'] === 200) {
            $apiu = $this->Getload($apiurl, $this->authToken);
            $data = json_decode($apiu, true);

            if ($data['status'] === 200) {
                return $apiu;
            } else {
                return $apiu;
            }
        } else {
            return $userverify;
        }
    }

    public function FileStore($file_link)
    {
        $apiurl = $this->url . '/api/' . $this->version . '/file/add';
        $apiuser = $this->url . '/api/' . $this->version . '/user/status';

        $userver = $this->Getload($apiuser, $this->authToken);
        $userverify = json_decode($userver, true);

        if ($userverify['status'] === 200) {
            $postData = [
                'file_link' => $file_link
            ];
            $apiu = $this->Postload($apiurl, $this->authToken, $postData);
            $data = json_decode($apiu, true);

            if ($data['status'] === 200) {
                return $apiu;
            } else {
                return $apiu;
            }
        } else {
            return $userverify;
        }
    }


    public function FileUpdate($file_id, $postData)
    {
        $apiurl = $this->url . '/api/' . $this->version . '/file/update?file_id=' . $file_id;
        $apiuser = $this->url . '/api/' . $this->version . '/user/status';

        $userver = $this->Getload($apiuser, $this->authToken);
        $userverify = json_decode($userver, true);

        if ($userverify['status'] === 200) {
            $apiu = $this->Putload($apiurl, $this->authToken, $postData);
            $data = json_decode($apiu, true);

            if ($data['status'] === 200) {
                return $apiu;
            } else {
                return $apiu;
            }
        } else {
            return $userverify;
        }
    }

    public function FileDelete($file_id, $postData)
    {
        $apiurl = $this->url . '/api/' . $this->version . '/file/remove?file_id' . $file_id;
        $apiuser = $this->url . '/api/' . $this->version . '/user/status';

        $userver = $this->Getload($apiuser, $this->authToken);
        $userverify = json_decode($userver, true);

        if ($userverify['status'] === 200) {
            $apiu = $this->Deleteload($apiurl, $this->authToken, $postData);
            $data = json_decode($apiu, true);

            if ($data['status'] === 200) {
                return $apiu;
            } else {
                return $apiu;
            }
        } else {
            return $userverify;
        }
    }

    public function UserInfo()
    {
        $apiuser = $this->url . '/api/' . $this->version . '/user/status';
        $apiuser2 = $this->url . '/api/' . $this->version . '/user/info';

        $userver = $this->Getload($apiuser, $this->authToken);
        $userverify = json_decode($userver, true);

        if ($userverify['status'] === 200) {
            $apiu = $this->Getload($apiuser2, $this->authToken);
            $data = json_decode($apiu, true);

            if ($data['status'] === 200) {
                return $apiu;
            } else {
                return $apiu;
            }
        } else {
            return $userverify;
        }
    }
}
