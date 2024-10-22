<?php

namespace App\Core;

use App\Controller\Controller;

class Layout
{
    /**
     * Register the routes
     */
    public function __construct()
    {
        Routes::get(['url' => 'dashboard', 'controller' => Controller::class, 'method' => 'loadDashboard']);
        Routes::get(['url' => 'create_week', 'controller' => Controller::class, 'method' => 'loadWeek']);
        Routes::get(['url' => 'create_team', 'controller' => Controller::class, 'method' => 'loadTeam']);
        Routes::get(['url' => 'create_employee', 'controller' => Controller::class, 'method' => 'loadEmployee']);
        Routes::get(['url' => 'plan_for_week', 'controller' => Controller::class, 'method' => 'loadWeeklyPlan']);

        Routes::post(['url' => 'create_week', 'controller' => Controller::class, 'method' => 'createWeek']);
        Routes::post(['url' => 'create_team', 'controller' => Controller::class, 'method' => 'createTeam']);
        Routes::post(['url' => 'create_employee', 'controller' => Controller::class, 'method' => 'createEmployee']);
        Routes::post(['url' => 'save_plan', 'controller' => Controller::class, 'method' => 'savePlan']);
    }
}
