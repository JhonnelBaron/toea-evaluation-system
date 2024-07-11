<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use App\Models\BroAPillar;
use App\Models\BroBPillar;
use App\Models\BroCPillar;
use App\Models\BroDePillar;
use App\Models\CoEvaluation;
use App\Models\FmsEvaluation;
use App\Models\IctoEvaluation;
use App\Models\LdEvaluation;
use App\Models\NitesdEvaluation;
use App\Models\PiadEvaluation;
use App\Models\PloEvaluation;
use App\Models\PoEvaluation;
use App\Models\ProgressSubmission;
use App\Models\Region;
use App\Models\RomoEvaluation;
use App\Models\WsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BroEvaluationController extends Controller
{
    public function index()
{  
    $user = Auth::user();
        // Added null check for $user and $user->executive_office
        if (!$user || !$user->executive_office) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['session_expired' => 'Your session has expired. Please log in again.']);
        }    
    $regions = Region::all();
    
    $smallRegions = [];
    $mediumRegions = [];
    $largeRegions = [];

    foreach ($regions as $region) {
        switch ($user->executive_office) {
            case 'AS':
                $region->evaluations = $region->asEval;
                break;
            case 'CO':
                $region->evaluations = $region->coEval;
                break;
            case 'LD':
                $region->evaluations = $region->ldEval;
                break;
            case 'FMS':
                $region->evaluations = $region->fmsEval;
                break;
            case 'NITESD':
                $region->evaluations = $region->nitesdEval;
                break;
            case 'PIAD':
                $region->evaluations = $region->piadEval;
                break;
            case 'PO':
                $region->evaluations = $region->poEval;
                break;
            case 'PLO':
                $region->evaluations = $region->ploEval;
                break;
            case 'ROMO':
                $region->evaluations = $region->romoEval;
                break;
            case 'ICTO':
                $region->evaluations = $region->ictoEval;
                break;
            case 'WS':
                $region->evaluations = $region->wsEval;
                break;
            default:
                $region->evaluations = collect();
                break;
        }

        // Categorize regions based on region_category
        switch ($region->region_category) {
            case 'Small':
                $smallRegions[] = $region;
                break;
            case 'Medium':
                $mediumRegions[] = $region;
                break;
            case 'Large':
                $largeRegions[] = $region;
                break;
            default:
                // Handle unknown categories if needed
                break;
        }
    }

    return view('executive.evaluate', compact('smallRegions', 'mediumRegions', 'largeRegions'));
}
    // public function index()
    // {  
    //     $user = Auth::user();
    //     $regions = Region::all();
    
    //     foreach ($regions as $region) {
    //         if ($user->executive_office === 'AS') {
    //             $region->evaluations = $region->asEval;
    //         } elseif ($user->executive_office === 'CO') {
    //             $region->evaluations = $region->coEval;
    //         } elseif ($user->executive_office === 'LD') {
    //             $region->evaluations = $region->ldEval;
    //         } elseif ($user->executive_office === 'FMS') {
    //             $region->evaluations = $region->fmsEval;
    //         } elseif ($user->executive_office === 'NITESD') {
    //             $region->evaluations = $region->nitesdEval;
    //         } elseif ($user->executive_office === 'PIAD') {
    //             $region->evaluations = $region->piadEval;
    //         } elseif ($user->executive_office === 'PO') {
    //             $region->evaluations = $region->poEval;
    //         } elseif ($user->executive_office === 'PLO') {
    //             $region->evaluations = $region->ploEval;
    //         } elseif ($user->executive_office === 'ROMO') {
    //             $region->evaluations = $region->romoEval;
    //         } elseif ($user->executive_office === 'ICTO') {
    //             $region->evaluations = $region->ictoEval;
    //         } else {
    //             $region->evaluations = collect();
    //         }
    //     }

    //     return view('executive.evaluate', compact('regions'));
    // }

    public function evaluationIndex($id)
    {
        $region = Region::findOrFail($id);
        $regionName = $region->region_name;

        if (!$region) {
            return response('id not found!');
        }

        $user = Auth::user();
        // Added null check for $user and $user->executive_office
        if (!$user || !$user->executive_office) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['session_expired' => 'Your session has expired. Please log in again.']);
        }

        $user = Auth::user();
        switch ($user->executive_office) {
            case 'AS':
                $previousEvaluation = AsEvaluation::where('uploader_id', $user->id)
                    ->where('region_id', $region->id)
                    ->first();
                break;
            case 'CO':
                $previousEvaluation = CoEvaluation::where('uploader_id', $user->id)
                    ->where('region_id', $region->id)
                    ->first();
                break;
            case 'LD':
                $previousEvaluation = LdEvaluation::where('uploader_id', $user->id)
                    ->where('region_id', $region->id)
                    ->first();
                break;
            case 'FMS':
                $previousEvaluation = FmsEvaluation::where('uploader_id', $user->id)
                    ->where('region_id', $region->id)
                    ->first();
                break;
            case 'NITESD':
                $previousEvaluation = NitesdEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            case 'PIAD':
                $previousEvaluation = PiadEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            case 'PO':
                $previousEvaluation = PoEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            case 'PLO':
                $previousEvaluation = PloEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            case 'ROMO':
                $previousEvaluation = RomoEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            case 'ICTO':
                $previousEvaluation = IctoEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
            case 'WS':
                $previousEvaluation = WsEvaluation::where('uploader_id', $user->id)
                ->where('region_id', $region->id)
                ->first();
                break;
            default:
                return response('Invalid executive office');
        }

        if($user->executive_office === 'AS')
        {
            return view('executive.as-evaluate', ['regionId' => $id,
        'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'CO')
        {
            return view('executive.co-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'LD')
        {
            return view('executive.ld-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'FMS')
        {
            return view('executive.fms-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'NITESD')
        {
            return view('executive.nitesd-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'PIAD')
        {
            return view('executive.piad-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'PO')
        {
            return view('executive.po-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'PLO')
        {
            return view('executive.plo-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'ROMO')
        {
            return view('executive.romo-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'ICTO')
        {
            return view('executive.icto-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }elseif($user->executive_office === 'WS')
        {
            return view('executive.ws-evaluate', ['regionId' => $id,
            'regionName' => $regionName, 'previousEvaluation' => $previousEvaluation]);
        }
    }

    public function storeAS(Request $request)
    {
        
        $rules = [
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
            'c31' => 'nullable|integer',
            'c31_remarks' => 'nullable|string',
            'c32' => 'nullable|integer',
            'c32_remarks' => 'nullable|string',
            'c411' => 'nullable|integer',
            'c411_remarks' => 'nullable|string',
            'c412' => 'nullable|integer',
            'c412_remarks' => 'nullable|string',
            'c421' => 'nullable|integer',
            'c421_remarks' => 'nullable|string',
            'c422' => 'nullable|integer',
            'c422_remarks' => 'nullable|string',
            'c431' => 'nullable|integer',
            'c431_remarks' => 'nullable|string',
            'c432' => 'nullable|integer',
            'c432_remarks' => 'nullable|string',
            'c5' => 'nullable|integer',
            'c5_remarks' => 'nullable|string',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ];

        $validatedData = Validator::make($request->all(), $rules);

        if ($validatedData->fails()) {
            return response()->json(['error' => $validatedData->errors()], 422);
        }

        $user = Auth::user();
        $regionId = $request->query('id');
        $region = Region::findOrFail($regionId);

       // Fields for each pillar
    $fieldsA = ['a6', 'a8'];
    $fieldsC = ['c31', 'c32', 'c411', 'c412', 'c421', 'c422', 'c431', 'c432', 'c5'];
    $fieldsD = ['d1'];

    // Calculate filled fields and totals for each pillar
    $filledFieldsA = collect($fieldsA)->filter(fn($field) => !empty($validatedData[$field]))->count();
    $totalA = collect($fieldsA)->sum(fn($field) => $validatedData[$field] ?? 0);

    $filledFieldsC = collect($fieldsC)->filter(fn($field) => !empty($validatedData[$field]))->count();
    $totalC = collect($fieldsC)->sum(fn($field) => $validatedData[$field] ?? 0);

    $filledFieldsD = collect($fieldsD)->filter(fn($field) => !empty($validatedData[$field]))->count();
    $totalD = collect($fieldsD)->sum(fn($field) => $validatedData[$field] ?? 0);

    // Calculate total filled fields and overall total
    $overallFilledFieldsCount = $filledFieldsA + $filledFieldsC + $filledFieldsD;
    $overallTotal = $totalA + $totalC + $totalD;

    // Calculate overall progress percentage
    $fieldsCount = count($fieldsA) + count($fieldsC) + count($fieldsD);
    $overallProgressPercentage = ($overallFilledFieldsCount / $fieldsCount) * 100;
    try {
        // Store evaluation for BroBPillar
        BroAPillar::updateOrCreate([
            'uploader_id' => $user->id,
            'secretariat_office' => $user->executive_office,
            'region_id' => $region->id,
            'region_name' => $region->region_name,
            'a6' => $validatedData['a6'],
            'a6_remarks' => $validatedData['a6_remarks'],
            'a8' => $validatedData['a8'],
            'a8_remarks' => $validatedData['a8_remarks'],
        ]);


        BroCPillar::updateOrCreate([
            'uploader_id' => $user->id,
            'secretariat_office' => $user->executive_office,
            'region_id' => $region->id,
            'region_name' => $region->region_name,
            'c31' => $validatedData['c31'],
            'c31_remarks' => $validatedData['c31_remarks'],
            'c32' => $validatedData['c32'],
            'c32_remarks' => $validatedData['c32_remarks'],
            'c411' => $validatedData['c411'],
            'c411_remarks' => $validatedData['c411_remarks'],
            'c412' => $validatedData['c412'],
            'c412_remarks' => $validatedData['c412_remarks'],
            'c421' => $validatedData['c421'],
            'c421_remarks' => $validatedData['c421_remarks'],
            'c422' => $validatedData['c422'],
            'c422_remarks' => $validatedData['c422_remarks'],
            'c431' => $validatedData['c431'],
            'c431_remarks' => $validatedData['c431_remarks'],
            'c432' => $validatedData['c432'],
            'c432_remarks' => $validatedData['c432_remarks'],
            'c5' => $validatedData['c5'],
            'c5_remarks' => $validatedData['c5_remarks'],
        ]);


        BroDePillar::updateOrCreate([
            'uploader_id' => $user->id,
            'secretariat_office' => $user->executive_office,
            'region_id' => $region->id,
            'region_name' => $region->region_name,
            'd1' => $validatedData['d1'],
            'd1_remarks' => $validatedData['d1_remarks'],
        ]);

        ProgressSubmission::updateOrCreate([
            'uploader_id' => $user->id,
            'region_id' => $region->id,
            'progress_percentage' => $overallProgressPercentage,
            'overall_total_score' => $overallTotal,
            'overall_total_filled' => $overallFilledFieldsCount,
        ]);

        dd($request->all());
        return response()->json(['success' => 'Evaluation saved successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to save evaluation.'], 500);
    }
    }

    public function saveRemarks(Request $request)
    {
        $user = Auth::user();
        $regionId = $request->input('region_id');
        $finalRemarks = $request->input('final_remarks');
    
        switch ($user->executive_office) {
            case 'AS':
                AsEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'CO':
                CoEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'LD':
                LdEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'FMS':
                FmsEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'NITESD':
                NitesdEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'PIAD':
                PiadEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'PO':
                PoEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'PLO':
                PloEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'ROMO':
                RomoEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            case 'ICTO':
                IctoEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
            case 'WS':
                WsEvaluation::updateOrCreate(
                    ['region_id' => $regionId, 'uploader_id' => $user->id],
                    ['final_remarks' => $finalRemarks]
                );
                break;
            default:
                return response('Invalid executive office');
        }
    
        return response()->json(['message' => 'Remarks saved successfully']);
    }
    
    
}