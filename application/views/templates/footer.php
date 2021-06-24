	<?php $this->load->view('templates/temp_footer'); ?>
	<!-- Scripts -->
	<!--script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script-->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

	<!--Owl Carousel script-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
		integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
		integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
		crossorigin="anonymous"></script>

	<script src="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.jquery.min.js"></script>
	<!--  Chart js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

	<!--Chartist Chart-->
	<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
		
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/siliguri_backend.js"></script>

	<!-- LOGIN MODAL -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="modal-title" id="staticModalLabel">Login/Register</h5>
				</div>
				<div class="modal-body">
					<p>
						<div class="item" style="display: block; margin-top: auto; margin-bottom: auto;">
							<?php echo '<div align="center">'.$login_button . '</div>'; ?>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- //LOGIN MODAL -->

	<!-- BECOME SELLER(rnd) MODAL -->
	<div class="modal fade" id="rndSlrModal" tabindex="-1" role="dialog" aria-labelledby="rndSlrModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="modal-title" id="staticModalLabel">Become a part of Siliguri Business</h5>
				</div>
				<div class="modal-body">
					<p>
					You have to Login/Register first to become a part of business....
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- //BECOME SELLER(rnd) MODAL -->



	<?php if ($this->uri->segment(2) == "store" || $this->uri->segment(2) == "visited_doctor") { ?>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/init/datatables-init.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#visited-data-history').DataTable();
				$('#bootstrap-data-table-conform-export').DataTable();
			});
		</script>
	<?php } ?>
	<!-- <script>
		jQuery(document).ready(function() {

			jQuery(".standardSelect").chosen({
				disable_search_threshold: 10,
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
		});
	</script>
    <script>
		jQuery(document).ready(function() {

			jQuery('.filter-action').on('input', function(){ 
				var sec_ID = jQuery(this);
				//var sec_ID = find('input:checkbox').attr('id');
				//var sec_ID = jQuery(this).parent().parent().attr("id");
				console.log(sec_ID);
			});

			jQuery(".standardSelect").chosen({
				disable_search_threshold: 10,
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
			
			jQuery("#cara_search_cat").autocomplete({

				minLength: 1,
				source: function(request, response) {

					jQuery.ajax({
						url: "searchingg/cara_search_cat",
						type: "POST",
						data: {
							search: jQuery("#cara_search_cat").val()
						},
						dataType: "json",
						success: function(data) {
							response(data);
						}
					});
				},
				select: function(event, ui) {
					event.preventDefault();
					// Set selection
					jQuery('#cara_search_cat').val(ui.item.label);
					jQuery('#cara_search_cat_id').val(ui.item.value);
					window.location.href = "search_result/?slug=" + ui.item.label;
					// window.location.href = "search_result";
					//alert('You selected '+ui.item.label+' with id '+ui.item.value);
					/*var category = this.id;  
					$.ajax({  
						url:"searchingg/select_search", 
						type: 'post',
						data:{label:ui.item.label,value:ui.item.value},  
						success:function(data){  
							var dataJSON = JSON.parse(data)[0];
							var queryStrings = '';
							var key = Object.keys(dataJSON)[0];	
							queryStrings = queryStrings + key + "="+ dataJSON[key]; 
							console.log(queryStrings);

							window.location.href="search_result/?"+queryStrings;
						}  
					});  */
					return false;
				},
				focus: function(event, ui) {
					event.preventDefault();
					jQuery('#cara_search_cat').val(ui.item.label);
				}
			}).autocomplete("instance")._renderItem = function(ul, item) {
				console.log('test');
				var str = '';
				str += '<div class="list_item_container row">';

				str += '<div class="col-sm-1 col-xs-2">';
				str += '<img src="<?php echo base_url(); ?>/assets/images/of8.png" height="20px" width="20px">';
				str += '</div>';

				str += '<div class="col-sm-11 col-xs-10">';
				str += '<div class="label" style="color:red;"><b> Category: ' + item.label + '</b></div>';
				str += '<div class="description">' + item.value + '</div>';
				str += '</div>';

				str += '</div>';

				var item = jQuery(str)

				return jQuery("<li>").append(item).appendTo(ul);
			};
		});
	</script> -->

	<?php if ($this->uri->segment(1) == "doctor_details") { ?>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.jquery.min.js"></script>
    	<script src="<?php echo base_url(); ?>assets/js/init/cal_init.js"></script>
	<?php } ?>
	<?php if ($this->uri->segment(1) == "home") { ?>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.jquery.min.js"></script>
    	<script src="<?php echo base_url(); ?>assets/js/init/home_doc_init.js"></script>
	<?php } ?>

	<?php if ($this->uri->segment(2) == "store") { ?>

		
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/init/datatables-init.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/jquery.flot.tooltip@0.9.0/js/jquery.flot.tooltip.min.js"></script> -->
		
		<script src="https://cdn.jsdelivr.net/npm/peity@3.3.0/jquery.peity.min.js"></script>
		

		<script>
			jQuery(document).ready(function ($) {
				"use strict";

				//Appointment Request Data Table
				(function ($) {

					$('#row-select').DataTable({
						initComplete: function () {
							this.api().columns().every(function () {
								var column = this;
								var select = $('<select class="form-control"><option value=""></option></select>')
									.appendTo($(column.footer()).empty())
									.on('change', function () {
										var val = $.fn.dataTable.util.escapeRegex(
											$(this).val()
										);

										column
											.search(val ? '^' + val + '$' : '', true, false)
											.draw();
									});

								column.data().unique().sort().each(function (d, j) {
									select.append('<option value="' + d + '">' + d + '</option>')
								});
							});
						}
					});
				})(jQuery);

				//Conform Appointment Data Table
				(function ($) {

					$('#bootstrap-data-table-conform').DataTable({
						lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
					});

					$('#bootstrap-data-table-conform-export').DataTable({
						dom: 'lBfrtip',
						lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
						buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
						]
					});

					$('#row-select').DataTable({
						initComplete: function () {
							this.api().columns().every(function () {
								var column = this;
								var select = $('<select class="form-control"><option value=""></option></select>')
									.appendTo($(column.footer()).empty())
									.on('change', function () {
										var val = $.fn.dataTable.util.escapeRegex(
											$(this).val()
										);

										column
											.search(val ? '^' + val + '$' : '', true, false)
											.draw();
									});

								column.data().unique().sort().each(function (d, j) {
									select.append('<option value="' + d + '">' + d + '</option>')
								});
							});
						}
					});
				})(jQuery);

				//Visit chart
				// var ctx = document.getElementById("visit-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Click chart
				// var ctx = document.getElementById("click-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Target Graph
				// var ctx = document.getElementById("target-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Review Chart
				// var ctx = document.getElementById("review-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Conformation Rate
				// var ctx = document.getElementById("conformation-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Cancel Rate
				// var ctx = document.getElementById("cancel-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Peak timming
				// var ctx = document.getElementById("timming-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

				//Return Rate
				// var ctx = document.getElementById("return-chart");
				// ctx.height = 200;
				// var myChart = new Chart(ctx, {
				// 	type: 'line',
				// 	data: {
				// 		labels: ["0", "1st week", "2nd week", "3rd week", "4th week"],
				// 		type: 'line',
				// 		defaultFontFamily: 'Montserrat',
				// 		datasets: [{
				// 			label: "Visitors",
				// 			data: [0, 30, 47, 80, 110],
				// 			backgroundColor: 'transparent',
				// 			borderColor: 'rgba(220,53,69,0.75)',
				// 			borderWidth: 3,
				// 			pointStyle: 'circle',
				// 			pointRadius: 5,
				// 			pointBorderColor: 'transparent',
				// 			pointBackgroundColor: 'rgba(220,53,69,0.75)',
				// 		}]
				// 	},
				// 	options: {
				// 		responsive: true,

				// 		tooltips: {
				// 			mode: 'index',
				// 			titleFontSize: 12,
				// 			titleFontColor: '#000',
				// 			bodyFontColor: '#000',
				// 			backgroundColor: '#fff',
				// 			titleFontFamily: 'Montserrat',
				// 			bodyFontFamily: 'Montserrat',
				// 			cornerRadius: 3,
				// 			intersect: false,
				// 		},
				// 		legend: {
				// 			display: false,
				// 			labels: {
				// 				usePointStyle: true,
				// 				fontFamily: 'Montserrat',
				// 			},
				// 		},
				// 		scales: {
				// 			xAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: false,
				// 					drawBorder: false
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Month'
				// 				}
				// 			}],
				// 			yAxes: [{
				// 				display: true,
				// 				gridLines: {
				// 					display: true,
				// 					drawBorder: true
				// 				},
				// 				scaleLabel: {
				// 					display: true,
				// 					labelString: 'Visitors'
				// 				}
				// 			}]
				// 		},
				// 		title: {
				// 			display: false,
				// 			text: 'Normal Legend'
				// 		}
				// 	}
				// });

			});

		</script>

	<?php } ?>

</body>
</html>