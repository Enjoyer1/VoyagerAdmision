
@if(!is_null($dataTypeContent->getKey()))
<input  @if(isset($options->disabled)) disabled @endif type="date" class="form-control" name="{{ $row->field }}"
       placeholder="{{ $row->display_name }}"
       value="@if(isset($dataTypeContent->{$row->field})){{ \Carbon\Carbon::parse(old($row->field, $dataTypeContent->{$row->field}))->format('Y-m-d') }}@else{{old($row->field)}}@endif">
@else
    <input  type="date" class="form-control" name="{{ $row->field }}"
            placeholder="{{ $row->display_name }}"
            value="@if(isset($dataTypeContent->{$row->field})){{ \Carbon\Carbon::parse(old($row->field, $dataTypeContent->{$row->field}))->format('Y-m-d') }}@else{{old($row->field)}}@endif">
@endif