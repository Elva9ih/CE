<div class="modal-body">
    <div class="row">
        <div class="col-md-12 text-dark" id="editFormNewpoint_de_vent">
            <form class="" action="{{ url('point_de_vents/edit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" value="{{$point_de_vent->libelle_fr}}" field-required id="libelle_fr" label="{!! trans('point_de_vents.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" value="{{$point_de_vent->libelle_ar}}" field-required id="libelle_ar" label="{!! trans('point_de_vents.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" value="{{$point_de_vent->tel}}" field-required id="tel" label="{!! trans('point_de_vents.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="email" name="email" value="{{$point_de_vent->email}}" field-required id="email" label="{!! trans('point_de_vents.email') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="localisation" value="{{$point_de_vent->localisation}}" field-required id="localisation" label="{!! trans('point_de_vents.localisation') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="ville_id"
                             id="ville_id"
                             field-required
                             class="select2"
                             label="{!! trans('point_de_vents.ville') !!}"
                             >
                                <option disabled>{!! trans('point_de_vents.ville') !!}</option>
                                @foreach ($villes as $ville)
                                    <option
                                    {{ $ville->id == $point_de_vent->velle_id ? 'selected':''}}
                                    value="{{ $ville->id}}"
                                    >
                                    {{ $ville->libelle }}
                                    </option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="provider_id"
                             id="provider_id"
                             field-required
                             class="select2"
                             label="{!! trans('point_de_vents.provider') !!}"
                             >
                                <option disabled>{!! trans('point_de_vents.provider') !!}</option>
                                @foreach ($providers as $provider)
                                    <option
                                       value="{{ $provider->id}}"
                                       {{ $provider->id == $point_de_vent->type_id ? 'selected':''}}
                                    >
                                       {{ $provider->libelle }}
                                    </option>
                                @endforeach
                            </x-forms.select>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $point_de_vent->id }}">
            </form>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="text-right">
                        <x-buttons.btn-save onclick="saveform(this)" container="editFormNewpoint_de_vent">
                            @lang('text.enregistrer')
                        </x-buttons.btn-save>
                        <div id="form-errors" class="text-left"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
