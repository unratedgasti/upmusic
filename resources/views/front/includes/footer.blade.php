       

<script type="text/javascript" src="{!! asset('includes/front/vendors/jquery/dist/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/fastclick/lib/fastclick.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/nprogress/nprogress.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Chart.js/dist/Chart.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/gauge.js/dist/gauge.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/iCheck/icheck.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/skycons/skycons.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Flot/jquery.flot.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Flot/jquery.flot.pie.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Flot/jquery.flot.time.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Flot/jquery.flot.stack.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/Flot/jquery.flot.resize.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/flot.orderbars/js/jquery.flot.orderBars.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/flot-spline/js/jquery.flot.spline.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/DateJS/build/date.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/jqvmap/dist/jquery.vmap.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/jqvmap/dist/maps/jquery.vmap.world.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/moment/min/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('includes/front/build/js/custom.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('includes/front/select2/js/select2.min.js') !!}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2({autoClose:true,width:'100%'});
	});

	$(function() {

    var $sidebar   = $("#sidebar"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 15;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    
});
</script>
<script type="text/javascript" src="{!! asset('includes/front/userjs/search.js') !!}"></script>
 <div class="row">
    <footer class="col-md-12" id="footer" style="background-color:  #404040;margin-left: 1.5% !important;width: 98.5%">
          <div class="pull-right">
            College of Music <a href="">©2018 Copyright TRMD</a>
          </div>
         
        </footer>
 </div>