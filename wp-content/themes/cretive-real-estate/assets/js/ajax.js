jQuery(document).ready(function ($) {
  var property_type;
  var property_location;
  var property_size;
  var property_price;
  var property_bedrooms;
  var property_bath;

  $("#property_type").change(function () {
    property_type = $(this).children("option:selected").val();
    searchProperties();
  });
  $("#property_size").change(function () {
    property_size = $(this).children("option:selected").val();
    searchProperties();
  });
  $("#property_location").change(function () {
    property_location = $(this).children("option:selected").val();
    searchProperties();
  });
  $("#property_price").change(function () {
    property_price = $(this).children("option:selected").val();
    searchProperties();
  });
  $("#property_bedrooms").change(function () {
    property_bedrooms = $(this).children("option:selected").val();
    searchProperties();
  });
  $("#property_bath").change(function () {
    property_bath = $(this).children("option:selected").val();
    searchProperties();
  });

  function searchProperties() {
    data = {
      action: "searchProperties",
      property_bath: property_bath,
      property_bedrooms: property_bedrooms,
      property_type: property_type,
      property_location: property_location,
      property_price: property_price,
      property_size: property_size,
    };

    $.ajax({
      url: ajax.ajaxUrl,
      type: "POST",
      data: data,
      beforeSend: function () {
        $(".searched-data").addClass("loading");
      },
      success: function (response) {
        $(".searched-data").removeClass("loading");
        // console.log(response);
        $(".searched-data").html(response.data.items);
      },
      error: function () {
        console.log(error);
      },
    });
  }
});
