
@php
use Carbon\Carbon; 


@endphp

@if(Auth()->user()->roleid==1)

{{-- 
<div class="btnlink1" id="btnlink1"> --}}

     <tr>
     <th scope="row">{{Auth()->user()->id}}</th>
     <td>asdasdasd</td>
     <td>{{Auth()->user()->name}}</td>
     {{-- <td>{{$dta->email}}</td> --}}
     <td>{{Auth()->user()->gender}}</td>
     <td>{{Auth()->user()->mobile}}</td>
     <td>{{Auth()->user()->city}}</td>
     <td>{{Auth()->user()->bdate}}</td>
     <td>{{Auth()->user()->workstart}}</td>
     @php
         
     $date = (Auth()->user()->workstart);
     $datework = Carbon::createFromDate($date);
     $now = Carbon::now();
     $testdate = $datework->diffInDays($now);


     // echo $testdate;
     
        @endphp



        @if ($testdate>365)
        <td>15 days</td>
        @elseif($testdate>180)   
        <td>4 days</td>
        @else
        <td>1/2 days</td>
        @endif

 
     <td class="form-css-btn">
         <a href="/dashboard/{{Auth()->user()->id}}" class="btn btn-outline-info"><i class=" fa fa-plus"></i> Read More</a>                           
     </td>
 </tr>



 <tr>
 <td colspan="8" class="fixed-right">
 {!! $userData->links() !!}
 </td>
 </tr>

{{-- </div> --}}

@else





@foreach ($userData as $dta)
<tr>
 <th scope="row">{{$dta->id}}
<input type="text" value="{{$dta->id}}" hidden>
</th>
 <td>
     
 @if(($dta->roleid)==0)
 Admin
 @else
 Employee
 @endif
 </td>
 <td>{{$dta->name}}</td>
 {{-- <td>{{$dta->email}}</td> --}}
 <td>{{$dta->gender}}</td>
 <td>{{$dta->mobile}}</td>
 <td>{{$dta->city}}</td>
 <td>{{$dta->bdate}}</td>
 <td>{{$dta->workstart}}</td>
 {{-- <td> --}}
     @php
         
             $date = "$dta->workstart";
             $datework = Carbon::createFromDate($date);
             $now = Carbon::now();
             $testdate = $datework->diffInDays($now);


             // echo $testdate;
             
     @endphp


     
     @if ($testdate>365)
     <td>15 days</td>
     @elseif($testdate>180)   
     <td>4 days</td>
     @else
     <td>1/2 days</td>
     @endif
     
 {{-- </td> --}}
 {{-- <td>{{$testdate}} days</td> --}}



 <td class="form-css-btn">
     <a  href="/dashboard/{{$dta->id}}/edit" class="btn btn-outline-info form-controller"><i class="fas fa-edit"></i> Edit</a>
 </td>
 <td class="form-css-btn">
     <form class="form-controller" action="/dashboard/{{$dta->id}}" method="post">
         {{csrf_field()}}
         {{method_field('DELETE')}}
         <button type="submit" class="btn btn-outline-danger form-controller"><i class="fa fa-trash"></i> Delete</button>
     </form>
 </td>
 {{-- <td class="form-css-btn">
        <a id="approve_btn" class="btn btn-outline-info approve_btn"><i class=" fa fa-plus"></i> Approve</a>                           
    </td> --}}
 <td class="form-css-btn">
     <a href="/dashboard/{{$dta->id}}" class="btn btn-outline-info"><i class=" fa fa-plus"></i> Read More</a>                           
 </td>
</tr>
@endforeach


<tr>
<td colspan="8" class="fixed-right">
{!! $userData->links() !!}
</td>
</tr>




@endif






