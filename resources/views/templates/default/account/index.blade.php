@extends(SITE_THEME.'.shop_layout')

@section('main')
<section >
<div class="container">
    <div class="row">
        <div class="col-sm-3 ">

                <div class="card  " style="width: 18rem;">
                     
                        <ul class="list-group list-group-flush">
                         
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_password') }}">{{ trans('account.change_password') }}</a></li>
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_infomation') }}">{{ trans('account.change_infomation') }}</a></li>
                          <li class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> <a href="{{ route('member.order_list') }}">{{ trans('account.order_list') }}</a></li>
                        
                          @if ( $user->is_vendor())
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_password') }}">Ma boutique</a></li>
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_password') }}">Mes articles</a></li>
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_password') }}">Mes Commandes</a></li>
                          <li class="list-group-item"> </span> <a href="{{ route('member.change_password') }}">Mes Messages</a></li>
                        
                            @endif
                  
                        </ul>
                      </div>

                    
        
             
        </div>
     
    </div>
</div>
</section>
@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">{{ $title }}</li>
        </ol>
      </div>
@endsection
