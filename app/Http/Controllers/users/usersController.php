<?php

namespace App\Http\Controllers\users;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\users\usersCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(10);
        return $this->returnSearch(session('action') ? session('action') : 'find', session('type') ? session('type') : 'success', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = User::when($request->filled('username'), function ($query) use ($request) {
            $query->where('username', 'like', '%' . $request->username . '%');
        })
            ->paginate(10);
        return $this->returnSearch('find', 'success', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.newUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(usersCreateRequest $request)
    {
        try {
            $data = new User();
            $data->name = $request->name;
            $data->last_name = $request->last_name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->type = $request->type;
            $data->password = bcrypt($request->password);
            if ($data->save()) {
                return redirect()->route('users.list')->with('action', 'add')->with('type', 'success');
            } else {
                return redirect()->route('users.list')->with('action', 'add')->with('type', 'danger');
            }
        } catch (\Throwable $th) {
            return redirect()->route('users.list')->with('action', 'add')->with('type', 'general-error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);

        return view('users.editUser')->with('id', $id)->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = User::find($id);
            if ($data) {
                $data->name = $request->name;
                $data->last_name = $request->last_name;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->type = $request->type;
                if (isset($request->password)) {
                    $data->password = bcrypt($request->password);
                }
                if ($data->update()) {
                    if (Auth::user()->type == 'user') {
                        return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'success');
                    } else {
                        return redirect()->route('users.list')->with('action', 'edit')->with('type', 'success');
                    }
                } else {
                    if (Auth::user()->type == 'user') {
                        return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'danger');
                    } else {
                        return redirect()->route('users.list')->with('action', 'edit')->with('type', 'danger');
                    }
                }
            } else {
                if (Auth::user()->type == 'user') {
                    return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'exists');
                } else {
                    return redirect()->route('users.list')->with('action', 'edit')->with('type', 'exists');
                }
            }
        } catch (\Throwable $th) {
            if (Auth::user()->type == 'user') {
                return redirect()->route('problem.list')->with('action', 'edit')->with('type', 'general-error');
            } else {
                return redirect()->route('users.list')->with('action', 'edit')->with('type', 'general-error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::find($id);
            if ($data) {
                if ($data->delete()) {
                    return redirect()->route('users.list')->with('action', 'delete')->with('type', 'success');
                } else {
                    return redirect()->route('users.list')->with('action', 'delete')->with('type', 'danger');
                }
            } else {
                return redirect()->route('users.list')->with('action', 'destroy')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('users.list')->with('action', 'destroy')->with('type', 'general-error');
        }
    }

    public function returnSearch($action, $type, $data)
    {
        $m = Messages::mesagesAction($action, $type);

        return view('users.listUsers')
            ->with('titulo', $m[0])
            ->with('message', $m[1])
            ->with('tipo', $m[2])
            ->with('data', $data);
    }
}
