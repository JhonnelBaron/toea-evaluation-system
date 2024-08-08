<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use App\Models\AwardingsFinalistRecord;
use App\Models\CoEvaluation;
use App\Models\ExecutiveOfficeAccount;
use App\Models\External\BroAExternal;
use App\Models\External\BroBExternal;
use App\Models\External\BroCExternal;
use App\Models\External\BroDExternal;
use App\Models\External\BroEExternal;
use App\Models\External\EndorsedExternal;
use App\Models\External\GpAExternal;
use App\Models\External\GpBExternal;
use App\Models\External\GpCExternal;
use App\Models\External\GpDExternal;
use App\Models\External\GpEExternal;
use App\Models\External\PtcAExternal;
use App\Models\External\PtcBExternal;
use App\Models\External\PtcCExternal;
use App\Models\External\PtcDExternal;
use App\Models\External\PtcEExternal;
use App\Models\External\RstAExternal;
use App\Models\External\RstBExternal;
use App\Models\External\RstCExternal;
use App\Models\External\RstDExternal;
use App\Models\External\RstEExternal;
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
        
         $checkEndorsed = EndorsedExternal::where('category', 'Best Regional Office')
         ->pluck('user_id')
         ->toArray();

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
            'largeRank',
            'checkEndorsed'
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
    
            $averageProgressPerRegion = round($totalProgress / 11, 2); // 10 is the number of offices
    
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
    
    public function endorseTi(Request $request, $id)
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
            'users.region_name',
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

        $submissionStatus = $request->input('submission_status');
        $deductionPoints = 0;


        switch ($submissionStatus) {
            case 'Hard copies 1-2 days late submission':
                $deductionPoints = 5;
                break;
            case 'Hard copies submitted 3 days late onwards':
                $deductionPoints = 25;
                break;
            case 'Hard copies received without official request':
                $deductionPoints = 40;
                break;
            case 'No hard copies submitted':
                $deductionPoints = 1000;
                break;
            case 'Hard copies submitted on time':
                $deductionPoints = 0;
                break;
        
        }

        if ($user->awardings === 'Best_TI' && ($user->category === 'RTC-STC' || $user->category === 'TAS'))
        {
            $store = EndorsedExternal::create([
                'user_id' => $user->user_id,
                'category' => $user->awardings,
                'grouping' => $user->category,
                'region' => $user->region_name,
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
                'submission_status' => $submissionStatus,
                'deduction' => $deductionPoints,
                'final_score' => (($user->tas_rtcstc_a_score ?? 0) + 
                    ($user->tas_rtcstc_b_score ?? 0) + 
                    ($user->tas_rtcstc_c_score ?? 0) + 
                    ($user->tas_rtcstc_d_score ?? 0) + 
                    ($user->tas_rtcstc_e_score ?? 0)) - $deductionPoints,
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
                'region' => $user->region_name,
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
                'submission_status' => $submissionStatus,
                'deduction' => $deductionPoints,
                'final_score' => (($user->ptc_a_score ?? 0) + 
                ($user->ptc_b_score ?? 0) + 
                ($user->ptc_c_score ?? 0) + 
                ($user->ptc_d_score ?? 0) + 
                ($user->ptc_e_score ?? 0)) - $deductionPoints,
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

    public function endorseGp(Request $request, $id)
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
            'users.region_name',
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

        $submissionStatus = $request->input('submission_status');
        $deductionPoints = 0;


        switch ($submissionStatus) {
            case 'Hard copies 1-2 days late submission':
                $deductionPoints = 5;
                break;
            case 'Hard copies submitted 3 days late onwards':
                $deductionPoints = 25;
                break;
            case 'Hard copies received without official request':
                $deductionPoints = 40;
                break;
            case 'No hard copies submitted':
                $deductionPoints = 1000;
                break;
            case 'Hard copies submitted on time':
                $deductionPoints = 0;
                break;
        
        }

            // Compute final score
            $romoFinalScore = ($user->galing_probinsya_a_score ?? 0) +
                            ($user->galing_probinsya_b_score ?? 0) +
                            ($user->galing_probinsya_c_score ?? 0) +
                            ($user->galing_probinsya_d_score ?? 0) +
                            ($user->galing_probinsya_e_score ?? 0);

            $finalScore = $romoFinalScore - $deductionPoints;


        if ($user->awardings === 'Galing_Probinsya')
        {
            $store = EndorsedExternal::create([
                'user_id' => $user->user_id,
                'category' => $user->awardings,
                'grouping' => $user->category,
                'region' => $user->region_name,
                'province' => $user->province_name,
                'nominee' => $user->province,
                'criteria_a' => $user->galing_probinsya_a_score ?? 0,
                'criteria_b' => $user->galing_probinsya_b_score ?? 0,
                'criteria_c' => $user->galing_probinsya_c_score ?? 0,
                'criteria_d' => $user->galing_probinsya_d_score ?? 0,
                'criteria_e' => $user->galing_probinsya_e_score ?? 0,
                'romo_final_score' => $romoFinalScore,
                'submission_status' => $submissionStatus,
                'deduction' => $deductionPoints,
                'final_score' => $finalScore,
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

    // public function rankGp()
    // {
    //     // $small = EndorsedExternal::where('grouping', 'Small_Province')->get();
    //     // $medium = EndorsedExternal::where('grouping', 'Medium_Province')->get();
    //     // $large = EndorsedExternal::where('grouping', 'Large_Province')->get();
    //     $small = EndorsedExternal::where('grouping', 'Small_Province')->orderBy('final_score', 'desc')->get();
    //     $medium = EndorsedExternal::where('grouping', 'Medium_Province')->orderBy('final_score', 'desc')->get();
    //     $large = EndorsedExternal::where('grouping', 'Large_Province')->orderBy('final_score', 'desc')->get();

    //     // return view('romd.gp-endorsed', ['small' => $small, 'medium' => $medium, 'large' => $large]);
        
    //     $collectScore = function($user_id, $validator_ids) {
    //         $models = [
    //             GpAExternal::class,
    //             GpBExternal::class,
    //             GpCExternal::class,
    //             GpDExternal::class,
    //             GpEExternal::class,
    //         ];
    
    //         $scoresByValidator = [];
    //         $progressByValidator = [];
    //         $breakdown = [];
    
    //         foreach ($validator_ids as $validator_id) {
    //             $totalScore = 0;
    //             $totalProgressPercentage = 0;
    //             $breakdown = [];
    
    //             foreach ($models as $modelClass) {
    //                                       /** @var \Illuminate\Database\Eloquent\Model $model */
    //                 $model = new $modelClass;
    //                 $table = $model->getTable();
    
    //                 $scores = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('overall_total_score');
    
    //                 $progress = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('progress_percentage');
    
    //                 $totalScore += $scores;
    //                 $totalProgressPercentage += $progress;
    //                 $breakdown[$table] = $scores;
    //             }
    //             $averageProgressPercentage = $totalProgressPercentage / count($models);
    
    //             $scoresByValidator[$validator_id] = $totalScore;
    //             $progressByValidator[$validator_id] = $averageProgressPercentage;
    //         }
    
    //         return ['scores' => $scoresByValidator, 'progress' => $progressByValidator, 'breakdown' => $breakdown];
    //     };
    
    //     // Validator IDs to track
    //     $validator_ids = [13, 16, 17];
    
    //     // Collect scores for each user in each grouping
    //     $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });
    
    //     $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });
    
    //     $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });
    
    //     return view('romd.gp-endorsed', [
    //         'small' => $small,
    //         'medium' => $medium,
    //         'large' => $large,
    //         'smallScores' => $smallScores,
    //         'mediumScores' => $mediumScores,
    //         'largeScores' => $largeScores,
    //     ]);
    // }
    public function rankGp()
    {
        $small = EndorsedExternal::where('grouping', 'Small_Province')->orderBy('final_score', 'desc')->get();
        $medium = EndorsedExternal::where('grouping', 'Medium_Province')->orderBy('final_score', 'desc')->get();
        $large = EndorsedExternal::where('grouping', 'Large_Province')->orderBy('final_score', 'desc')->get();

        $collectScore = function($user_id, $validator_ids) {
            $models = [
                GpAExternal::class,
                GpBExternal::class,
                GpCExternal::class,
                GpDExternal::class,
                GpEExternal::class,
            ];

            $scoresByValidator = [];
            $progressByValidator = [];
            $breakdownsByValidator = [];

            foreach ($validator_ids as $validator_id) {
                $totalScore = 0;
                $totalProgressPercentage = 0;
                $breakdown = [];

                foreach ($models as $modelClass) {
                    /** @var \Illuminate\Database\Eloquent\Model $model */
                    $model = new $modelClass;
                    $table = $model->getTable();

                    $scores = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('overall_total_score');

                    $progress = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('progress_percentage');

                    $totalScore += $scores;
                    $totalProgressPercentage += $progress;
                    $breakdown[$table] = $scores;
                }

                $averageProgressPercentage = count($models) ? $totalProgressPercentage / count($models) : 0;

                $scoresByValidator[$validator_id] = $totalScore;
                $progressByValidator[$validator_id] = $averageProgressPercentage;
                $breakdownsByValidator[$validator_id] = $breakdown;
            }

            return [
                'scores' => $scoresByValidator,
                'progress' => $progressByValidator,
                'breakdowns' => $breakdownsByValidator,
            ];
        };

        // Validator IDs to track
        $validator_ids = [13, 16, 17];

        // Collect scores for each user in each grouping
        $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        return view('romd.gp-endorsed', [
            'small' => $small,
            'medium' => $medium,
            'large' => $large,
            'smallScores' => $smallScores,
            'mediumScores' => $mediumScores,
            'largeScores' => $largeScores,
        ]);
    }


    // public function rankBro()
    // {
    //     $small = EndorsedExternal::where('grouping', 'Small')->orderBy('final_score', 'desc')->get();
    //     $medium = EndorsedExternal::where('grouping', 'Medium')->orderBy('final_score', 'desc')->get();
    //     $large = EndorsedExternal::where('grouping', 'Large')->orderBy('final_score', 'desc')->get();

    //     $collectScore = function($user_id, $validator_ids) {
    //         $models = [
    //             BroAExternal::class,
    //             BroBExternal::class,
    //             BroCExternal::class,
    //             BroDExternal::class,
    //             BroEExternal::class,
    //         ];

    //         $scoresByValidator = [];
    //         $progressByValidator = [];

    //         foreach ($validator_ids as $validator_id) {
    //             $totalScore = 0;
    //             $totalProgressPercentage = 0;
    //             $breakdown = [];

    //             foreach ($models as $modelClass) {
    //                 /** @var \Illuminate\Database\Eloquent\Model $model */
    //                 $model = new $modelClass;
    //                 $table = $model->getTable();

    //                 $scores = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('overall_total_score');

    //                 $progress = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('progress_percentage');

    //                 $totalScore += $scores;
    //                 $totalProgressPercentage += $progress;
    //                 $breakdown[$table] = $scores;
    //             }
    //             $averageProgressPercentage = $totalProgressPercentage / count($models);

    //             $scoresByValidator[$validator_id] = $totalScore;
    //             $progressByValidator[$validator_id] = $averageProgressPercentage;
    //         }

    //         return ['scores' => $scoresByValidator, 'progress' => $progressByValidator];
    //     };

    //     // Validator IDs to track
    //     $validator_ids = [13, 16, 17];

    //     // Collect scores for each user in each grouping
    //     $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });

    //     $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });

    //     $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
    //     });

    //     return view('romd.bro-endorsed', [
    //         'small' => $small,
    //         'medium' => $medium,
    //         'large' => $large,
    //         'smallScores' => $smallScores,
    //         'mediumScores' => $mediumScores,
    //         'largeScores' => $largeScores,
    //     ]);
    // }
    public function rankBro()
    {
        $small = EndorsedExternal::where('grouping', 'Small')->orderBy('final_score', 'desc')->get();
        $medium = EndorsedExternal::where('grouping', 'Medium')->orderBy('final_score', 'desc')->get();
        $large = EndorsedExternal::where('grouping', 'Large')->orderBy('final_score', 'desc')->get();

        $collectScore = function($user_id, $validator_ids) {
            $models = [
                BroAExternal::class,
                BroBExternal::class,
                BroCExternal::class,
                BroDExternal::class,
                BroEExternal::class,
            ];

            $scoresByValidator = [];
            $progressByValidator = [];
            $breakdownByValidator = [];

            foreach ($validator_ids as $validator_id) {
                $totalScore = 0;
                $totalProgressPercentage = 0;
                $breakdown = [];

                foreach ($models as $modelClass) {
                    /** @var \Illuminate\Database\Eloquent\Model $model */
                    $model = new $modelClass;
                    $table = $model->getTable();

                    $scores = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('overall_total_score');

                    $progress = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('progress_percentage');

                    $totalScore += $scores;
                    $totalProgressPercentage += $progress;
                    $breakdown[$table] = $scores;
                }
                $averageProgressPercentage = $totalProgressPercentage / count($models);

                $scoresByValidator[$validator_id] = $totalScore;
                $progressByValidator[$validator_id] = $averageProgressPercentage;
                $breakdownByValidator[$validator_id] = $breakdown;
            }

            return ['scores' => $scoresByValidator, 'progress' => $progressByValidator, 'breakdowns' => $breakdownByValidator];
        };

        // Validator IDs to track
        $validator_ids = [13, 16, 17];

        // Collect scores for each user in each grouping
        $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids)];
        });

        return view('romd.bro-endorsed', [
            'small' => $small,
            'medium' => $medium,
            'large' => $large,
            'smallScores' => $smallScores,
            'mediumScores' => $mediumScores,
            'largeScores' => $largeScores,
        ]);
    }


    // public function rankTi()
    // {
    //     $small = EndorsedExternal::where('grouping', 'RTC-STC')->orderBy('final_score', 'desc')->get();
    //     $medium = EndorsedExternal::where('grouping', 'TAS')->orderBy('final_score', 'desc')->get();
    //     $large = EndorsedExternal::where('grouping', 'PTC')->orderBy('final_score', 'desc')->get();

    //     // return view('romd.ti-endorsed', ['small' => $small, 'medium' => $medium, 'large' => $large]);

    //     $collectScore = function($user_id, $validator_ids, $grouping) {
    //         if ($grouping == 'PTC') {
    //             $models = [
    //                 PtcAExternal::class,
    //                 PtcBExternal::class,
    //                 PtcCExternal::class,
    //                 PtcDExternal::class,
    //                 PtcEExternal::class,
    //             ];
    //         } else {
    //             $models = [
    //                 RstAExternal::class,
    //                 RstBExternal::class,
    //                 RstCExternal::class,
    //                 RstDExternal::class,
    //                 RstEExternal::class,
    //             ];
    //         }
    
    //         $scoresByValidator = [];
    //         $progressByValidator = [];
    
    //         foreach ($validator_ids as $validator_id) {
    //             $totalScore = 0;
    //             $totalProgressPercentage = 0;
    //             $breakdown = [];
    
    //             foreach ($models as $modelClass) {
    //                 /** @var \Illuminate\Database\Eloquent\Model $model */
    //                 $model = new $modelClass;
    //                 $table = $model->getTable();
    
    //                 $scores = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('overall_total_score');
    
    //                 $progress = DB::table($table)
    //                     ->where('user_id', $user_id)
    //                     ->where('validator_id', $validator_id)
    //                     ->sum('progress_percentage');
    
    //                 $totalScore += $scores;
    //                 $totalProgressPercentage += $progress;
    //                 $breakdown[$table] = $scores;
    //             }
    //             $averageProgressPercentage = $totalProgressPercentage / count($models);
    
    //             $scoresByValidator[$validator_id] = $totalScore;
    //             $progressByValidator[$validator_id] = $averageProgressPercentage;
    //         }
    
    //         return ['scores' => $scoresByValidator, 'progress' => $progressByValidator];
    //     };
    
    //     // Validator IDs to track
    //     $validator_ids = [13, 16, 17];
    
    //     // Collect scores for each user in each grouping
    //     $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
    //     });
    
    //     $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
    //     });
    
    //     $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
    //         return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
    //     });
    
    //     return view('romd.ti-endorsed', [
    //         'small' => $small,
    //         'medium' => $medium,
    //         'large' => $large,
    //         'smallScores' => $smallScores,
    //         'mediumScores' => $mediumScores,
    //         'largeScores' => $largeScores,
    //     ]);
    // }
    public function rankTi()
    {
        $small = EndorsedExternal::where('grouping', 'RTC-STC')->orderBy('final_score', 'desc')->get();
        $medium = EndorsedExternal::where('grouping', 'TAS')->orderBy('final_score', 'desc')->get();
        $large = EndorsedExternal::where('grouping', 'PTC')->orderBy('final_score', 'desc')->get();

        $collectScore = function($user_id, $validator_ids, $grouping) {
            if ($grouping == 'PTC') {
                $models = [
                    PtcAExternal::class,
                    PtcBExternal::class,
                    PtcCExternal::class,
                    PtcDExternal::class,
                    PtcEExternal::class,
                ];
            } else {
                $models = [
                    RstAExternal::class,
                    RstBExternal::class,
                    RstCExternal::class,
                    RstDExternal::class,
                    RstEExternal::class,
                ];
            }

            $scoresByValidator = [];
            $progressByValidator = [];
            $breakdownByValidator = [];

            foreach ($validator_ids as $validator_id) {
                $totalScore = 0;
                $totalProgressPercentage = 0;
                $breakdown = [];

                foreach ($models as $modelClass) {
                    /** @var \Illuminate\Database\Eloquent\Model $model */
                    $model = new $modelClass;
                    $table = $model->getTable();

                    $scores = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('overall_total_score');

                    $progress = DB::table($table)
                        ->where('user_id', $user_id)
                        ->where('validator_id', $validator_id)
                        ->sum('progress_percentage');

                    $totalScore += $scores;
                    $totalProgressPercentage += $progress;
                    $breakdown[$table] = $scores;
                }
                $averageProgressPercentage = $totalProgressPercentage / count($models);

                $scoresByValidator[$validator_id] = $totalScore;
                $progressByValidator[$validator_id] = $averageProgressPercentage;
                $breakdownByValidator[$validator_id] = $breakdown;
            }

            return ['scores' => $scoresByValidator, 'progress' => $progressByValidator, 'breakdowns' => $breakdownByValidator];
        };

        // Validator IDs to track
        $validator_ids = [13, 16, 17];

        // Collect scores for each user in each grouping
        $smallScores = $small->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
        });

        $mediumScores = $medium->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
        });

        $largeScores = $large->mapWithKeys(function ($user) use ($collectScore, $validator_ids) {
            return [$user->user_id => $collectScore($user->user_id, $validator_ids, $user->grouping)];
        });

        return view('romd.ti-endorsed', [
            'small' => $small,
            'medium' => $medium,
            'large' => $large,
            'smallScores' => $smallScores,
            'mediumScores' => $mediumScores,
            'largeScores' => $largeScores,
        ]);
    }



    public function endorseBro($id)
    {
        $region = Region::findOrFail($id);
        
        // Retrieve evaluations for the given region ID
        $asEvaluations = AsEvaluation::where('region_id', $id)->get();
        $coEvaluations = CoEvaluation::where('region_id', $id)->get();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->get();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->get();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->get();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->get();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->get();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->get();
        $poEvaluations = PoEvaluation::where('region_id', $id)->get();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->get();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->get();

        // Initialize sums
        $totalA = 0;
        $totalB = 0;
        $totalC = 0;
        $totalD = 0;
        $totalE = 0;

        // Sum "a" fields from AsEvaluation
        foreach ($asEvaluations as $evaluation) {
            $totalA += $evaluation->a6 ?? 0;
            $totalA += $evaluation->a8 ?? 0;
            $totalC += $evaluation->c31 ?? 0;
            $totalC += $evaluation->c32 ?? 0;
            $totalC += $evaluation->c411 ?? 0;
            $totalC += $evaluation->c412 ?? 0;
            $totalC += $evaluation->c421 ?? 0;
            $totalC += $evaluation->c422 ?? 0;
            $totalC += $evaluation->c431 ?? 0;
            $totalC += $evaluation->c432 ?? 0;
            $totalC += $evaluation->c5 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        // Sum "b" fields from CoEvaluation
        foreach ($coEvaluations as $evaluation) {
            $totalB += $evaluation->b1c ?? 0;
            $totalB += $evaluation->b1d ?? 0;
            $totalB += $evaluation->b1e ?? 0;
            $totalB += $evaluation->b1f ?? 0;
            $totalB += $evaluation->b2c1 ?? 0;
            $totalB += $evaluation->b2c2 ?? 0;
            $totalB += $evaluation->b2c3 ?? 0;
            $totalB += $evaluation->b2c4 ?? 0;
            $totalB += $evaluation->b2c5 ?? 0;
            $totalB += $evaluation->b2c6 ?? 0;
            $totalB += $evaluation->b2e11a ?? 0;
            $totalB += $evaluation->b2e11b ?? 0;
            $totalB += $evaluation->b2e12a ?? 0;
            $totalB += $evaluation->b2e12b ?? 0;
            $totalB += $evaluation->b2e13a ?? 0;
            $totalB += $evaluation->b2e13b ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        // Sum "a" and "c" fields from FmsEvaluation
        foreach ($fmsEvaluations as $evaluation) {
            $totalA += $evaluation->a5a ?? 0;
            $totalA += $evaluation->a5b ?? 0;
            $totalA += $evaluation->a7a ?? 0;
            $totalA += $evaluation->a7b ?? 0;
            $totalC += $evaluation->c1 ?? 0;
            $totalC += $evaluation->c2 ?? 0;
            $totalC += $evaluation->c33 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        // Sum "b" fields from IctoEvaluation
        foreach ($ictoEvaluations as $evaluation) {
            $totalB += $evaluation->b2a3 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        foreach ($ldEvaluations as $evaluation) {
            $totalA += $evaluation->a1 ?? 0;
            $totalA += $evaluation->a2 ?? 0;
        }

        foreach ($nitesdEvaluations as $evaluation) {
            $totalB += $evaluation->b2a1 ?? 0;
            $totalB += $evaluation->b2a2 ?? 0;
            $totalB += $evaluation->b2d31 ?? 0;
            $totalB += $evaluation->b2d32 ?? 0;
            $totalB += $evaluation->b2d441 ?? 0;
            $totalB += $evaluation->b2d442 ?? 0;
            $totalB += $evaluation->b2e3 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        foreach ($piadEvaluations as $evaluation) {
            $totalA += $evaluation->a3 ?? 0;
            $totalA += $evaluation->a4 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
            $totalE += $evaluation->e1 ?? 0;
        }

        foreach ($ploEvaluations as $evaluation) {
            $totalB += $evaluation->b1g ?? 0;
            $totalB += $evaluation->b2d411 ?? 0;
            $totalB += $evaluation->b2d412 ?? 0;
            $totalB += $evaluation->b2d421 ?? 0;
            $totalB += $evaluation->b2d422 ?? 0;
            $totalB += $evaluation->b2d431 ?? 0;
            $totalB += $evaluation->b2d432 ?? 0;
            $totalB += $evaluation->b2d5 ?? 0;
            $totalB += $evaluation->b2d6 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        foreach ($poEvaluations as $evaluation) {
            $totalB += $evaluation->b1a ?? 0;
            $totalB += $evaluation->b1b ?? 0;
            $totalB += $evaluation->b1i ?? 0;
            $totalB += $evaluation->b2b1 ?? 0;
            $totalB += $evaluation->b2b5 ?? 0;
            $totalB += $evaluation->b2d1 ?? 0;
            $totalB += $evaluation->b2d2 ?? 0;
            $totalB += $evaluation->b2e21 ?? 0;
            $totalB += $evaluation->b2e22 ?? 0;
            $totalB += $evaluation->b2e23 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        foreach ($romoEvaluations as $evaluation) {
            $totalB += $evaluation->b1h ?? 0;
            $totalB += $evaluation->b2b2 ?? 0;
            $totalB += $evaluation->b2b3 ?? 0;
            $totalB += $evaluation->b2b4 ?? 0;
            $totalD += $evaluation->d1 ?? 0;
        }

        foreach ($wsEvaluations as $evaluation) {
            $totalB += $evaluation->b2a41 ?? 0;
            $totalB += $evaluation->b2a42 ?? 0;
            $totalB += $evaluation->b2a43 ?? 0;
        }

        $averageD = $totalD / 9;

        if ($averageD >= 50) {
            $criteriaD = 60;
        } elseif ($averageD >= 1 && $averageD <= 49) {
            $criteriaD = 30;
        } elseif ($averageD == 0) {
            $criteriaD = 0;
        } else {
            $criteriaD = null; // or some default value
        }

        $store = EndorsedExternal::create([
            'user_id' => $region->id,
            'category' => "Best Regional Office",
            'grouping' => $region->region_category,
            'province' => $region->region_name,
            'criteria_a' => $totalA,
            'criteria_b' => $totalB,
            'criteria_c' => $totalC,
            'criteria_d' => $criteriaD,
            'criteria_e' => $totalE,
            'romo_final_score' => 
            $totalA + 
            $totalB + 
            $totalC + 
            $criteriaD + 
            $totalE,
        ]);

        return redirect()->back()->with('success', 'Nominee endorsed successfully.');

    }

    public function storeFinalistRecords(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'category' => 'required|string',
            'grouping' => 'required|string',
            'region' => 'nullable|string',
            'province' => 'nullable|string',
            'nominee' => 'nullable|string',
            'secretariat_score' => 'nullable|numeric',
            'score_13' => 'required|numeric',
            'score_16' => 'required|numeric',
            'score_17' => 'required|numeric',
            'average' => 'nullable|numeric',
            'placement' => 'nullable|string',
            'awarding_year' => 'required|integer',
        ]);

        AwardingsFinalistRecord::updateOrCreate(
            ['user_id' => $validatedData['user_id'], 'awarding_year' => $validatedData['awarding_year']],
            $validatedData
        );

        return response()->json(['success' => true]);
    }


}
