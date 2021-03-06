<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Company;
use App\Models\Location;
use App\Models\Title;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function hot_jobs_values()
    {
        try {
            $locations = Location::get();
            $categories = Category::get();
            $titles = Title::get();
            return [
                "location" => $locations,
                "categories" => $categories,
                "titles" => $titles,
            ];
        } catch (\Illuminate\Database\QueryException $ex) {
            return [
                "status"=>500,
                "data"=>$ex
            ];
        }
    }

    public function hot_jobs()
    {
        try {
            $location = request('location');
            $category = request('category');
            $title = request('title');
            if ($location || $category || $title) {
                if (!$location && !$category) {
                    return Job::where('title_id', $title)->with(['category','title','company'])->get();
                }
                elseif (!$location && !$title) {
                    return Job::where('category_id', $category)->with(['category','title','company'])->get();
                }
                elseif (!$category && !$title) {
                    return Job::with(['category','title','company'=>function ($q1)
                    {
                        $q1->with('location');
                    }])->whereHas('company',function ($q) use($location)
                    {
                        $q->where('location_id',$location);
                    })->get();
                }
                elseif (!$category) {
                    return Job::where(['title_id' => $title])->with(['category','title','company'=>function ($q1)
                    {
                        $q1->with('location');
                    }])->whereHas('company',function ($q) use($location)
                    {
                        $q->where('location_id',$location);
                    })->get();
                }
                elseif (!$location) {
                    return Job::where(['category_id' => $category, 'title_id' => $title])->with(['category','title','company'])->get();
                }
                elseif (!$title) {
                    return Job::where(['category_id' => $category])->with(['category','title','company'=>function ($q1)
                    {
                        $q1->with('location');
                    }])->whereHas('company',function ($q) use($location)
                    {
                        $q->where('location_id',$location);
                    })->get();
                }
                else {
                    return Job::where(['category_id' => $category, 'title_id' => $title])->with(['category','title','company'=>function ($q1)
                    {
                        $q1->with('location');
                    }])->whereHas('company',function ($q) use($location)
                    {
                        $q->where('location_id',$location);
                    })->get();
                }
            } else {
                return Job::take(15)->orderBy('id', 'desc')->with(['category','title','company'])->get();
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return [
                "status"=>500,
                "data"=>$ex
            ];
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.job.index',['company'=>Company::where('id',session('company')->id)->with('jobs')->first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.job.create',['titles'=>Title::all(),'categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Job::create($request->all());
        return redirect('/job')->with('res',['type'=>'success','message'=>'created succcessfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('company.job.edit',['job' => $job,'titles'=>Title::all(),'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $job = Job::where('id',$request->id)->first();
        $job->title_id = $request->title_id;
        $job->category_id = $request->category_id;
        $job->position = $request->position;
        $job->vacancy = $request->vacancy;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary;
        $job->description = $request->description;
        $job->nature = $request->nature;
        $job->education = $request->education;
        $job->experience = $request->experience;
        $job->requirements = $request->requirements;
        $job->other_benefits = $request->other_benefits;
        $job->save();
        return back()->with("res",["type"=>"success","message"=>"updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
