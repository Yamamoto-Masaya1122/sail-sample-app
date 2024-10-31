<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Video;
use Illuminate\Http\Request;

class ApiVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $videos;

     public function __construct (Video $videos) {
         $this->videos = $videos;
     }

    public function index()
    {
        $company_id = 1;
        $company = Company::find($company_id);
        $query = Video::query();

        if($company->a_course_flag === 1) {
            $query->where('cource', 1);
        }

        if($company->b_course_flag === 1) {
            $query->where('cource', 2);
        }

        if($company->c_course_flag === 1) {
            $query->where('cource', 3);
        }
        $query->where('is_display', 1);
        $results = $query->get();

        return response()->json([
            'status' => true,
            'results' => $results
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
