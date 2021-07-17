<?php

class CouponModel{
    private $db;
    public array $attributes;

    public function __construct(){
      $this->db = new Database;
    }

    public function getCouponList(){
        $getall = 'SELECT * FROM coupons';
        $this->db->query($getall);
        return $this->db->resultSet();
    }

    public function getCoupon($id){
        $getcoupon = 'SELECT * FROM coupons where id = :id';
        $this->db->query($getcoupon);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function save(){
        $query = '';
        if($this->attributes['id'] > 0){
            $query .='UPDATE coupons SET ';
            foreach($this->attributes as $key => $value){
                $query .= $key .' = :'. $key . (($key == array_key_last($this->attributes))? '' : ', ');
            }
            $query .= ' WHERE id = :id';
        }else{
            $query .= 'INSERT INTO coupons(';
            foreach($this->attributes as $key => $value){
                if($key == 'id'){
                    continue;
                }
                $query .= $key . (($key == array_key_last($this->attributes))? '' : ', ');
            }
            $query .= ') VALUES (';
            foreach($this->attributes as $key => $value){
                if($key == 'id'){
                    continue;
                }
                $query .= ':'. $key . (($key == array_key_last($this->attributes))? '' : ', ');
            }
            $query .= ')';
        }
        // die($query);
        $this->db->query($query);
        foreach($this->attributes as $key => $value){
            if($this->attributes['id'] == 0 && $key == 'id'){
                continue;
            }
            // die(':'.$value);
            $this->db->bind(':'.$key, $value);
        }

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkApplyCoupon($coupon_code)
    {
        $query = 'SELECT * FROM coupons WHERE no_of_attempts>= no_of_used AND coupon_code = :coupon_code';
        $this->db->query($query);
        $this->db->bind(':coupon_code', $coupon_code);
        return $this->db->single();
    }
}