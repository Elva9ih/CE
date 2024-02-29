<div class="modal-body">
    <div class="row">
        <div class="col-md-12 text-dark" id="editFormNewProvider">
            <form class="" action="{{ url('providers/edit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_fr" value="{{$provider->libelle_fr}}" field-required id="libelle_fr" label="{!! trans('providers.libelle_fr') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="libelle_ar" value="{{$provider->libelle_ar}}" field-required id="libelle_ar" label="{!! trans('providers.libelle_ar') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="tel" name="tel" value="{{$provider->tel}}" field-required id="tel" label="{!! trans('providers.tel') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="email" name="email" value="{{$provider->email}}" field-required id="email" label="{!! trans('providers.email') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="text" name="adresse" value="{{$provider->adresse}}" field-required id="adresse" label="{!! trans('providers.adresse') !!}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="ville_id"
                             id="ville_edit"
                             field-required
                             class="select2"
                        
                             label="{!! trans('providers.ville') !!}"
                             >
                                <option value="">{!! trans('providers.ville') !!}</option>
                                @foreach ($villes as $ville)
                                    <option
                                    {{ $ville->id == $provider->velle_id ? 'selected':''}}
                                    value="{{ $ville->id}}"
                                    >
                                    {{ $ville->libelle }}
                                    </option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select
                             name="type_id"
                             id="type_id"
                             field-required
                             class="select2"
                             label="{!! trans('providers.type') !!}"
                             >
                                <option disabled>{!! trans('providers.type') !!}</option>
                                @foreach ($types as $type)
                                    <option
                                       value="{{ $type->id}}"
                                       {{ $type->id == $provider->type_id ? 'selected':''}}
                                    >
                                       {{ $type->libelle }}
                                    </option>
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
                                <option
                                   {{ $provider->livre == '0' ? 'selected':''}}
                                    value="0"
                                >
                                   {!! trans('providers.oui') !!}
                                </option>
                                <option
                                    {{ $provider->livre == '1' ? 'selected':''}}
                                    value="1"
                                >
                                    {!! trans('providers.non') !!}
                                </option>
                            </x-forms.select>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $provider->id }}">
            </form>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="text-right">
                        <x-buttons.btn-save onclick="saveform(this)" container="editFormNewProvider">
                            @lang('text.enregistrer')
                        </x-buttons.btn-save>
                        <div id="form-errors" class="text-left"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
