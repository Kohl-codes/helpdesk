<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\User;
use App\Models\Equipment;
use App\Models\Problem;
use App\Models\Specialist;
use App\Models\Resolution;

class HelpdeskController extends Controller
{
    // Log a new helpdesk call
    public function logCall(Request $request)
    {
        $call = new Call();
        $call->caller_id = User::where('name', $request->caller)->first()->id;
        $call->operator_id = User::where('name', $request->operator)->first()->id;
        $call->equipment_id = Equipment::where('serial_number', $request->serial_number)->first()->id;
        $call->description = $request->description;
        $call->call_time = now();
        $call->save();

        return response()->json(['message' => 'Call logged successfully'], 201);
    }

    // Get all logged calls
    public function getCalls()
    {
        $calls = Call::with(['caller', 'operator', 'equipment'])->get();
        return response()->json($calls);
    }

    // Assign a problem to a specialist
    public function assignProblem(Request $request)
    {
        $specialist = Specialist::find($request->specialist_id);
        $specialist->current_load += 1;
        $specialist->save();

        $problem = new Problem();
        $problem->call_id = $request->call_id;
        $problem->specialist_id = $specialist->id;
        $problem->problem_type = $request->problem_type;
        $problem->save();

        return response()->json(['message' => 'Problem assigned successfully'], 200);
    }

    // Get all specialists
    public function getSpecialists()
    {
        $specialists = Specialist::all();
        return response()->json($specialists);
    }

    // Log a problem resolution
    public function logResolution(Request $request)
    {
        $resolution = new Resolution();
        $resolution->call_id = $request->call_id;
        $resolution->resolution_description = $request->resolution_description;
        $resolution->resolved_at = now();
        $resolution->time_taken = $request->time_taken;
        $resolution->save();

        return response()->json(['message' => 'Resolution logged successfully'], 200);
    }
}
