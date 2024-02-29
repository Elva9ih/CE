<div class="modal-body">
    <div class="row">
        <div class="col-md-12 text-dark" id="editFormInfosLivreur">
            <form class="" action="{{ url('livreurs/edit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" value="{{$livreur->libelle_fr}}" field-required id="libelle_fr" label="{!! trans('livreurs.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" value="{{$livreur->libelle_ar}}" field-required id="libelle_ar" label="{!! trans('livreurs.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" value="{{$livreur->tel}}" field-required id="tel" label="{!! trans('providers.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="vehicule_id"
                             id="vehicule_edit"
                             class="select2"
                             field-required
                             label="{!! trans('livreurs.vehicule') !!}"
                             >
                            <option disabled selected>{!! trans('livreurs.vehicule') !!}</option>
                            @foreach ($vehicules as $vehicule)
                                <option {{ $livreur->vehicule_id == $vehicule->id ? 'selected':'' }} value="{{ $vehicule->id}}">{{ $vehicule->libelle }}</option>
                            @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="disponible"
                             id="disponible_edit"
                             field-required
                             label="{!! trans('livreurs.disponible') !!}"
                             >
                                <option selected disabled>{!! trans('livreurs.disponible') !!}</option>
                                <option  {{ !$livreur->disponible ? 'selected':''}} value="0">{!! trans('livreurs.oui') !!}</option>
                                <option {{ $livreur->disponible ? 'selected':''}} value="1">{!! trans('livreurs.non') !!}</option>
                            </x-forms.select>
                    </div>
                    <input type="hidden" name="id" value="{{ $livreur->id }}">
                </div>
                </div>

            </form>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="text-right">
                        <x-buttons.btn-save onclick="saveform(this)" container="editFormInfosLivreur">
                            @lang('text.enregistrer')
                        </x-buttons.btn-save>
                        <div id="form-errors" class="text-left"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
