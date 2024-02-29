<?php

namespace App\Http\Controllers;

use App\Models\CePointDeVent;
use App\Http\Requests\StoreCePointDeVentRequest;
use App\Http\Requests\UpdateCePointDeVentRequest;
use App\Models\CeProvider;
use App\Models\CeVille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CePointDeVentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private $moduleTab = 'point_de_vents';
    public function index()
    {
        $point_de_vents = CePointDeVent::all();
        $villes = CeVille::all();
        $providers = CeProvider::all();
        return view('point_de_vents.index', compact('point_de_vents','villes','providers'));
    }

    public function getDT(Request $request)
    {
        $point_de_vents = CePointDeVent::all();
        if ($request->ville_id!=null){
            $point_de_vents = $point_de_vents->where('ville_id',$request->ville_id);
        }
        if ($request->provider_id!=null){
            $point_de_vents = $point_de_vents->where('provider_id',$request->provider_id);
        }

        return DataTables::of($point_de_vents)
        ->addColumn('ville', function (CePointDeVent $point_de_vent){
            $ville = CeVille::findOrFail($point_de_vent->ville_id);
            return $ville->libelle ? $ville->libelle : '';
        })
        ->addColumn('provider', function (CePointDeVent $point_de_vent){
            $provider = CeProvider::findOrFail($point_de_vent->provider_id);
            return $provider->libelle ? $provider->libelle : '';
        })
        ->addColumn('actions', function (CePointDeVent $point_de_vent) {
                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $point_de_vent->id . ",'" . $this->moduleTab . "')",
                    'class' => 'btn-dark',
                    'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'delete',
                    'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url($this->moduleTab . '/delete/' . $point_de_vent->id) . "','" . trans('text.confirm_suppression') . "','#datatableshow')",
                    'class' => 'btn-danger',
                    'title' => trans('text.supprimer')
                ]);

                return view('actions-btn', ["actions" => $actions])->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function get($id)
    {
        $point_de_vent = CePointDeVent::findOrFail($id);
        $tabLink = $this->moduleTab . '/getTab/' . $id;
        $tabs = [
            '<i class="fa fa-address-book"></i> ' . trans('point_de_vents.infos') => $tabLink . '/1',

        ];

        $modalTitle = '<span>' . trans('point_de_vents.point_de_vents') . ': ' . $point_de_vent->id . '</span>';

        return view('tabs', [
            'tabs' => $tabs,
            'modal_title' => $modalTitle,
            'module' => $this->moduleTab,
        ]);
    }
    public function getTab($id, $tab)
{
    $point_de_vent = CePointDeVent::findOrFail($id);
    $providers = CeProvider::all();
    $villes = CeVille::all();
    switch ($tab) {
        case '1':
            $parametres = [
                'point_de_vent' => $point_de_vent,
                'providers' => $providers,
                'villes' => $villes,
            ];
            break;
        default:
            $parametres = [
                'point_de_vent' => $point_de_vent,
                'provider' => $providers,
                'villes' => $villes,
            ];
            break;
    }
    return view($this->moduleTab . '.tabs.tab' . $tab, $parametres);
}

public function formAdd()
{
    $villes = CeVille::all();
    $providers = CeProvider::all();
    return view('point_de_vents.add',compact('villes','providers'));
}
public function add(Request $request)
{
    $validator = Validator::make($request->all(), [
        'libelle_fr' => 'required',
        'libelle_ar' => 'required',
        'provider_id' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'localisation' => 'required',
        'ville_id' => 'required',

    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $point_de_vent = new CePointDeVent();
    $point_de_vent->libelle_fr = $request->libelle_fr;
    $point_de_vent->libelle_ar = $request->libelle_ar;
    $point_de_vent->provider_id = $request->provider_id;
    $point_de_vent->ville_id = $request->ville_id;
    $point_de_vent->tel = $request->tel;
    $point_de_vent->email = $request->email;
    $point_de_vent->localisation = $request->localisation;
    $point_de_vent->save();
    return response()->json($point_de_vent->id);
}

public function edit(Request $request)
{
    $validator = Validator::make($request->all(), [
        'libelle_fr' => 'required',
        'libelle_ar' => 'required',
        'provider_id' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'localisation' => 'required',
        'ville_id' => 'required',

    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $point_de_vent = CePointDeVent::findOrFail($request->id);
    $point_de_vent->libelle_fr = $request->libelle_fr;
    $point_de_vent->libelle_ar = $request->libelle_ar;
    $point_de_vent->provider_id = $request->provider_id;
    $point_de_vent->ville_id = $request->ville_id;
    $point_de_vent->tel = $request->tel;
    $point_de_vent->email = $request->email;
    $point_de_vent->localisation = $request->localisation;
    $point_de_vent->save();
    return response()->json([
        'success' => 'Done',
    ], 200);
 }

 public function delete($id)
 {
     $point_de_vent = CePointDeVent::findOrFail($id);
     $point_de_vent->delete();

     return response()->json(['success' => 'true', 'msg' => trans('point_de_vents.point_de_vent_bien_supprimer')]);
 }
}
