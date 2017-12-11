@extends('front.index')
@section('indexcontent')   
<div>


  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content" style="padding-top: 200px">
        <form>
          <h1>Enter Code</h1>
          <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span id="errorcode"></span>
          </div>
          <div>
            {!! Form::text('search_code', '',array('class'=>'form-control', 'placeholder'=>'Enter Code','id'=>'search_code'   )) !!} 
          {!! Form::hidden('methodroute', route('search.searchCode'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
          </div>
          <div>
            <button class="btn btn-lg btn-success" id="search_code_button">Search code</button>

          </div>

          <div class="clearfix"></div>

</form>
        </section>
      </div>


    </div>
  </div>

  @stop