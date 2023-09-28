<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Services\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(public DashboardService $dashboardService) {

    }
    public function index():View
    {
        $data = $this->dashboardService->getDashboard();

        return view('dashboard', $data);
    }
}
