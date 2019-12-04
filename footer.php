		<div class="control-sidebar-bg"></div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>نسخه ۱</b>&nbsp;-&nbsp;
			</div>
			کلیه حقوق این اتوماسیون متعلق به شرکت <strong>پتروسامان آذر تتیس</strong> می باشد.
		</footer>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?php get_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="<?php get_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php get_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?php get_url(); ?>plugins/knob/jquery.knob.js"></script>
		<script src="https:cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
		<script src="<?php get_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
		<script src="<?php get_url(); ?>plugins/select2/select2.full.min.js"></script>
		<script src="<?php get_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php get_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php get_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="<?php get_url(); ?>plugins/fastclick/fastclick.min.js"></script>
		<script src="<?php get_url(); ?>dist/js/app.min.js"></script>
		<script src="<?php get_url(); ?>dist/js/pages/dashboard.js"></script>
		<script src="<?php get_url(); ?>dist/js/pages/dashboard2.js"></script>
		<script src="<?php get_url(); ?>dist/js/demo.js"></script>
		<script src="<?php get_url(); ?>bootstrap/js/bootstrap.min.js1"></script>
		<script src="<?php get_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php get_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php get_url(); ?>plugins/fastclick/fastclick.min.js"></script>
		<script src="<?php get_url(); ?>dist/js/persianDatepicker.min.js"></script>
		<script src="<?php get_url(); ?>plugins/iCheck/icheck.min.js"></script>

		<script type="text/javascript">
			$(".select2").select2();
			$(".date_picker").persianDatepicker();
			$("#f_date, #simpleLabel").persianDatepicker();
			$("#c_date, #simpleLabel").persianDatepicker();
			$(".datepickerClass").persianDatepicker();
			$('.table_pagination').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": false,
				"info": true,
				"autoWidth": true
			});
		</script>
	</body>
</html>