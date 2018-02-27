       

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

	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<script type="text/javascript" src="{!! asset('includes/front/userjs/search.js') !!}"></script>

    <br><br>
    <footer id="footer" style="background-color:  #404040;margin-left: 0 !important;width: 100%">
          <div class="pull-right">
            College of Music <a href="">©2018 Copyright TRMD</a>
          </div>
         
        </footer>
