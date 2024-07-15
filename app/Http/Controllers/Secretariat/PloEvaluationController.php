<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\PloEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PloEvaluationController extends Controller
{
    public function plosubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b1g' => 'nullable|integer|in:0,10',
            'b1g_remarks' => 'nullable|string',
            'b2d411' => 'nullable|integer|in:0,5',
            'b2d411_remarks' => 'nullable|string',
            'b2d412' => 'nullable|integer|in:0,10',
            'b2d412_remarks' => 'nullable|string',
            'b2d421' => 'nullable|integer|in:0,5',
            'b2d421_remarks' => 'nullable|string',
            'b2d422' => 'nullable|integer|in:0,10',
            'b2d422_remarks' => 'nullable|string',
            'b2d43' => 'nullable|integer|in:0,15',
            'b2d43_remarks' => 'nullable|string',
            'b2d431' => 'nullable|integer|in:0,5',
            'b2d431_remarks' => 'nullable|string',
            'b2d432' => 'nullable|integer|in:0,10',
            'b2d432_remarks' => 'nullable|string',
            'b2d5' => 'nullable|integer|in:0,5,10,15',
            'b2d5_remarks' => 'nullable|string',
            'b2d6' => 'nullable|integer|in:0,10',
            'b2d6_remarks' => 'nullable|string',
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
        $existingEvaluation = PloEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b1g' => $validatedData['b1g'] ?? null,
            'b1g_remarks' => $validatedData['b1g_remarks'] ?? null,
            'b2d411' => $validatedData['b2d411'] ?? null,
            'b2d411_remarks' => $validatedData['b2d411_remarks'] ?? null,
            'b2d412' => $validatedData['b2d412'] ?? null,
            'b2d412_remarks' => $validatedData['b2d412_remarks'] ?? null,
            'b2d421' => $validatedData['b2d421'] ?? null,
            'b2d421_remarks' => $validatedData['b2d421_remarks'] ?? null,
            'b2d422' => $validatedData['b2d422'] ?? null,
            'b2d422_remarks' => $validatedData['b2d422_remarks'] ?? null,
            'b2d431' => $validatedData['b2d431'] ?? null,
            'b2d431_remarks' => $validatedData['b2d431_remarks'] ?? null,
            'b2d432' => $validatedData['b2d432'] ?? null,
            'b2d432_remarks' => $validatedData['b2d432_remarks'] ?? null,
            'b2d5' => $validatedData['b2d5'] ?? null,
            'b2d5_remarks' => $validatedData['b2d5_remarks'] ?? null,
            'b2d6' => $validatedData['b2d6'] ?? null,
            'b2d6_remarks' => $validatedData['b2d6_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b1g' => null, 'b2d411' => null, 'b2d412' => null,
            'b2d421' => null, 'b2d422' => null, 'b2d431' => null,
            'b2d432' => null, 'b2d5' => null, 'b2d6' => null, 'd1' => null,
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

            foreach ($totalFields as $key => $value) {
                if ($existingEvaluation->{$key} !== null) {
                    $evaluationData[$key] = $existingEvaluation->{$key};
                    $evaluationData[$key . '_remarks'] = $existingEvaluation->{$key . '_remarks'};
                    $disabledFields[] = $key;
                }
            }

            $existingEvaluation->update($evaluationData);
        } else {
            PloEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
