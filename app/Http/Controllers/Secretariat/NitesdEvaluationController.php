<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\NitesdEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NitesdEvaluationController extends Controller
{
    public function nitesdSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b2a1' => 'nullable|integer|in:0,10',
            'b2a1_remarks' => 'nullable|string',
            'b2a2' => 'nullable|integer|in:0,8',
            'b2a2_remarks' => 'nullable|string',
            'b2d31' => 'nullable|integer|in:0,5',
            'b2d31_remarks' => 'nullable|string',
            'b2d32' => 'nullable|integer|in:0,5',
            'b2d32_remarks' => 'nullable|string',
            'b2d441' => 'nullable|integer|in:0,5',
            'b2d441_remarks' => 'nullable|string',
            'b2d442' => 'nullable|integer|in:0,10',
            'b2d442_remarks' => 'nullable|string',
            'b2e3' => 'nullable|integer|in:0,15',
            'b2e3_remarks' => 'nullable|string',
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
        $existingEvaluation = NitesdEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b2a1' => $validatedData['b2a1'] ?? null,
            'b2a1_remarks' => $validatedData['b2a1_remarks'] ?? null,
            'b2a2' => $validatedData['b2a2'] ?? null,
            'b2a2_remarks' => $validatedData['b2a2_remarks'] ?? null,
            'b2d31' => $validatedData['b2d31'] ?? null,
            'b2d31_remarks' => $validatedData['b2d31_remarks'] ?? null,
            'b2d32' => $validatedData['b2d32'] ?? null,
            'b2d32_remarks' => $validatedData['b2d32_remarks'] ?? null,
            'b2d441' => $validatedData['b2d441'] ?? null,
            'b2d441_remarks' => $validatedData['b2d441_remarks'] ?? null,
            'b2d442' => $validatedData['b2d442'] ?? null,
            'b2d442_remarks' => $validatedData['b2d442_remarks'] ?? null,
            'b2e3' => $validatedData['b2e3'] ?? null,
            'b2e3_remarks' => $validatedData['b2e3_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b2a1' => 0, 'b2a2' => 0, 'b2d31' => 0, 'b2d32' => 0, 'b2d441' => 0, 'b2d442' => 0, 'b2e3' => 0, 'd1' => 0,
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

            if ($existingEvaluation->b2a1 !== null) {
                $evaluationData['b2a1'] = $existingEvaluation->b2a1;
                $evaluationData['b2a1_remarks'] = $existingEvaluation->b2a1_remarks;
                $disabledFields[] = 'b2a1';
            }
            if ($existingEvaluation->b2a2 !== null) {
                $evaluationData['b2a2'] = $existingEvaluation->b2a2;
                $evaluationData['b2a2_remarks'] = $existingEvaluation->b2a2_remarks;
                $disabledFields[] = 'b2a2';
            }
            if ($existingEvaluation->b2d31 !== null) {
                $evaluationData['b2d31'] = $existingEvaluation->b2d31;
                $evaluationData['b2d31_remarks'] = $existingEvaluation->b2d31_remarks;
                $disabledFields[] = 'b2d31';
            }
            if ($existingEvaluation->b2d32 !== null) {
                $evaluationData['b2d32'] = $existingEvaluation->b2d32;
                $evaluationData['b2d32_remarks'] = $existingEvaluation->b2d32_remarks;
                $disabledFields[] = 'b2d32';
            }
            if ($existingEvaluation->b2d441 !== null) {
                $evaluationData['b2d441'] = $existingEvaluation->b2d441;
                $evaluationData['b2d441_remarks'] = $existingEvaluation->b2d441_remarks;
                $disabledFields[] = 'b2d441';
            }
            if ($existingEvaluation->b2d442 !== null) {
                $evaluationData['b2d442'] = $existingEvaluation->b2d442;
                $evaluationData['b2d442_remarks'] = $existingEvaluation->b2d442_remarks;
                $disabledFields[] = 'b2d442';
            }
            if ($existingEvaluation->b2e3 !== null) {
                $evaluationData['b2e3'] = $existingEvaluation->b2e3;
                $evaluationData['b2e3_remarks'] = $existingEvaluation->b2e3_remarks;
                $disabledFields[] = 'b2e3';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            NitesdEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
