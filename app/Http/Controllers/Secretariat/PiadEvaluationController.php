<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\PiadEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PiadEvaluationController extends Controller
{
    public function piadSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'a3' => 'nullable|integer|in:0,10',
            'a3_remarks' => 'nullable|string',
            'a4' => 'nullable|integer|in:0,30',
            'a4_remarks' => 'nullable|string',
            'd1' => 'nullable|integer|in:0,30,60',
            'd1_remarks' => 'nullable|string',
            'e1' => 'nullable|integer|in:0,30,50',
            'e1_remarks' => 'nullable|string',
        ]);

        $validator->setCustomMessages([
            'in' => 'You input an invalid number. Please ensure the number you enter meets the requirements listed in the column.',
        ]);

        $validatedData = $validator->validate();

        $user = Auth::user();
        $regionId = $validatedData['region_id'];

        // Check if an existing evaluation record exists for the user
        $existingEvaluation = PiadEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'a3' => $validatedData['a3'] ?? null,
            'a3_remarks' => $validatedData['a3_remarks'] ?? null,
            'a4' => $validatedData['a4'] ?? null,
            'a4_remarks' => $validatedData['a4_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
            'e1' => $validatedData['e1'] ?? null,
            'e1_remarks' => $validatedData['e1_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'a3' => null, 'a4' => null, 'd1' => null, 'e1' => null,
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

            if ($existingEvaluation->a3 !== null) {
                $evaluationData['a3'] = $existingEvaluation->a3;
                $evaluationData['a3_remarks'] = $existingEvaluation->a3_remarks;
                $disabledFields[] = 'a3';
            }
            if ($existingEvaluation->a4 !== null) {
                $evaluationData['a4'] = $existingEvaluation->a4;
                $evaluationData['a4_remarks'] = $existingEvaluation->a4_remarks;
                $disabledFields[] = 'a4';
            }
            if ($existingEvaluation->d1 !== null) {
                $evaluationData['d1'] = $existingEvaluation->d1;
                $evaluationData['d1_remarks'] = $existingEvaluation->d1_remarks;
                $disabledFields[] = 'd1';
            }
            if ($existingEvaluation->e1 !== null) {
                $evaluationData['e1'] = $existingEvaluation->e1;
                $evaluationData['e1_remarks'] = $existingEvaluation->e1_remarks;
                $disabledFields[] = 'e1';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            PiadEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
