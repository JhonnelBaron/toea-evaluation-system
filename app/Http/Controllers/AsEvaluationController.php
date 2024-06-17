<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AsEvaluationController extends Controller
{
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:executive_office_accounts,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'a6' => 'nullable|integer|in:0,30',
            'a6_remarks' => 'nullable|string',
            'a8' => 'nullable|integer|in:0,10',
            'a8_remarks' => 'nullable|string',
            'c31' => 'nullable|integer|in:0,10,20',
            'c31_remarks' => 'nullable|string',
            'c32' => 'nullable|integer|in:0,15',
            'c32_remarks' => 'nullable|string',
            'c411' => 'nullable|integer|in:0,4',
            'c411_remarks' => 'nullable|string',
            'c412' => 'nullable|integer|in:0,4',
            'c412_remarks' => 'nullable|string',
            'c421' => 'nullable|integer|in:0,4',
            'c421_remarks' => 'nullable|string',
            'c422' => 'nullable|integer|in:0,5',
            'c422_remarks' => 'nullable|string',
            'c431' => 'nullable|integer|in:0,4',
            'c431_remarks' => 'nullable|string',
            'c432' => 'nullable|integer|in:0,5',
            'c432_remarks' => 'nullable|string',
            'c5' => 'nullable|integer|in:0,4,8',
            'c5_remarks' => 'nullable|string',
            'd1' => 'nullable|integer|in:0,30,60',
            'd1_remarks' => 'nullable|string',
        ]);
        
        $validator->setCustomMessages([
            'in' => 'You input an invalid number. Please ensure the number you enter meets the requirements listed in the column.',
        ]);
        
        $validatedData = $validator->validate();

        $user = Auth::user();
        $regionId = $validatedData['region_id'];

        // Check if an existing evaluation record exists for the user and region
        $existingEvaluation = AsEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'a6' => $validatedData['a6'] ?? null,
            'a6_remarks' => $validatedData['a6_remarks'] ?? null,
            'a8' => $validatedData['a8'] ?? null,
            'a8_remarks' => $validatedData['a8_remarks'] ?? null,
            'c31' => $validatedData['c31'] ?? null,
            'c31_remarks' => $validatedData['c31_remarks'] ?? null,
            'c32' => $validatedData['c32'] ?? null,
            'c32_remarks' => $validatedData['c32_remarks'] ?? null,
            'c411' => $validatedData['c411'] ?? null,
            'c411_remarks' => $validatedData['c411_remarks'] ?? null,
            'c412' => $validatedData['c412'] ?? null,
            'c412_remarks' => $validatedData['c412_remarks'] ?? null,
            'c421' => $validatedData['c421'] ?? null,
            'c421_remarks' => $validatedData['c421_remarks'] ?? null,
            'c422' => $validatedData['c422'] ?? null,
            'c422_remarks' => $validatedData['c422_remarks'] ?? null,
            'c431' => $validatedData['c431'] ?? null,
            'c431_remarks' => $validatedData['c431_remarks'] ?? null,
            'c432' => $validatedData['c432'] ?? null,
            'c432_remarks' => $validatedData['c432_remarks'] ?? null,
            'c5' => $validatedData['c5'] ?? null,
            'c5_remarks' => $validatedData['c5_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

         // Initialize variables for overall progress metrics
    $totalFields = [
        'a6' => 0, 'a8' => 0, 'c31' => 0, 'c32' => 0, 'c411' => 0, 'c412' => 0,
        'c421' => 0, 'c422' => 0, 'c431' => 0, 'c432' => 0, 'c5' => 0, 'd1' => 0,
    ];

    // Update with existing data if available
    if ($existingEvaluation) {
        foreach ($totalFields as $key => $value) {
            if ($existingEvaluation->{$key} !== null) {
                $totalFields[$key] = $existingEvaluation->{$key};
            }
        }
    }

    // Update total fields with new data
    foreach ($totalFields as $key => $value) {
        if (isset($validatedData[$key])) {
            $totalFields[$key] += $validatedData[$key];
        }
    }

    // Calculate filled fields count
    $filledFieldsCount = count(array_filter($totalFields, function ($value) {
        return $value > 0;
    }));

    // Calculate total score
    $total = array_sum($totalFields);

    // Calculate progress percentage
    $progressPercentage = count($totalFields) > 0 ? ($filledFieldsCount / count($totalFields)) * 100 : 0;
    $totalFieldsCount = count($totalFields);

        // Add progress percentage and total score to evaluation data
        $evaluationData['progress_percentage'] = $progressPercentage;
        $evaluationData['overall_total_filled'] = $filledFieldsCount;
        $evaluationData['overall_total_score'] = $total;
        $evaluationData['total_fields'] = $totalFieldsCount;

        // If existing record found, update it; otherwise, create a new record
        if ($existingEvaluation) {

            $disabledFields = [];
        
        if ($existingEvaluation->a6 !== null) {
            $evaluationData['a6'] = $existingEvaluation->a6;
            $evaluationData['a6_remarks'] = $existingEvaluation->a6_remarks;
            $disabledFields[] = 'a6';
        }
        if ($existingEvaluation->a8 !== null) {
            $evaluationData['a8'] = $existingEvaluation->a8;
            $evaluationData['a8_remarks'] = $existingEvaluation->a8_remarks;
            $disabledFields[] = 'a8';
        }
        if ($existingEvaluation->c31 !== null) {
            $evaluationData['c31'] = $existingEvaluation->c31;
            $evaluationData['c31_remarks'] = $existingEvaluation->c31_remarks;
            $disabledFields[] = 'c31';
        }
        if ($existingEvaluation->c32 !== null) {
            $evaluationData['c32'] = $existingEvaluation->c32;
            $evaluationData['c32_remarks'] = $existingEvaluation->c32_remarks;
            $disabledFields[] = 'c32';
        }
        if ($existingEvaluation->c411 !== null) {
            $evaluationData['c411'] = $existingEvaluation->c411;
            $evaluationData['c411_remarks'] = $existingEvaluation->c411_remarks;
            $disabledFields[] = 'c411';
        }
        if ($existingEvaluation->c412 !== null) {
            $evaluationData['c412'] = $existingEvaluation->c412;
            $evaluationData['c412_remarks'] = $existingEvaluation->c412_remarks;
            $disabledFields[] = 'c412';
        }
        if ($existingEvaluation->c421 !== null) {
            $evaluationData['c421'] = $existingEvaluation->c421;
            $evaluationData['c421_remarks'] = $existingEvaluation->c421_remarks;
            $disabledFields[] = 'c421';
        }
        if ($existingEvaluation->c422 !== null) {
            $evaluationData['c422'] = $existingEvaluation->c422;
            $evaluationData['c422_remarks'] = $existingEvaluation->c422_remarks;
            $disabledFields[] = 'c422';
        }
        if ($existingEvaluation->c431 !== null) {
            $evaluationData['c431'] = $existingEvaluation->c431;
            $evaluationData['c431_remarks'] = $existingEvaluation->c431_remarks;
            $disabledFields[] = 'c431';
        }
        if ($existingEvaluation->c432 !== null) {
            $evaluationData['c432'] = $existingEvaluation->c432;
            $evaluationData['c432_remarks'] = $existingEvaluation->c432_remarks;
            $disabledFields[] = 'c432';
        }
        if ($existingEvaluation->c5 !== null) {
            $evaluationData['c5'] = $existingEvaluation->c5;
            $evaluationData['c5_remarks'] = $existingEvaluation->c5_remarks;
            $disabledFields[] = 'c5';
        }
        if ($existingEvaluation->d1 !== null) {
            $evaluationData['d1'] = $existingEvaluation->d1;
            $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
            $disabledFields[] = 'd1';
        }
        
            $existingEvaluation->update($evaluationData);
        } else {
            AsEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }

}
