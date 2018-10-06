@if(!is_null($dataTypeContent->getKey()))
    <input @if($row->required == 1) required @endif @if(isset($options->disabled)) disabled
           @endif   @if(isset($options->disabled)) disabled @endif type="text" class="form-control"
           name="{{ $row->field }}"
           placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
           {!! isBreadSlugAutoGenerator($options) !!}
           value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif">
@else
    <input @if($row->required == 1) required @endif   @if(isset($options->disabled)) disabled @endif type="text"
           class="form-control"
           name="{{ $row->field }}"
           placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
           {!! isBreadSlugAutoGenerator($options) !!}
           value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif">
@endif