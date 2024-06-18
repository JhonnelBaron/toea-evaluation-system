<?php

namespace App\Http\Controllers\Secretariat;

use App\Http\Controllers\Controller;
use App\Models\LdEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LdEvaluationController extends Controller
{
    public function ldSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:users,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'a1' => 'nullable|integer|in:0,40',
            'a1_remarks' => 'nullable|string',
            'a2' => 'nullable|integer|in:0,30,20,10,5',
            'a2_remarks' => 'nullable|string',
        ]);

        $validator->setCustomMessages([
            'in' => 'You input an invalid number. Please ensure the number you enter meets the requirements listed in the column.',
        ]);

        $validatedData = $validator->validate();

        $user = Auth::user();
        $regionId = $validatedData['region_id'];

        // Check if an existing evaluation record exists for the user
        $existingEvaluation = LdEvaluation::where('uploader_id', $user->id)
            ->where('region_id', $regionId)
            ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'a1' => $validatedData['a1'] ?? null,
            'a1_remarks' => $validatedData['a1_remarks'] ?? null,
            'a2' => $validatedData['a2'] ?? null,
            'a2_remarks' => $validatedData['a2_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
            'a1' => null, 'a2' => null,
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

            if ($existingEvaluation->a1 !== null) {
                $evaluationData['a1'] = $existingEvaluation->a1;
                $evaluationData['a1_remarks'] = $existingEvaluation->a1_remarks;
                $disabledFields[] = 'a1';
            }
            if ($existingEvaluation->a2 !== null) {
                $evaluationData['a2'] = $existingEvaluation->a2;
                $evaluationData['a2_remarks'] = $existingEvaluation->a2_remarks;
                $disabledFields[] = 'a2';
            }

            $existingEvaluation->update($evaluationData);
        } else {
            LdEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
