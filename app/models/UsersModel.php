<?php
class UsersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Find user by email
    public function findUserByEmail($email, $getUser = 0)
    {
        $this->db->query('SELECT * FROM customer_account WHERE customer_email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0 && $getUser == 1) {
            return $row;
        } else if ($this->db->rowCount() > 0 && $getUser == 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by phone
    public function findUserByPhone($phone)
    {
        $this->db->query('SELECT * FROM customer_account WHERE customer_phone = :phone');
        // Bind value
        $this->db->bind(':phone', $phone);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM customer_account WHERE customer_email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    // Register user
    public function register($data)
    {

        $this->db->query('INSERT INTO customer_account (customer_name, customer_email, customer_password, customer_phone, customer_check) VALUES(:name, :email, :password, :phone, :check)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':check', $data['check']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserdetails($id)
    {
        $this->db->query('SELECT * FROM customer_account WHERE customer_id = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }

    public function updateCustomer($data)
    {

        $this->db->query('UPDATE customer_account SET customer_name = :name, customer_email = :email, customer_phone = :phone, customer_bday = :bday WHERE customer_id = :id');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':bday', $data['birthdate']);
        $this->db->bind(':phone', $data['telephone']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkoldPassword($old)
    {
        $this->db->query('SELECT customer_password FROM customer_account WHERE customer_password = :old');
        // Bind value
        $this->db->bind(':old', $old);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function updateOldPassword($data)
    {

        $this->db->query('UPDATE customer_account SET customer_password = :new WHERE customer_id = :id');
        // Bind Values
        $this->db->bind(':new', $data['new']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getWishlistProductSingleImg($id)
    {


        $this->db->query('SELECT product_id FROM wishlist WHERE customer_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();

        if ($results) {

            foreach ($results as $nav) {
                $this->db->query('SELECT wishlist.product_id, product_detail.product_name, product_detail.discount_price, image_data.images FROM image_data INNER JOIN product_detail ON product_detail.product_id = image_data.product_id INNER JOIN wishlist ON wishlist.product_id = image_data.product_id WHERE wishlist.customer_id = :id GROUP BY image_data.product_id HAVING COUNT(image_data.product_id) > 1');
                // Bind values
                $this->db->bind(':id', $id);
            }
            $row = $this->db->resultSet();

            return $row;
        }
    }

    public function saveShippingAddress(array $shipping_address)
    {
        $keys = implode(',', array_keys($shipping_address));
        $values = implode("','", array_values($shipping_address));
        $query = "INSERT INTO shipping_info ($keys) VALUES ('$values')";
        $this->db->query($query);
        return $this->db->execute(true);
    }

    public function savePaymentDetails(array $payment_info)
    {
        $keys = implode(',', array_keys($payment_info));
        $values = implode("','", array_values($payment_info));
        $query = "INSERT INTO purchases ($keys) VALUES ('$values')";
        $this->db->query($query);
        return $this->db->execute(true);
    }

    public function getCountries()
    {
        $this->db->query('SELECT * FROM countries');
        return $this->db->resultSet();
    }

    public function getStatesForCountry(int $country_id)
    {
        $this->db->query("SELECT * FROM states WHERE country_id=$country_id");
        return $this->db->resultSet();
    }
}
