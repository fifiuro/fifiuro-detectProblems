<?php

namespace App\Http\Controllers\problem;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\problem\problemCreateRequest;
use App\Models\Problem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class problemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Problem::paginate(10);
        return $this->returnSearch(session('action') ? session('action') : 'find', session('type') ? session('type') : 'success', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Problem::when($request->filled('problem'), function ($query) use ($request) {
            $query->where('problem', 'like', '%' . $request->problem . '%');
        })
            ->when($request->filled('zone'), function ($query) use ($request) {
                $query->where('zone', 'like', '%' . $request->zone . '%');
            })
            ->when($request->filled('finicio'), function ($query) use ($request) {
                $query->where('date', '>=', Carbon::parse($request->input('finicio'))->startOfDay());
            })
            ->when($request->filled('ffin'), function ($query) use ($request) {
                $query->where('date', '<=', Carbon::parse($request->input('ffin'))->endOfDay());
            })
            ->paginate(10);
        return $this->returnSearch('find', 'success', $data, $request->problem, $request->zone, $request->finicio, $request->ffin);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('problem.newProblem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(problemCreateRequest $request)
    {
        try {
            $data = new Problem();
            $data->problem = $request->problem;
            $data->coordinates = $request->coordinates;
            $data->zone = $request->zone;
            $data->street = $request->street;
            $data->date = Carbon::now();
            $data->other = $request->other;
            if ($data->save()) {
                return redirect()->route('problem.list')->with('action', 'add')->with('type', 'success');
            } else {
                return redirect()->route('problem.list')->with('action', 'add')->with('type', 'danger');
            }
        } catch (\Throwable $th) {
            return redirect()->route('problem.list')->with('action', 'add')->with('type', 'general-error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Problem::find($id);

        return view('problem.editProblem')->with('id', $id)->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Problem::find($id);
            if ($data) {
                $data->problem = $request->problem;
                $data->coordinates = $request->coordinates;
                $data->zone = $request->zone;
                $data->street = $request->street;
                $data->other = $request->other;
                if ($data->update()) {
                    return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'success');
                } else {
                    return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'danger');
                }
            } else {
                return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'general-error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Problem::find($id);
            if ($data) {
                if ($data->delete()) {
                    return redirect()->route('problem.list')->with('action', 'delete')->with('type', 'success');
                } else {
                    return redirect()->route('problem.list')->with('action', 'delete')->with('type', 'danger');
                }
            } else {
                return redirect()->route('problem.list')->with('action', 'delete')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('problem.list')->with('action', 'delete')->with('type', 'general-error');
        }
    }

    public function returnSearch($action, $type, $data, $problem = null, $zone = null, $finicio = null, $ffin = null)
    {
        $m = Messages::mesagesAction($action, $type);

        return view('problem.listProblem')
            ->with('titulo', $m[0])
            ->with('message', $m[1])
            ->with('tipo', $m[2])
            ->with('data', $data)
            ->with('problem', $problem)
            ->with('zone', $zone)
            ->with('finicio', $finicio)
            ->with('ffin', $ffin);
    }
}
