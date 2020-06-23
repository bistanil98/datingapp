$(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

});



  $(document).ready(function(){
  
  $('#price-range-submit').hide();

  $("#min_price,#max_price").on('change', function () {

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
    }

    $("#slider-range").slider({
    values: [min_price_range, max_price_range]
    });
    
  });


  $("#min_price,#max_price").on("paste keyup", function () {                                        

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());
    
    if(min_price_range == max_price_range){

      max_price_range = min_price_range + 100;
      
      $("#min_price").val(min_price_range);   
      $("#max_price").val(max_price_range);
    }

    $("#slider-rangetwo").slider({
    values: [min_price_range, max_price_range]
    });

  });


  $(function () {
    $("#slider-rangetwo").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000,
    values: [0, 10000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min_pricetwo").val(ui.values[0]);
      $("#max_pricetwo").val(ui.values[1]);
    }
    });

    $("#min_pricetwo").val($("#slider-rangetwo").slider("values", 0));
    $("#max_pricetwo").val($("#slider-rangetwo").slider("values", 1));

  });

  $("#slider-rangetwo,#price-range-submit").click(function () {

    var min_price = $('#min_pricetwo').val();
    var max_price = $('#max_pricetwo').val();

    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
  });

});



  $(document).ready(function(){
  
  $('#price-range-submit').hide();

  $("#min_pricethree,#max_pricethree").on('change', function () {

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_pricethree").val());

    var max_price_range = parseInt($("#max_pricethree").val());

    if (min_price_range > max_price_range) {
    $('#max_pricethree').val(min_price_range);
    }

    $("#slider-rangethree").slider({
    values: [min_price_range, max_price_range]
    });
    
  });


  $("#min_pricethree,#max_pricethree").on("paste keyup", function () {                                        

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_pricethree").val());

    var max_price_range = parseInt($("#max_pricethree").val());
    
    if(min_price_range == max_price_range){

      max_price_range = min_price_range + 100;
      
      $("#min_pricethree").val(min_price_range);   
      $("#max_pricethree").val(max_price_range);
    }

    $("#slider-rangethree").slider({
    values: [min_price_range, max_price_range]
    });

  });


  $(function () {
    $("#slider-rangethree").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000,
    values: [0, 10000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min_pricethree").val(ui.values[0]);
      $("#max_pricethree").val(ui.values[1]);
    }
    });

    $("#min_pricethree").val($("#slider-rangethree").slider("values", 0));
    $("#max_pricethree").val($("#slider-rangethree").slider("values", 1));

  });

  $("#slider-rangethree,#price-range-submit").click(function () {

    var min_price = $('#min_pricethree').val();
    var max_price = $('#max_pricethree').val();

    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
  });

});



  $(document).ready(function(){
  
  $('#price-range-submit').hide();

  $("#min_price,#max_price").on('change', function () {

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
    }

    $("#slider-range").slider({
    values: [min_price_range, max_price_range]
    });
    
  });


  $("#min_price,#max_price").on("paste keyup", function () {                                        

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());
    
    if(min_price_range == max_price_range){

      max_price_range = min_price_range + 100;
      
      $("#min_price").val(min_price_range);   
      $("#max_price").val(max_price_range);
    }

    $("#slider-rangefour").slider({
    values: [min_price_range, max_price_range]
    });

  });


  $(function () {
    $("#slider-rangefour").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000,
    values: [0, 10000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min_pricefour").val(ui.values[0]);
      $("#max_pricefour").val(ui.values[1]);
    }
    });

    $("#min_pricefour").val($("#slider-rangefour").slider("values", 0));
    $("#max_pricefour").val($("#slider-rangefour").slider("values", 1));

  });

  $("#slider-rangefour,#price-range-submit").click(function () {

    var min_price = $('#min_pricetwo').val();
    var max_price = $('#max_pricetwo').val();

    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
  });

});



  $(document).ready(function(){
  
  $('#price-range-submit').hide();

  $("#min_price,#max_price").on('change', function () {

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
    }

    $("#slider-rangefive").slider({
    values: [min_price_range, max_price_range]
    });
    
  });


  $("#min_pricefive,#max_pricefive").on("paste keyup", function () {                                        

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_pricefive").val());

    var max_price_range = parseInt($("#max_pricefive").val());
    
    if(min_price_range == max_price_range){

      max_price_range = min_price_range + 100;
      
      $("#min_pricefive").val(min_price_range);   
      $("#max_pricefive").val(max_price_range);
    }

    $("#slider-rangefive").slider({
    values: [min_price_range, max_price_range]
    });

  });


  $(function () {
    $("#slider-rangefive").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000,
    values: [0, 10000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min_pricefive").val(ui.values[0]);
      $("#max_pricefive").val(ui.values[1]);
    }
    });

    $("#min_pricefive").val($("#slider-rangefive").slider("values", 0));
    $("#max_pricefive").val($("#slider-rangefive").slider("values", 1));

  });

  $("#slider-rangefive,#price-range-submit").click(function () {

    var min_price = $('#min_pricetwo').val();
    var max_price = $('#max_pricetwo').val();

    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
  });

});



  $(document).ready(function(){
  
  $('#price-range-submit').hide();

  $("#min_price,#max_price").on('change', function () {

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
    }

    $("#slider-rangesix").slider({
    values: [min_price_range, max_price_range]
    });
    
  });


  $("#min_pricefive,#max_pricefive").on("paste keyup", function () {                                        

    $('#price-range-submit').show();

    var min_price_range = parseInt($("#min_pricesix").val());

    var max_price_range = parseInt($("#max_pricesix").val());
    
    if(min_price_range == max_price_range){

      max_price_range = min_price_range + 400;
      
      $("#min_pricesix").val(min_price_range);   
      $("#max_pricesix").val(max_price_range);
    }

    $("#slider-rangesix").slider({
    values: [min_price_range, max_price_range]
    });

  });


  $(function () {
    $("#slider-rangesix").slider({
    range: true,
    orientation: "horizontal",
    min: 25,
    max: 400,
    values: [25, 400],
    step: 400,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min_pricesix").val(ui.values[0]);
      $("#max_pricesix").val(ui.values[1]);
    }
    });

    $("#min_pricesix").val($("#slider-rangesix").slider("values", 0));
    $("#max_pricesix").val($("#slider-rangesix").slider("values", 1));

  });

  $("#slider-rangesix,#price-range-submit").click(function () {

    var min_price = $('#min_pricetwo').val();
    var max_price = $('#max_pricetwo').val();

    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
  });

});

