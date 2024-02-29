<?php

namespace App\Http\Controllers;

use App\Models\CeProvider;
use App\Http\Requests\StoreComProviderRequest;
use App\Http\Requests\UpdateComProviderRequest;
use App\Models\CePointDeVent;
use App\Models\CeTypeProvider;
use App\Models\CeVille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use NunoMaduro\Collision\Provider;
use Yajra\DataTables\Facades\DataTables;

class CeProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    private $moduleTab = 'providers';
    public function index()
    {
        $providers = CeProvider::all();
        $villes = CeVille::all();
        $types = CeTypeProvider::all();
        return view('providers.index', compact('providers','villes','types'));
    }

    public function getDT(Request $request)
    {
        $providers = CeProvider::query();
        if ($request->ville_id!=null){
            $providers = $providers->where('ville_id',$request->ville_id);
        }
        if ($request->type_id!=null){
            $providers = $providers->where('type_id',$request->type_id);
        }
        if ($request->livre!=null){
            $providers = $providers->where('livre',$request->livre);
        }
        return DataTables::of($providers)
        ->addColumn('ville', function (CeProvider $provider){
            return $provider->ce_ville->libelle??'';
        })
        ->addColumn('type', function (CeProvider $provider){
            $type = CeTypeProvider::findOrFail($provider->type_id);
            return $type->libelle ? $type->libelle : '';
        })
        ->addColumn('livre', function (CeProvider $provider){
            return !$provider->livre ? trans('providers.oui') : trans('providers.non');
        })
        ->addColumn('actions', function (CeProvider $provider) {
            $actions = collect();
            $actions->push([
                'icon' => 'show',
                'href' => "#!",
                'onClick' => "openObjectModal(" . $provider->id . ",'" . $this->moduleTab . "')",
                'class' => 'btn-dark',
                'title' => trans('text.visualiser')
            ]);
            $actions->push([
                'icon' => 'delete',
                'href' => "#!",
                'onClick' => "confirmAndRefreshDT('" . url($this->moduleTab . '/delete/' . $provider->id) . "','" . trans('text.confirm_suppression') . "','#datatableshow')",
                'class' => 'btn-danger',
                'title' => trans('text.supprimer')
            ]);

            return view('actions-btn', ["actions" => $actions])->render();
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function formAdd()
    {
        $villes = CeVille::all();
        $types = CeTypeProvider::all();
        return view('providers.add',compact('villes','types'));
    }

    public function get($id)
    {
        $provider = CeProvider::findOrFail($id);
        $tabLink = $this->moduleTab . '/getTab/' . $id;
        $tabs = [
            '<i class="fa fa-address-book"></i> ' . trans('providers.infos') => $tabLink . '/1',
        ];

        $modalTitle = '<span>' . trans('providers.providers') . ': ' . $provider->id . '</span>';

        return view('tabs', [
            'tabs' => $tabs,
            'modal_title' => $modalTitle,
            'module' => $this->moduleTab,
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libelle_fr' => 'required',
            'libelle_ar' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'ville_id' => 'required',
            'livre' => 'required',
            'type_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $provider = new CeProvider();
        $provider->libelle_fr = $request->libelle_fr;
        $provider->libelle_ar = $request->libelle_ar;
        $provider->adresse = $request->adresse;
        $provider->email = $request->email;
        $provider->tel = $request->tel;
        $provider->livre = $request->livre;
        $provider->ville_id = $request->ville_id;
        $provider->type_id = $request->type_id;
        $provider->save();
        return response()->json($provider->id, 200);
}

public function getTab($id, $tab)
{
    $provider = CeProvider::findOrFail($id);
    $villes = CeVille::all();
    $types = CeTypeProvider::all();
    switch ($tab) {
        case '1':
            $parametres = [
                'provider' => $provider,
                'villes' => $villes,
                'types' => $types,
            ];
            break;
        default:
            $parametres = [
                'provider' => $provider,
            ];
            break;
    }
    return view($this->moduleTab . '.tabs.tab' . $tab, $parametres);
}
public function edit(Request $request)
{
    $validator = Validator::make($request->all(), [
        'libelle_fr' => 'required',
        'libelle_ar' => 'required',
        'adresse' => 'required',
        'email' => 'required',
        'tel' => 'required',
        'ville_id' => 'required',
        'livre' => 'required',
        'type_id' => 'required',

    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $provider = CeProvider::findOrFail($request->id);
    $provider->libelle_fr = $request->libelle_fr;
    $provider->libelle_ar = $request->libelle_ar;
    $provider->adresse = $request->adresse;
    $provider->email = $request->email;
    $provider->tel = $request->tel;
    $provider->livre = $request->livre;
    $provider->ville_id = $request->ville_id;
    $provider->type_id = $request->type_id;
    $provider->save();
    return response()->json('Done', 200);
 }
 public function delete($id)
 {
     $provider = CeProvider::findOrFail($id);
     if ($provider->ce_point_de_vents)
         return response()->json(['success' => 'false', 'msg' => 'Impossible de supprimer une vente déjà associée à un article.']);

     $provider->delete();
     return response()->json(['success' => 'true', 'msg' => trans('providers.provider_bien_supprimer')]);
 }

}
