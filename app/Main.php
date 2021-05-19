<?php

namespace App;
use SplDoublyLinkedList;

class Main
{
    public SplDoublyLinkedList $viettel;
    public SplDoublyLinkedList $mobifone;
    public SplDoublyLinkedList $vinaphone;
    public array $data;

    public function __construct()
    {
        $this->viettel = new SplDoublyLinkedList();
        $this->mobifone = new SplDoublyLinkedList();
        $this->vinaphone = new SplDoublyLinkedList();
        $this->data = [];
    }

    public function filterTel($data)
    {
       $this->data = explode(",", $data);
    }

    public function getViettel()
    {
        $patternViettel = "/^086|^09[6-8]|^03[2-9]/";
        foreach ($this->data as $value) {
            if (preg_match($patternViettel, $value)) {
                $this->viettel->unshift($value);
            }
        }
        return $this->viettel;
    }

    public function getMobifone()
    {
        $patternMobi = "/^070|^089|^07[6-9]|^090|^093/";
        foreach ($this->data as $value) {
            if (preg_match($patternMobi, $value)) {
                $this->mobifone->unshift($value);
            }
        }
        return $this->mobifone;
    }

    public function getVinaphone()
    {
        $patternVina = "/^094|^091|^08[1-5]|^088/";
        foreach ($this->data as $value) {
            if (preg_match($patternVina, $value)) {
                $this->vinaphone->unshift($value);
            }
        }
        return $this->vinaphone;
    }
}