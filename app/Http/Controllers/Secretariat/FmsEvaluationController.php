<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\FmsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FmsEvaluationController extends Controller
{
    public function fmsSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'a5a' => 'nullable|integer|in:0,1,5,15',
            'a5a_remarks' => 'nullable|string',
            'a5b' => 'nullable|integer|in:0,15',
            'a5b_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer|in:0,10',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer|in:0,10',
            'a7b_remarks' => 'nullable|string',
            'd1' => 'nullable|integer|in:0,30,60',
            'd1_remarks' => 'nullable|string',
        ]);

        $validator->setCustomMessages([
            'in' => 'You input an invalid number. Please ensure the number you enter meets the requirements listed in the column.',
        ]);

        $validatedData = $validator->validate();

        $user = Auth::user();
        $regionId = $validatedData['region_id'];

        // Check if an existing evaluation record exists for the user
        $existingEvaluation = FmsEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'a5a' => $validatedData['a5a'] ?? null,
            'a5a_remarks' => $validatedData['a5a_remarks'] ?? null,
            'a5b' => $validatedData['a5b'] ?? null,
            'a5b_remarks' => $validatedData['a5b_remarks'] ?? null,
            'a7a' => $validatedData['a7a'] ?? null,
            'a7a_remarks' => $validatedData['a7a_remarks'] ?? null,
            'a7b' => $validatedData['a7b'] ?? null,
            'a7b_remarks' => $validatedData['a7b_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'a5a' => null, 'a5b' => null, 'a7a' => null, 'a7b' => null, 'd1' => null,
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
            return $value !== null;
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

            if ($existingEvaluation->a5a !== null) {
                $evaluationData['a5a'] = $existingEvaluation->a5a;
                $evaluationData['a5a_remarks'] = $existingEvaluation->a5a_remarks;
                $disabledFields[] = 'a5a';
            }
            if ($existingEvaluation->a5b !== null) {
                $evaluationData['a5b'] = $existingEvaluation->a5b;
                $evaluationData['a5b_remarks'] = $existingEvaluation->a5b_remarks;
                $disabledFields[] = 'a5b';
            }
            if ($existingEvaluation->a7a !== null) {
                $evaluationData['a7a'] = $existingEvaluation->a7a;
                $evaluationData['a7a_remarks'] = $existingEvaluation->a7a_remarks;
                $disabledFields[] = 'a7a';
            }
            if ($existingEvaluation->a7b !== null) {
                $evaluationData['a7b'] = $existingEvaluation->a7b;
                $evaluationData['a7b_remarks'] = $existingEvaluation->a7b_remarks;
                $disabledFields[] = 'a7b';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            FmsEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
