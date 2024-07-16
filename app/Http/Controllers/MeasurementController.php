<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeasurementRequest;
use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
   public function index()
   {
//       $measurements = Measurement::all();
//       return view('measurements.index', compact('measurements'));
   }
   public function create()
   {
      // return view('measurements.create');
   }
   public function store(StoreMeasurementRequest $request)
   {
//       $validated = $request->validated();
//       Measurement::created($validated);
//       return redirect()->route('measurements.index');
   }
   public function show(Measurement $measurement)
   {
      // return view('measurements.show', compact('measurement'));
   }
   public function edit(Measurement $measurement)
   {
      // return view('measurements.edit', compact('measurement'));
   }
   public function update(Request $request, Measurement $measurement)
   {
       //
   }
   public function destroy(Measurement $measurement)
   {
       $measurement->delete();
      // return redirect()->route('measurements.index');
   }
}
