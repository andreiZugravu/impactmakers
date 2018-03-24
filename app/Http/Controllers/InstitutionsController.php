<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\InstitutionRating;

class InstitutionsController extends Controller
{
    public function index()
    {
        $institutions = Institution::all();

        return view('admin.institutions.index', compact('institutions'));
    }

    public function getInstitutions(Request $request)
    {
        $query = Institution::query();

        if ($request->has('types')) {
            $query = $query->whereIn('institution_type', $request->types);
        }

        $institutions = $query->get();

        return response()->json([
            'institutions' => $institutions
        ]);
    }

    public function update(Institution $institution)
    {
        $institution->update([
            'status' => !$institution->status
        ]);

        return response()->json([
            'status' => 'success',                
            'institution' => $institution
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'ratio' => $request->females / ($request->females + $request->males) * 100
        ]);
        $institution = Institution::create($request->all());

        return response()->json([
            'status' => 'success',
            'institution' => $institution
        ]);
    }

    public function delete(Institution $institution)
    {
        $institution->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function rate(Request $request, Institution $institution)
    {
        InstitutionRating::create([
            'user_id' => Auth::id(),
            'institution_id' => $institution->id,
            'rating' => $request->rating
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}