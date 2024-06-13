<?php

namespace App\Http\Controllers;

use App\Models\AsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsEvaluationController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'uploader_id' => 'nullable|integer|exists:executive_office_accounts,id',
            'region_id' => 'nullable|integer|exists:regions,id',
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
            'c31' => 'nullable|integer',
            'c31_remarks' => 'nullable|string',
            'c32' => 'nullable|integer',
            'c32_remarks' => 'nullable|string',
            'c411' => 'nullable|integer',
            'c411_remarks' => 'nullable|string',
            'c412' => 'nullable|integer',
            'c412_remarks' => 'nullable|string',
            'c421' => 'nullable|integer',
            'c421_remarks' => 'nullable|string',
            'c422' => 'nullable|integer',
            'c422_remarks' => 'nullable|string',
            'c431' => 'nullable|integer',
            'c431_remarks' => 'nullable|string',
            'c432' => 'nullable|integer',
            'c432_remarks' => 'nullable|string',
            'c5' => 'nullable|integer',
            'c5_remarks' => 'nullable|string',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ]);
        $user = Auth::user();

        $existingEvaluation = AsEvaluation::where('uploader_id', $user->id)
        ->where('region_id', $validatedData['region_id'])
        ->first();

            // If existing record found, update it; otherwise, create a new record
    if ($existingEvaluation) {
        $existingEvaluation->update([
            'a6' => $validatedData['a6'],
            'a6_remarks' => $validatedData['a6_remarks'],
            'a8' => $validatedData['a8'],
            'a8_remarks' => $validatedData['a8_remarks'],
            'c31' => $validatedData['c31'],
            'c31_remarks' => $validatedData['c31_remarks'],
            'c32' => $validatedData['c32'],
            'c32_remarks' => $validatedData['c32_remarks'],
            'c411' => $validatedData['c411'],
            'c411_remarks' => $validatedData['c411_remarks'],
            'c412' => $validatedData['c412'],
            'c412_remarks' => $validatedData['c412_remarks'],
            'c421' => $validatedData['c421'],
            'c421_remarks' => $validatedData['c421_remarks'],
            'c422' => $validatedData['c422'],
            'c422_remarks' => $validatedData['c422_remarks'],
            'c431' => $validatedData['c431'],
            'c431_remarks' => $validatedData['c431_remarks'],
            'c432' => $validatedData['c432'],
            'c432_remarks' => $validatedData['c432_remarks'],
            'c5' => $validatedData['c5'],
            'c5_remarks' => $validatedData['c5_remarks'],
            'd1' => $validatedData['d1'],
            'd1_remarks' => $validatedData['d1_remarks'],
        ]);
    } else{

        $fields = [
            'a6', 'a8', 'c31', 'c32', 'c411', 'c412', 'c421', 'c422', 'c431', 'c432', 'c5', 'd1'
        ];

        $filledFieldsCount = collect($fields)->filter(function ($field) use ($validatedData) {
            return isset($validatedData[$field]);
        })->count();

        $totalFields = count($fields);

        // Calculate the total of filled integer fields
        $total = collect($fields)->sum(function ($field) use ($validatedData) {
            return $validatedData[$field] ?? 0;
        });

        // Calculate progress percentage
        $progressPercentage = $totalFields > 0 ? ($filledFieldsCount / $totalFields) * 100 : 0;

        $asEvaluationData = array_merge($validatedData, [
            'uploader_id' => $user->id,
            'region_id' => $validatedData['region_id'],
            'progress_percentage' => $progressPercentage,
            'overall_total_score' => $total,
            'overall_total_filled' => $filledFieldsCount,
            'a6' => $validatedData['a6'] ?? null,
            'a6_remarks' => $validatedData['a6_remarks'] ?? null,
            'a8' => $validatedData['a8'] ?? null,
            'a8_remarks' => $validatedData['a8_remarks'] ?? null,
            'c31' => $validatedData['c31'] ?? null,
            'c31_remarks' => $validatedData['c31_remarks'] ?? null,
            'c32' => $validatedData['c32'] ?? null,
            'c32_remarks' => $validatedData['c32_remarks'] ?? null,
            'c411' => $validatedData['c411'] ?? null,
            'c411_remarks' => $validatedData['c411_remarks'] ?? null,
            'c412' => $validatedData['c412'] ?? null,
            'c412_remarks' => $validatedData['c412_remarks'] ?? null,
            'c421' => $validatedData['c421'] ?? null,
            'c421_remarks' => $validatedData['c421_remarks'] ?? null,
            'c422' => $validatedData['c422'] ?? null,
            'c422_remarks' => $validatedData['c422_remarks'] ?? null,
            'c431' => $validatedData['c431'] ?? null,
            'c431_remarks' => $validatedData['c431_remarks'] ?? null,
            'c432' => $validatedData['c432'] ?? null,
            'c432_remarks' => $validatedData['c432_remarks'] ?? null,
            'c5' => $validatedData['c5'] ?? null,
            'c5_remarks' => $validatedData['c5_remarks'] ?? null,
            'd1' => $validatedData['d1'] ?? null,
            'd1_remarks' => $validatedData['d1_remarks'] ?? null,
        ]);

        if ($existingEvaluation) {
            $existingEvaluation->update($asEvaluationData);
        } else {
            AsEvaluation::create($asEvaluationData);
        }

        // AsEvaluation::updateOrCreate($asEvaluationData);
    }
        return redirect()->back()->with('success', 'Evaluation saved successfully.');
    }

}
