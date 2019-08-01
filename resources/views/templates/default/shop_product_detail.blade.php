@extends(SITE_THEME.'.shop_layout')
 
@section('center')
          <div class="product-details"><!--product-details-->
            <div class="row">
              <div class="col-sm-4">

                <div class="img-detail">
                  
                  <img src="{{ asset($product->getImage()) }}" alt=""  
                           width="100%" class="zoom m-4"
                            data-magnify-src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Starry_Night_Over_the_Rhone.jpg/774px-Starry_Night_Over_the_Rhone.jpg">

            
                  @if ($product->images->count())

                  <div id="lightgallery"> 
                     @foreach ($product->images as $key=>$image)
                     <a href="{{ asset($image->getImage()) }}">
                      <img width="20%" src="{{ asset($image->getImage()) }}" alt=""  >
                    </a>
                      {{-- <div class="view-product item"  data-slide-number="{{ $key + 1 }}">
                        <img src="{{ asset($image->getImage()) }}" alt=""  >
                      </div> --}}
                      @endforeach

                    </div>
                  
                  @endif

                
                </div>
              
              </div>
              <div class="col-sm-5">
          <form id="buy_block" action="{{ route('postCart') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}" />
            
                <div class="product-information"><!--/product-information-->
                  @if ($product->price != $product->getPrice())
                  <img src="{{ asset(SITE_THEME_ASSET.'/images/home/sale2.png') }}" class="newarrival" alt="" />
                  @elseif($product->type == 1)
                  <img src="{{ asset(SITE_THEME_ASSET.'/images/home/new2.png') }}" class="newarrival" alt="" />
                  @endif
                  <h2>{{ $product->name }} <span class="product-occasion">Occasion</span>  <span class="product-new">Neuf</span></h2> 
                  
                  <p>CODE: {{ $product->sku }}</p>
                    {!! $product->showPrice() !!}
                  <span>
                    <label>{{ trans('product.quantity') }}:</label>
                    <input type="number" name="qty" value="1" />
                    <button type="submit" class="btn btn-fefault cart">
                      <i class="fa fa-shopping-cart"></i>
                      {{trans('language.add_to_cart')}}
                    </button>
                  </span>
                  @if ($product->attGroupBy())
                  <div class="form-group">
                    @foreach ($product->attGroupBy() as $keyAtt => $attributes)
                      @if ($attributesGroup[$keyAtt]['type'] =='select')
                      <div class="input-group">
                        <label>{{ $attributesGroup[$keyAtt]['name'] }}:</label>
                         <select class="form-control" style="max-width: 100px;" name="attribute[{{ $keyAtt }}]">
                          @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->name }}" {{ ($k ==0)?'selected':'' }}> {{ $attribute->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      @elseif($attributesGroup[$keyAtt]['type'] =='radio')
                       <div class="input-group">
                        <label>{{ $attributesGroup[$keyAtt]['name'] }}:</label><br>
                        @foreach ($attributes as $k => $attribute)
                          <label class="radio-inline"><input type="radio" name="attribute[{{ $keyAtt }}]" value="{{ $attribute->name }}" {{ ($k ==0)?'checked':'' }}> {{ $attribute->name }}</label>
                        @endforeach
                      </div>
                      @endif
                    @endforeach
                  </div>
                  @endif
                  <p><b>{{ trans('product.availability') }}:</b>
                  @if ($configs['show_date_available'] && $product->date_available >= date('Y-m-d H:i:s'))
                  {{ $product->date_available }}
                  @else
                  {{ trans('product.in_stock') }}
                  @endif
                </p>
                  <p><b>{{ trans('product.type') }}:</b> New</p>
                  <p><b>{{ trans('product.brand') }}:</b> {{ empty($product->brand->name)?'None':$product->brand->name }}</p>
                  <div class="short-description">
                    <b>{{ trans('product.overview') }}:</b>
                    <p>{{ $product->description }}</p>
                  </div>
                <div class="addthis_inline_share_toolbox_yprn"></div>
                </div><!--/product-information-->
              
            </div><!--/product-details-->
          </form>
          <div class="col-sm-3">
            <div class="info-vendeur">
              <p class="text-muted "><ins> Vender par</ins></p>
                <img class="img-responsive center-block" style="margin: 0 auto;" src="https://www.forum-peugeot.com/Forum/styles/uix/uix/forum-peugeot-logo.png" alt="">
                <ul>
                  <li>
                      <span class="text-muted small">Produits vendus : <span>955</span> </span>

                  </li>
                  <li>                <span class="text-muted small">Satisfaction : <span>4.2/5</span> </span>
                  </li>
                  <li>
                      <span class="text-muted small">Wilaya : <span>Boumerdes</span> </span>
                  </li>
                </ul>
                
                 <ul>
                    <li>
                        <a href="#">Voir la boutique</a>
                      </li>
                      <li>
                          <a href="#">Signaler le produit</a>
                        </li>
                  <li>
                      <a href="#">Contactez le vendeur</a>
                    </li>
                 
               </ul>

               <hr>
               <p class="text-muted "><ins>Autres vendeurs</ins></p>
                <ul>
                    <li>
                        <a href="#">Ajouter au comparateur</a>
                          </li>
                    <li>
                        <a href="#">vendez le vôtre
                          </a>
                          </li>
                </ul>
         
          </div>
          </div>
        </div>
        </div>
       
           
          <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">{{ trans('product.description') }}</a></li>
                <li><a href="#reviews" data-toggle="tab">{{ trans('product.comment') }}</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade  active in" id="details" >
                {!! $product->content !!}
              </div>

              <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
<div class="fb-comments" data-href="{{ $product->getUrl() }}" data-numposts="5"></div>
                </div>
              </div>

            </div>
          </div><!--/category-tab-->
@if ($productsToCategory->count())
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">{{ trans('language.recommended_items') }}</h2>

            <div id="recommended-item-carousel" class="carousel slide">
              <div class="carousel-inner">
               @foreach ($productsToCategory as  $key => $product_rel)
                @if ($key % 4 == 0)
                  <div class="item {{  ($key ==0)?'active':'' }}">
                @endif
                  <div class="col-sm-3">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products   product-box-{{ $product_rel->id }}">
                          <div class="productinfo text-center">
                            <a href="{{ $product_rel->getUrl() }}"><img src="{{ asset($product_rel->getThumb()) }}" alt="{{ $product_rel->name }}" /></a>
                        {!! $product_rel->showPrice() !!}
                            <a href="{{ $product_rel->getUrl() }}"><p>{{ $product_rel->name }}</p></a>
                          </div>
                          @if ($product_rel->price != $product_rel->getPrice())
                          <img src="{{ asset(SITE_THEME_ASSET.'/images/home/sale.png') }}" class="new" alt="" />
                          @elseif($product_rel->type == 1)
                          <img src="{{ asset(SITE_THEME_ASSET.'/images/home/new.png') }}" class="new" alt="" />
                          @endif
                      </div>
                    </div>
                  </div>
                @if ($key % 4 == 3)
                  </div>
                @endif
               @endforeach
              </div>
            </div>
          </div><!--/recommended_items-->
@endif


@endsection

@section('breadcrumb')

@endsection

@push('styles')

@endpush
@push('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bd09e60b8c26cab"></script>
@endpush
