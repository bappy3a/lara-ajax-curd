$(function(){
	$("#addcustomerform").on("submit", function(e){
		e.preventDefault();
		var form = $(this);
		var url  = form.attr("action");
		var type = form.attr("method");
		var data = form.serialize();

		$.ajax({
			url: url,
			data: data,
			type: type,
			dataType:"JSON",
			beforeSend: function(){
				$(".load").fadeIn();
			},
			success: function(data) {
				if (data == "success"){
					$("#exampleModal").modal("hide");
					swal("Great", "Successfully data insert", "success");
					form[0].reset();
					return getCustomarData();
				}
			},
			complete:function() {
				$(".load").fadeOut();
			},
		});
	});



	function getCustomarData(){
		var url = $("#getalldata").data("url");
		
		$.ajax({
			url: url,
			type: "get",
			dataType:"html",
			success:function(data){
				$("#ShowAllDataAjax").html(data);
			}
		})
	};


	$(document).on("click", "#view", function(e){
		e.preventDefault();
		var url = $(this).attr("href");
		$.ajax({
			url: url,
			type: "get",
			dataType: "JSON",
			success: function(response){
				if ($.isEmptyObject(response) != null){
					$('#viewCustomer').modal("show");
					$(".cname").html("<h2 style='color:red;text-align: center;'>"+ response.name +"</h2>");
					$(".cphone").html(response.phone);
					$(".cemail").html(response.email);
				}
			}
		});
	})

	$(document).on("click", "#delete", function(e){
		e.preventDefault();
		var url = $(this).attr("href");

		$.ajax({
			url: url,
			type: "get",
			dataType: "JSON",
			success: function(response){
				swal("Delete", "Successfully data Delete", "success");
				return getCustomarData();
			}
		});
	})

})