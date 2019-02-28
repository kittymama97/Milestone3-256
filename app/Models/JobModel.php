<?php
namespace App\Models;
class JobModel
{
    private $job_id;
    private $company_name;
    private $company_city;
    private $company_state;
    private $company_zip_code;
    private $job_title;
    private $job_desciption;
    private $date_posted;
    public function __construct($job_id, $company_name, $company_city, $company_state, $company_zip_code, $job_title, $job_description, $date_posted)
    {
        $this->job_id = $job_id;
        $this->company_name = $company_name;
        $this->company_city = $company_city;
        $this->company_state = $company_state;
        $this->company_zip_code = $company_zip_code;
        $this->job_title = $job_title;
        $this->job_desciption = $job_description;
        $this->date_posted = $date_posted;
    }
    /**
     *
     * @return mixed
     */
    public function getJob_id()
    {
        return $this->job_id;
    }
    /**
     *
     * @param mixed $job_id
     */
    public function setJob_id($job_id)
    {
        $this->job_id = $job_id;
    }
    /**
     *
     * @return mixed
     */
    public function getCompany_name()
    {
        return $this->company_name;
    }
    /**
     *
     * @param mixed $company_name
     */
    public function setCompany_name($company_name)
    {
        $this->company_name = $company_name;
    }
    /**
     *
     * @return mixed
     */
    public function getCompany_city()
    {
        return $this->company_city;
    }
    /**
     *
     * @param mixed $company_city
     */
    public function setCompany_city($company_city)
    {
        $this->company_city = $company_city;
    }
    /**
     *
     * @return mixed
     */
    public function getCompany_state()
    {
        return $this->company_state;
    }
    /**
     *
     * @param mixed $company_state
     */
    public function setCompany_state($company_state)
    {
        $this->company_state = $company_state;
    }
    /**
     *
     * @return mixed
     */
    public function getCompany_zip_code()
    {
        return $this->company_zip_code;
    }
    /**
     *
     * @param mixed $company_zip_code
     */
    public function setCompany_zip_code($company_zip_code)
    {
        $this->company_zip_code = $company_zip_code;
    }
    /**
     *
     * @return mixed
     */
    public function getJob_title()
    {
        return $this->job_title;
    }
    /**
     *
     * @param mixed $job_title
     */
    public function setJob_title($job_title)
    {
        $this->job_title = $job_title;
    }
    /**
     *
     * @return mixed
     */
    public function getJob_desciption()
    {
        return $this->job_desciption;
    }
    /**
     *
     * @param mixed $job_desciption
     */
    public function setJob_desciption($job_desciption)
    {
        $this->job_desciption = $job_desciption;
    }
    /**
     *
     * @return mixed
     */
    public function getDate_posted()
    {
        return $this->date_posted;
    }
    /**
     *
     * @param mixed $date_posted
     */
    public function setDate_posted($date_posted)
    {
        $this->date_posted = $date_posted;
    }
}