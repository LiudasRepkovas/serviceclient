<?php


namespace Shortener{

    class Service{

        private $db;
        private $loggedIn = false;
        private $username;
        private $password;

        public function __construct(){
            $this->db = new Database();
        }

        public function handle_request($xml){
            header('Content-type: text/xml');
            $data = $this->parse_xml($xml);
            $this->username = $data['user']['username'];
            $this->password = $data['user']['password'];
            $this->login();
            if($this->isLoggedIn()){
                $short_url = $this->shorten($data['url']['long']);
                $this->sendResponse($short_url, 1);
            } else {
                $this->sendResponse('', 0);
            }
        }
        private function parse_xml($xml){
            $ob= simplexml_load_string($xml);
            $json  = json_encode($ob);
            $xml_array = json_decode($json, true);
            return $xml_array;
        }

        private function sendResponse($short_url = '', $status){
            $response = '<?xml version="1.0" encoding="utf-8"?>';
            $response = $response.'<response><status>'.$status.'</status>';
            if($status == 1){
                $response = $response.'<url><short>'.$short_url.'</short></url></response>';
            } else {
                $response = $response.'<error><description>Invalid credentials</description></error></response>';
            }
            echo $response;
        }

        private function shorten($long_url){
            return $this->db->insert_url($long_url);
        }

        private function login(){
            $user = $this->db->fetch_user($this->username);
            if($user['password'] == $this->password){
                $this->loggedIn = true;
                return true;
            }
            return false;

        }

        private function isLoggedIn(){
            return $this->loggedIn;
        }

        public function redirectToLong(){
            $short_url = explode('/', $_SERVER['REQUEST_URI']);
            return $this->db->fetch_url($short_url[2]);
        }
    }
}
