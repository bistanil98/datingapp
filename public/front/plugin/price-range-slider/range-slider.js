/*------------------Tarifas--------------*/
  $(function () {
    $("#slider-tarifas").slider({
    range: true,
    orientation: "horizontal",
     min: 25,
    max: 400,
    values: [25, 500],
    step: 1,
    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min-slider-tarifas").val(ui.values[0] + "€");
      $("#max-slider-tarifas").val(ui.values[1] + "€");
    },
	change: function(event, ui) {
            search();
        }
    });

    $("#min-slider-tarifas").val($("#slider-tarifas").slider("values", 0) + "€");
    $("#max-slider-tarifas").val($("#slider-tarifas").slider("values", 1) + "€");

  });
  
  /*------------------AGE--------------*/
  $(function () {
    $("#slider-age").slider({
    range: true,
    orientation: "horizontal",
     min: 18,
    max: 60,
    values: [18, 60],
    step: 1,
    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min-slider-age").val(ui.values[0]);
      $("#max-slider-age").val(ui.values[1]);
    },
	change: function(event, ui) {
            search();
        }
    });

    $("#min-slider-age").val( $("#slider-age").slider("values", 0));
    $("#max-slider-age").val( $("#slider-age").slider("values", 1));

  });
  
    /*------------------Height--------------*/
  $(function () {
    $("#slider-height").slider({
    range: true,
    orientation: "horizontal",
     min: 90,
    max: 250,
    values: [90, 250],
    step: 1,
    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min-slider-height").val(ui.values[0] + "cm");
      $("#max-slider-height").val(ui.values[1] + "cm");
    },
	change: function(event, ui) {
            search();
        }
    });

    $("#min-slider-height").val( $("#slider-height").slider("values", 0) + "cm");
    $("#max-slider-height").val( $("#slider-height").slider("values", 1) + "cm");

  }); 
  
  
  /*------------------Weight--------------*/
  $(function () {
    $("#slider-weight").slider({
    range: true,
    orientation: "horizontal",
     min: 40,
    max: 150,
    values: [40, 150],
    step: 1,
    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min-slider-weight").val(ui.values[0] + "kg");
      $("#max-slider-weight").val(ui.values[1] + "kg");
    },
	change: function(event, ui) {
            search();
        }
    });

    $("#min-slider-weight").val( $("#slider-weight").slider("values", 0) + "kg");
    $("#max-slider-weight").val( $("#slider-weight").slider("values", 1) + "kg");

  }); 
  /*------------------availability--------------*/
  $(function () {
    $("#slider-availability").slider({
    range: true,
    orientation: "horizontal",
     min: 0,
    max: 24,
    values: [0, 24],
    step: 1,
    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }
      
      $("#min-slider-availability").val(ui.values[0] + "h");
      $("#max-slider-availability").val(ui.values[1] + "h");
    },
	change: function(event, ui) {
            search();
        }
    });

    $("#min-slider-availability").val( $("#slider-availability").slider("values", 0) + "h");
    $("#max-slider-availability").val( $("#slider-availability").slider("values", 1) + "h");

  });

