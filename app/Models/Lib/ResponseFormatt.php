<?php

namespace App\Models\Lib;

use Illuminate\Database\Eloquent\Model;

class ResponseFormatt extends Model {
    private $code;
    private $functions;
    private $response;
    private $isDefaultResponse;
    private $showApiCode;

    public function __construct() {
        $this->isDefaultResponse = false;
        $this->showApiCode = true;
        return $this;
    }

    public function getIsDefaultResponse() {
        return $this->isDefaultResponse;
    }

    public function getShowApiCode() {
        return $this->showApiCode;
    }

    public function getCode() {
        return $this->code;
    }

    public function getFunctions() {
        return $this->functions;
    }

    public function getResponse() {
        return $this->response;
    }

    public function setIsDefaultResponse($isDefaultResponse) {
        $this->isDefaultResponse = $isDefaultResponse;
        return $this;
    }

    public function setShowApiCode($showApiCode) {
        $this->showApiCode = $showApiCode;
        return $this;
    }

    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    public function setFunctions($functions) {
        $this->functions = $functions;
        $this->isDefaultResponse = false;
        return $this;
    }

    public function addFunction($function) {
        $this->functions[] = $function;
        return $this;
    }

    public function setResponse($response) {
        $this->isDefaultResponse = true;
        $this->response = $response;
        return $this;
    }

    public function getResponseFormatt() {
        $conf = env('SHOW_API_CODE');
        if ($this->isDefaultResponse) {
            if ($conf == "true" && $this->showApiCode) {
                return [
                    'code' => $this->code,
                    'response' => $this->response
                ];
            } else {
                return [
                    'response' => $this->response
                ];
            }
        } else {
            if ($conf == "true" && $this->showApiCode) {
                return [
                    'code' => $this->code,
                    'functions' => $this->functions
                ];
            } else {
                return [
                    'functions' => $this->functions
                ];
            }
        }
    }

}
