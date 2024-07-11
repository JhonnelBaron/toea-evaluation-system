<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpContoller extends Controller
{
    public function getGalingProbinsyaUsers(Request $request)
    {
        // Fetch data from the users table where awardings column has the value 'Galing_Probinsya'
        $users = DB::table('users')->where('awardings', 'Galing_Probinsya')
        ->whereNotNull('endorsement_status')
        ->where('endorsement_status', '!=', '')
        ->where('endorsement_status', '!=', 'Not Endorsed by Provincial Office')
        ->where('endorsement_status', '!=', 'Not Endorsed by Regional Office')
        ->get();
        
        // Function to get the evaluated score for a user
        $getEvaluatedScore = function($user_id) {
            $tables = [
                'galing_probinsya_a_parts',
                'galing_probinsya_b_parts',
                'galing_probinsya_c_parts',
                'galing_probinsya_d_parts',
                'galing_probinsya_e_parts'
            ];

            $totalScoreSelf = 0;
            $totalScoreRO = 0;
            $totalScoreROMO = 0;
            $breakdown = [];

            foreach ($tables as $table) {
                $totalScoreSelf += DB::table($table)->where('user_id', $user_id)->sum('total_initial_score');
                $totalScoreRO += DB::table($table)->where('user_id', $user_id)->sum('total_final_score');
                $totalScoreROMO += DB::table($table)->where('user_id', $user_id)->sum('total_rfinal_score');

                $scores = DB::table($table)->select('total_initial_score', 'total_final_score', 'total_rfinal_score')
                    ->where('user_id', $user_id)
                    ->first();

                $breakdown[$table] = $scores;
            }

            return [
                'totalScoreSelf' => $totalScoreSelf,
                'totalScoreRO' => $totalScoreRO,
                'totalScoreROMO' => $totalScoreROMO,
                'breakdown' => $breakdown
            ];
        };

        // Add evaluated scores to users
        foreach ($users as $user) {
            $scores = $getEvaluatedScore($user->id);
            $user->scores = $scores;
            $user->totalScoreSelf = $scores['totalScoreSelf'];
            $user->totalScoreRO = $scores['totalScoreRO'];
            $user->totalScoreROMO = $scores['totalScoreROMO'];
        }

        $filterBy = $request->input('filterBy', 'self-rating');

        switch ($filterBy) {
            case 'self-rating':
                $users = $users->sortByDesc('totalScoreSelf');
                break;
            case 'po':
                $users = $users->sortByDesc('totalScorePO');
                break;
            case 'ro':
                $users = $users->sortByDesc('totalScoreRO');
                break;
            case 'romo':
                $users = $users->sortByDesc('totalScoreROMO');
                break;
            default:
                $users = $users->sortByDesc('totalScoreSelf');
        }

        $smallProvinces = $users->filter(function ($user) {
            return $user->category == 'Small_Province';
        });

        $mediumProvinces = $users->filter(function ($user) {
            return $user->category == 'Medium_Province';
        });

        $largeProvinces = $users->filter(function ($user) {
            return $user->category == 'Large_Province';
        });

        // Pass the data to the Blade view
        return view('romd.gp-summary', [
            'smallProvinces' => $smallProvinces,
            'mediumProvinces' => $mediumProvinces,
            'largeProvinces' => $largeProvinces,
            'filterBy' => $filterBy
        ]);
    }
}
