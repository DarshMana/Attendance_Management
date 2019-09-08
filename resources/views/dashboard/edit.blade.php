{{-- apply theme --}}
@extends('layouts.app')


{{-- include content --}}
@section("content")
<div class="row">
    <div class="col-sm-3"></div>
    
    
    <div class="col-sm-6">
        {!! Form::open(['route' => ['dashboard.update' ,$userData->id],'data-parsley-validate'=>'']) !!}
        
        @if ((Auth::User()->roleid)==0)
            {{ form::label('User Type') }}
             <select name="roleid" class="form-control">
                <option value="0" selected>Admin</option>
                <option value="1">Employee</option>
            </select> 
        @elseif((Auth::User()->roleid)==1)
            {{ form::label('User Type') }}
             <select name="roleid" class="form-control">
                <option value="0" >Admin</option>
                <option value="1" selected>Employee</option>
            </select> 
        @endif
        
        {{ Form::label('Name :') }}
        {{Form::text('name',$userData->name,array('class'=>"form-control", 'required', 'data-parsley-pattern'=>'^[a-zA-Z. ]+$','data-parsley-pattern-message'=>'Your name is invalid', 'data-parsley-trigger'=>'keyup'))}}
        <br>
        {{ Form::label('Email' )}}
        {{ Form::text('email', $userData->email,array('class' => "form-control",'required', 'data-parsley-type'=>"email", 'data-parsley-trigger'=>"keyup")) }}
        <br>

        {{ Form::label('Gender :') }} <br>
        @if ($userData->gender=="male")
        Male
        {{ Form::radio('gender', 'male' , true) , array('class'=>'form-control')}}
        Female
        {{ Form::radio('gender', 'female' , false) , array('class'=>'form-control')}}
        @elseif($userData->gender=="female")
        Male
        {{ Form::radio('gender', 'male' , false) , array('class'=>'form-control')}}
        Female
        {{ Form::radio('gender', 'female' , true) , array('class'=>'form-control')}}
        @endif
        <br><br>

        {{ Form::label('Contact No :') }}
        {{Form::text('mobile',$userData->mobile,array('class'=>"form-control" ,'required', 'data-parsley-type'=>"number", 'data-parsley-type-message'=>"please enter valid phone number", 'data-parsley-pattern'=>"^\d{10}$", 'data-parsley-pattern-message'=>"Contact number must have 10 digits", 'data-parsley-trigger'=>"keyup"))}}
        <br>

        {{ Form::label('City :') }}
        {{Form::text('city',$userData->name,array('class'=>"form-control", 'required', 'data-parsley-pattern'=>'^[a-zA-Z. ]+$','data-parsley-pattern-message'=>'Your city is invalid', 'data-parsley-trigger'=>'keyup'))}}

        {{ Form::label('Birthday :') }}
        {{Form::date('bdate',$userData->bdate,array('class'=>"form-control"))}}
        <br>

        {{ Form::label('Start work date :') }}
        {{Form::date('workstart',$userData->workstart,array('class'=>"form-control"))}}
        <br>
       <br>




        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Edit profile',array('class'=>"btn btn-success waves-effect waves-light"))}}
        {!! Form::close() !!}
</div>
    <div class="col-sm-3"></div>
</div>


