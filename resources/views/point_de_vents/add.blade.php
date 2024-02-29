<div class="modal-header">
    <h5 class="modal-title">{{ trans('point_de_vents.nouvelle_point_de_vent') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="col-md-12 text-dark" id="addFormNewpoint_de_vents">
        <div class="container">
            <form class="" action="{{ url('point_de_vents/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" field-required id="libelle_ar" label="{!! trans('point_de_vents.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" field-required id="libelle_ar" label="{!! trans('point_de_vents.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" field-required id="tel" label="{!! trans('point_de_vents.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="email" name="email" field-required id="email" label="{!! trans('point_de_vents.email') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="localisation" field-required id="localisation" label="{!! trans('point_de_vents.localisation') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="ville_id"
                             id="ville_id"
                             class="select2"
                             field-required
                             label="{!! trans('point_de_vents.ville') !!}"
                             >
                            <option disabled selected>{!! trans('providers.ville') !!}</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id}}">{{ $ville->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="provider_id"
                             id="provider_id"
                             class="select2"
                             field-required
                             label="{!! trans('point_de_vents.provider') !!}"
                             >
                            <option selected disabled>{!! trans('point_de_vents.provider') !!}</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id}}">{{ $provider->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <div class="text-right">
                    <x-buttons.btn-save onclick="addObject(this,'point_de_vents')" container="addFormNewpoint_de_vents">
                        @lang('text.ajouter')
                    </x-buttons.btn-save>
                </div>
            </div>
        </div>
    </div>
</div>
