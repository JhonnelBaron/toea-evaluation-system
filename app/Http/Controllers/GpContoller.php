<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpContoller extends Controller
{
    public function getGalingProbinsyaUsers()
    {
        // Fetch data from the users table where awardings column has the value 'Galing_Probinsya'
        $users = DB::table('users')->where('awardings', 'Galing_Probinsya')->get();

        // Function to get the evaluated score for a user
        $getEvaluatedScore = function($user_id) {
            $tables = [
                'galing_probinsya_a_parts',
                'galing_probinsya_b_parts',
                'galing_probinsya_c_parts',
                'galing_probinsya_d_parts',
                'galing_probinsya_e_parts'
            ];

            $totalScore = 0;

            foreach ($tables as $table) {
                $totalScore += DB::table($table)->where('user_id', $user_id)->sum('total_final_score');
            }

            return $totalScore;
        };

        // Add evaluated scores to users
        foreach ($users as $user) {
            $user->evaluated_score = $getEvaluatedScore($user->id);
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
        ]);
    }
}
