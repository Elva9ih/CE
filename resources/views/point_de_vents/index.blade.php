@extends('layouts.admin')

@section('module-js')
    <script src="{{ URL::asset('js/point_de_vents.js') }}"></script>
@endsection

@section('page-content')
    <x-page-header>
        <x-slot name="title">
            {{ trans('point_de_vents.point_de_vents') }}
        </x-slot>
        <x-buttons.btn-add href="#!" onclick="openFormAddInModal('point_de_vents')">
            {{ trans('point_de_vents.nouvelle_point_de_vents') }}
        </x-buttons.btn-add>
    </x-page-header>
    <x-card>
        <x-slot name="heading">
            <form method="post" id="point_de_vents_filtres_form">
                @csrf
                <x-filtres.container>
                    <x-filtres.element class="col-6">
                        <x-slot name="label">
                            {{ trans('point_de_vents.ville') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="vlle_id"
                            name="ville_id"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                            @foreach ($villes as $ville)
                                <option value="{{$ville->id}}"> {{$ville->libelle}}</option>
                            @endforeach
                        </x-forms.select>
                    </x-filtres.element>
                    <x-filtres.element class="col-6">
                        <x-slot name="label">
                            {{ trans('point_de_vents.provider') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="provider_id"
                            name="provider_id"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}"> {{ $provider->libelle }}</option>
                            @endforeach
                        </x-forms.select>
                    </x-filtres.element>
                </x-filtres.container>
            </form>
        </x-slot>
        <div class="table-responsive">
            <x-table.table id="datatableshow" selected="" link='{{ url("point_de_vents/getDT") }}'
                        colonnes="libelle_fr,libelle_ar,provider,ville,tel,email,localisation,actions"
                        filtres="point_de_vents_filtres_form"
                        class="table table-bordered">
                <thead>
                <tr>
                    <x-table.th>{{ trans('point_de_vents.libelle_fr') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.libelle_ar') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.provider') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.ville') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.tel') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.email') }}</x-table.th>
                    <x-table.th>{{ trans('point_de_vents.localisation') }}</x-table.th>
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
