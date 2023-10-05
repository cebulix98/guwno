<h4><b>{{__('headlines.contact_data')}}</b></h4>
<div class="col-12 p-0 m-0 row">
    <table class="table table-bordered" style="border: 1px solid black">
        <tr>
            <th>{{__('attributes.firstname')}}</th>
            <td class="text-right">{{$parameters->case->petitioner->firstname ?? ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.lastname')}}</th>
            <td class="text-right">{{$parameters->case->petitioner->lastname ?? ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.phone')}}</th>
            <td class="text-right">{{$parameters->case->petitioner->phone ?? ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.email')}}</th>
            <td class="text-right">{{$parameters->case->petitioner->email ?? ''}}</td>
        </tr>
    </table>
</div>