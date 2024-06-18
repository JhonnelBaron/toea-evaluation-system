<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\RomoEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RomoEvaluationController extends Controller
{
    
    public function romoSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b1h' => 'nullable|integer|in:0,35',
            'b1h_remarks' => 'nullable|string',
            'b2b2' => 'nullable|integer|in:0,10',
            'b2b2_remarks' => 'nullable|string',
            'b2b3' => 'nullable|integer|in:0,35',
            'b2b3_remarks' => 'nullable|string',
            'b2b4' => 'nullable|integer|in:0,7',
            'b2b4_remarks' => 'nullable|string',
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
        $existingEvaluation = RomoEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b1h' => $validatedData['b1h'] ?? null,
            'b1h_remarks' => $validatedData['b1h_remarks'] ?? null,
            'b2b2' => $validatedData['b2b2'] ?? null,
            'b2b2_remarks' => $validatedData['b2b2_remarks'] ?? null,
            'b2b3' => $validatedData['b2b3'] ?? null,
            'b2b3_remarks' => $validatedData['b2b3_remarks'] ?? null,
            'b2b4' => $validatedData['b2b4'] ?? null,
            'b2b4_remarks' => $validatedData['b2b4_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'b1h' => 0, 'b2b2' => 0, 'b2b3' => 0, 'b2b4' => 0, 'd1' => 0,
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

            if ($existingEvaluation->b1h !== null) {
                $evaluationData['b1h'] = $existingEvaluation->b1h;
                $evaluationData['b1h_remarks'] = $existingEvaluation->b1h_remarks;
                $disabledFields[] = 'b1h';
            }
            if ($existingEvaluation->b2b2 !== null) {
                $evaluationData['b2b2'] = $existingEvaluation->b2b2;
                $evaluationData['b2b2_remarks'] = $existingEvaluation->b2b2_remarks;
                $disabledFields[] = 'b2b2';
            }
            if ($existingEvaluation->b2b3 !== null) {
                $evaluationData['b2b3'] = $existingEvaluation->b2b3;
                $evaluationData['b2b3_remarks'] = $existingEvaluation->b2b3_remarks;
                $disabledFields[] = 'b2b3';
            }
            if ($existingEvaluation->b2b4 !== null) {
                $evaluationData['b2b4'] = $existingEvaluation->b2b4;
                $evaluationData['b2b4_remarks'] = $existingEvaluation->b2b4_remarks;
                $disabledFields[] = 'b2b4';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            RomoEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
