<?php

namespace App\Controller;

use App\Core\Routes;
use App\Model\Model;

/**
 * Controller Functions
 */
class Controller
{
    /** @var Model */
    private $model;

    /**
     * Controller Constructor
     */
    public function __construct(Model $_teacherModel = null)
    {
        $this->model = $_model ?? new Model();
    }

    /**
     * This function will load the view files based on the input
     * @param string $_viewName
     */
    protected function loadView($_viewName)
    {
        Routes::load($_viewName);
    }

    /**
     * This method loads dashboard page on get request.
     * @return null
     */
    public function loadDashboard()
    {
        $this->loadView("Dashboard");
    }

    /**
     * This method loads create employee page on get request.
     * @return null
     */
    public function loadEmployee()
    {
        $this->loadView("CreateEmployee");
    }

    /**
     * This method loads create team page on get request.
     * @return null
     */
    public function loadTeam()
    {
        $this->loadView("CreateTeam");
    }

    /**
     * This method loads create week page on get request.
     * @return null
     */
    public function loadWeek()
    {
        $this->loadView("CreateWeek");
    }

    /**
     * This method loads weekly plan page on get request.
     * @return null
     */
    public function loadWeeklyPlan()
    {
        $this->loadView("WeeklyPlan");
    }

    /**
     * This method adds a new week.
     * @return null
     */
    public function createWeek()
    {
        if ($this->model->createWeek()) {
            $this->loadView("CreateWeek");
        } else {
            echo "Error on creating Week";
        }
    }

    /**
     * This method adds a new team.
     * @return null
     */
    public function createTeam()
    {
        if ($this->model->createTeam()) {
            $this->loadView("CreateTeam");
        } else {
            echo "Error on creating team";
        }
    }

    /**
     * This method adds a new employee.
     * @return null
     */
    public function createEmployee()
    {
        if ($this->model->createEmployee()) {
            $this->loadView("CreateEmployee");
        } else {
            echo "Error on creating employee";
        }
    }

    /**
     * This method saves plan.
     * @return null
     */
    public function savePlan()
    {
        if ($this->model->savePlan()) {
            $this->loadView("WeeklyPlan");
        } else {
            echo "Error on saving plan";
        }
    }
}
