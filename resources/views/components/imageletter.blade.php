
@props(['name'])
<div
class="h-12 w-12 p-2 bg-yellow-500 rounded-full text-white font-semibold flex items-center justify-center"
>
{{ ucfirst($name[0]).ucfirst($name[1]) }}
</div>
