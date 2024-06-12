<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BroEvaluationController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('executive.evaluate', compact('regions'));
    }
    public function evaluationIndex()
    {
        $user = Auth::user();

        if($user->executive_office === 'AS')
        {
            return view('executive.as-evaluate');
        }elseif($user->executive_office === 'CO')
        {
            return view('executive.co-evaluate');
        }elseif($user->executive_office === 'LD')
        {
            return view('executive.ld-evaluate');
        }elseif($user->executive_office === 'FMS')
        {
            return view('executive.fms-evaluate');
        }elseif($user->executive_office === 'NITESD')
        {
            return view('executive.nitesd-evaluate');
        }elseif($user->executive_office === 'PIAD')
        {
            return view('executive.piad-evaluate');
        }elseif($user->executive_office === 'PO')
        {
            return view('executive.po-evaluate');
        }elseif($user->executive_office === 'PLO')
        {
            return view('executive.plo-evaluate');
        }elseif($user->executive_office === 'ROMO')
        {
            return view('executive.romo-evaluate');
        }
    }

    public function storeAS(Request $request)
    {
        $validatedData = $request->validate([
            'region_id' => 'required|exists:regions,id',
            'b1h_evaluation' => 'required|integer',
            'b1h_remarks' => 'nullable|string',
            'b2b2_evaluation' => 'required|integer',
            'b2b2_remarks' => 'nullable|string',
            'd1_evaluation' => 'required|integer',
            'd1_remarks' => 'nullable|string',
            // Add validation rules for other evaluation points
        ]);

        $regionId = $validatedData['region_id'];

        // Store evaluation for BroBPillar
        BroBPillar::create([
            'region_id' => $regionId,
            'b1h' => $validatedData['b1h_evaluation'],
            'b1h_remarks' => $validatedData['b1h_remarks'],
            'b2b2' => $validatedData['b2b2_evaluation'],
            'b2b2_remarks' => $validatedData['b2b2_remarks'],
            // Add other fields for BroBPillar
        ]);

        // Store evaluation for BroDePillar
        BroDePillar::create([
            'region_id' => $regionId,
            'd1' => $validatedData['d1_evaluation'],
            'd1_remarks' => $validatedData['d1_remarks'],
            // Add other fields for BroDePillar
        ]);

        return redirect()->route('evaluation.index')->with('success', 'Evaluation submitted successfully.');
    }
}