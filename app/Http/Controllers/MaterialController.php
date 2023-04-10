<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MaterialController extends Controller
{
    public function index()
    {
        // dd($this->highlightString('skjagdsd sadsad sadhsad', 'sadsad'));
        return view('materi.index');
    }

    public function highlightString($str, $search_term)
    {
        if (empty($search_term))
            return $str;

        $pos = strpos(strtolower($str), strtolower($search_term));

        if ($pos !== false) {
            $replaced = substr($str, 0, $pos);
            $replaced .= '<em>' . substr($str, $pos, strlen($search_term)) . '</em>';
            $replaced .= substr($str, $pos + strlen($search_term));
        } else {
            $replaced = $str;
        }

        return $replaced;
    }

    public function list(Request $request)
    {
        if ($request->has('input')) {
            dd($request->get('input'));
        }
        $data = Material::query()->get();
        return DataTables::of($data)
            ->editColumn('content', function (Material $material) {
                return $material->content;
            })
            ->editColumn('action', function (Material $material) {
                return view('materi.action', compact('material'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Material::query()->create([
                'content' => $request->content,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Material $material)
    {
        try {
            $material->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
