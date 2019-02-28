<?php
namespace App\Models;

class EducationModel
{

    private $education_id;

    private $degree;

    private $school_name;

    private $school_city;

    private $school_state;

    private $school_zip_code;

    private $graduation_year;

    private $user_user_id;

    public function __construct($education_id, $degree, $school_name, $school_city, $school_state, $school_zip_code, $graduation_year, $user_user_id)
    {
        $this->education_id = $education_id;
        $this->degree = $degree;
        $this->school_name = $school_name;
        $this->school_city = $school_city;
        $this->school_state = $school_state;
        $this->school_zip_code = $school_zip_code;
        $this->graduation_year = $graduation_year;
        $this->user_user_id = $user_user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getEducation_id()
    {
        return $this->education_id;
    }

    /**
     *
     * @param mixed $education_id
     */
    public function setEducation_id($education_id)
    {
        $this->education_id = $education_id;
    }

    /**
     *
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     *
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     *
     * @return mixed
     */
    public function getSchool_name()
    {
        return $this->school_name;
    }

    /**
     *
     * @param mixed $school_name
     */
    public function setSchool_name($school_name)
    {
        $this->school_name = $school_name;
    }

    /**
     *
     * @return mixed
     */
    public function getSchool_city()
    {
        return $this->school_city;
    }

    /**
     *
     * @param mixed $school_city
     */
    public function setSchool_city($school_city)
    {
        $this->school_city = $school_city;
    }

    /**
     *
     * @return mixed
     */
    public function getSchool_state()
    {
        return $this->school_state;
    }

    /**
     *
     * @param mixed $school_state
     */
    public function setSchool_state($school_state)
    {
        $this->school_state = $school_state;
    }

    /**
     *
     * @return mixed
     */
    public function getSchool_zip_code()
    {
        return $this->school_zip_code;
    }

    /**
     *
     * @param mixed $school_zip_code
     */
    public function setSchool_zip_code($school_zip_code)
    {
        $this->school_zip_code = $school_zip_code;
    }

    /**
     *
     * @return mixed
     */
    public function getGraduation_year()
    {
        return $this->graduation_year;
    }

    /**
     *
     * @param mixed $graduation_year
     */
    public function setGraduation_year($graduation_year)
    {
        $this->graduation_year = $graduation_year;
    }
}