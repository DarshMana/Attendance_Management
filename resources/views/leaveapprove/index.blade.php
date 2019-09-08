<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/slidebar.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                {{-- <img src="{{Storage::disk('local')->url('').'\\'.$user->profile_img}}" width="100px" height="100px"/> --}}
                {{-- {{$userData->profile_img}}  --}}
                <h3> {{ Auth::user()->name }}</h3>
            </div>




            {{-- start admin sidebar --}}

            @if(Auth()->user()->roleid==0)
            <ul class="list-unstyled components">
                <li>
                    <a href="/dashboard">Dashboard</a>
                </li>
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employees</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="/employee/create">Ad Employee</a>
                        </li>


                    </ul>
                </li>
                <li>
                <a href="#leavesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave Management</a>
                <ul class="collapse list-unstyled" id="leavesSubmenu">
                        <li>
                            <a href="/leaveapprove">All Leaves</a>
                        </li>

                </li>
                <li>
                    <a href="/changePassword">Change Password</a>
                </li>
            </ul>
            {{-- end admin sidebar --}}



                
            @else
            {{-- start employee sidebar --}}
            <ul class="list-unstyled components">
                <p>Dashboard</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave Type</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/leave/request">Apply Leave</a>
                        </li>
                        <li>
                            <a href="/leave">Leave History</a>
                        </li>

                    </ul>
                </li>
                
                <li>
                    <a href="/changePassword">Change Password</a>
                </li>
            </ul>
                
            @endif
            {{-- end employee sidebar --}}
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            

                                @guest
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
            
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest

                        </ul>
                    </div>
                </div>
            </nav>


            
            @if(Auth()->user()->roleid==0)

                @else
                @endif

        
        {{-- @if(Auth()->user()->roleid == 0)  --}}
        <div class="table-responsive">
                <table class="table table table-hover table-dark">
                    <thead>
                        <tr>
                         <th width="" class="sorting" data-sorting_type="asc" style="cursor: pointer">ID</th>
                         <th width="" class="sorting" data-sorting_type="asc" style="cursor: pointer">Leave Type </th>
                         <th width="" class="sorting" data-sorting_type="asc" style="cursor: pointer">From </th>
                         <th width="" class="sorting" data-sorting_type="asc" style="cursor: pointer">To </th>
                         <th width="" class="sorting" data-sorting_type="asc" style="cursor: pointer">Status </th>
                         <th width=""></th>
                         <th colspan="2"><input type="text" name="search" id="search" placeholder="Search Here" class="form-control" /></th>
                        </tr>
                       </thead>


                 <tbody>
                  @include('leaveapprove/leaveapprove_data')
                 </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            </div>
        </div>
        {{-- @endif --}}
    </div>
{{-- ///////////////////////////// --}}




           {{-- /////////////////////// --}}

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
<script>
        $(document).ready(function(){
        
         
        
         function fetch_data(page, sort_type, sort_by, query)
         {
          $.ajax({
           url:"/leaveapprove/leaveapprove/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
           success:function(data)
           {
            $('tbody').html('');
            $('tbody').html(data);
           }
          })
         }
        
         $(document).on('keyup', '#serach', function(){
          var query = $('#serach').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          fetch_data(page, sort_type, column_name, query);
         });
        
         $(document).on('click', '.sorting', function(){
          var column_name = $(this).data('column_name');
          var order_type = $(this).data('sorting_type');
          var reverse_order = '';
          if(order_type == 'asc')
          {
           $(this).data('sorting_type', 'desc');
           reverse_order = 'desc';
           clear_icon();
           $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
          }
          if(order_type == 'desc')
          {
           $(this).data('sorting_type', 'asc');
           reverse_order = 'asc';
           clear_icon
           $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
          }
          $('#hidden_column_name').val(column_name);
          $('#hidden_sort_type').val(reverse_order);
          var page = $('#hidden_page').val();
          var query = $('#serach').val();
          fetch_data(page, reverse_order, column_name, query);
         });
        
         $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          $('#hidden_page').val(page);
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
        
          var query = $('#serach').val();
        
          $('li').removeClass('active');
                $(this).parent().addClass('active');
          fetch_data(page, sort_type, column_name, query);
         });
        
        });
        </script>
{{-- @endsection --}}