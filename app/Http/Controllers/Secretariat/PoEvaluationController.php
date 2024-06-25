<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\PoEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PoEvaluationController extends Controller
{
    public function poSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b1a' => 'nullable|integer|in:0,15',
            'b1a_remarks' => 'nullable|string',
            'b1b' => 'nullable|integer|in:0,10',
            'b1b_remarks' => 'nullable|string',
            'b1i' => 'nullable|integer|in:0,15',
            'b1i_remarks' => 'nullable|string',
            'b2a1' => 'nullable|integer|in:0,10',
            'b2a1_remarks' => 'nullable|string',
            'b2b1' => 'nullable|integer|in:0,5',
            'b2b1_remarks' => 'nullable|string',
            'b2b5' => 'nullable|integer|in:0,5',
            'b2b5_remarks' => 'nullable|string',
            'b2d1' => 'nullable|integer|in:0,10',
            'b2d1_remarks' => 'nullable|string',
            'b2d2' => 'nullable|integer|in:0,5',
            'b2d2_remarks' => 'nullable|string',
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
        $existingEvaluation = PoEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b1a' => $validatedData['b1a'] ?? null,
            'b1a_remarks' => $validatedData['b1a_remarks'] ?? null,
            'b1b' => $validatedData['b1b'] ?? null,
            'b1b_remarks' => $validatedData['b1b_remarks'] ?? null,
            'b1i' => $validatedData['b1i'] ?? null,
            'b1i_remarks' => $validatedData['b1i_remarks'] ?? null,
            'b2a1' => $validatedData['b2a1'] ?? null,
            'b2a1_remarks' => $validatedData['b2a1_remarks'] ?? null,
            'b2b1' => $validatedData['b2b1'] ?? null,
            'b2b1_remarks' => $validatedData['b2b1_remarks'] ?? null,
            'b2b5' => $validatedData['b2b5'] ?? null,
            'b2b5_remarks' => $validatedData['b2b5_remarks'] ?? null,
            'b2d1' => $validatedData['b2d1'] ?? null,
            'b2d1_remarks' => $validatedData['b2d1_remarks'] ?? null,
            'b2d2' => $validatedData['b2d2'] ?? null,
            'b2d2_remarks' => $validatedData['b2d2_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b1a' => null, 'b1b' => null, 'b1i' => null, 'b2a1' => null,
            'b2b1' => null, 'b2b5' => null, 'b2d1' => null, 'b2d2' => null, 'd1' => null,
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

            if ($existingEvaluation->b1a !== null) {
                $evaluationData['b1a'] = $existingEvaluation->b1a;
                $evaluationData['b1a_remarks'] = $existingEvaluation->b1a_remarks;
                $disabledFields[] = 'b1a';
            }
            if ($existingEvaluation->b1b !== null) {
                $evaluationData['b1b'] = $existingEvaluation->b1b;
                $evaluationData['b1b_remarks'] = $existingEvaluation->b1b_remarks;
                $disabledFields[] = 'b1b';
            }
            if ($existingEvaluation->b1i !== null) {
                $evaluationData['b1i'] = $existingEvaluation->b1i;
                $evaluationData['b1i_remarks'] = $existingEvaluation->b1i_remarks;
                $disabledFields[] = 'b1i';
            }
            if ($existingEvaluation->b2a1 !== null) {
                $evaluationData['b2a1'] = $existingEvaluation->b2a1;
                $evaluationData['b2a1_remarks'] = $existingEvaluation->b2a1_remarks;
                $disabledFields[] = 'b2a1';
            }
            if ($existingEvaluation->b2b1 !== null) {
                $evaluationData['b2b1'] = $existingEvaluation->b2b1;
                $evaluationData['b2b1_remarks'] = $existingEvaluation->b2b1_remarks;
                $disabledFields[] = 'b2b1';
            }
            if ($existingEvaluation->b2b5 !== null) {
                $evaluationData['b2b5'] = $existingEvaluation->b2b5;
                $evaluationData['b2b5_remarks'] = $existingEvaluation->b2b5_remarks;
                $disabledFields[] = 'b2b5';
            }
            if ($existingEvaluation->b2d1 !== null) {
                $evaluationData['b2d1'] = $existingEvaluation->b2d1;
                $evaluationData['b2d1_remarks'] = $existingEvaluation->b2d1_remarks;
                $disabledFields[] = 'b2d1';
            }
            if ($existingEvaluation->b2d2 !== null) {
                $evaluationData['b2d2'] = $existingEvaluation->b2d2;
                $evaluationData['b2d2_remarks'] = $existingEvaluation->b2d2_remarks;
                $disabledFields[] = 'b2d2';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            PoEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
