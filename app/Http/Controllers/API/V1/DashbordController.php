<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function __construct(public DashboardService $dashboardService) {

    }

    public function index () {

        $data = $this->dashboardService->getDashboard();

        return $data;
    }
}
