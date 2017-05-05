@extends('layouts.master')

@section('title', 'flat Edit')
@section('extraStyle')
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

@endsection
@section('content')
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::Route('flat.index')}}">flats</a></li>
      <li class="active">Update</li>
    </ol>
  </div><!--end .section-header -->
  <div class="section-body">
    <section>
      <div class="section-body">
        <!-- BEGIN HORIZONTAL FORM -->
        <div class="row">
          <div class="col-lg-12">
            <form class="form form-validate floating-label"
                  novalidate="novalidate"
                  action="{{URL::route('flat.update',$flat->id)}}"
                  method="POST"
                  enctype="multipart/form-data"
            >

              <div class="card">
                <div class="card-head style-primary">
                  <header>Update flat</header>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <select name="status" id="" class="form-control select2-list" required>
                          @if($flat->status==0)
                          <option value="0" selected>Empty</option>
                          <option value="1">Booked</option>
                          @else
                            <option value="0" >Empty</option>
                            <option value="1" selected>Booked</option>
                          @endif
                        </select>
                        <label for="status">Status</label>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" @if($flat->parking=='No') checked @endif value="No"><span>No</span>
                          </span>
                        <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" value="Yes" @if($flat->parking=='Yes') checked @endif><span>Yes</span>
                          </span>
                        <label for="parking">Parking</label>

                      </div>
                    </div>
                    <div class="col-lg-4" id="haveParking" style="display: @if($flat->parking=='No') None @else block @endif ;">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$flat->parkingNo}}"  name="parkingNo" data-rule-number="true" required>
                        <label for="parkingNo">Parking no</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
                  <!--end .card-body -->
                  <div class="card-actionbar">
                    <div class="card-actionbar-row">
                      <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-refresh"></i> Update</button>
                    </div>
                  </div>
                </div><!--end .card -->
            </form>
          </div><!--end .col -->
        </div><!--end .row -->
        <!-- END HORIZONTAL FORM -->
    </div>
  </section>
</div>

</section>

@endsection

@section('extraScript')
  <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
  <script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
    $('select').select2();

    $('.radio-styled').click(function () {
        $(this).children('input').attr('checked', true);
        if($(this).children('input').val() == "Yes"){
            $('#haveParking').show();
        }
        else{
            $('#haveParking').hide();
        }
    });

});
</script>
@endsection
