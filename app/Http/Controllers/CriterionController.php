<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = Criterion::orderBy('min')->get();

        return view('criterion.index', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $criterion = new Criterion([
            'user_id' => Auth::user()->id,
            'criterion' => ucfirst(strtolower($request->criterion)),
            'min' => $request->min,
            'max' => $request->max
        ]);

        $criterion->save();

        $this->update_criteria();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function show(Criterion $criterion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function edit(Criterion $criterion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criterion $criterion)
    {
        $criterion->criterion = ucfirst(strtolower($request->criterion));
        $criterion->min = $request->min;
        $criterion->max = $request->max;
        $criterion->update();

        $this->update_criteria();

        // return Diagnosis::get();
        // return $this->update_criteria();
        return redirect()->back();
    }

    private function update_criteria(){
        $diagnoses = Diagnosis::get();
        $criteria = Criterion::get();

        foreach ($diagnoses as $diagnosis) {

            foreach ($criteria as $criterion) {
                if ($criterion->min <= $diagnosis->score && $diagnosis->score < $criterion->max) {
                    $new_criterion = $criterion->criterion;
                    break;
                }
            }
            if (isset($new_criterion)) {
                // return $new_criterion;
                $diagnosis->criterion = $new_criterion;
                $diagnosis->update();
                // return $diagnosis;
            }
            else{
                $diagnosis->criterion = 'Belum terdefinisi';
                $diagnosis->update();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criterion $criterion)
    {
        $criterion->delete();

        $this->update_criteria();

        return redirect()->back();
    }
}
