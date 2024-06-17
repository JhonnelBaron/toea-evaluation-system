<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\CoEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CoEvaluationController extends Controller
{
    public function coSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:executive_office_accounts,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b1c' => 'nullable|integer|in:0,15',
            'b1c_remarks' => 'nullable|string',
            'b1d' => 'nullable|integer|in:0,15',
            'b1d_remarks' => 'nullable|string',
            'b1e' => 'nullable|integer|in:0,15',
            'b1e_remarks' => 'nullable|string',
            'b1f' => 'nullable|integer|in:0,15',
            'b1f_remarks' => 'nullable|string',
            'b2a31' => 'nullable|integer|in:0,3,6',
            'b2a31_remarks' => 'nullable|string',
            'b2a32' => 'nullable|integer|in:0,7',
            'b2a32_remarks' => 'nullable|string',
            'b2a33' => 'nullable|integer|in:0,12',
            'b2a33_remarks' => 'nullable|string',
            'b2c1' => 'nullable|integer|in:0,10',
            'b2c1_remarks' => 'nullable|string',
            'b2c2' => 'nullable|integer|in:0,15',
            'b2c2_remarks' => 'nullable|string',
            'b2c3' => 'nullable|integer|in:0,15',
            'b2c3_remarks' => 'nullable|string',
            'b2c4' => 'nullable|integer|in:0,15',
            'b2c4_remarks' => 'nullable|string',
            'b2c7' => 'nullable|integer|in:0,8',
            'b2c7_remarks' => 'nullable|string',
            'b2e11a' => 'nullable|integer|in:0,5',
            'b2e11a_remarks' => 'nullable|string',
            'b2e11b' => 'nullable|integer|in:0,10',
            'b2e11b_remarks' => 'nullable|string',
            'b2e12a' => 'nullable|integer|in:0,7',
            'b2e12a_remarks' => 'nullable|string',
            'b2e13b' => 'nullable|integer|in:0,7',
            'b2e13b_remarks' => 'nullable|string',
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
        $existingEvaluation = CoEvaluation::where('uploader_id', $user->id)
        ->where('region_id', $regionId)
        ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b1c' => $validatedData['b1c'] ?? null,
            'b1c_remarks' => $validatedData['b1c_remarks'] ?? null,
            'b1d' => $validatedData['b1d'] ?? null,
            'b1d_remarks' => $validatedData['b1d_remarks'] ?? null,
            'b1e' => $validatedData['b1e'] ?? null,
            'b1e_remarks' => $validatedData['b1e_remarks'] ?? null,
            'b1f' => $validatedData['b1f'] ?? null,
            'b1f_remarks' => $validatedData['b1f_remarks'] ?? null,
            'b2a31' => $validatedData['b2a31'] ?? null,
            'b2a31_remarks' => $validatedData['b2a31_remarks'] ?? null,
            'b2a32' => $validatedData['b2a32'] ?? null,
            'b2a32_remarks' => $validatedData['b2a32_remarks'] ?? null,
            'b2a33' => $validatedData['b2a33'] ?? null,
            'b2a33_remarks' => $validatedData['b2a33_remarks'] ?? null,
            'b2c1' => $validatedData['b2c1'] ?? null,
            'b2c1_remarks' => $validatedData['b2c1_remarks'] ?? null,
            'b2c2' => $validatedData['b2c2'] ?? null,
            'b2c2_remarks' => $validatedData['b2c2_remarks'] ?? null,
            'b2c3' => $validatedData['b2c3'] ?? null,
            'b2c3_remarks' => $validatedData['b2c3_remarks'] ?? null,
            'b2c4' => $validatedData['b2c4'] ?? null,
            'b2c4_remarks' => $validatedData['b2c4_remarks'] ?? null,
            'b2c7' => $validatedData['b2c7'] ?? null,
            'b2c7_remarks' => $validatedData['b2c7_remarks'] ?? null,
            'b2e11a' => $validatedData['b2e11a'] ?? null,
            'b2e11a_remarks' => $validatedData['b2e11a_remarks'] ?? null,
            'b2e11b' => $validatedData['b2e11b'] ?? null,
            'b2e11b_remarks' => $validatedData['b2e11b_remarks'] ?? null,
            'b2e12a' => $validatedData['b2e12a'] ?? null,
            'b2e12a_remarks' => $validatedData['b2e12a_remarks'] ?? null,
            'b2e13b' => $validatedData['b2e13b'] ?? null,
            'b2e13b_remarks' => $validatedData['b2e13b_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b1c' => 0, 'b1d' => 0, 'b1e' => 0, 'b1f' => 0, 'b2a31' => 0, 'b2a32' => 0,
            'b2a33' => 0, 'b2c1' => 0, 'b2c2' => 0, 'b2c3' => 0, 'b2c4' => 0, 'b2c7' => 0,
            'b2e11a' => 0, 'b2e11b' => 0, 'b2e12a' => 0, 'b2e13b' => 0, 'd1' => 0,
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

            if ($existingEvaluation->b1c !== null) {
                $evaluationData['b1c'] = $existingEvaluation->b1c;
                $evaluationData['b1c_remarks'] = $existingEvaluation->b1c_remarks;
                $disabledFields[] = 'b1c';
            }
            if ($existingEvaluation->b1d !== null) {
                $evaluationData['b1d'] = $existingEvaluation->b1d;
                $evaluationData['b1d_remarks'] = $existingEvaluation->b1d_remarks;
                $disabledFields[] = 'b1d';
            }
            if ($existingEvaluation->b1e !== null) {
                $evaluationData['b1e'] = $existingEvaluation->b1e;
                $evaluationData['b1e_remarks'] = $existingEvaluation->b1e_remarks;
                $disabledFields[] = 'b1e';
            }
            if ($existingEvaluation->b1f !== null) {
                $evaluationData['b1f'] = $existingEvaluation->b1f;
                $evaluationData['b1f_remarks'] = $existingEvaluation->b1f_remarks;
                $disabledFields[] = 'b1f';
            }
            if ($existingEvaluation->b2a31 !== null) {
                $evaluationData['b2a31'] = $existingEvaluation->b2a31;
                $evaluationData['b2a31_remarks'] = $existingEvaluation->b2a31_remarks;
                $disabledFields[] = 'b2a31';
            }
            if ($existingEvaluation->b2a32 !== null) {
                $evaluationData['b2a32'] = $existingEvaluation->b2a32;
                $evaluationData['b2a32_remarks'] = $existingEvaluation->b2a32_remarks;
                $disabledFields[] = 'b2a32';
            }
            if ($existingEvaluation->b2a33 !== null) {
                $evaluationData['b2a33'] = $existingEvaluation->b2a33;
                $evaluationData['b2a33_remarks'] = $existingEvaluation->b2a33_remarks;
                $disabledFields[] = 'b2a33';
            }
            if ($existingEvaluation->b2c1 !== null) {
                $evaluationData['b2c1'] = $existingEvaluation->b2c1;
                $evaluationData['b2c1_remarks'] = $existingEvaluation->b2c1_remarks;
                $disabledFields[] = 'b2c1';
            }
            if ($existingEvaluation->b2c2 !== null) {
                $evaluationData['b2c2'] = $existingEvaluation->b2c2;
                $evaluationData['b2c2_remarks'] = $existingEvaluation->b2c2_remarks;
                $disabledFields[] = 'b2c2';
            }
            if ($existingEvaluation->b2c3 !== null) {
                $evaluationData['b2c3'] = $existingEvaluation->b2c3;
                $evaluationData['b2c3_remarks'] = $existingEvaluation->b2c3_remarks;
                $disabledFields[] = 'b2c3';
            }
            if ($existingEvaluation->b2c4 !== null) {
                $evaluationData['b2c4'] = $existingEvaluation->b2c4;
                $evaluationData['b2c4_remarks'] = $existingEvaluation->b2c4_remarks;
                $disabledFields[] = 'b2c4';
            }
            if ($existingEvaluation->b2c7 !== null) {
                $evaluationData['b2c7'] = $existingEvaluation->b2c7;
                $evaluationData['b2c7_remarks'] = $existingEvaluation->b2c7_remarks;
                $disabledFields[] = 'b2c7';
            }
            if ($existingEvaluation->b2e11a !== null) {
                $evaluationData['b2e11a'] = $existingEvaluation->b2e11a;
                $evaluationData['b2e11a_remarks'] = $existingEvaluation->b2e11a_remarks;
                $disabledFields[] = 'b2e11a';
            }
            if ($existingEvaluation->b2e11b !== null) {
                $evaluationData['b2e11b'] = $existingEvaluation->b2e11b;
                $evaluationData['b2e11b_remarks'] = $existingEvaluation->b2e11b_remarks;
                $disabledFields[] = 'b2e11b';
            }
            if ($existingEvaluation->b2e12a !== null) {
                $evaluationData['b2e12a'] = $existingEvaluation->b2e12a;
                $evaluationData['b2e12a_remarks'] = $existingEvaluation->b2e12a_remarks;
                $disabledFields[] = 'b2e12a';
            }
            if ($existingEvaluation->b2e13b !== null) {
                $evaluationData['b2e13b'] = $existingEvaluation->b2e13b;
                $evaluationData['b2e13b_remarks'] = $existingEvaluation->b2e13b_remarks;
                $disabledFields[] = 'b2e13b';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            CoEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
