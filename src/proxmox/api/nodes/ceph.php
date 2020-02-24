<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 */
namespace proxmox\api\nodes;

use GuzzleHttp\Client;
use proxmox\api\nodes\ceph\flags;
use proxmox\helper\connection;

/**
 * Class ceph
 * @package proxmox\api\nodes
 */
class ceph
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * ceph constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $cookie mixed
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable
    }

    /**
     * @return flags
     */
    public function flags(){
        return new flags($this->httpClient,$this->apiURL.'/flags/',$this->cookie);
    }

    /**
     * @return mixed
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getConfig(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'config',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getConfigDB(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'configdb',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getCrush(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'crush',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getDisks(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'disks',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getLog(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'log',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getRules(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'rules',$this->cookie));
    }

    /**
     * @return mixed
     */
    public function getStatus(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'status',$this->cookie));
    }

    /**
     * @param $param
     * @return mixed
     */
    public function postInit($param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'init',$this->cookie,$param));
    }

    /**
     * @param $param
     * @return mixed
     */
    public function postRestart($param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'restart',$this->cookie,$param));
    }

    /**
     * @param $param
     * @return mixed
     */
    public function postStart($param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'start',$this->cookie,$param));
    }

    /**
     * @param $param
     * @return mixed
     */
    public function postStop($param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'stop',$this->cookie,$param));
    }
}