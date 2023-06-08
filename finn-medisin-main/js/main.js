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
  //Få dataene hvis de er valgt
  // Få referanser til checkbox og inndatafeltet
  var checkboxGroup = $("input[name='fylke_checkbox']");

  var inputField = $("#adresse");
  let values = [];

  // Deaktiver først inndatafeltet hvis noen checkbox er merket ved sideinnlasting
  if (checkboxGroup.is(":checked")) {
    inputField.prop("disabled", true);
  }

  // Add en event handler til checkbox group 
  checkboxGroup.change(function () {
    if (checkboxGroup.is(":checked")) {
      // Minst en checkbox er merket, deaktiver inndatafeltet
      inputField.prop("disabled", true);
      // Få de valgte alternativverdiene
      let selectedValue = $(this).val();

      //push verdi til array
      values.push(selectedValue);
    } else {
      // Ingen chechbox er merket, aktiver inndatafeltet
      inputField.prop("disabled", false);
    }
  });

  // Add en event handler til skjemainnsending
  $("#searchForm").submit(function (event) {
    event.preventDefault(); // Forhindre standardinnsending av skjema

    // Henter skjemadata
    var product = $("#vare").val().trim();
    var location = parseInt($("#adresse").val().trim());

    //Vi sjekker hva slags forespørsel som skal sendes til behandling

    if (values.length === 0) {
      //check if Zip Code or place is specified
      if (location !== null && location > 0) {
        // Perform an AJAX request to submit the form data
        $.ajax({
          url: "./php/search.php", // Erstatt med URL-en for å håndtere skjemainnsendingen
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
            // Utfør eventuell feilhåndtering eller vis feilmeldinger
          },
        });
      } else {
        // Utfør en AJAX-forespørsel for å sende inn skjemadataene
        $.ajax({
          url: "./php/search.php", // Erstatt med URL-en for å håndtere skjemainnsendingen
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
            // Håndter feilreaksjonen
            console.error("Form submission failed.");
            console.error("Error:", error);
            // Utfør eventuell feilhåndtering eller vis feilmeldinger
          },
        });
        // alert("Skriv inn postnummer for å fortsette");
      }
    } else {
    }
  });
});
