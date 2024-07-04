<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use App\Models\CoEvaluation;
use App\Models\ExecutiveOfficeAccount;
use App\Models\FmsEvaluation;
use App\Models\IctoEvaluation;
use App\Models\LdEvaluation;
use App\Models\NitesdEvaluation;
use App\Models\PiadEvaluation;
use App\Models\PloEvaluation;
use App\Models\PoEvaluation;
use App\Models\Region;
use App\Models\RomoEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RomdController extends Controller
{
    public function index()
    {
        return view('romd.dashboard');
    }

    public function fetchBROsubmission()
    {  
        $adminService = AsEvaluation::all();
        $legalDivision = LdEvaluation::all(); 
        $certificationOffice = CoEvaluation::all();
        $fms = FmsEvaluation::all();
        $nitesd = NitesdEvaluation::all();
        $piad = PiadEvaluation::all();
        $planningOffice = PoEvaluation::all();
        $plo = PloEvaluation::all();
        $romo = RomoEvaluation::all();
        $icto = IctoEvaluation::all();

        // Fetch all regions (assuming you have a Region model with appropriate relationships)
        $regions = Region::all();

        // Categorize regions
        $smallRegions = $regions->where('region_category', 'Small');
        $mediumRegions = $regions->where('region_category', 'Medium');
        $largeRegions = $regions->where('region_category', 'Large');

         // Calculate the total progress for each region
        $totalProgressPerRegion = [];
        foreach ($regions as $region) {
            $totalProgressPerRegion[$region->id] = [
                'adminService' => $adminService->where('region_id', $region->id)->sum('progress_percentage'),
                'legalDivision' => $legalDivision->where('region_id', $region->id)->sum('progress_percentage'),
                'certificationOffice' => $certificationOffice->where('region_id', $region->id)->sum('progress_percentage'),
                'fms' => $fms->where('region_id', $region->id)->sum('progress_percentage'),
                'nitesd' => $nitesd->where('region_id', $region->id)->sum('progress_percentage'),
                'piad' => $piad->where('region_id', $region->id)->sum('progress_percentage'),
                'planningOffice' => $planningOffice->where('region_id', $region->id)->sum('progress_percentage'),
                'plo' => $plo->where('region_id', $region->id)->sum('progress_percentage'),
                'romo' => $romo->where('region_id', $region->id)->sum('progress_percentage'),
                'icto' => $icto->where('region_id', $region->id)->sum('progress_percentage'),
            ];
        }

        

        // Pass categorized regions and executive offices progress to the view
        return view('romd.dashboard', compact(
            'adminService',
            'legalDivision',
            'certificationOffice',
            'fms',
            'nitesd',
            'piad',
            'planningOffice',
            'plo',
            'romo',
            'icto',
            'smallRegions',
            'mediumRegions',
            'largeRegions',
            'regions',
            'totalProgressPerRegion'
        ));
    }

    public function ranking()
    {
        // Your logic here
        return view('romd.ranking');
    }
    

}

