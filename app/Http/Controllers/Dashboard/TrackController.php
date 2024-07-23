<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Models\Track;
use Illuminate\Support\Facades\Request;

class TrackController extends Controller
{
    public function checkMacAddress(TrackRequest $request)
    {
    
        $macAddress = $request->input('mac_address');
        $exists = Track::firstOrCreate(['mac_address' => $macAddress]);

        return response()->json(['exists' => $exists]);
    }
    public function countMacAddresses()
    {
        $count = Track::count();
        return response()->json(['count' => $count]);
    }

    // Method to list all MAC addresses with pagination
    public function listMacAddresses(Request $request)
    {
        // Define how many items you want per page
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified

        // Retrieve paginated data
        $macAddresses = Track::paginate($perPage);

        return response()->json($macAddresses);
    }
}
