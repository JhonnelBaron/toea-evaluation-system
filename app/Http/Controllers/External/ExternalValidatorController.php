<?php

namespace App\Http\Controllers\External;

use App\Http\Controllers\Controller;
use App\Models\AsEvaluation;
use App\Models\CoEvaluation;
use App\Models\External\BroAExternal;
use App\Models\External\BroBExternal;
use App\Models\External\BroCExternal;
use App\Models\External\BroDExternal;
use App\Models\External\BroEExternal;
use App\Models\External\EndorsedExternal;
use App\Models\External\GpAExternal;
use App\Models\External\GpBExternal;
use App\Models\External\GpCExternal;
use App\Models\External\GpDExternal;
use App\Models\External\GpEExternal;
use App\Models\External\PtcAExternal;
use App\Models\External\PtcBExternal;
use App\Models\External\PtcCExternal;
use App\Models\External\PtcDExternal;
use App\Models\External\PtcEExternal;
use App\Models\External\RstAExternal;
use App\Models\External\RstBExternal;
use App\Models\External\RstCExternal;
use App\Models\External\RstDExternal;
use App\Models\External\RstEExternal;
use App\Models\FmsEvaluation;
use App\Models\IctoEvaluation;
use App\Models\LdEvaluation;
use App\Models\NitesdEvaluation;
use App\Models\PiadEvaluation;
use App\Models\PloEvaluation;
use App\Models\PoEvaluation;
use App\Models\RomoEvaluation;
use App\Models\WsEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExternalValidatorController extends Controller
{
    public function externalGp()
    {
        $small = EndorsedExternal::where('grouping', 'Small_Province')->get();
        $medium = EndorsedExternal::where('grouping', 'Medium_Province')->get();
        $large = EndorsedExternal::where('grouping', 'Large_Province')->get();

            // Fetching and summing up scores and percentages
        $tables = [
            GpAExternal::class,
            GpBExternal::class,
            GpCExternal::class,
            GpDExternal::class,
            GpEExternal::class,
            ];

        $totalScore = 0;
        $totalPercentage = 0;
        $count = 0;

        foreach ($tables as $table) {
            $results = $table::all();
            foreach ($results as $result) {
                $totalScore += $result->overall_total_score;
                $totalPercentage += $result->progress_percentage;
                $count++;
            }
        }

        $averagePercentage = $count ? $totalPercentage / $count : 0;


        
        return view('external.gp', ['small' => $small, 'medium' => $medium, 'large' => $large,
        'totalScore' => $totalScore,
        'averagePercentage' => $averagePercentage,]);
    }

    public function externalGpA($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('galing_probinsya_a_parts')->where('user_id', $id)->first();
        $previousData = GpAExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.gpadmin-a', [
            'user_id' => $id,
            'province' => $nominee->province,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }

    public function externalGpB($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('galing_probinsya_b_parts')->where('user_id', $id)->first();
        $previousData = GpBExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.gpadmin-b', [
            'user_id' => $id,
            'province' => $nominee->province,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalGpC($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('galing_probinsya_c_parts')->where('user_id', $id)->first();
        $previousData = GpCExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.gpadmin-c', [
            'user_id' => $id,
            'province' => $nominee->province,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalGpD($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('galing_probinsya_d_parts')->where('user_id', $id)->first();
        $previousData = GpDExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.gpadmin-d', [
            'user_id' => $id,
            'province' => $nominee->province,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalGpE($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('galing_probinsya_e_parts')->where('user_id', $id)->first();
        $previousData = GpEExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.gpadmin-e', [
            'user_id' => $id,
            'province' => $nominee->province,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }

    //TI

    public function externalTi()
    {
        $small = EndorsedExternal::where('grouping', 'RTC-STC')->get();
        $medium = EndorsedExternal::where('grouping', 'TAS')->get();
        $large = EndorsedExternal::where('grouping', 'PTC')->get();

        return view('external.ti', ['small' => $small, 'medium' => $medium, 'large' => $large]);
    }

    public function externalStcRtcTasA($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_tas_rtcstc_a_parts')->where('user_id', $id)->first();
        $previousData = RstAExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-a', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'grouping' => $nominee->grouping,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
   
    public function externalStcRtcTasB($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_tas_rtcstc_b_parts')->where('user_id', $id)->first();
        $previousData = RstBExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-b', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'grouping' => $nominee->grouping,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalStcRtcTasC($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_tas_rtcstc_c_parts')->where('user_id', $id)->first();
        $previousData = RstCExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-c', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'grouping' => $nominee->grouping,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalStcRtcTasD($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_tas_rtcstc_d_parts')->where('user_id', $id)->first();
        $previousData = RstDExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-d', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'grouping' => $nominee->grouping,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalStcRtcTasE($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_tas_rtcstc_e_parts')->where('user_id', $id)->first();
        $previousData = RstEExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-e', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'grouping' => $nominee->grouping,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }

    public function externalPtcA($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_ptc_a_parts')->where('user_id', $id)->first();
        $previousData = PtcAExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-ptc-a', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
   
    public function externalPtcB($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_ptc_b_parts')->where('user_id', $id)->first();
        $previousData = PtcBExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-ptc-b', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalPtcC($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_ptc_c_parts')->where('user_id', $id)->first();
        $previousData = PtcCExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-ptc-c', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalPtcD($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_ptc_d_parts')->where('user_id', $id)->first();
        $previousData = PtcDExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-ptc-d', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }
    public function externalPtcE($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $data = DB::table('best_ti_ptc_e_parts')->where('user_id', $id)->first();
        $previousData = PtcEExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.besttiadmin-ptc-e', [
            'user_id' => $id,
            'nominee' => $nominee->nominee,
            'data' => $data,
            'previousData' => $previousData,
        ]);
    }

    public function storeGpA(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'a1' => 'nullable|integer',
            'a1_remarks' => 'nullable|string',
            'a2' => 'nullable|integer',
            'a2_remarks' => 'nullable|string',
            'a3' => 'nullable|integer',
            'a3_remarks' => 'nullable|string',
            'a4' => 'nullable|integer',
            'a4_remarks' => 'nullable|string',
            'a5a' => 'nullable|integer',
            'a5a_remarks' => 'nullable|string',
            'a5b' => 'nullable|integer',
            'a5b_remarks' => 'nullable|string',
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer',
            'a7b_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = GpAExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
            ])->filter(function ($value) {
                return !is_null($value); // Keep values that are not null
            })->count();

        // Define total_fields
        $data->total_fields = 10; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success','Data saved sucessfully']);
    }

    public function storeGpB(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'b1a' => 'nullable|integer',
            'b1a_remarks' => 'nullable|string',
            'b1b' => 'nullable|integer',
            'b1b_remarks' => 'nullable|string',
            'b1c' => 'nullable|integer',
            'b1c_remarks' => 'nullable|string',
            'b1d' => 'nullable|integer',
            'b1d_remarks' => 'nullable|string',
            'b1e' => 'nullable|integer',
            'b1e_remarks' => 'nullable|string',
            'b1f' => 'nullable|integer',
            'b1f_remarks' => 'nullable|string',
            'b1g' => 'nullable|integer',
            'b1g_remarks' => 'nullable|string',
            'b1h' => 'nullable|integer',
            'b1h_remarks' => 'nullable|string',
            'b1i' => 'nullable|integer',
            'b1i_remarks' => 'nullable|string',
            'b2a1' => 'nullable|integer',
            'b2a1_remarks' => 'nullable|string',
            'b2a2' => 'nullable|integer',
            'b2a2_remarks' => 'nullable|string',
            'b2a3' => 'nullable|integer',
            'b2a3_remarks' => 'nullable|string',
            'b2a41' => 'nullable|integer',
            'b2a41_remarks' => 'nullable|string',
            'b2a42' => 'nullable|integer',
            'b2a42_remarks' => 'nullable|string',
            'b2a43' => 'nullable|integer',
            'b2a43_remarks' => 'nullable|string',
            'b2b1' => 'nullable|integer',
            'b2b1_remarks' => 'nullable|string',
            'b2b2' => 'nullable|integer',
            'b2b2_remarks' => 'nullable|string',
            'b2b3' => 'nullable|integer',
            'b2b3_remarks' => 'nullable|string',
            'b2b4' => 'nullable|integer',
            'b2b4_remarks' => 'nullable|string',
            'b2b5' => 'nullable|integer',
            'b2b5_remarks' => 'nullable|string',
            'b2c1' => 'nullable|integer',
            'b2c1_remarks' => 'nullable|string',
            'b2c2' => 'nullable|integer',
            'b2c2_remarks' => 'nullable|string',
            'b2c3' => 'nullable|integer',
            'b2c3_remarks' => 'nullable|string',
            'b2c4' => 'nullable|integer',
            'b2c4_remarks' => 'nullable|string',
            'b2c5' => 'nullable|integer',
            'b2c5_remarks' => 'nullable|string',
            'b2c6' => 'nullable|integer',
            'b2c6_remarks' => 'nullable|string',
            'b2d1' => 'nullable|integer',
            'b2d1_remarks' => 'nullable|string',
            'b2d2' => 'nullable|integer',
            'b2d2_remarks' => 'nullable|string',
            'b2d31' => 'nullable|integer',
            'b2d31_remarks' => 'nullable|string',
            'b2d32' => 'nullable|integer',
            'b2d32_remarks' => 'nullable|string',
            'b2d411' => 'nullable|integer',
            'b2d411_remarks' => 'nullable|string',
            'b2d412' => 'nullable|integer',
            'b2d412_remarks' => 'nullable|string',
            'b2d421' => 'nullable|integer',
            'b2d421_remarks' => 'nullable|string',
            'b2d422' => 'nullable|integer',
            'b2d422_remarks' => 'nullable|string',
            'b2d431' => 'nullable|integer',
            'b2d431_remarks' => 'nullable|string',
            'b2d432' => 'nullable|integer',
            'b2d432_remarks' => 'nullable|string',
            'b2d441' => 'nullable|integer',
            'b2d441_remarks' => 'nullable|string',
            'b2d442' => 'nullable|integer',
            'b2d442_remarks' => 'nullable|string',
            'b2d5' => 'nullable|integer',
            'b2d5_remarks' => 'nullable|string',
            'b2d6' => 'nullable|integer',
            'b2d6_remarks' => 'nullable|string',
            'b2e11a' => 'nullable|integer',
            'b2e11a_remarks' => 'nullable|string',
            'b2e11b' => 'nullable|integer',
            'b2e11b_remarks' => 'nullable|string',
            'b2e12a' => 'nullable|integer',
            'b2e12a_remarks' => 'nullable|string',
            'b2e12b' => 'nullable|integer',
            'b2e12b_remarks' => 'nullable|string',
            'b2e13a' => 'nullable|integer',
            'b2e13a_remarks' => 'nullable|string',
            'b2e13b' => 'nullable|integer',
            'b2e13b_remarks' => 'nullable|string',
            'b2e21' => 'nullable|integer',
            'b2e21_remarks' => 'nullable|string',
            'b2e22' => 'nullable|integer',
            'b2e22_remarks' => 'nullable|string',
            'b2e23' => 'nullable|integer',
            'b2e23_remarks' => 'nullable|string',
            'b2e3' => 'nullable|integer',
            'b2e3_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = GpBExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->b1a, $data->b1b, $data->b1c, $data->b1d, $data->b1e,
            $data->b1f, $data->b1g, $data->b1h, $data->b1i, $data->b2a1,
            $data->b2a2, $data->b2a3, $data->b2a41, $data->b2a42, $data->b2a43,
            $data->b2b1, $data->b2b2, $data->b2b3, $data->b2b4, $data->b2b5,
            $data->b2c1, $data->b2c2, $data->b2c3, $data->b2c4, $data->b2c5,
            $data->b2c6, $data->b2d1, $data->b2d2, $data->b2d31, $data->b2d32,
            $data->b2d411, $data->b2d412, $data->b2d421, $data->b2d422, $data->b2d431,
            $data->b2d432, $data->b2d441, $data->b2d442, $data->b2d5, $data->b2d6,
            $data->b2e11a, $data->b2e11b, $data->b2e12a, $data->b2e12b, $data->b2e13a,
            $data->b2e13b, $data->b2e21, $data->b2e22, $data->b2e23, $data->b2e3
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->b1a, $data->b1b, $data->b1c, $data->b1d,
            $data->b1e, $data->b1f, $data->b1g, $data->b1h, $data->b1i,
            $data->b2a1, $data->b2a2, $data->b2a3, $data->b2a41, $data->b2a42,
            $data->b2a43, $data->b2b1, $data->b2b2, $data->b2b3, $data->b2b4,
            $data->b2b5, $data->b2c1, $data->b2c2, $data->b2c3, $data->b2c4,
            $data->b2c5, $data->b2c6, $data->b2d1, $data->b2d2, $data->b2d31,
            $data->b2d32, $data->b2d411, $data->b2d412, $data->b2d421, $data->b2d422,
            $data->b2d431, $data->b2d432, $data->b2d441, $data->b2d442, $data->b2d5,
            $data->b2d6, $data->b2e11a, $data->b2e11b, $data->b2e12a, $data->b2e12b,
            $data->b2e13a, $data->b2e13b, $data->b2e21, $data->b2e22, $data->b2e23,
            $data->b2e3
        ])->filter(function ($value) {
            return !is_null($value); // Count values that are not null
        })->count();

         // Define total_fields
         $data->total_fields = 50; // Adjust this value based on the number of fields

         // Calculate progress_percentage
         $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;
 
         $data->save();
 
         return redirect()->back()->with(['success' => 'Data saved successfully']);
     }

     public function storeGpC(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'c1' => 'nullable|integer',
            'c1_remarks' => 'nullable|string',
            'c2' => 'nullable|integer',
            'c2_remarks' => 'nullable|string',
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
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = GpCExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432, $data->c5
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432, $data->c5
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 11; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success', 'Data saved successfully']);
    }

    public function storeGpD(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = GpDExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->d1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->d1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storeGpE(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'e1' => 'nullable|integer',
            'e1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = GpEExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->e1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->e1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    //PTC
    public function storePtcA(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'a1' => 'nullable|integer',
            'a1_remarks' => 'nullable|string',
            'a2' => 'nullable|integer',
            'a2_remarks' => 'nullable|string',
            'a3' => 'nullable|integer',
            'a3_remarks' => 'nullable|string',
            'a4' => 'nullable|integer',
            'a4_remarks' => 'nullable|string',
            'a5a' => 'nullable|integer',
            'a5a_remarks' => 'nullable|string',
            'a5b' => 'nullable|integer',
            'a5b_remarks' => 'nullable|string',
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer',
            'a7b_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = PtcAExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 10; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }



    public function storePtcB(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'b1a' => 'nullable|integer',
            'b1a_remarks' => 'nullable|string',
            'b1b' => 'nullable|integer',
            'b1b_remarks' => 'nullable|string',
            'b1c1' => 'nullable|integer',
            'b1c1_remarks' => 'nullable|string',
            'b1c2' => 'nullable|integer',
            'b1c2_remarks' => 'nullable|string',
            'b1c3' => 'nullable|integer',
            'b1c3_remarks' => 'nullable|string',
            'b1d1' => 'nullable|integer',
            'b1d1_remarks' => 'nullable|string',
            'b2a' => 'nullable|integer',
            'b2a_remarks' => 'nullable|string',
            'b2b' => 'nullable|integer',
            'b2b_remarks' => 'nullable|string',
            'b2c' => 'nullable|integer',
            'b2c_remarks' => 'nullable|string',
            'b2d' => 'nullable|integer',
            'b2d_remarks' => 'nullable|string',
            'b2e' => 'nullable|integer',
            'b2e_remarks' => 'nullable|string',
            'b2f' => 'nullable|integer',
            'b2f_remarks' => 'nullable|string',
            'b2g' => 'nullable|integer',
            'b2g_remarks' => 'nullable|string',
            'b2h' => 'nullable|integer',
            'b2h_remarks' => 'nullable|string',
            'b2i' => 'nullable|integer',
            'b2i_remarks' => 'nullable|string',
            'b2j' => 'nullable|integer',
            'b2j_remarks' => 'nullable|string',
            'b3a' => 'nullable|integer',
            'b3a_remarks' => 'nullable|string',
            'b3b' => 'nullable|integer',
            'b3b_remarks' => 'nullable|string',
            'b3c' => 'nullable|integer',
            'b3c_remarks' => 'nullable|string',
            'b3d' => 'nullable|integer',
            'b3d_remarks' => 'nullable|string',
            'b3e' => 'nullable|integer',
            'b3e_remarks' => 'nullable|string',
            'b3f' => 'nullable|integer',
            'b3f_remarks' => 'nullable|string',
            'b4a1' => 'nullable|integer',
            'b4a1_remarks' => 'nullable|string',
            'b4a2' => 'nullable|integer',
            'b4a2_remarks' => 'nullable|string',
            'b4b' => 'nullable|integer',
            'b4b_remarks' => 'nullable|string',
            'b4c' => 'nullable|integer',
            'b4c_remarks' => 'nullable|string',
            'b4d' => 'nullable|integer',
            'b4d_remarks' => 'nullable|string',
            'b4e' => 'nullable|integer',
            'b4e_remarks' => 'nullable|string',
            'b5a1' => 'nullable|integer',
            'b5a1_remarks' => 'nullable|string',
            'b5a2' => 'nullable|integer',
            'b5a2_remarks' => 'nullable|string',
            'b5b11' => 'nullable|integer',
            'b5b11_remarks' => 'nullable|string',
            'b5b12' => 'nullable|integer',
            'b5b12_remarks' => 'nullable|string',
            'b5b21' => 'nullable|integer',
            'b5b21_remarks' => 'nullable|string',
            'b5b22' => 'nullable|integer',
            'b5b22_remarks' => 'nullable|string',
            'b5c1' => 'nullable|integer',
            'b5c1_remarks' => 'nullable|string',
            'b5c2' => 'nullable|integer',
            'b5c2_remarks' => 'nullable|string',
            'b5d' => 'nullable|integer',
            'b5d_remarks' => 'nullable|string',
            'b5e' => 'nullable|integer',
            'b5e_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = PtcBExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->b1a, $data->b1b, $data->b1c1, $data->b1c2, $data->b1c3, $data->b1d1,
            $data->b2a, $data->b2b, $data->b2c, $data->b2d, $data->b2e, $data->b2f,
            $data->b2g, $data->b2h, $data->b2i, $data->b2j, $data->b3a, $data->b3b,
            $data->b3c, $data->b3d, $data->b3e, $data->b3f, $data->b4a1, $data->b4a2,
            $data->b4b, $data->b4c, $data->b4d, $data->b4e, $data->b5a1, $data->b5a2,
            $data->b5b11, $data->b5b12, $data->b5b21, $data->b5b22, $data->b5c1, $data->b5c2,
            $data->b5d, $data->b5e
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->b1a, $data->b1b, $data->b1c1, $data->b1c2, $data->b1c3, $data->b1d1,
            $data->b2a, $data->b2b, $data->b2c, $data->b2d, $data->b2e, $data->b2f,
            $data->b2g, $data->b2h, $data->b2i, $data->b2j, $data->b3a, $data->b3b,
            $data->b3c, $data->b3d, $data->b3e, $data->b3f, $data->b4a1, $data->b4a2,
            $data->b4b, $data->b4c, $data->b4d, $data->b4e, $data->b5a1, $data->b5a2,
            $data->b5b11, $data->b5b12, $data->b5b21, $data->b5b22, $data->b5c1, $data->b5c2,
            $data->b5d, $data->b5e
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 38; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storePtcC(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'c1' => 'nullable|integer',
            'c1_remarks' => 'nullable|string',
            'c2' => 'nullable|integer',
            'c2_remarks' => 'nullable|string',
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
        ]);

        // Add the validator_id and user_id to the validated data
        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        // Create or update the record
        $data = PtcCExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 10; // Count of integer fields

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function storePtcD(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = PtcDExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->d1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->d1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storePtcE(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'e1' => 'nullable|integer',
            'e1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = PtcEExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->e1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->e1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    //RCT STC TAS

    public function storeRstA(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'a1' => 'nullable|integer',
            'a1_remarks' => 'nullable|string',
            'a2' => 'nullable|integer',
            'a2_remarks' => 'nullable|string',
            'a3' => 'nullable|integer',
            'a3_remarks' => 'nullable|string',
            'a4' => 'nullable|integer',
            'a4_remarks' => 'nullable|string',
            'a5a' => 'nullable|integer',
            'a5a_remarks' => 'nullable|string',
            'a5b' => 'nullable|integer',
            'a5b_remarks' => 'nullable|string',
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer',
            'a7b_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = RstAExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 10; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storeRstB(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'b1a' => 'nullable|integer',
            'b1a_remarks' => 'nullable|string',
            'b1b' => 'nullable|integer',
            'b1b_remarks' => 'nullable|string',
            'b1c1' => 'nullable|integer',
            'b1c1_remarks' => 'nullable|string',
            'b1c2' => 'nullable|integer',
            'b1c2_remarks' => 'nullable|string',
            'b1c3' => 'nullable|integer',
            'b1c3_remarks' => 'nullable|string',
            'b1d1' => 'nullable|integer',
            'b1d1_remarks' => 'nullable|string',
            'b2a' => 'nullable|integer',
            'b2a_remarks' => 'nullable|string',
            'b2b' => 'nullable|integer',
            'b2b_remarks' => 'nullable|string',
            'b2c' => 'nullable|integer',
            'b2c_remarks' => 'nullable|string',
            'b2d' => 'nullable|integer',
            'b2d_remarks' => 'nullable|string',
            'b2e' => 'nullable|integer',
            'b2e_remarks' => 'nullable|string',
            'b2f' => 'nullable|integer',
            'b2f_remarks' => 'nullable|string',
            'b2g' => 'nullable|integer',
            'b2g_remarks' => 'nullable|string',
            'b2h' => 'nullable|integer',
            'b2h_remarks' => 'nullable|string',
            'b2i' => 'nullable|integer',
            'b2i_remarks' => 'nullable|string',
            'b2j' => 'nullable|integer',
            'b2j_remarks' => 'nullable|string',
            'b3a' => 'nullable|integer',
            'b3a_remarks' => 'nullable|string',
            'b3b' => 'nullable|integer',
            'b3b_remarks' => 'nullable|string',
            'b3c' => 'nullable|integer',
            'b3c_remarks' => 'nullable|string',
            'b3d' => 'nullable|integer',
            'b3d_remarks' => 'nullable|string',
            'b3e' => 'nullable|integer',
            'b3e_remarks' => 'nullable|string',
            'b3f' => 'nullable|integer',
            'b3f_remarks' => 'nullable|string',
            'b4a1' => 'nullable|integer',
            'b4a1_remarks' => 'nullable|string',
            'b4a2' => 'nullable|integer',
            'b4a2_remarks' => 'nullable|string',
            'b4b' => 'nullable|integer',
            'b4b_remarks' => 'nullable|string',
            'b4c' => 'nullable|integer',
            'b4c_remarks' => 'nullable|string',
            'b4d' => 'nullable|integer',
            'b4d_remarks' => 'nullable|string',
            'b4e1' => 'nullable|integer',
            'b4e1_remarks' => 'nullable|string',
            'b4e2' => 'nullable|integer',
            'b4e2_remarks' => 'nullable|string',
            'b4e3' => 'nullable|integer',
            'b4e3_remarks' => 'nullable|string',
            'b4f' => 'nullable|integer',
            'b4f_remarks' => 'nullable|string',
            'b5a1' => 'nullable|integer',
            'b5a1_remarks' => 'nullable|string',
            'b5a2' => 'nullable|integer',
            'b5a2_remarks' => 'nullable|string',
            'b5b11' => 'nullable|integer',
            'b5b11_remarks' => 'nullable|string',
            'b5b12' => 'nullable|integer',
            'b5b12_remarks' => 'nullable|string',
            'b5b21' => 'nullable|integer',
            'b5b21_remarks' => 'nullable|string',
            'b5b22' => 'nullable|integer',
            'b5b22_remarks' => 'nullable|string',
            'b5c1' => 'nullable|integer',
            'b5c1_remarks' => 'nullable|string',
            'b5c2' => 'nullable|integer',
            'b5c2_remarks' => 'nullable|string',
            'b5d' => 'nullable|integer',
            'b5d_remarks' => 'nullable|string',
            'b5e' => 'nullable|integer',
            'b5e_remarks' => 'nullable|string',
        ]);

        // Add the validator_id and user_id to the validated data
        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        // Create or update the record
        $data = RstBExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->b1a, $data->b1b, $data->b1c1, $data->b1c2, $data->b1c3, $data->b1d1,
            $data->b2a, $data->b2b, $data->b2c, $data->b2d, $data->b2e, $data->b2f,
            $data->b2g, $data->b2h, $data->b2i, $data->b2j, $data->b3a, $data->b3b,
            $data->b3c, $data->b3d, $data->b3e, $data->b3f, $data->b4a1, $data->b4a2,
            $data->b4b, $data->b4c, $data->b4d, $data->b4e1, $data->b4e2, $data->b4e3,
            $data->b4f, $data->b5a1, $data->b5a2, $data->b5b11, $data->b5b12,
            $data->b5b21, $data->b5b22, $data->b5c1, $data->b5c2, $data->b5d, $data->b5e
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->b1a, $data->b1b, $data->b1c1, $data->b1c2, $data->b1c3, $data->b1d1,
            $data->b2a, $data->b2b, $data->b2c, $data->b2d, $data->b2e, $data->b2f,
            $data->b2g, $data->b2h, $data->b2i, $data->b2j, $data->b3a, $data->b3b,
            $data->b3c, $data->b3d, $data->b3e, $data->b3f, $data->b4a1, $data->b4a2,
            $data->b4b, $data->b4c, $data->b4d, $data->b4e1, $data->b4e2, $data->b4e3,
            $data->b4f, $data->b5a1, $data->b5a2, $data->b5b11, $data->b5b12,
            $data->b5b21, $data->b5b22, $data->b5c1, $data->b5c2, $data->b5d, $data->b5e
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 41; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function storeRstC(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'c1' => 'nullable|integer',
            'c1_remarks' => 'nullable|string',
            'c2' => 'nullable|integer',
            'c2_remarks' => 'nullable|string',
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
        ]);

        // Add the validator_id and user_id to the validated data
        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        // Create or update the record
        $data = RstCExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->c1, $data->c2, $data->c31, $data->c32,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 10; // Count of integer fields

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function storeRstD(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = RstDExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->d1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->d1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storeRstE(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'e1' => 'nullable|integer',
            'e1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = RstEExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->e1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->e1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    // BRO
    public function externalBro()
    {
        $small = EndorsedExternal::where('grouping', 'Small')->get();
        $medium = EndorsedExternal::where('grouping', 'Medium')->get();
        $large = EndorsedExternal::where('grouping', 'Large')->get();

        return view('external.bro', ['small' => $small, 'medium' => $medium, 'large' => $large]);
    }

    public function externalBroA($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $asEvaluations = AsEvaluation::where('region_id', $id)->first();
        $coEvaluations = CoEvaluation::where('region_id', $id)->first();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->first();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->first();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->first();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->first();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->first();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->first();
        $poEvaluations = PoEvaluation::where('region_id', $id)->first();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->first();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->first();

        $previousData = BroAExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.ev-bro-evaluation-a', [
            'user_id' => $id,
            'nominee' => $nominee,
            'as' => $asEvaluations,
            'co' => $coEvaluations,
            'fms' => $fmsEvaluations,
            'icto' => $ictoEvaluations,
            'ld' => $ldEvaluations,
            'nitesd' => $nitesdEvaluations,
            'piad' => $piadEvaluations,
            'plo'=> $ploEvaluations,
            'po' => $poEvaluations,
            'romo' => $romoEvaluations,
            'ws' => $wsEvaluations,
            'previousData' => $previousData,
        ]);
    }
    public function externalBroB($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $asEvaluations = AsEvaluation::where('region_id', $id)->first();
        $coEvaluations = CoEvaluation::where('region_id', $id)->first();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->first();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->first();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->first();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->first();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->first();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->first();
        $poEvaluations = PoEvaluation::where('region_id', $id)->first();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->first();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->first();

        $previousData = BroBExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.ev-bro-evaluation-b', [
            'user_id' => $id,
            'nominee' => $nominee,
            'as' => $asEvaluations,
            'co' => $coEvaluations,
            'fms' => $fmsEvaluations,
            'icto' => $ictoEvaluations,
            'ld' => $ldEvaluations,
            'nitesd' => $nitesdEvaluations,
            'piad' => $piadEvaluations,
            'plo'=> $ploEvaluations,
            'po' => $poEvaluations,
            'romo' => $romoEvaluations,
            'ws' => $wsEvaluations,
            'previousData' => $previousData,
        ]);
    }
    public function externalBroC($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $asEvaluations = AsEvaluation::where('region_id', $id)->first();
        $coEvaluations = CoEvaluation::where('region_id', $id)->first();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->first();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->first();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->first();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->first();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->first();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->first();
        $poEvaluations = PoEvaluation::where('region_id', $id)->first();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->first();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->first();

        $previousData = BroCExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.ev-bro-evaluation-c', [
            'user_id' => $id,
            'nominee' => $nominee,
            'as' => $asEvaluations,
            'co' => $coEvaluations,
            'fms' => $fmsEvaluations,
            'icto' => $ictoEvaluations,
            'ld' => $ldEvaluations,
            'nitesd' => $nitesdEvaluations,
            'piad' => $piadEvaluations,
            'plo'=> $ploEvaluations,
            'po' => $poEvaluations,
            'romo' => $romoEvaluations,
            'ws' => $wsEvaluations,
            'previousData' => $previousData,
        ]);
    }
    public function externalBroD($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $asEvaluations = AsEvaluation::where('region_id', $id)->first();
        $coEvaluations = CoEvaluation::where('region_id', $id)->first();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->first();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->first();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->first();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->first();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->first();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->first();
        $poEvaluations = PoEvaluation::where('region_id', $id)->first();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->first();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->first();

        $previousData = BroDExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.ev-bro-evaluation-d', [
            'user_id' => $id,
            'nominee' => $nominee,
            'as' => $asEvaluations,
            'co' => $coEvaluations,
            'fms' => $fmsEvaluations,
            'icto' => $ictoEvaluations,
            'ld' => $ldEvaluations,
            'nitesd' => $nitesdEvaluations,
            'piad' => $piadEvaluations,
            'plo'=> $ploEvaluations,
            'po' => $poEvaluations,
            'romo' => $romoEvaluations,
            'ws' => $wsEvaluations,
            'previousData' => $previousData,
        ]);
    }
    public function externalBroE($id)
    {
        $nominee = EndorsedExternal::where('user_id', $id)->first();

        $asEvaluations = AsEvaluation::where('region_id', $id)->first();
        $coEvaluations = CoEvaluation::where('region_id', $id)->first();
        $fmsEvaluations = FmsEvaluation::where('region_id', $id)->first();
        $ictoEvaluations = IctoEvaluation::where('region_id', $id)->first();
        $ldEvaluations = LdEvaluation::where('region_id', $id)->first();
        $nitesdEvaluations = NitesdEvaluation::where('region_id', $id)->first();
        $piadEvaluations = PiadEvaluation::where('region_id', $id)->first();
        $ploEvaluations = PloEvaluation::where('region_id', $id)->first();
        $poEvaluations = PoEvaluation::where('region_id', $id)->first();
        $romoEvaluations = RomoEvaluation::where('region_id', $id)->first();
        $wsEvaluations = WsEvaluation::where('region_id', $id)->first();

        $previousData = BroEExternal::where('user_id', $id)->first();

        return view('romd.bestti-gp-pillars.ev-bro-evaluation-e', [
            'user_id' => $id,
            'nominee' => $nominee,
            'as' => $asEvaluations,
            'co' => $coEvaluations,
            'fms' => $fmsEvaluations,
            'icto' => $ictoEvaluations,
            'ld' => $ldEvaluations,
            'nitesd' => $nitesdEvaluations,
            'piad' => $piadEvaluations,
            'plo'=> $ploEvaluations,
            'po' => $poEvaluations,
            'romo' => $romoEvaluations,
            'ws' => $wsEvaluations,
            'previousData' => $previousData,
        ]);
    }

    //store bro

    public function storeBroA(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'a1' => 'nullable|integer',
            'a1_remarks' => 'nullable|string',
            'a2' => 'nullable|integer',
            'a2_remarks' => 'nullable|string',
            'a3' => 'nullable|integer',
            'a3_remarks' => 'nullable|string',
            'a4' => 'nullable|integer',
            'a4_remarks' => 'nullable|string',
            'a5a' => 'nullable|integer',
            'a5a_remarks' => 'nullable|string',
            'a5b' => 'nullable|integer',
            'a5b_remarks' => 'nullable|string',
            'a6' => 'nullable|integer',
            'a6_remarks' => 'nullable|string',
            'a7a' => 'nullable|integer',
            'a7a_remarks' => 'nullable|string',
            'a7b' => 'nullable|integer',
            'a7b_remarks' => 'nullable|string',
            'a8' => 'nullable|integer',
            'a8_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = BroAExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->a1, $data->a2, $data->a3, $data->a4,
            $data->a5a, $data->a5b, $data->a6, $data->a7a, $data->a7b, $data->a8
            ])->filter(function ($value) {
                return !is_null($value); // Keep values that are not null
            })->count();

        // Define total_fields
        $data->total_fields = 10; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success','Data saved sucessfully']);
    }

    public function storeBroB(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'b1a' => 'nullable|integer',
            'b1a_remarks' => 'nullable|string',
            'b1b' => 'nullable|integer',
            'b1b_remarks' => 'nullable|string',
            'b1c' => 'nullable|integer',
            'b1c_remarks' => 'nullable|string',
            'b1d' => 'nullable|integer',
            'b1d_remarks' => 'nullable|string',
            'b1e' => 'nullable|integer',
            'b1e_remarks' => 'nullable|string',
            'b1f' => 'nullable|integer',
            'b1f_remarks' => 'nullable|string',
            'b1g' => 'nullable|integer',
            'b1g_remarks' => 'nullable|string',
            'b1h' => 'nullable|integer',
            'b1h_remarks' => 'nullable|string',
            'b1i' => 'nullable|integer',
            'b1i_remarks' => 'nullable|string',
            'b2a1' => 'nullable|integer',
            'b2a1_remarks' => 'nullable|string',
            'b2a2' => 'nullable|integer',
            'b2a2_remarks' => 'nullable|string',
            'b2a3' => 'nullable|integer',
            'b2a3_remarks' => 'nullable|string',
            'b2a41' => 'nullable|integer',
            'b2a41_remarks' => 'nullable|string',
            'b2a42' => 'nullable|integer',
            'b2a42_remarks' => 'nullable|string',
            'b2a43' => 'nullable|integer',
            'b2a43_remarks' => 'nullable|string',
            'b2b1' => 'nullable|integer',
            'b2b1_remarks' => 'nullable|string',
            'b2b2' => 'nullable|integer',
            'b2b2_remarks' => 'nullable|string',
            'b2b3' => 'nullable|integer',
            'b2b3_remarks' => 'nullable|string',
            'b2b4' => 'nullable|integer',
            'b2b4_remarks' => 'nullable|string',
            'b2b5' => 'nullable|integer',
            'b2b5_remarks' => 'nullable|string',
            'b2c1' => 'nullable|integer',
            'b2c1_remarks' => 'nullable|string',
            'b2c2' => 'nullable|integer',
            'b2c2_remarks' => 'nullable|string',
            'b2c3' => 'nullable|integer',
            'b2c3_remarks' => 'nullable|string',
            'b2c4' => 'nullable|integer',
            'b2c4_remarks' => 'nullable|string',
            'b2c5' => 'nullable|integer',
            'b2c5_remarks' => 'nullable|string',
            'b2c6' => 'nullable|integer',
            'b2c6_remarks' => 'nullable|string',
            'b2d1' => 'nullable|integer',
            'b2d1_remarks' => 'nullable|string',
            'b2d2' => 'nullable|integer',
            'b2d2_remarks' => 'nullable|string',
            'b2d31' => 'nullable|integer',
            'b2d31_remarks' => 'nullable|string',
            'b2d32' => 'nullable|integer',
            'b2d32_remarks' => 'nullable|string',
            'b2d411' => 'nullable|integer',
            'b2d411_remarks' => 'nullable|string',
            'b2d412' => 'nullable|integer',
            'b2d412_remarks' => 'nullable|string',
            'b2d421' => 'nullable|integer',
            'b2d421_remarks' => 'nullable|string',
            'b2d422' => 'nullable|integer',
            'b2d422_remarks' => 'nullable|string',
            'b2d431' => 'nullable|integer',
            'b2d431_remarks' => 'nullable|string',
            'b2d432' => 'nullable|integer',
            'b2d432_remarks' => 'nullable|string',
            'b2d441' => 'nullable|integer',
            'b2d441_remarks' => 'nullable|string',
            'b2d442' => 'nullable|integer',
            'b2d442_remarks' => 'nullable|string',
            'b2d5' => 'nullable|integer',
            'b2d5_remarks' => 'nullable|string',
            'b2d6' => 'nullable|integer',
            'b2d6_remarks' => 'nullable|string',
            'b2e11a' => 'nullable|integer',
            'b2e11a_remarks' => 'nullable|string',
            'b2e11b' => 'nullable|integer',
            'b2e11b_remarks' => 'nullable|string',
            'b2e12a' => 'nullable|integer',
            'b2e12a_remarks' => 'nullable|string',
            'b2e12b' => 'nullable|integer',
            'b2e12b_remarks' => 'nullable|string',
            'b2e13a' => 'nullable|integer',
            'b2e13a_remarks' => 'nullable|string',
            'b2e13b' => 'nullable|integer',
            'b2e13b_remarks' => 'nullable|string',
            'b2e21' => 'nullable|integer',
            'b2e21_remarks' => 'nullable|string',
            'b2e22' => 'nullable|integer',
            'b2e22_remarks' => 'nullable|string',
            'b2e23' => 'nullable|integer',
            'b2e23_remarks' => 'nullable|string',
            'b2e3' => 'nullable|integer',
            'b2e3_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = BroBExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->b1a, $data->b1b, $data->b1c, $data->b1d, $data->b1e,
            $data->b1f, $data->b1g, $data->b1h, $data->b1i, $data->b2a1,
            $data->b2a2, $data->b2a3, $data->b2a41, $data->b2a42, $data->b2a43,
            $data->b2b1, $data->b2b2, $data->b2b3, $data->b2b4, $data->b2b5,
            $data->b2c1, $data->b2c2, $data->b2c3, $data->b2c4, $data->b2c5,
            $data->b2c6, $data->b2d1, $data->b2d2, $data->b2d31, $data->b2d32,
            $data->b2d411, $data->b2d412, $data->b2d421, $data->b2d422, $data->b2d431,
            $data->b2d432, $data->b2d441, $data->b2d442, $data->b2d5, $data->b2d6,
            $data->b2e11a, $data->b2e11b, $data->b2e12a, $data->b2e12b, $data->b2e13a,
            $data->b2e13b, $data->b2e21, $data->b2e22, $data->b2e23, $data->b2e3
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->b1a, $data->b1b, $data->b1c, $data->b1d,
            $data->b1e, $data->b1f, $data->b1g, $data->b1h, $data->b1i,
            $data->b2a1, $data->b2a2, $data->b2a3, $data->b2a41, $data->b2a42,
            $data->b2a43, $data->b2b1, $data->b2b2, $data->b2b3, $data->b2b4,
            $data->b2b5, $data->b2c1, $data->b2c2, $data->b2c3, $data->b2c4,
            $data->b2c5, $data->b2c6, $data->b2d1, $data->b2d2, $data->b2d31,
            $data->b2d32, $data->b2d411, $data->b2d412, $data->b2d421, $data->b2d422,
            $data->b2d431, $data->b2d432, $data->b2d441, $data->b2d442, $data->b2d5,
            $data->b2d6, $data->b2e11a, $data->b2e11b, $data->b2e12a, $data->b2e12b,
            $data->b2e13a, $data->b2e13b, $data->b2e21, $data->b2e22, $data->b2e23,
            $data->b2e3
        ])->filter(function ($value) {
            return !is_null($value); // Count values that are not null
        })->count();

         // Define total_fields
         $data->total_fields = 46; // Adjust this value based on the number of fields

         // Calculate progress_percentage
         $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;
 
         $data->save();
 
         return redirect()->back()->with(['success' => 'Data saved successfully']);
     }

     public function storeBroC(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'c1' => 'nullable|integer',
            'c1_remarks' => 'nullable|string',
            'c2' => 'nullable|integer',
            'c2_remarks' => 'nullable|string',
            'c31' => 'nullable|integer',
            'c31_remarks' => 'nullable|string',
            'c32' => 'nullable|integer',
            'c32_remarks' => 'nullable|string',
            'c33' => 'nullable|integer',
            'c33_remarks' => 'nullable|string',
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
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = BroCExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->c1, $data->c2, $data->c31, $data->c32, $data->c33,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432, $data->c5
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->c1, $data->c2, $data->c31, $data->c32, $data->c33,
            $data->c411, $data->c412, $data->c421, $data->c422,
            $data->c431, $data->c432, $data->c5
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 12; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success', 'Data saved successfully']);
    }

    public function storeBroD(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'd1' => 'nullable|integer',
            'd1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = BroDExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->d1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->d1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }

    public function storeBroE(Request $request)
    {
        $user_id = $request->input('user_id');
        $validator_id = Auth::user()->id;

        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'validator_id' => 'nullable|integer',
            'e1' => 'nullable|integer',
            'e1_remarks' => 'nullable|string',
        ]);

        $validated['validator_id'] = $validator_id;
        $validated['user_id'] = $user_id;

        $data = BroEExternal::updateOrCreate(
            ['user_id' => $user_id, 'validator_id' => $validator_id],
            $validated
        );

        // Calculate overall_total_score
        $data->overall_total_score = collect([
            $data->e1
        ])->filter()->sum();

        // Calculate overall_total_filled
        $data->overall_total_filled = collect([
            $data->e1
        ])->filter(function ($value) {
            return !is_null($value); // Keep values that are not null
        })->count();

        // Define total_fields
        $data->total_fields = 1; // Adjust this value if necessary

        // Calculate progress_percentage
        $data->progress_percentage = ($data->overall_total_filled / $data->total_fields) * 100;

        $data->save();

        return redirect()->back()->with(['success' => 'Data saved successfully']);
    }
   


}
