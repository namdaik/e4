@extends('url.layout')

@section('css_class', 'frontend home')

@section('content')
<div class="container home pt-5">
    <div class="row justify-content-md-center">
        <div class="col-lg-8 text-center welcome-msg">
            Shorten the link from your Sitemap
        </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-lg-12"></div>
      <div class="col-lg-3">
        <div class="input-group mt-5 mb-3">
            <input type="text" class="form-control" id="key-param" value="" placeholder="Key paramester">
            <div class="input-group-append">
              <button class="btn btn-success" id="add-param" type="button">Add</button> 
            </div>
          </div>
      </div>
      <div class="col-lg-12"></div>
      <div class="col-lg-7">
            <form action="{{route('store_url_sitemap')}}" class="text-center" id="formUrl" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            sitemap
                        </span>
                    </div>
                    <input class="form-control" name="sitemap" placeholder="@lang('Paste a sitemap to be shortened')" type="text">
                    </input>
                </div>
                <div class="col-12"></div>
                <button class="btn btn-primary" id="submit_sitemap" style="display: block;clear: left; margin: auto;" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center">
        
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).on('click', '#add-param', function (event) {
        $('#submit_sitemap').before(
               '<div class="input-group mb-3 " style="width: 48%; float: left;    padding-right: 5px;">'+
                   ' <div class="input-group-prepend">'+
                       ' <span class="input-group-text">'+
                            $('#key-param').val()+
                       ' </span></div>'+
                   ' <input class="form-control" placeholder="" name="'+
                    $('#key-param').val()+
                    '"type="text">'+
                    '</input></div>'
            );
    });
</script>
@endpush
