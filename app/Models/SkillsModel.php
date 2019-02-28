<?php
namespace App\Models;

class SkillsModel
{

    private $skills_id;

    private $user_skills;

    private $user_user_id;

    public function __construct($skills_id, $user_skills, $user_user_id)
    {
        $this->skills_id = $skills_id;
        $this->user_skills = $user_skills;
        $this->user_user_id = $user_user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getSkills_id()
    {
        return $this->skills_id;
    }

    /**
     *
     * @param mixed $skills_id
     */
    public function setSkills_id($skills_id)
    {
        $this->skills_id = $skills_id;
    }

    /**
     *
     * @return mixed
     */
    public function getUser_skills()
    {
        return $this->user_skills;
    }

    /**
     *
     * @param mixed $user_skills
     */
    public function setUser_skills($user_skills)
    {
        $this->user_skills = $user_skills;
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