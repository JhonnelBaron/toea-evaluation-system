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
            'a5a_checkbox' => 'nullable|boolean',
            'a5b' => 'nullable|integer|in:0,15',
            'a5b_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer|in:0,10',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer|in:0,10',
            'a7b_remarks' => 'nullable|string',
            'c1' => 'nullable|integer|in:0,10,25',
            'c1_remarks' => 'nullable|string',
            'c2' => 'nullable|integer|in:0,5,15,25',
            'c2_remarks' => 'nullable|string',
            'c33' => 'nullable|integer|in:0,3,6',
            'c33_remarks' => 'nullable|string',
            'c33_checkbox' => 'nullable|boolean',
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
            'c1' => $validatedData['c1'] ?? null,
            'c1_remarks' => $validatedData['c1_remarks'] ?? null,
            'c2' => $validatedData['c2'] ?? null,
            'c2_remarks' => $validatedData['c2_remarks'] ?? null,
            'c33' => $validatedData['c33'] ?? null,
            'c33_remarks' => $validatedData['c33_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'a5a' => null, 'a5b' => null, 'a7a' => null, 'a7b' => null, 'c1' => null,'c2' => null, 'c33' => null, 'd1' => null,
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

        
            // If the checkbox is checked, add +1 to the c33 value
            if (isset($validatedData['c33_checkbox']) && $validatedData['c33_checkbox']) {
                $evaluationData['c33'] = ($evaluationData['c33'] ?? 0) + 1;
                $totalFields['c33'] = ($totalFields['c33'] ?? 0) + 1;
            }

            // If the checkbox is checked, add +1 to the a5a value
            if (isset($validatedData['a5a_checkbox']) && $validatedData['a5a_checkbox']) {
                $evaluationData['a5a'] = ($evaluationData['a5a'] ?? 0) + 1;
                $totalFields['a5a'] = ($totalFields['a5a'] ?? 0) + 1;
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
            if ($existingEvaluation->c1 !== null) {
                $evaluationData['c1'] = $existingEvaluation->c1;
                $evaluationData['c1_remarks'] = $existingEvaluation->c1_remarks;
                $disabledFields[] = 'c1';
            }
            if ($existingEvaluation->c2 !== null) {
                $evaluationData['c2'] = $existingEvaluation->c2;
                $evaluationData['c2_remarks'] = $existingEvaluation->c2_remarks;
                $disabledFields[] = 'c2';
            }
            if ($existingEvaluation->c33 !== null) {
                $evaluationData['c33'] = $existingEvaluation->c33;
                $evaluationData['c33_remarks'] = $existingEvaluation->c33_remarks;
                $disabledFields[] = 'c33';
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

