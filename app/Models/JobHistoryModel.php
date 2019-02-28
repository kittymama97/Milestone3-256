<?php
namespace App\Models;

class JobHistoryModel
{

    private $job_history_id;

    private $current_job;

    private $previous_job;

    private $current_employment_date;

    private $previous_employment_date;

    private $current_employment_location;

    private $user_user_id;

    public function __construct($job_history_id, $current_job, $previous_job, $current_employment_date, $previous_employment_date, $current_employment_location, $user_user_id)
    {
        $this->job_history_id = $job_history_id;
        $this->current_job = $current_job;
        $this->current_employment_date = $current_employment_date;
        $this->previous_employment_date = $previous_employment_date;
        $this->current_employment_location = $current_employment_location;
        $this->user_user_id = $user_user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getJob_history_id()
    {
        return $this->job_history_id;
    }

    /**
     *
     * @param mixed $job_history_id
     */
    public function setJob_history_id($job_history_id)
    {
        $this->job_history_id = $job_history_id;
    }

    /**
     *
     * @return mixed
     */
    public function getCurrent_job()
    {
        return $this->current_job;
    }

    /**
     *
     * @param mixed $current_job
     */
    public function setCurrent_job($current_job)
    {
        $this->current_job = $current_job;
    }

    /**
     *
     * @return mixed
     */
    public function getPrevious_job()
    {
        return $this->previous_job;
    }

    /**
     *
     * @param mixed $previous_job
     */
    public function setPrevious_job($previous_job)
    {
        $this->previous_job = $previous_job;
    }

    /**
     *
     * @return mixed
     */
    public function getCurrent_employment_date()
    {
        return $this->current_employment_date;
    }

    /**
     *
     * @param mixed $current_employment_date
     */
    public function setCurrent_employment_date($current_employment_date)
    {
        $this->current_employment_date = $current_employment_date;
    }

    /**
     *
     * @return mixed
     */
    public function getPrevious_employment_date()
    {
        return $this->previous_employment_date;
    }

    /**
     *
     * @param mixed $previous_employment_date
     */
    public function setPrevious_employment_date($previous_employment_date)
    {
        $this->previous_employment_date = $previous_employment_date;
    }

    /**
     *
     * @return mixed
     */
    public function getCurrent_employment_location()
    {
        return $this->current_employment_location;
    }

    /**
     *
     * @param mixed $current_employment_location
     */
    public function setCurrent_employment_location($current_employment_location)
    {
        $this->current_employment_location = $current_employment_location;
    }
    /**
     * @return mixed
     */
    public function getUser_user_id()
    {
        return $this->user_user_id;
    }

    /**
     * @param mixed $user_user_id
     */
    public function setUser_user_id($user_user_id)
    {
        $this->user_user_id = $user_user_id;
    }

}