$(document).ready(function () {
  $("#vare").keyup(function () {
    var query = $(this).val();
    if (query != "") {
      $.ajax({
        url: "./php/live_search.php",
        method: "POST",
        data: {
          query: query,
        },
        success: function (data) {
          $("#live_search").html(data);
          $("#live_search").css("display", "block");
          $("#vare").focusout(function () {
            $("#live_search").on("click", "li", function () {
              $("#vare").val($(this).text().trim());
              localStorage.setItem("query", $(this).text().trim());
              console.log($(this).text());
              $("#live_search").css("display", "none");
            });
            // $("#live_search").css("display", "none");
          });
          $("#vare").focusin(function () {
            $("#live_search").css("display", "block");
          });
        },
      });
    } else {
      $("#live_search").css("display", "none");
    }
  });
});

$(document).ready(function () {
  //get the data if it's selected
  // Get references to the checkbox group and input field
  var checkboxGroup = $("input[name='fylke_checkbox']");

  var inputField = $("#adresse");
  let values = [];

  // Initially disable the input field if any checkbox is checked on page load
  if (checkboxGroup.is(":checked")) {
    inputField.prop("disabled", true);
  }

  // Add an event handler to the checkbox group
  checkboxGroup.change(function () {
    if (checkboxGroup.is(":checked")) {
      // At least one checkbox is checked, disable the input field
      inputField.prop("disabled", true);
      // Get the selected option values
      let selectedValue = $(this).val();

      //push value to the array
      values.push(selectedValue);
    } else {
      // No checkbox is checked, enable the input field
      inputField.prop("disabled", false);
    }
  });

  // Add an event handler to the form submission
  $("#searchForm").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Retrieve form data
    var product = $("#vare").val().trim();
    var location = parseInt($("#adresse").val().trim());

    //here, we check what kind of request to sent for processing

    if (values.length === 0) {
      //check if Zip Code or place is specified
      if (location !== null && location > 0) {
        // Perform an AJAX request to submit the form data
        $.ajax({
          url: "./php/search.php", // Replace with the URL to handle the form submission
          method: "POST",
          data: {
            product: product,
            location: location,
            query: localStorage.getItem("query"),
          },
          success: function (data) {
            $("#search_result").html(data);
            $("#search_result").css("display", "block");

            $("#search_result").on("click", "li", function () {
              localStorage.setItem("product_string", $(this).text().trim());
              window.location.href = "./site2.php";

              $("#search_result").css("display", "none");
            });
          },
          error: function (xhr, status, error) {
            // Handle the error response
            console.error("Form submission failed.");
            console.error("Error:", error);
            // Perform any error handling or display error messages
          },
        });
      } else {
        // Perform an AJAX request to submit the form data
        $.ajax({
          url: "./php/search.php", // Replace with the URL to handle the form submission
          method: "POST",
          data: {
            product: product,
            // location: location,
            query: localStorage.getItem("query"),
          },
          success: function (data) {
            $("#search_result").html(data);
            $("#search_result").css("display", "block");

            $("#search_result").on("click", "li", function () {
              localStorage.setItem("product_string", "");
              window.location.href = "./site2.php";

              $("#search_result").css("display", "none");
            });
          },
          error: function (xhr, status, error) {
            // Handle the error response
            console.error("Form submission failed.");
            console.error("Error:", error);
            // Perform any error handling or display error messages
          },
        });
        // alert("You must enter postal code or a place to continue");
      }
    } else {
    }
  });
});
