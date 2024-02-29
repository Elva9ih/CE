@extends('layouts.admin')

@section('module-js')
    <script src="{{ URL::asset('js/livreurs.js') }}"></script>
@endsection

@section('page-content')
    <x-page-header>
        <x-slot name="title">
            {{ trans('livreurs.livreurs') }}
        </x-slot>
        <x-buttons.btn-add href="#!" onclick="openFormAddInModal('livreurs')">
            {{ trans('livreurs.nouvelle_livreur') }}
        </x-buttons.btn-add>
    </x-page-header>
    <x-card>
        <x-slot name="heading">
            <form method="post" id="livreurs_filtres_form">
                @csrf
                <x-filtres.container>
                    <x-filtres.element class="col-6">
                        <x-slot name="label">
                            {{ trans('livreurs.vehicule') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="vehicule_id"
                            name="vehicule_id"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                            @foreach ($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}"> {{$vehicule->libelle}}</option>
                            @endforeach
                        </x-forms.select>
                    </x-filtres.element>
                    <x-filtres.element class="col-6">
                        <x-slot name="label">
                            {{ trans('livreurs.disponible') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="disponible"
                            name="disponible"
                            onchange="refreshDatatable()"
                        >
                                <option value="">@lang('text.all')</option>
                                <option value="0">{{ trans('livreurs.oui') }}</option>
                                <option value="1">{{ trans('livreurs.non') }}</option>
                        </x-forms.select>
                    </x-filtres.element>
                </x-filtres.container>
            </form>
        </x-slot>
        <div class="table-responsive">
            <x-table.table id="datatableshow" selected="" link='{{ url("livreurs/getDT") }}'
                        colonnes="libelle_fr,libelle_ar,tel,disponible,vehicule,actions"
                        filtres="livreurs_filtres_form"
                        class="table table-bordered">
                <thead>
                <tr>
                    <x-table.th>{{ trans('livreurs.libelle_fr') }}</x-table.th>
                    <x-table.th>{{ trans('livreurs.libelle_ar') }}</x-table.th>
                    <x-table.th>{{ trans('livreurs.tel') }}</x-table.th>
                    <x-table.th>{{ trans('livreurs.disponible') }}</x-table.th>
                    <x-table.th>{{ trans('livreurs.vehicule') }}</x-table.th>
                    <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </x-table.table>
        </div>
    </x-card>
@endsection

@section('scripts')
    <script>
        function refreshDatatable(datatableshow = "#datatableshow") {
            $(datatableshow).DataTable().ajax.reload();
        }
    </script>
@endsection
