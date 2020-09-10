<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>carousel</title>
    <link rel="stylesheet" type="text/css" href="./Css/Im_Ui.css?refresh=<?php echo rand(2, 200) ?>" >
    <style>
      @import url("https://fonts.googleapis.com/css2?family=VT323&display=swap");
* {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}
html {
  font-size: 62.5%;
  background-image: url(Fond.jpg);
  background-attachment: fixed;
}
body {
  width: 100%;
  max-width: 1024px;
  min-height: 870px;
  margin: auto;
}

/* styles pour le carrousel : */
.carousel {
  position: relative;
  width: 100%;
  cursor: pointer;
}
.carousel .indicators {
  width: 100%;
  margin: 0 auto;
  position: absolute;
  bottom: 1rem;
  z-index: 4;
  text-align: center;
  opacity: 0.5;
}
.carousel .indicators > span {
  display: inline-block;
  background-color: black;
  border-radius: 50%;
  border: 4px solid white;
  width: 2rem;
  height: 2rem;
}
.carousel .indicators > span.active {
  background-color: white;
  border: 4px solid black;
}
.carousel > .slides > * {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: all 1s;
  z-index: 0;
  width: 100%;
}
.carousel .slides > *.active {
  position: relative;
  opacity: 1;
  z-index: 2;
}
.carousel .slides > *.in {
  z-index: 1;
  opacity: 1;
}
.carousel .slides > *.out {
  opacity: 1;
  z-index: 2;
}
.carousel .arrow {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  color: white;
  font-size: 1rem;
  font-weight: 900;
  background-color: black;
  border-radius: 50%;
  top: calc(50% - 1.5rem);
  border: 4px solid white;
  width: 3rem;
  height: 3rem;
  z-index: 2;
  opacity: 0;
  transition: opacity 1s;
}
.carousel:hover .arrow {
  opacity: 1;
}
.carousel .arrow.left {
  left: 1rem;
}
.carousel .arrow.right {
  right: 1rem;
}
.carousel img {
  max-width: 100%;
}
    <style/>
  </head>
  <body>
    
      <div class="carousel" data-interval="5000">
        <div class="slides">
          <div class="active">
            <img src="./img01.jpg" alt="01" />
          </div>
          <div>
            <img src="./img02.jpg" alt="02" />
          </div>
          <div>
            <img src="./img03.jpg" alt="03" />
          </div>
          <div>
            <img src="./img04.jpg" alt="04" />
          </div>
          <div>
            <img src="./img05.jpg" alt="05" />
          </div>
        </div>
        <div class="arrow left">◀</div>
        <div class="arrow right">▶</div>
        <div class="indicators"></div>
      </div>
      
    <script>
      function carouselHandler(carousel) {
  //let carousel = document.querySelector(".carousel");
  let slides = carousel.querySelectorAll(".slides > *");
  let indicators;
  let currentSlide = 0;

  let intervalHandler;
  carousel.addEventListener("mouseover", pause);
  carousel.addEventListener("mouseout", autoplay);
  carousel
    .querySelector(".arrow.left")
    .addEventListener("click", previousSlide);
  carousel.querySelector(".arrow.right").addEventListener("click", nextSlide);

  carousel.querySelector(".indicators").innerHTML = "<span></span>".repeat(
    slides.length
  );

  indicators = carousel.querySelectorAll(".indicators > span");

  indicators.forEach((element, index) => {
    //function (element) { }
    element.addEventListener("click", function () {
      setSlide(index);
    });
  });

  setSlide(currentSlide);
  autoplay();

  function autoplay() {
    intervalHandler = setInterval(nextSlide, carousel.dataset.interval);
  }

  function pause() {
    clearInterval(intervalHandler);
  }
  function nextSlide() {
    index = (currentSlide + 1) % slides.length;
    setSlide(index);
  }
  function previousSlide() {
    index = (slides.length + currentSlide - 1) % slides.length;
    setSlide(index);
  }

  function setSlide(index) {
    
    let activeSlide = carousel.querySelector(".slides > .active");

    activeSlide.classList.remove("active");
    indicators[currentSlide].classList.remove("active");

    slides[index].classList.add("active");
    indicators[index].classList.add("active");
    currentSlide = index;
  }

  function getElementIndex(element) {
    return [...element.parentNode.children].indexOf(element);
  }
}

document.querySelectorAll(".carousel").forEach((carousel) => {
  carouselHandler(carousel);
});
      </script>
  </body>
</html>

