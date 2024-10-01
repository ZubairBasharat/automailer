@props([
    'items',
    'cols'
])
@if(count($items) <=0)
    <tr><td colspan="{{$cols}}" class="text-center p-3 text-danger">Record not found</td></tr>
@endif