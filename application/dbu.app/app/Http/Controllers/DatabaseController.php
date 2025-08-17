<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatabaseController extends Controller
{
    public function index()
    {
        $databases = Auth::user()->databases;

        return view('user.databases.index', compact('databases'));
    }

    public function create()
    {
        return view('user.databases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:mysql,pgsql,sqlite,mongodb',
            'host' => 'required',
            'port' => 'required|integer',
            'username' => 'required',
            'password' => 'required',
            'database_name' => 'required',
        ]);

        Auth::user()->databases()->create($request->all());

        return redirect()->route('databases.index')->with('success', 'Database added');
    }

    public function edit($id)
    {
        $database = Auth::user()->databases()->findOrFail($id);

        return view('user.databases.edit', compact('database'));
    }

    public function update(Request $request, $id)
    {
        $database = Auth::user()->databases()->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'host' => 'required',
            'port' => 'required|integer',
            'username' => 'required',
            'password' => 'required',
            'database_name' => 'required',
        ]);

        $database->update($request->all());

        return redirect()->route('databases.index')->with('success', 'Database updated');
    }

    public function destroy($id)
    {
        $database = Auth::user()->databases()->findOrFail($id);
        $database->delete();

        return redirect()->route('databases.index')->with('success', 'Database deleted');
    }

    public function testConnection($id)
    {
        $db = Auth::user()->databases()->findOrFail($id);

        try {
            config([
                'database.connections.temp_test' => [
                    'driver' => $db->type,
                    'host' => $db->host,
                    'port' => $db->port,
                    'database' => $db->database_name,
                    'username' => $db->username,
                    'password' => $db->password,
                ],
            ]);

            \DB::connection('temp_test')->getPdo();

            return back()->with('success', 'Connection successful!');
        } catch (\Exception $e) {
            return back()->with('error', 'Connection failed: '.$e->getMessage());
        }
    }
}
