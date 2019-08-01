<?php

namespace App\Http\Controllers; 

use App\Models\ShopOrder;
use App\Models\ShopOrderStatus;
use App\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use View;

class SaleItemController extends GeneralController
{
    public function index()
    {
        return view(SITE_THEME . '.vendre.index')->with(array(
            'title'       => 'Vendre',
        ));
        
    }
    //
}
