<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fabric;

class FabricController extends Controller
{
    public function index()
    {
        $fabrics = Fabric::latest()->get();

        return view('admin.fabrics.index', compact('fabrics'));
    }

    public function create()
    {
        return view('admin.fabrics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fabric' => 'required|string|max:255',
        ]);

        Fabric::create($request->all());

        return redirect()->route('admin.fabrics.index')
            ->with('success', 'Fabric created successfully.');
    }

    public function edit(Fabric $fabric)
    {
        return view('admin.fabrics.edit', compact('fabric'));
    }

    public function update(Request $request, Fabric $fabric)
    {
        $request->validate([
            'fabric' => 'required|string|max:255',
        ]);

        $fabric->update($request->all());

        return redirect()->route('admin.fabrics.index')
            ->with('success', 'Fabric updated successfully.');
    }

    public function destroy(Fabric $fabric)
    {
        $fabric->delete();

        return redirect()->route('admin.fabrics.index')
            ->with('success', 'Fabric deleted successfully.');
    }
}
