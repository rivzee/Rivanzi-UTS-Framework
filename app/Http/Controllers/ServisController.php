<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        $servis = Servis::paginate(7);
        return view('servis.index', compact('servis'));
    }

    public function create()
    {
        return view('servis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:50',
            'jenis_kendaraan' => 'required|string|max:100',
            'keluhan' => 'required|string',
            'jenis_servis' => 'required|string|max:100',
            'tanggal_servis' => 'required|date',
            'biaya' => 'required|numeric',
            'status' => 'required|in:menunggu,dikerjakan,selesai',
        ]);

        Servis::create($request->all());

        return redirect()->route('servis.index')->with('success', 'Data servis berhasil ditambahkan.');
    }

    public function edit(Servis $servis)
    {
        return view('servis.edit', compact('servis'));
    }

    public function update(Request $request, Servis $servis)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:50',
            'jenis_kendaraan' => 'required|string|max:100',
            'keluhan' => 'required|string',
            'jenis_servis' => 'required|string|max:100',
            'tanggal_servis' => 'required|date',
            'biaya' => 'required|numeric',
            'status' => 'required|in:menunggu,dikerjakan,selesai',
        ]);

        $servis->update($request->all());

        return redirect()->route('servis.index')->with('success', 'Data servis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $servis = Servis::findOrFail($id);
        $servis->delete();
    
        return redirect()->route('servis.index')->with('success', 'Servis berhasil dihapus.');
    }    

    public function deleted()
    {
        $deletedServis = Servis::onlyTrashed()->paginate(7);
    
        return view('servis.deleted', compact('deletedServis'));
    }
    

    public function restore($id)
{
    $servis = Servis::onlyTrashed()->findOrFail($id);
    $servis->restore();

    return redirect()->route('servis.deleted')->with('success', 'Servis berhasil dipulihkan.');
}

public function forceDelete($id)
{
    $servis = Servis::onlyTrashed()->findOrFail($id);
    $servis->forceDelete();

    return redirect()->route('servis.deleted')->with('success', 'Servis dihapus permanen.');
}

}
