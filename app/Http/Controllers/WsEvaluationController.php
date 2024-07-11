<?php

namespace App\Http\Controllers;

use App\Models\WsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WsEvaluationController extends Controller
{
    public function wsSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uploader_id' => 'nullable|integer|exists:executive_office_accounts,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'b2a41' => 'nullable|integer|in:0,3,6',
            'b2a41_remarks' => 'nullable|string',
            'b2a42' => 'nullable|integer|in:0,7',
            'b2a42_remarks' => 'nullable|string',
            'b2a43' => 'nullable|integer|in:0,10',
            'b2a43_remarks' => 'nullable|string',
        ]);

        $validator->setCustomMessages([
            'in' => 'You input an invalid number. Please ensure the number you enter meets the requirements listed in the column.',
        ]);

        $validatedData = $validator->validate();

        $user = Auth::user();
        $regionId = $validatedData['region_id'];

        // Check if an existing evaluation record exists for the user
        $existingEvaluation = WsEvaluation::where('uploader_id', $user->id)
        ->where('region_id', $regionId)
        ->first();

        // Prepare data for update or creation
        $evaluationData = [
            'uploader_id' => $user->id,
            'region_id' => $regionId,
            'b2a41' => $validatedData['b2a41'] ?? null,
            'b2a41_remarks' => $validatedData['b2a41_remarks'] ?? null,
            'b2a42' => $validatedData['b2a42'] ?? null,
            'b2a42_remarks' => $validatedData['b2a42_remarks'] ?? null,
            'b2a43' => $validatedData['b2a43'] ?? null,
            'b2a43_remarks' => $validatedData['b2a43_remarks'] ?? null,
        ];

        // Initialize variables for overall progress metrics
        $totalFields = [
           'b2a41' => null, 'b2a42' => null,
            'b2a43' => null,
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

            $existingEvaluation->update($evaluationData);
        } else {
            WsEvaluation::create($evaluationData);
        }

        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }
}
