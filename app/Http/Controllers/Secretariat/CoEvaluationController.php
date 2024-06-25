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
            'b2a41' => 'nullable|integer|in:0,3,6',
            'b2a41_remarks' => 'nullable|string',
            'b2a42' => 'nullable|integer|in:0,7',
            'b2a42_remarks' => 'nullable|string',
            'b2a43' => 'nullable|integer|in:0,10',
            'b2a43_remarks' => 'nullable|string',
            'b2c1' => 'nullable|integer|in:0,15',
            'b2c1_remarks' => 'nullable|string',
            'b2c2' => 'nullable|integer|in:0,15',
            'b2c2_remarks' => 'nullable|string',
            'b2c3' => 'nullable|integer|in:0,15',
            'b2c3_remarks' => 'nullable|string',
            'b2c4' => 'nullable|integer|in:0,15',
            'b2c4_remarks' => 'nullable|string',
            'b2c5' => 'nullable|integer|in:0,15',
            'b2c5_remarks' => 'nullable|string',
            'b2c6' => 'nullable|integer|in:0,10',
            'b2c6_remarks' => 'nullable|string',
            'b2e11a' => 'nullable|integer|in:0,6',
            'b2e11a_remarks' => 'nullable|string',
            'b2e11b' => 'nullable|integer|in:0,10',
            'b2e11b_remarks' => 'nullable|string',
            'b2e12a' => 'nullable|integer|in:0,6',
            'b2e12a_remarks' => 'nullable|string',
            'b2e12b' => 'nullable|integer|in:0,5,10,20',
            'b2e12b_remarks' => 'nullable|string',
            'b2e13a' => 'nullable|integer|in:0,8',
            'b2e13a_remarks' => 'nullable|string',
            'b2e13b' => 'nullable|integer|in:0,8',
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
            'b2a41' => $validatedData['b2a41'] ?? null,
            'b2a41_remarks' => $validatedData['b2a41_remarks'] ?? null,
            'b2a42' => $validatedData['b2a42'] ?? null,
            'b2a42_remarks' => $validatedData['b2a42_remarks'] ?? null,
            'b2a43' => $validatedData['b2a43'] ?? null,
            'b2a43_remarks' => $validatedData['b2a43_remarks'] ?? null,
            'b2c1' => $validatedData['b2c1'] ?? null,
            'b2c1_remarks' => $validatedData['b2c1_remarks'] ?? null,
            'b2c2' => $validatedData['b2c2'] ?? null,
            'b2c2_remarks' => $validatedData['b2c2_remarks'] ?? null,
            'b2c3' => $validatedData['b2c3'] ?? null,
            'b2c3_remarks' => $validatedData['b2c3_remarks'] ?? null,
            'b2c4' => $validatedData['b2c4'] ?? null,
            'b2c4_remarks' => $validatedData['b2c4_remarks'] ?? null,
            'b2c5' => $validatedData['b2c5'] ?? null,
            'b2c5_remarks' => $validatedData['b2c5_remarks'] ?? null,
            'b2c6' => $validatedData['b2c6'] ?? null,
            'b2c6_remarks' => $validatedData['b2c6_remarks'] ?? null,
            'b2e11a' => $validatedData['b2e11a'] ?? null,
            'b2e11a_remarks' => $validatedData['b2e11a_remarks'] ?? null,
            'b2e11b' => $validatedData['b2e11b'] ?? null,
            'b2e11b_remarks' => $validatedData['b2e11b_remarks'] ?? null,
            'b2e12a' => $validatedData['b2e12a'] ?? null,
            'b2e12a_remarks' => $validatedData['b2e12a_remarks'] ?? null,
            'b2e12b' => $validatedData['b2e12b'] ?? null,
            'b2e12b_remarks' => $validatedData['b2e12b_remarks'] ?? null,
            'b2e13a' => $validatedData['b2e13a'] ?? null,
            'b2e13a_remarks' => $validatedData['b2e13a_remarks'] ?? null,
            'b2e13b' => $validatedData['b2e13b'] ?? null,
            'b2e13b_remarks' => $validatedData['b2e13b_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b1c' => null, 'b1d' => null, 'b1e' => null, 'b1f' => null, 'b2a41' => null, 'b2a42' => null,
            'b2a43' => null, 'b2c1' => null, 'b2c2' => null, 'b2c3' => null, 'b2c4' => null,'b2c5' => null, 'b2c6' => null,
            'b2e11a' => null, 'b2e11b' => null, 'b2e12a' => null, 'b2e13b' => null, 'b2e12b' => null, 'b2e13a' => null, 'd1' => null,
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
            if ($existingEvaluation->b2a41 !== null) {
                $evaluationData['b2a41'] = $existingEvaluation->b2a41;
                $evaluationData['b2a41_remarks'] = $existingEvaluation->b2a41_remarks;
                $disabledFields[] = 'b2a41';
            }
            if ($existingEvaluation->b2a42 !== null) {
                $evaluationData['b2a42'] = $existingEvaluation->b2a42;
                $evaluationData['b2a42_remarks'] = $existingEvaluation->b2a42_remarks;
                $disabledFields[] = 'b2a42';
            }
            if ($existingEvaluation->b2a43 !== null) {
                $evaluationData['b2a43'] = $existingEvaluation->b2a43;
                $evaluationData['b2a43_remarks'] = $existingEvaluation->b2a43_remarks;
                $disabledFields[] = 'b2a43';
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
            if ($existingEvaluation->b2c5 !== null) {
                $evaluationData['b2c5'] = $existingEvaluation->b2c5;
                $evaluationData['b2c5_remarks'] = $existingEvaluation->b2c5_remarks;
                $disabledFields[] = 'b2c5';
            }
            if ($existingEvaluation->b2c6 !== null) {
                $evaluationData['b2c6'] = $existingEvaluation->b2c6;
                $evaluationData['b2c6_remarks'] = $existingEvaluation->b2c6_remarks;
                $disabledFields[] = 'b2c6';
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
            if ($existingEvaluation->b2e12b !== null) {
                $evaluationData['b2e12b'] = $existingEvaluation->b2e12b;
                $evaluationData['b2e12b_remarks'] = $existingEvaluation->b2e12b_remarks;
                $disabledFields[] = 'b2e12b';
            }
            if ($existingEvaluation->b2e13a !== null) {
                $evaluationData['b2e13a'] = $existingEvaluation->b2e13a;
                $evaluationData['b2e13a_remarks'] = $existingEvaluation->b2e13a_remarks;
                $disabledFields[] = 'b2e13a';
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