<script>
    !function(t){"use strict";var e=e||{},n=document.querySelectorAll.bind(document);function a(t){var e="";for(var n in t)t.hasOwnProperty(n)&&(e+=n+":"+t[n]+";");return e}var i={duration:750,show:function(t,e){if(2===t.button)return!1;var n=e||this,o=document.createElement("div");o.className="waves-ripple",n.appendChild(o);var r,s,u,c,d,l=(c={top:0,left:0},d=(r=n)&&r.ownerDocument,s=d.documentElement,void 0!==r.getBoundingClientRect&&(c=r.getBoundingClientRect()),u=function(t){return null!==(e=t)&&e===e.window?t:9===t.nodeType&&t.defaultView;var e}(d),{top:c.top+u.pageYOffset-s.clientTop,left:c.left+u.pageXOffset-s.clientLeft}),m=t.pageY-l.top,f=t.pageX-l.left,p="scale("+n.clientWidth/100*10+")";"touches"in t&&(m=t.touches[0].pageY-l.top,f=t.touches[0].pageX-l.left),o.setAttribute("data-hold",Date.now()),o.setAttribute("data-scale",p),o.setAttribute("data-x",f),o.setAttribute("data-y",m);var v={top:m+"px",left:f+"px"};o.className=o.className+" waves-notransition",o.setAttribute("style",a(v)),o.className=o.className.replace("waves-notransition",""),v["-webkit-transform"]=p,v["-moz-transform"]=p,v["-ms-transform"]=p,v["-o-transform"]=p,v.transform=p,v.opacity="1",v["-webkit-transition-duration"]=i.duration+"ms",v["-moz-transition-duration"]=i.duration+"ms",v["-o-transition-duration"]=i.duration+"ms",v["transition-duration"]=i.duration+"ms",v["-webkit-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",v["-moz-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",v["-o-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",v["transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",o.setAttribute("style",a(v))},hide:function(t){o.touchup(t);var e=this,n=(e.clientWidth,null),r=e.getElementsByClassName("waves-ripple");if(!(r.length>0))return!1;var s=(n=r[r.length-1]).getAttribute("data-x"),u=n.getAttribute("data-y"),c=n.getAttribute("data-scale"),d=350-(Date.now()-Number(n.getAttribute("data-hold")));d<0&&(d=0),setTimeout(function(){var t={top:u+"px",left:s+"px",opacity:"0","-webkit-transition-duration":i.duration+"ms","-moz-transition-duration":i.duration+"ms","-o-transition-duration":i.duration+"ms","transition-duration":i.duration+"ms","-webkit-transform":c,"-moz-transform":c,"-ms-transform":c,"-o-transform":c,transform:c};n.setAttribute("style",a(t)),setTimeout(function(){try{e.removeChild(n)}catch(t){return!1}},i.duration)},d)},wrapInput:function(t){for(var e=0;e<t.length;e++){var n=t[e];if("input"===n.tagName.toLowerCase()){var a=n.parentNode;if("i"===a.tagName.toLowerCase()&&-1!==a.className.indexOf("waves-effect"))continue;var i=document.createElement("i");i.className=n.className+" waves-input-wrapper";var o=n.getAttribute("style");o||(o=""),i.setAttribute("style",o),n.className="waves-button-input",n.removeAttribute("style"),a.replaceChild(i,n),i.appendChild(n)}}}},o={touches:0,allowEvent:function(t){var e=!0;return"touchstart"===t.type?o.touches+=1:"touchend"===t.type||"touchcancel"===t.type?setTimeout(function(){o.touches>0&&(o.touches-=1)},500):"mousedown"===t.type&&o.touches>0&&(e=!1),e},touchup:function(t){o.allowEvent(t)}};function r(e){var n=function(t){if(!1===o.allowEvent(t))return null;for(var e=null,n=t.target||t.srcElement;null!==n.parentElement;){if(!(n instanceof SVGElement||-1===n.className.indexOf("waves-effect"))){e=n;break}if(n.classList.contains("waves-effect")){e=n;break}n=n.parentElement}return e}(e);null!==n&&(i.show(e,n),"ontouchstart"in t&&(n.addEventListener("touchend",i.hide,!1),n.addEventListener("touchcancel",i.hide,!1)),n.addEventListener("mouseup",i.hide,!1),n.addEventListener("mouseleave",i.hide,!1))}e.displayEffect=function(e){"duration"in(e=e||{})&&(i.duration=e.duration),i.wrapInput(n(".waves-effect")),"ontouchstart"in t&&document.body.addEventListener("touchstart",r,!1),document.body.addEventListener("mousedown",r,!1)},e.attach=function(e){"input"===e.tagName.toLowerCase()&&(i.wrapInput([e]),e=e.parentElement),"ontouchstart"in t&&e.addEventListener("touchstart",r,!1),e.addEventListener("mousedown",r,!1)},t.Waves=e,document.addEventListener("DOMContentLoaded",function(){e.displayEffect()},!1)}(window);
</script>
@endsection