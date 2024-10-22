<?php

namespace App\Model;

use Exception;
use App\Core\Routes;


/**
 * Model Functions
 */
class Model
{
    /**
     * This function adds a new week.
     * @return mixed
     */
    public function createWeek()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $week_name = $_POST['week_name'];
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];
        
            $xml = simplexml_load_file("../data/weeks.xml");
            if ($xml === false) {
                return false;
            }

            $week = $xml->addChild('week');
            $week->addChild('id', uniqid());
            $week->addChild('name', $week_name);
            $week->addChild('from_date', $from_date);
            $week->addChild('to_date', $to_date);
        
            $xml->asXML('../data/weeks.xml');

            return true;
        }

        return false;
    }

    /**
     * This function adds a new team.
     * @return mixed
     */
    public function createTeam()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $team_name = $_POST['team_name'];
        
            $xml = simplexml_load_file('../data/team.xml');
            if ($xml === false) {
                return false;
            }
        
            $team = $xml->addChild('team');
            $team->addChild('id', uniqid());
            $team->addChild('name', $team_name);
        
            $xml->asXML('../data/teams.xml');

            return true;
        }

        return false;
    }

    /**
     * This method adds a new employee.
     * @return null
     */
    public function createEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $employee_name = $_POST['employee_name'];
            $team_detail = explode("^^", $_POST['teamName']);
        
            $xml = simplexml_load_file("../data/employees.xml");
            if ($xml === false) {
                return false;
            }

            $employee = $xml->addChild('employee');
            $employee->addChild('id', uniqid());
            $employee->addChild('name', $employee_name);
            $employee->addChild('team_id', $team_detail[0]);
            $employee->addChild('team_na,e', $team_detail[1]);

            $xml->asXML('../data/employees.xml');

            return true;
        }

        return false;
    }

    /**
     * This method saves plan.
     * @return null
     */
    public function savePlan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $week_id = $_POST['week_id'];
            $hours = $_POST['hours'];
        
            $xml = simplexml_load_file('../data/plan.xml');
            if ($xml === false) {
                return false;
            }

            foreach ($hours as $employee_id => $hour) {
                $plan = $xml->addChild('plan');
                $plan->addChild('week_id', $week_id);
                $plan->addChild('employee_id', $employee_id);
                $plan->addChild('hours', $hour);
            }
        
            $plans->asXML('../data/plan.xml');

            return true;
        }

        return false;
    }
}
