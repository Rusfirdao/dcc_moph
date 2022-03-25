function capturePage() {
    html2canvas(document.querySelector("#capture")).then(canvas => {
      var image = canvas.toDataURL("img/png").replace("image/png", "image/octet-stream");
      console.log(image);
      // window.location.href = image;
      simulateDownloadImageClick(image,'ddc_moph.png')
    });
  }
  function simulateDownloadImageClick(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download !== 'string') {
      window.open(uri);
    } else {
      link.href = uri;
      link.download = filename;
      accountForFirefox(clickLink, link);
    }
  }

  function clickLink(link) {
    link.click();
  }

  function accountForFirefox(click) { // wrapper function
    let link = arguments[1];
    document.body.appendChild(link);
    click(link);
    document.body.removeChild(link);
  }
