@extends(SITE_THEME.'.shop_layout')

@section('main')
<div class="row">
        <div class="container">
          <div class="text-center">
              <h2 class="title text-center">{{ $title }}</h2>
              <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas corrupti aspernatur ipsam eveniet eos?</p>
               
          </div>
             @if (!empty($itemsList))
                    @foreach ($itemsList as $item)
                        <div class="col-sm-3 col-xs-4">
                            <div class="product-image-wrapper product-single">
                              <div class="single-products">
                                <div class="productinfo text-center product-box-{{ $item->id }}">
                                  <a href="{{ $item->getUrl() }}"><img src="{{ asset($item->getImage()) }}" alt="{{ $item->name }}" /></a>
                                  <a href="{{ $item->getUrl() }}"><h3 class="title text-center">{{ $item->name }}</h3></a>
                                  @if(!empty($item->description))
                                    <p>{{ str_limit($item->description, $limit = 105, $end = '...')   }}</p>
                                  @endif
                                </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                  @endif
<div style="clear: both; ">
    <ul class="pagination">
      {{ $itemsList->appends(request()->except(['page','_token']))->links() }}
  </ul>
</div>

        </div>
</div>
@endsection

@section('breadcrumb')
    <div class="breadcrumbs pull-left">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">{{ $title }}</li>
        </ol>
      </div>
@endsection


@section('filter')
  <form action="" method="GET" id="filter_sort">
        <div class="pull-right">
        <div>
            @php
              $queries = request()->except(['filter_sort','page']);
            @endphp
            @foreach ($queries as $key => $query)
              <input type="hidden" name="{{ $key }}" value="{{ $query }}">
            @endforeach
          <select class="custom-select" name="filter_sort">
            <option value="">{{ trans('language.filters.sort') }}</option>
            <option value="name_asc" {{ ($filter_sort =='name_asc')?'selected':'' }}>{{ trans('language.filters.name_asc') }}</option>
            <option value="name_desc" {{ ($filter_sort =='name_desc')?'selected':'' }}>{{ trans('language.filters.name_desc') }}</option>
            <option value="sort_asc" {{ ($filter_sort =='sort_asc')?'selected':'' }}>{{ trans('language.filters.sort_asc') }}</option>
            <option value="sort_desc" {{ ($filter_sort =='sort_desc')?'selected':'' }}>{{ trans('language.filters.sort_desc') }}</option>
            <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>{{ trans('language.filters.id_asc') }}</option>
            <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>{{ trans('language.filters.id_desc') }}</option>
          </select>
        </div>
      </div>
  </form>

@endsection

@push('scripts')
  <script type="text/javascript">
    $('[name="filter_sort"]').change(function(event) {
      $('#filter_sort').submit();
    });
  </script>
@endpush
