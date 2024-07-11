<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiController extends Controller
{
    // public function getTiUsers()
    // {
    //     // Fetch data from the users table where awardings column has the value 'Galing_Probinsya'
    //     $users = DB::table('users')->where('awardings', 'Best_TI')
    //     ->whereNotNull('endorsement_status')
    //     ->where('endorsement_status', '!=', '')
    //     ->where('endorsement_status', '!=', 'Not Endorsed by Provincial Office')
    //     ->get();
        
    //     // Function to get the evaluated score for a user
    //     $getEvaluatedScore = function($user_id) {
    //         $tables = [
    //             'best_ti_tas_rtcstc_a_parts',
    //             'best_ti_tas_rtcstc_b_parts',
    //             'best_ti_tas_rtcstc_c_parts',
    //             'best_ti_tas_rtcstc_d_parts',
    //             'best_ti_tas_rtcstc_e_parts'
    //         ];

    //         $totalScoreSelf = 0;
    //         $totalScorePO = 0;
    //         $totalScoreRO = 0;
    //         $totalScoreROMO = 0;
    //         $breakdown = [];

    //         foreach ($tables as $table) {
    //             $totalScoreSelf += DB::table($table)->where('user_id', $user_id)->sum('total_initial_score');
    //             $totalScorePO += DB::table($table)->where('user_id', $user_id)->sum('total_evaluation_score');
    //             $totalScoreRO += DB::table($table)->where('user_id', $user_id)->sum('total_final_score');
    //             $totalScoreROMO += DB::table($table)->where('user_id', $user_id)->sum('total_rfinal_score');

    //             $scores = DB::table($table)->select('total_initial_score', 'total_evaluation_score', 'total_final_score', 'total_rfinal_score')
    //                 ->where('user_id', $user_id)
    //                 ->first();

    //             $breakdown[$table] = $scores;
    //         }

    //         return [
    //             'totalScoreSelf' => $totalScoreSelf,
    //             'totalScorePO' => $totalScorePO,
    //             'totalScoreRO' => $totalScoreRO,
    //             'totalScoreROMO' => $totalScoreROMO,
    //             'breakdown' => $breakdown
    //         ];
    //     };

    //     // Add evaluated scores to users
    //     foreach ($users as $user) {
    //         $scores = $getEvaluatedScore($user->id);
    //         $user->scores = $scores;
    //         $user->totalScoreSelf = $scores['totalScoreSelf'];
    //         $user->totalScorePO = $scores['totalScorePO'];
    //         $user->totalScoreRO = $scores['totalScoreRO'];
    //         $user->totalScoreROMO = $scores['totalScoreROMO'];
    //     }

    //     $rtcStc = $users->filter(function ($user) {
    //         return $user->category == 'RTC-STC';
    //     });

    //     $tas = $users->filter(function ($user) {
    //         return $user->category == 'TAS';
    //     });

    //     $ptc = $users->filter(function ($user) {
    //         return $user->category == 'PTC';
    //     });

    //     // Pass the data to the Blade view
    //     return view('romd.ti-summary', [
    //         'rtcStc' => $rtcStc,
    //         'tas' => $tas,
    //         'ptc' => $ptc,
    //     ]);
    // }
    public function getTiUsers(Request $request)
    {
        // Fetch data from the users table where awardings column has the value 'Best_TI'
        $users = DB::table('users')->where('awardings', 'Best_TI')
            ->whereNotNull('endorsement_status')
            ->where('endorsement_status', '!=', '')
            ->where('endorsement_status', '!=', 'Not Endorsed by Provincial Office')
            ->where('endorsement_status', '!=', 'Not Endorsed by Regional Office')
            ->get();

        if ($users->isEmpty()) {
            return view('your_view', compact('users'));
        }
        
        // Function to get the evaluated score for a user
        $getEvaluatedScore = function($user) {
            // Determine the tables to use based on the user's category
            if ($user->category === 'PTC') {
                $tables = [
                    'best_ti_ptc_a_parts',
                    'best_ti_ptc_b_parts',
                    'best_ti_ptc_c_parts',
                    'best_ti_ptc_d_parts',
                    'best_ti_ptc_e_parts'
                ];
            } else {
                $tables = [
                    'best_ti_tas_rtcstc_a_parts',
                    'best_ti_tas_rtcstc_b_parts',
                    'best_ti_tas_rtcstc_c_parts',
                    'best_ti_tas_rtcstc_d_parts',
                    'best_ti_tas_rtcstc_e_parts'
                ];
            }
    
            $user_id = $user->id;
            $totalScoreSelf = 0;
            $totalScorePO = 0;
            $totalScoreRO = 0;
            $totalScoreROMO = 0;
            $breakdown = [];

            foreach ($tables as $table) {
                $totalScoreSelf += DB::table($table)->where('user_id', $user_id)->sum('total_initial_score');
                $totalScorePO += DB::table($table)->where('user_id', $user_id)->sum('total_evaluation_score');
                $totalScoreRO += DB::table($table)->where('user_id', $user_id)->sum('total_final_score');
                $totalScoreROMO += DB::table($table)->where('user_id', $user_id)->sum('total_rfinal_score');

                $scores = DB::table($table)->select('total_initial_score', 'total_evaluation_score', 'total_final_score', 'total_rfinal_score')
                    ->where('user_id', $user_id)
                    ->first();

                $breakdown[$table] = $scores;
            }

            return [
                'totalScoreSelf' => $totalScoreSelf,
                'totalScorePO' => $totalScorePO,
                'totalScoreRO' => $totalScoreRO,
                'totalScoreROMO' => $totalScoreROMO,
                'breakdown' => $breakdown
            ];
        };

        // Add evaluated scores to users
        foreach ($users as $user) {
            $scores = $getEvaluatedScore($user);
            $user->scores = $scores;
            $user->totalScoreSelf = $scores['totalScoreSelf'];
            $user->totalScorePO = $scores['totalScorePO'];
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

        $rtcStc = $users->filter(function ($user) {
            return $user->category == 'RTC-STC';
        });

        $tas = $users->filter(function ($user) {
            return $user->category == 'TAS';
        });

        $ptc = $users->filter(function ($user) {
            return $user->category == 'PTC';
        });

        // Pass the data to the Blade view
        return view('romd.ti-summary', [
            'rtcStc' => $rtcStc,
            'tas' => $tas,
            'ptc' => $ptc,
            'filterBy' => $filterBy,
        ]);
    }
}
