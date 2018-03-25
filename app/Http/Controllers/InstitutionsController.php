<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\InstitutionRating;
use App\InstitutionType;
use App\Photo;

class InstitutionsController extends Controller
{
    public function index()
    {
        $institutions = Institution::all();
        $institutionTypes = InstitutionType::all();

        return view('admin.institutions.index', compact('institutions',  'institutionTypes'));
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

    public function update(Request $request, Institution $institution)
    {
        $institution->update($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function changeStatus(Institution $institution)
    {
        $institution->status = !$institution->status;
        $institution->save();

        return response()->json([
            'status' => 'success',                
            'institution' => $institution
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->merge([
            'ratio' => $request->females / max(0.000001, ($request->females + $request->males)) * 100
        ]);


        $request = $request->except(['males', 'females', 'submit']);
        $institution = Institution::create($request);

        // dd($institution->id);
        // if(!$request->photos) {
            $photo = Photo::create(['path' => '/images/default_institution.jpg',
                'institution_id' => $institution->id]);    
        // }

        return redirect('/');
        // return response()->json([
        //     'status' => 'success',
        //     'institution' => $institution
        // ]);
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
