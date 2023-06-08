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
  // Få dataene hvis de er valgt
  // Få referanser til checkbox og input
  var checkboxGroup = $("input[name='fylke_checkbox']");

  var inputField = $("#adresse");
  let values = [];

  // Deaktiver først inndatafeltet hvis noen avkrysningsboks er merket ved sideinnlasting
  if (checkboxGroup.is(":checked")) {
    inputField.prop("disabled", true);
  }

  // Add event handler til checkbox group
  checkboxGroup.change(function () {
    if (checkboxGroup.is(":checked")) {
      // Minst en avmerkingsboks er merket, deaktiver inndatafeltet
      inputField.prop("disabled", true);
      // Få selected option values
      let selectedValue = $(this).val();

      //push value til array
      values.push(selectedValue);
    } else {
      // Ingen checkbox er checked, enable input
      inputField.prop("disabled", false);
    }
  });

  // Legg til en event handler i skjemainnsendingen
  $("#searchForm").submit(function (event) {
    event.preventDefault(); // Forhindre standardinnsending av skjema

    // Hente fra data
    var product = $("#vare").val().trim();
    var location = parseInt($("#adresse").val().trim());

    //Sjekker hva slags forespørsel som skal sendes til behandling

    if (values.length === 0) {
      //check if Zip Code or place is specified
      if (location !== null && location > 0) {
        // Utfør en AJAX-forespørsel for å sende inn skjemadataene

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
            console.error("Skjemainnsending mislyktes.");
            console.error("Error:", error);
            // Utfører eventuell feilhåndtering eller vis feilmeldinger
          },
        });
      } else {
        // Utfører en AJAX-forespørsel for å sende inn skjemadataene
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
            // Handle the error response
            console.error("Skjemainnsending mislyktes.");
            console.error("Error:", error);
            // Utføerer eventuell feilhåndtering eller vis feilmeldinger
          },
        });
        // alert("Du må skrive inn postnummer eller et sted for å fortsette");
      }
    } else {
    }
  });
});
