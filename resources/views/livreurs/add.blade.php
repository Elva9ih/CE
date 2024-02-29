<div class="modal-header">
    <h5 class="modal-title">{{ trans('livreurs.nouvelle_livreur') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="col-md-12 text-dark" id="addFormNewlivreur">
        <div class="container">
            <form class="" action="{{ url('livreurs/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" field-required id="libelle_ar" label="{!! trans('livreurs.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" field-required id="libelle_ar" label="{!! trans('livreurs.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" field-required id="tel" label="{!! trans('livreurs.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="vehicule_id"
                             id="vehicule_id"
                             class="select2"
                             field-required
                             label="{!! trans('livreurs.vehicule') !!}"
                             >
                            <option disabled selected>{!! trans('livreurs.vehicule') !!}</option>
                            @foreach ($vehicules as $vehicule)
                                <option value="{{ $vehicule->id}}">{{ $vehicule->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="disponible"
                             id="disponible"
                             field-required
                             label="{!! trans('livreurs.disponible') !!}"
                             >
                                <option selected disabled>{!! trans('livreurs.disponible') !!}</option>
                                <option value="0">{!! trans('livreurs.oui') !!}</option>
                                <option value="1">{!! trans('livreurs.non') !!}</option>
                            </x-forms.select>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <div class="text-right">
                    <x-buttons.btn-save onclick="addObject(this,'livreurs')" container="addFormNewlivreur">
                        @lang('text.ajouter')
                    </x-buttons.btn-save>
                </div>
            </div>
        </div>
    </div>
</div>
