<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use App\Models\CoEvaluation;
use App\Models\ExecutiveOfficeAccount;
use App\Models\External\EndorsedExternal;
use App\Models\FmsEvaluation;
use App\Models\IctoEvaluation;
use App\Models\LdEvaluation;
use App\Models\NitesdEvaluation;
use App\Models\PiadEvaluation;
use App\Models\PloEvaluation;
use App\Models\PoEvaluation;
use App\Models\Region;
use App\Models\RomoEvaluation;
use App\Models\WsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $ws = WsEvaluation::all();

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
                'ws' => $ws->where('region_id', $region->id)->sum('progress_percentage'),
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
            'ws',
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
        $ws = WsEvaluation::all();

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
                'ws' => $ws->where('region_id', $region->id)->sum('progress_percentage'),
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
                'ws' => $ws->where('region_id', $region->id)->sum('overall_total_score'),
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
                $totalScorePerRegion[$region->id]['icto'] +
                $totalScorePerRegion[$region->id]['ws'];
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
                $totalScorePerRegion[$region->id]['icto'] +
                $totalScorePerRegion[$region->id]['ws'];
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
                $totalScorePerRegion[$region->id]['icto'] +
                $totalScorePerRegion[$region->id]['ws'];
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
            'ws',
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

    public function home()
    {
        $regions = Region::all();

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
        $ws = WsEvaluation::all();

        $smallRegions = Region::where('region_category', 'Small')->get();
        $mediumRegions = Region::where('region_category', 'Medium')->get();
        $largeRegions = Region::where('region_category', 'Large')->get();
        $totalRegionsCount = count($smallRegions) + count($mediumRegions) + count($largeRegions);
        $averageProgress = 100 / $totalRegionsCount;


        $totalProgressPerRegion = [
            'Small' => [],
            'Medium' => [],
            'Large' => []
        ];
    
        foreach ($regions as $region) {
            $totalProgress = collect([
                'adminService' => $adminService,
                'legalDivision' => $legalDivision,
                'certificationOffice' => $certificationOffice,
                'fms' => $fms,
                'nitesd' => $nitesd,
                'piad' => $piad,
                'planningOffice' => $planningOffice,
                'plo' => $plo,
                'romo' => $romo,
                'icto' => $icto,
                'ws' => $ws,
            ])->sum(function($office) use ($region) {
                return $office->where('region_id', $region->id)->sum('progress_percentage');
            });
    
            $averageProgressPerRegion = round($totalProgress / 10, 2); // 10 is the number of offices
    
            $totalProgressPerRegion[$region->region_category][$region->region_name] = $averageProgressPerRegion;
        }

        // Calculate total progress for each executive office
        $totalProgressPerExecutiveOffice = [
            'adminService' => $this->calculateProgress($adminService, $averageProgress),
            'legalDivision' => $this->calculateProgress($legalDivision, $averageProgress),
            'certificationOffice' => $this->calculateProgress($certificationOffice, $averageProgress),
            'fms' => $this->calculateProgress($fms, $averageProgress),
            'nitesd' => $this->calculateProgress($nitesd, $averageProgress),
            'piad' => $this->calculateProgress($piad, $averageProgress),
            'planningOffice' => $this->calculateProgress($planningOffice, $averageProgress),
            'plo' => $this->calculateProgress($plo, $averageProgress),
            'romo' => $this->calculateProgress($romo, $averageProgress),
            'icto' => $this->calculateProgress($icto, $averageProgress),
            'ws' => $this->calculateProgress($ws, $averageProgress),
        ];

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
                'ws' => $ws->where('region_id', $region->id)->sum('overall_total_score'),
            ];
        }

        return view('romd.home', compact('totalProgressPerExecutiveOffice', 'totalProgressPerRegion', 'totalScorePerRegion'));
    }

    private function calculateProgress($evaluations, $averageProgress)
    {
        $totalProgress = $evaluations->sum('progress_percentage');
        return round($totalProgress * $averageProgress / 100, 2);
    }

    public function getEvaluationData($officeId)
    {
        // Initialize variable for evaluations
        $evaluations = [];

        // Determine which evaluation model to use based on $officeId
        switch ($officeId) {
            case 'asEval':
                $evaluations = AsEvaluation::with('region')->get();
                break;
            case 'coEval':
                $evaluations = CoEvaluation::with('region')->get();
                break;
            case 'ldEval':
                $evaluations = LdEvaluation::with('region')->get();
                break;
            case 'fmsEval':
                $evaluations = FmsEvaluation::with('region')->get();
                break;
            case 'nitesdEval':
                $evaluations = NitesdEvaluation::with('region')->get();
                break;
            case 'piadEval':
                $evaluations = PiadEvaluation::with('region')->get();
                break;
            case 'poEval':
                $evaluations = PoEvaluation::with('region')->get();
                break;
            case 'ploEval':
                $evaluations = PloEvaluation::with('region')->get();
                break;
            case 'romoEval':
                $evaluations = RomoEvaluation::with('region')->get();
                break;
            case 'ictoEval':
                $evaluations = IctoEvaluation::with('region')->get();
                break;
            case 'wsEval':
                $evaluations = WsEvaluation::with('region')->get();
                break;
            default:
                // Handle invalid $officeId or other cases
                return response()->json(['error' => 'Invalid office ID'], 404);
        }

        // Return JSON response with evaluations
        return response()->json($evaluations);
    }
    
    public function endorseTi($id)
    {
        $user = DB::table('users')
        ->leftJoin('toea_admin', 'users.evaluator_id', '=', 'toea_admin.id')
        ->leftJoin('best_ti_tas_rtcstc_a_parts', 'users.id', '=', 'best_ti_tas_rtcstc_a_parts.user_id')
        ->leftJoin('best_ti_tas_rtcstc_b_parts', 'users.id', '=', 'best_ti_tas_rtcstc_b_parts.user_id')
        ->leftJoin('best_ti_tas_rtcstc_c_parts', 'users.id', '=', 'best_ti_tas_rtcstc_c_parts.user_id')
        ->leftJoin('best_ti_tas_rtcstc_d_parts', 'users.id', '=', 'best_ti_tas_rtcstc_d_parts.user_id')
        ->leftJoin('best_ti_tas_rtcstc_e_parts', 'users.id', '=', 'best_ti_tas_rtcstc_e_parts.user_id')
        ->leftJoin('best_ti_ptc_a_parts', 'users.id', '=', 'best_ti_ptc_a_parts.user_id')
        ->leftJoin('best_ti_ptc_b_parts', 'users.id', '=', 'best_ti_ptc_b_parts.user_id')
        ->leftJoin('best_ti_ptc_c_parts', 'users.id', '=', 'best_ti_ptc_c_parts.user_id')
        ->leftJoin('best_ti_ptc_d_parts', 'users.id', '=', 'best_ti_ptc_d_parts.user_id')
        ->leftJoin('best_ti_ptc_e_parts', 'users.id', '=', 'best_ti_ptc_e_parts.user_id')
        ->select(
            'users.id as user_id',
            'users.awardings',
            'users.category',
            'users.province_name',
            'users.province',
            'best_ti_tas_rtcstc_a_parts.total_rfinal_score as tas_rtcstc_a_score',
            'best_ti_tas_rtcstc_b_parts.total_rfinal_score as tas_rtcstc_b_score',
            'best_ti_tas_rtcstc_c_parts.total_rfinal_score as tas_rtcstc_c_score',
            'best_ti_tas_rtcstc_d_parts.total_rfinal_score as tas_rtcstc_d_score',
            'best_ti_tas_rtcstc_e_parts.total_rfinal_score as tas_rtcstc_e_score',
            'best_ti_ptc_a_parts.total_rfinal_score as ptc_a_score',
            'best_ti_ptc_b_parts.total_rfinal_score as ptc_b_score',
            'best_ti_ptc_c_parts.total_rfinal_score as ptc_c_score',
            'best_ti_ptc_d_parts.total_rfinal_score as ptc_d_score',
            'best_ti_ptc_e_parts.total_rfinal_score as ptc_e_score',
            'toea_admin.firstname as evaluator_first',
            'toea_admin.lastname as evaluator_last',
            'users.evaluation_remarks'
        )
        ->where('users.id', $id)
        ->first();
        
        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->awardings === 'Best_TI' && ($user->category === 'RTC-STC' || $user->category === 'TAS'))
        {
            $store = EndorsedExternal::create([
                'user_id' => $user->user_id,
                'category' => $user->awardings,
                'grouping' => $user->category,
                'province' => $user->province_name,
                'nominee' => $user->province,
                'criteria_a' => $user->tas_rtcstc_a_score ?? 0,
                'criteria_b' => $user->tas_rtcstc_b_score ?? 0,
                'criteria_c' => $user->tas_rtcstc_c_score ?? 0,
                'criteria_d' => $user->tas_rtcstc_d_score ?? 0,
                'criteria_e' => $user->tas_rtcstc_e_score ?? 0,
                'romo_final_score' => 
                    ($user->tas_rtcstc_a_score ?? 0) + 
                    ($user->tas_rtcstc_b_score ?? 0) + 
                    ($user->tas_rtcstc_c_score ?? 0) + 
                    ($user->tas_rtcstc_d_score ?? 0) + 
                    ($user->tas_rtcstc_e_score ?? 0),
                'remarks' => $user->evaluation_remarks,
                'evaluator_first' => $user->evaluator_first,
                'evaluator_last' => $user->evaluator_last
            ]);
        } elseif ($user->awardings === 'Best_TI' && $user->category === 'PTC')
        {
            $store = EndorsedExternal::create([
                'user_id' => $user->user_id,
                'category' => $user->awardings,
                'grouping' => $user->category,
                'province' => $user->province_name,
                'nominee' => $user->province,
                'criteria_a' => $user->ptc_a_score ?? 0,
                'criteria_b' => $user->ptc_b_score ?? 0,
                'criteria_c' => $user->ptc_c_score ?? 0,
                'criteria_d' => $user->ptc_d_score ?? 0,
                'criteria_e' => $user->ptc_e_score ?? 0,
                'romo_final_score' => 
                    ($user->ptc_a_score ?? 0) + 
                    ($user->ptc_b_score ?? 0) + 
                    ($user->ptc_c_score ?? 0) + 
                    ($user->ptc_d_score ?? 0) + 
                    ($user->ptc_e_score ?? 0),
                'remarks' => $user->evaluation_remarks,
                'evaluator_first' => $user->evaluator_first,
                'evaluator_last' => $user->evaluator_last
            ]);   
        }else 
        {
            return response()->json(['message' => 'Unable to Endorse this Nominee'], 404);
        }

        // return response()->json(['message' => 'Nominee endorsed successfully']);
        return redirect()->back()->with('success', 'Nominee endorsed successfully.');
    }

    public function endorseGp($id)
    {
        $user = DB::table('users')
        ->leftJoin('toea_admin', 'users.evaluator_id', '=', 'toea_admin.id')
        ->leftJoin('galing_probinsya_a_parts', 'users.id', '=', 'galing_probinsya_a_parts.user_id')
        ->leftJoin('galing_probinsya_b_parts', 'users.id', '=', 'galing_probinsya_b_parts.user_id')
        ->leftJoin('galing_probinsya_c_parts', 'users.id', '=', 'galing_probinsya_c_parts.user_id')
        ->leftJoin('galing_probinsya_d_parts', 'users.id', '=', 'galing_probinsya_d_parts.user_id')
        ->leftJoin('galing_probinsya_e_parts', 'users.id', '=', 'galing_probinsya_e_parts.user_id')
        ->select(
            'users.id as user_id',
            'users.awardings',
            'users.category',
            'users.province_name',
            'users.province',
            'galing_probinsya_a_parts.total_rfinal_score as galing_probinsya_a_score',
            'galing_probinsya_b_parts.total_rfinal_score as galing_probinsya_b_score',
            'galing_probinsya_c_parts.total_rfinal_score as galing_probinsya_c_score',
            'galing_probinsya_d_parts.total_rfinal_score as galing_probinsya_d_score',
            'galing_probinsya_e_parts.total_rfinal_score as galing_probinsya_e_score',
            'toea_admin.firstname as evaluator_first',
            'toea_admin.lastname as evaluator_last',
            'users.evaluation_remarks'
        )
        ->where('users.id', $id)
        ->first();

        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->awardings === 'Galing_Probinsya')
        {
            $store = EndorsedExternal::create([
                'user_id' => $user->user_id,
                'category' => $user->awardings,
                'grouping' => $user->category,
                'province' => $user->province_name,
                'nominee' => $user->province,
                'criteria_a' => $user->galing_probinsya_a_score ?? 0,
                'criteria_b' => $user->galing_probinsya_b_score ?? 0,
                'criteria_c' => $user->galing_probinsya_c_score ?? 0,
                'criteria_d' => $user->galing_probinsya_d_score ?? 0,
                'criteria_e' => $user->galing_probinsya_e_score ?? 0,
                'romo_final_score' => 
                ($user->galing_probinsya_a_score ?? 0) + 
                ($user->galing_probinsya_b_score ?? 0) + 
                ($user->galing_probinsya_c_score ?? 0) + 
                ($user->galing_probinsya_d_score ?? 0) + 
                ($user->galing_probinsya_e_score ?? 0),
                'remarks' => $user->evaluation_remarks,
                'evaluator_first' => $user->evaluator_first,
                'evaluator_last' => $user->evaluator_last
            ]);
        }else 
        {
            return response()->json(['message' => 'Unable to Endorse this Nominee'], 404);
        }

        // return response()->json(['message' => 'Nominee endorsed successfully']);
        return redirect()->back()->with('success', 'Nominee endorsed successfully.');
    }
}
