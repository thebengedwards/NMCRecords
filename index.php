<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Main</title>
</head>
<body>

<header>
  <h1>Home</h1>
</header>

<main>
  <section id="links">
    <p><a href='admin.php'>Main</a></p>
    <p><a href='credits.php'>Credits</a></p>
  </section>

  <p>Offers</p>
  <aside id="offers">

  </aside>

  <p>XML Offers</p>
  <aside id="XMLoffers">

  </aside>

<script type="text/javascript">

const requestURL = 'getOffers.php';
const requestURLxml = 'getOffers.php?useXML';

window.addEventListener('load',function () {
  'use strict';

  const offers = document.getElementById('offers');
  const XMLoffers = document.getElementById('XMLoffers');

  getRequest(requestURL, updateTarget);
  getRequest(requestURLxml, updateTargetXML);

  setInterval(function(){
    getRequest(requestURL, updateTarget)},5000);
  setInterval(function(){
    getRequest(requestURLxml, updateTargetXML)},5000);

});

function getRequest(url, callback){
  'use strict';
  const httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = function(){
    let completed = 4, successful = 200;
    if (httpRequest.readyState == completed){
      if (httpRequest.status == successful){
        callback(httpRequest.responseText);
      }
      else{
        alert('There was a problem with the request.');
      }
    }
  };

  httpRequest.open('get', url, true);
  httpRequest.send(null);
}

function updateTarget(text){
  'use strict';
  offers.innerHTML = text;
}

function updateTargetXML(xml){
  'use strict';
  XMLoffers.innerHTML = xml;
}

</script>



<div class="footer">
  <p>W17004394</p>
</div>

</body>
</html>
