jQuery(document).ready(function ($) {
  var property_type;
  var property_size;
  var property_location;
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
      property_type: property_type,
      property_size: property_size,
      property_bedrooms: property_bedrooms,
      property_price: property_price,
      property_bath: property_bath,
      property_location: property_location,
    };
    $.ajax({
      url: ajax.ajaxurl,
      type: 'POST',
      data: data,
      beforeSend: function () {
        // console.log("before send");
      },
      success: function (response) {
        $(".searched-data").html(response.data.items);
        $(".searched-pagination").html(response.data.pagination);
        //console.log(response);
      },
    });
  }
});
