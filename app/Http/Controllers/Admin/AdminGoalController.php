<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;

class AdminGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('adminpage.title.list.goal');
        $viewData['search'] = '';
        $viewData["goals"] = Goal::all();
        return view('admin.goal.index')->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [];
        $viewData["title"] = __('adminpage.title.create.goal');
        return view('admin.goal.create')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $viewData = [];
        $viewData['title'] = __('adminpage.title.goal');
        $viewData['goals'] = Goal::where('description', 'LIKE', '%' . $search . '%')
            ->get();
        $viewData['search'] = $search;
        return view('admin.goal.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Goal::validate($request);
        $newGoal = new Goal();
        $newGoal->setDescription($request->input('description'));
        $newGoal->setCantPublications($request->input('cant_publications'));
        $newGoal->setActivableDiscount($request->input('activable_discount'));

        $newGoal->save();

        return back();
    }
    public function destroy($id)
    {
        Goal::destroy($id);
        return back();
    }
}
