<?php

namespace App\Http\Controllers;
use App\Models\CeVille;
use App\Models\CeLivreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCeLivreurRequest;
use App\Http\Requests\UpdateCeLivreurRequest;
use App\Models\CeTypeVehicule;

class CeLivreurController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    private $moduleTab = 'livreurs';

    public function index()
    {
        $villes = CeVille::all();
        $vehicules = CeTypeVehicule::all();
        $livreurs = CeLivreur::all();
        return view('livreurs.index', compact('livreurs','villes','vehicules'));
    }
    public function getDT(Request $request)
    {
        $livreurs = CeLivreur::all();
        if ($request->vehicule_id!=null){
            $livreurs = $livreurs->where('vehicule_id',$request->vehicule_id);
        }
        if ($request->disponible!=null){
            $livreurs = $livreurs->where('disponible',$request->disponible);
        }

        return DataTables::of($livreurs)

        ->addColumn('vehicule', function (CeLivreur $livreur){
            $vehicule = CeTypeVehicule::findOrFail($livreur->vehicule_id);
            return $vehicule->libelle ? $vehicule->libelle : '';
        })

        ->addColumn('disponible', function (CeLivreur $livreur){
            return $livreur->disponible ? trans('livreurs.non') : trans('livreurs.oui');
        })


            ->addColumn('actions', function (CeLivreur $livreur) {
                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $livreur->id . ",'" . $this->moduleTab . "')",
                    'class' => 'btn-dark',
                    'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'delete',
                    'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url($this->moduleTab . '/delete/' . $livreur->id) . "','" . trans('text.confirm_suppression') . "','#datatableshow')",
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
        $vehicules = CeTypeVehicule::all();
        return view('livreurs.add',compact('vehicules'));
    }


    public function get($id)
    {
        $livreur = CeLivreur::findOrFail($id);
        $tabLink = $this->moduleTab . '/getTab/' . $id;
        $tabs = [
            '<i class="fa fa-address-book"></i> ' . trans('livreurs.infos') => $tabLink . '/1',
        ];

        $modalTitle = '<span>' . trans('livreurs.livreurs') . ': ' . $livreur->libelle . '</span>';

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
            'tel' => 'required',
            'vehicule_id' => 'required',
            'disponible' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $livreur = new CeLivreur();
        $livreur->libelle_fr = $request->libelle_fr;
        $livreur->libelle_ar = $request->libelle_ar;
        $livreur->tel = $request->tel;
        $livreur->vehicule_id = $request->vehicule_id;
        $livreur->disponible = $request->disponible;
        $livreur->save();
        return response()->json($livreur->id, 200);
}

public function getTab($id, $tab)
{
    $livreur = CeLivreur::findOrFail($id);
    $vehicules = CeTypeVehicule::all();
    switch ($tab) {
        case '1':
            $parametres = [
                'livreur' => $livreur,
                'vehicules' => $vehicules,
            ];
            break;
        default:
            $parametres = [
                'livreur' => $livreur,
                'vehicules' => $vehicules,
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
        'tel' => 'required',
        'vehicule_id' => 'required',
        'disponible' => 'required',


    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $livreur = CeLivreur::findOrFail($request->id);
    $livreur->libelle_fr = $request->libelle_fr;
    $livreur->libelle_ar = $request->libelle_ar;
    $livreur->tel = $request->tel;
    $livreur->vehicule_id = $request->vehicule_id;
    $livreur->disponible = $request->disponible;
    $livreur->save();
    return response()->json('Done', 200);
 }
}