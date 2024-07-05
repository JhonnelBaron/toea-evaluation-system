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
        $regions = Region::all();

        $smallRegions = $regions->where('region_category', 'Small');
        $mediumRegions = $regions->where('region_category', 'Medium');
        $largeRegions = $regions->where('region_category', 'Large');

         // Calculate total progress for each region
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

        $totalScorePerRegion = [];
        foreach ($regions as $region) {
            $totalScorePerRegion[$region->id] = [
                'adminService' => $adminService->where('region_id', $region->id)->sum('overall_total_score'),
                'legalDivision' => $legalDivision->where('region_id', $region->id)->sum('overall_total_score'),
                'certificationOffice' => $certificationOffice->where('region_id', $region->id)->sum('overall_total_score'),
                'fms' => $fms->where('region_id', $region->id)->sum('overall_total_score'),
                'nitesd' => $nitesd->where('region_id', $region->id)->sum('overall_total_score'),
                'piad' => $piad->where('region_id', $region->id)->sum('overall_total_score'),
                'planningOffice' => $planningOffice->where('region_id', $region->id)->sum('overall_total_score'),
                'plo' => $plo->where('region_id', $region->id)->sum('overall_total_score'),
                'romo' => $romo->where('region_id', $region->id)->sum('overall_total_score'),
                'icto' => $icto->where('region_id', $region->id)->sum('overall_total_score'),
            ];
        }


        // Sort and rank small regions by total score in descending order
        $sortedSmallRegions = $smallRegions->sortByDesc(function ($region) use ($totalScorePerRegion) {
            return $totalScorePerRegion[$region->id]['adminService'] +
                $totalScorePerRegion[$region->id]['legalDivision'] +
                $totalScorePerRegion[$region->id]['certificationOffice'] +
                $totalScorePerRegion[$region->id]['fms'] +
                $totalScorePerRegion[$region->id]['nitesd'] +
                $totalScorePerRegion[$region->id]['piad'] +
                $totalScorePerRegion[$region->id]['planningOffice'] +
                $totalScorePerRegion[$region->id]['plo'] +
                $totalScorePerRegion[$region->id]['romo'] +
                $totalScorePerRegion[$region->id]['icto'];
        });

        // Sort and rank medium regions by total score in descending order
        $sortedMediumRegions = $mediumRegions->sortByDesc(function ($region) use ($totalScorePerRegion) {
            return $totalScorePerRegion[$region->id]['adminService'] +
                $totalScorePerRegion[$region->id]['legalDivision'] +
                $totalScorePerRegion[$region->id]['certificationOffice'] +
                $totalScorePerRegion[$region->id]['fms'] +
                $totalScorePerRegion[$region->id]['nitesd'] +
                $totalScorePerRegion[$region->id]['piad'] +
                $totalScorePerRegion[$region->id]['planningOffice'] +
                $totalScorePerRegion[$region->id]['plo'] +
                $totalScorePerRegion[$region->id]['romo'] +
                $totalScorePerRegion[$region->id]['icto'];
        });

        // Sort and rank large regions by total score in descending order
        $sortedLargeRegions = $largeRegions->sortByDesc(function ($region) use ($totalScorePerRegion) {
            return $totalScorePerRegion[$region->id]['adminService'] +
                $totalScorePerRegion[$region->id]['legalDivision'] +
                $totalScorePerRegion[$region->id]['certificationOffice'] +
                $totalScorePerRegion[$region->id]['fms'] +
                $totalScorePerRegion[$region->id]['nitesd'] +
                $totalScorePerRegion[$region->id]['piad'] +
                $totalScorePerRegion[$region->id]['planningOffice'] +
                $totalScorePerRegion[$region->id]['plo'] +
                $totalScorePerRegion[$region->id]['romo'] +
                $totalScorePerRegion[$region->id]['icto'];
        });
         // Initialize rank counters
         $smallRank = 1;
         $mediumRank = 1;
         $largeRank = 1;
        
        

        return view('romd.ranking', compact(
            'regions',
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
            'totalProgressPerRegion',
            'totalScorePerRegion',
            'sortedSmallRegions',
            'sortedMediumRegions',
            'sortedLargeRegions',
            'smallRank', 
            'mediumRank',
            'largeRank'
        ));
    }
    

}

