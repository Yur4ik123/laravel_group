<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::with('translations')->get();
        return view('admin.statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.statuses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|unique:statuses,slug',
            'active' => 'required|boolean',
            'name.*' => 'required|string', // name[en], name[uk]
        ]);

        $status = Status::create([
            'slug' => $data['slug'],
            'active' => $data['active'],
        ]);

        foreach ($data['name'] as $locale => $name) {
            $status->translateOrNew($locale)->name = $name;
        }

        $status->save();

        return redirect()->route('admin.statuses.index')->with('success', 'Статус создан');
    }

    public function edit(Status $status)
    {
        return view('admin.statuses.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $data = $request->validate([
            'slug' => 'required|unique:statuses,slug,' . $status->id,
            'active' => 'required|boolean',
            'name.*' => 'required|string',
        ]);

        $status->update([
            'slug' => $data['slug'],
            'active' => $data['active'],
        ]);

        foreach ($data['name'] as $locale => $name) {
            $status->translateOrNew($locale)->name = $name;
        }

        $status->save();

        return redirect()->route('admin.statuses.index')->with('success', 'Статус обновлен');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('admin.statuses.index')->with('success', 'Статус удален');
    }
}
