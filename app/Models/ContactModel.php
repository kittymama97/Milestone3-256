<?php
namespace App\Models;

class ContactModel
{

    private $contact_id;

    private $business_email;

    private $phone_number;

    private $street_address;

    private $city;

    private $state;

    private $zip_code;

    private $about_me;

    private $user_user_id;

    public function __construct($contact_id, $business_email, $phone_number, $street_address, $city, $state, $zip_code, $about_me, $user_user_id)
    {
        $this->contact_id = $contact_id;
        $this->business_email = $business_email;
        $this->phone_number = $phone_number;
        $this->street_address = $street_address;
        $this->city = $city;
        $this->state = $state;
        $this->zip_code = $zip_code;
        $this->about_me = $about_me;
        $this->user_user_id = $user_user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getContact_id()
    {
        return $this->contact_id;
    }

    /**
     *
     * @param mixed $contact_id
     */
    public function setContact_id($contact_id)
    {
        $this->contact_id = $contact_id;
    }

    /**
     *
     * @return mixed
     */
    public function getBusiness_email()
    {
        return $this->business_email;
    }

    /**
     *
     * @param mixed $business_email
     */
    public function setBusiness_email($business_email)
    {
        $this->business_email = $business_email;
    }

    /**
     *
     * @return mixed
     */
    public function getPhone_number()
    {
        return $this->phone_number;
    }

    /**
     *
     * @param mixed $phone_number
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     *
     * @return mixed
     */
    public function getStreet_address()
    {
        return $this->street_address;
    }

    /**
     *
     * @param mixed $street_address
     */
    public function setStreet_address($street_address)
    {
        $this->street_address = $street_address;
    }

    /**
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     *
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     *
     * @return mixed
     */
    public function getZip_code()
    {
        return $this->zip_code;
    }

    /**
     *
     * @param mixed $zip_code
     */
    public function setZip_code($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     *
     * @return mixed
     */
    public function getAbout_me()
    {
        return $this->about_me;
    }

    /**
     *
     * @param mixed $about_me
     */
    public function setAbout_me($about_me)
    {
        $this->about_me = $about_me;
    }

    /**
     *
     * @return mixed
     */
    public function getUser_user_id()
    {
        return $this->user_user_id;
    }

    /**
     *
     * @param mixed $user_user_id
     */
    public function setUser_user_id($user_user_id)
    {
        $this->user_user_id = $user_user_id;
    }
}