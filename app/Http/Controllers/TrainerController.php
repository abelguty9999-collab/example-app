<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\TrainersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TrainerController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $trainers = Trainer::query()
            ->when($buscar !== null && $buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('name', 'ilike', "%{$buscar}%")
                      ->orWhere('apellido', 'ilike', "%{$buscar}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        }

        Trainer::create($data);

        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador guardado correctamente.');
    }

    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($trainer->avatar) {
                Storage::disk('public')->delete($trainer->avatar);
            }

            $data['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        } else {
            unset($data['avatar']);
        }

        $trainer->update($data);

        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador actualizado correctamente.');
    }

    public function destroy(Trainer $trainer)
    {
        if ($trainer->avatar) {
            Storage::disk('public')->delete($trainer->avatar);
        }

        $trainer->delete();

        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador eliminado correctamente.');
    }

    public function excel()
    {
        return Excel::download(
            new TrainersExport,
            'trainers.xlsx'
        );
    }

    public function pdf()
    {
        $trainers = Trainer::orderBy('id')->get();

        $pdf = Pdf::loadView(
            'trainers.pdf',
            compact('trainers')
        );

        return $pdf->download('trainers.pdf');
    }
}
