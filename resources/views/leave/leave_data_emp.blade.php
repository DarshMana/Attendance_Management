{{-- @if(Auth()->user()->roleid==0) --}}
        @foreach ($leaveData as $dta)
        <tr>
        <th scope="row">{{$dta->id}}</th>
        @if ($dta->leavetype==0)
        <td>Casual Leave</td>
        @elseif($dta->leavetype==1)   
        <td>Medical Leaves</td>
        @else
        <td>Restricted Holidays</td>
        @endif


        <td>{{$dta->from}}</td>
        <td>{{$dta->to}}</td>

        @if ($dta->status==0)
        <td style="color:red;">Not Approved</td>
        @elseif($dta->status==1)   
        <td style="color:green;"> Approved</td>
        @else
        <td style="color:blue;">waiting for approval</td>     
        
        @endif


        </tr>
        @endforeach


        <tr>
        <td colspan="8" class="fixed-right">
        {!! $leaveData->links() !!}
        </td>
        </tr>

{{-- @elseif()


@endif --}}












