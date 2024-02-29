@extends('layouts.admin')

@section('module-js')
    <script src="{{ URL::asset('js/providers.js') }}"></script>
@endsection

@section('page-content')
    <x-page-header>
        <x-slot name="title">
            {{ trans('providers.providers') }}
        </x-slot>
        <x-buttons.btn-add href="#!" onclick="openFormAddInModal('providers')">
            {{ trans('providers.nouvelle_provider') }}
        </x-buttons.btn-add>
    </x-page-header>
    <x-card>
        <x-slot name="heading">
            <form method="post" id="providers_filtres_form">
                @csrf
                <x-filtres.container>
                    <x-filtres.element class="col-4">
                        <x-slot name="label">
                            {{ trans('providers.type') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="type_id"
                            name="type_id"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}"> {{$type->libelle}}</option>
                            @endforeach
                        </x-forms.select>
                    </x-filtres.element>
                    <x-filtres.element class="col-4">
                        <x-slot name="label">
                            {{ trans('providers.ville') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="ville_id"
                            name="ville_id"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                            @foreach ($villes as $ville)
                                <option value="{{$ville->id}}"> {{ $ville->libelle }}</option>
                            @endforeach
                        </x-forms.select>
                    </x-filtres.element>

                    <x-filtres.element class="col-4">
                        <x-slot name="label">
                            {{ trans('providers.livre') }}
                        </x-slot>
                        <x-forms.select
                            required="true"
                            class="select2"
                            id="livre"
                            name="livre"
                            onchange="refreshDatatable()"
                        >
                            <option value="">@lang('text.all')</option>
                                <option value="0">{{ trans('providers.oui') }}</option>
                                <option value="1">{{ trans('providers.non') }}</option>
                        </x-forms.select>
                    </x-filtres.element>


                </x-filtres.container>
            </form>
        </x-slot>
        <div class="table-responsive">
            <x-table.table id="datatableshow" selected="" link='{{ url("providers/getDT") }}'
                        colonnes="libelle_fr,libelle_ar,type,tel,email,ville,adresse,livre,actions"
                        filtres="providers_filtres_form"
                        class="table table-bordered">
                <thead>
                <tr>
                    <x-table.th>{{ trans('providers.libelle_fr') }}</x-table.th>
                    <x-table.th>{{ trans('providers.libelle_ar') }}</x-table.th>
                    <x-table.th>{{ trans('providers.type') }}</x-table.th>
                    <x-table.th>{{ trans('providers.tel') }}</x-table.th>
                    <x-table.th>{{ trans('providers.email') }}</x-table.th>
                    <x-table.th>{{ trans('providers.ville') }}</x-table.th>
                    <x-table.th>{{ trans('providers.adresse') }}</x-table.th>
                    <x-table.th>{{ trans('providers.livre') }}</x-table.th>
                    <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </x-table.table>
        </div>
    </x-card>
@endsection

