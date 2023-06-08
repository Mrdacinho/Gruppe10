<?php

require_once(__DIR__ . '/vendor/autoload.php');

// $credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
// $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

// $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
//      'subject' => 'from the PHP SDK!',
//      'sender' => ['name' => 'Sendinblue', 'email' => 'contact@sendinblue.com'],
//      'replyTo' => ['name' => 'Sendinblue', 'email' => 'joshuanderi@gmail.com'],
//      'to' => [[ 'name' => 'Max Mustermann', 'email' => 'joshuanderi@gmail.com']],
//      'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
//      'params' => ['bodyMessage' => 'made just for you!']
// ]);

// try {
//     $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
//     print_r($result);
// } catch (Exception $e) {
//     echo $e->getMessage(),PHP_EOL;
// }

?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="keywords"
      content="finn, medisin, legemiddel, legemiddelmangel, lagerstatus"
    />
    <meta
      name="description"
      content="Hjemmeside for å finne medisiner på norske apotek"
    />
    <meta
      name="author"
      content="Patrik Oskar Graff, Iselin Sannes Stridsklev, Almin Dacic, Joachim Nyland Andersen, Sindre Rødne"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hjemmeside</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/about.css" />
    <link
      rel="icon"
      type="image/x-icon"
      href="../BOP3000/Logo/fm_favicon.ico"
    />
    <link
      id=""
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <script></script>
  </head>
  <body>
    <?php include 'php/header.php';?>

    <!-- Seksjon 1 Beskrivelse -->
    <section class="section1_3">
      <div class="sec1_3_placement_outer">
        <div class="sec1_3_placement_inner_o">
          <div class="sec1_3_placement_inner_i">
            <!-- <h2>Om oss</h2> -->
            <p>
              Antall legemiddelsituasjoner har økt 23 ganger i perioden 2011-2022. Det koster
              apotekbransjen nesten 50 millioner kroner i året å håndtere slike situasjoner i
              kundemøtet. Det krever mye ressurser for både apotekansatte og pasienter å finne
              løsninger. Grunnen til det er mye manuelt arbeid og ingen tjenester som kan levere
              relevante svar i løpet av kort tid.

              Målet med dette prosjektet er å kartlegge nåværende situasjon og komme med et
              forslag til en webapplikasjon for mer effektiv håndtering av
              legemiddelmangelsituasjoner.
            </p>
          </div>
        </div>
      </div>
    </section>

   
    
    <section id="tabs-content">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Legemiddelmangel_utvikling')">Legemiddelmangel utvikling</button>
              <button class="tablinks" onclick="openCity(event, 'Legemiddelmangel_i_Europa')">Legemiddelmangel i Europa</button>
              <button class="tablinks" onclick="openCity(event, 'Vårt_bidrag')">Vårt bidrag</button>
            </div>

            <div id="Legemiddelmangel_utvikling" class="tabcontent">
              <img src="Pictures/img_5990.jpeg" alt="" />
            </div>

            <div id="Legemiddelmangel_i_Europa" class="tabcontent">
              <img src="Pictures/img_5991.png" alt="" />
            </div>

            <div id="Vårt_bidrag" class="tabcontent">
              <img src="Pictures/img_5992.png" alt="" />
            </div>
  </section>

   <footer class="footer-style">
      <div class="footer_placement">
        <p>
          finnmedisin.no &copy; 2023<br />Nettsiden benytter
          <a href="">informasjonskapsler</a>
        </p>
      </div>
      <!-- <button>Til toppen</button> -->
    </footer>
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
</script>
  </body>
</html>
