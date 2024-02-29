<div class="modal-header">
    <h5 class="modal-title">{{ trans('providers.nouvelle_provider') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="col-md-12 text-dark" id="addFormNewprovider">
        <div class="container">
            <form class="" action="{{ url('providers/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" field-required id="libelle_ar" label="{!! trans('providers.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" field-required id="libelle_ar" label="{!! trans('providers.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" field-required id="tel" label="{!! trans('providers.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="email" name="email" field-required id="email" label="{!! trans('providers.email') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="adresse" field-required id="adresse" label="{!! trans('providers.adresse') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="ville_id"
                             id="ville_id"
                             class="select2"
                             field-required
                             label="{!! trans('providers.ville') !!}"
                             >
                            <option disabled selected>{!! trans('providers.ville') !!}</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id}}">{{ $ville->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="type_id"
                             id="type_id"
                             class="select2"
                             field-required
                             label="{!! trans('providers.type') !!}"
                             >
                            <option selected disabled>{!! trans('providers.type') !!}</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id}}">{{ $type->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="livre"
                             id="livre"
                             field-required
                             label="{!! trans('providers.livre') !!}"
                             >
                                <option selected disabled>{!! trans('providers.livre') !!}</option>
                                <option value="0">{!! trans('providers.oui') !!}</option>
                                <option value="1">{!! trans('providers.non') !!}</option>
                            </x-forms.select>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <div class="text-right">
                    <x-buttons.btn-save onclick="addObject(this,'providers')" container="addFormNewprovider">
                        @lang('text.ajouter')
                    </x-buttons.btn-save>
                </div>
            </div>
        </div>
    </div>
</div>
