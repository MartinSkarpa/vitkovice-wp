"use strict";

initScroll();
showContactEmail();
initMap();
initEventHandlers();

function initMap() {
  try {
    Loader.lang = MAPY_API_LANG_CODE;
    Loader.async = true;
    Loader.load(null, null, createMap);
  } catch (error) {
    console.error("Error initializing map.", error);
  }
}

function initScroll() {
  const smoothScroll = new scrollToSmooth("a", {
    duration: 600,
    easing: "easeInOutExpo",
    offset: "#navbarMain"
  });

  smoothScroll.init();

  const appearOnScroll = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          //entry.target.classList.remove("appear");
          return;
        }

        entry.target.classList.add("appear");
        observer.unobserve(entry.target);
      })
    },
    {
      threshold: 0,
      rootMargin: "250px 0px -100px 0px"
    }
  );

  document.querySelectorAll(".appearable").forEach(appearable => {
    appearOnScroll.observe(appearable);
  });
}

function showContactEmail() {
  const encryptedAddr = "aW5mb0BhbGRyb3Zzbm93c3BvcnRzLmN6";
  const contactLink = document.querySelector("#contact");
  contactLink.setAttribute("href", "mailto:".concat(atob(encryptedAddr)));
  contactLink.innerHTML = atob(encryptedAddr);
}

function createMap() {
  const center = SMap.Coords.fromWGS84(15.521, 50.687);
  const address = SMap.Coords.fromWGS84(15.5274503, 50.6842158);

  const map = new SMap(JAK.gel("addressMapContainer"), center, 14);
  map.addDefaultLayer(SMap.DEF_BASE).enable();
  map.addDefaultControls();

  const layer = new SMap.Layer.Marker();
  map.addLayer(layer);
  layer.enable();

  const marker = new SMap.Marker(address, "aldrovSnowsports", {title: "Aldrov Snowsports"});
  layer.addMarker(marker);
}

function initEventHandlers() {
  const revealableList = document.querySelectorAll(".revealable");

  revealableList.forEach(item => {
    const btnReveal = item.querySelector(".btn-reveal");

    btnReveal.addEventListener("click", () => {
      const btnRevealContainer = item.querySelector(".btn-reveal-container");

      btnRevealContainer.classList.add("reveal");
      setTimeout(() => btnRevealContainer.classList.add("d-none"), 500);

      item.classList.add("reveal");
      item.style.height = `${item.scrollHeight}px`;
    });
  });
}
