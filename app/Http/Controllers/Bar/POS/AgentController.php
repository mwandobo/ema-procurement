<?php

namespace App\Http\Controllers\Bar\POS;
use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Agent;
use App\Models\Bar\POS\Activity;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = Agent::where('user_id', auth()->user()->added_by)->get();
        return view('bar.pos.agent.index', compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->added_by;
        $agent = Agent::create($data);

        if ($agent) {
            Activity::create([
                'added_by' => auth()->user()->added_by,
                'user_id' => auth()->user()->id,
                'module_id' => $agent->id,
                'module' => 'agent',
                'activity' => "agent" . $agent->name . " Created",
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $agent->id,
                'name' => $agent->name,
            ]);
        }

        return redirect()->route('agents.index')->with('success', 'Agent Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  Agent::find($id);
        return view('bar.pos.agent.index', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $agent = Agent::find($id);
        $data = $request->post();
        $data['user_id'] = auth()->user()->added_by;
        $agent->update($data);

        if (!empty($agent)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'agent',
                    'activity' => "agent" .  $agent->name . "  Updated",
                ]
            );
        }

        Toastr::success('agent Updated Successfully', 'Success');
        return redirect(route('agents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $agent  = Agent::find($id);
        if (!empty($agent)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'agent',
                    'activity' => "agent " .  $agent->name . "  Deleted",
                ]
            );
        }
        
        $agent->delete();

        Toastr::success('Agent Deleted Successfully', 'Success');
        return redirect(route('agents.index'));
    }
}

