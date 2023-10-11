<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index() {
        $medicines = Medicine::all();
        return view('list-medicine', ['medicines' => $medicines]);
    }

    public function create() {
        return view('create-medicine');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:medicines|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'effects' => 'required',
        ]);
        $medicine = Medicine::create($data);
        return redirect()->route('medicines.index');
    }

    public function show() {
        //
    }

    public function edit() {
        //
    }

    public function update() {
        //
    }

    public function destroy(string $id) {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}
