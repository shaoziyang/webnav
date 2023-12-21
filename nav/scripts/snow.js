document.addEventListener('DOMContentLoaded', function() {
  (function() {
    function snowFlakes(domElement) {
      const SNOWFLAKES = 50;
      const MAX = 100;
      const ITERATION_ADD = 10;

      var first = true, countRemoved = 0, snowflakeCountContainerElement, snowflakeCountElement, santaElement;

      for (var i = 0; i < SNOWFLAKES; i++) {
        domElement.appendChild(createASnowflake(first));
        first = false;
      }

      if (typeof(Storage) !== "undefined") {
        if(localStorage.getItem("flakeCounter") !== undefined) {
          var temp = parseInt(localStorage.getItem("flakeCounter"));
          if (temp > 0) {
            countRemoved=temp;
            updateCounter();
          }
        }
      }

      function randomInteger(low, high) {
        return low + Math.floor(Math.random() * (high - low));
      }

      function randomFloat(low, high) {
        return low + Math.random() * (high - low);
      }

      function randomItem(items) {
        return items[randomInteger(0, items.length - 1)];
      }

      function durationValue(value) {
        return value + 's';
      }

      function createASnowflake(is_first) {
        var flakes = [ '&#x2745;&#xfe0e;' ];
        var sizes = [ 'tiny', 'tiny', 'tiny', 'tiny', 'tiny', 'small', 'small', 'small', 'small', 'medium', 'medium', 'medium', 'medium', 'large' ];

        var snowflakeElement = document.createElement('span');
        snowflakeElement.className = 'snowflake ' + randomItem(sizes);

        var snowflake = document.createElement('span');
        snowflake.innerHTML = randomItem(flakes);
        snowflakeElement.appendChild(snowflake);

        var spinAnimationName = (Math.random() < 0.5) ? 'clockwiseSpin' : 'counterclockwiseSpin';
        var anchorSide = (Math.random() < 0.5) ? 'left' : 'right';
        var fadeAndDropDuration = durationValue(randomFloat(30, 40));
        var spinDuration = durationValue(randomFloat(4, 8));
        var flakeDelay = is_first ? 0 : durationValue(randomFloat(0, 10));

        snowflakeElement.style.animationName = 'fade, drop';
        snowflakeElement.style.animationDuration = fadeAndDropDuration + ', ' + fadeAndDropDuration;
        snowflakeElement.style.animationDelay = flakeDelay;

        snowflakeElement.style[anchorSide] = randomInteger(anchorSide === 'left' ? 0 : 3, 60) + '%';

        snowflake.style.animationName = spinAnimationName;
        snowflake.style.animationDuration = spinDuration;

        snowflakeElement.onmouseenter = function() {
          countRemoved++;
          domElement.removeChild(this);
          domElement.appendChild(createASnowflake(false));
          var countOfFlakes = document.querySelectorAll('.snowflake').length;
          if (countRemoved % ITERATION_ADD === 0 && countOfFlakes < MAX) {
            domElement.appendChild(createASnowflake(false));
          }
          updateCounter();
        };
        return snowflakeElement;
      }

      function updateCounter() {
        var countOfFlakes = document.querySelectorAll('.snowflake').length;
        if (typeof(Storage) !== "undefined") {
          localStorage.setItem("flakeCounter", countRemoved);
        }
        if ((countRemoved + countOfFlakes) % 24 === 0) {
          goSanta();
        }
      }

      function goSanta() {
        if (!santaElement) {
          santaElement = document.createElement('div');
          santaElement.className = 'snowflakeSanta';
          var innerSantaElement = document.createElement('div');
          innerSantaElement.className = 'innerSanta';
          santaElement.appendChild(innerSantaElement);
          var starsElement = document.createElement('div');
          starsElement.className = 'santatail';
          innerSantaElement.appendChild(starsElement);
          santaElement.appendChild(innerSantaElement);
          document.body.appendChild(santaElement);
          santaElement.addEventListener("animationend", function () {
            if (santaElement) {
              santaElement.remove();
              santaElement = undefined;
              document.body.appendChild(createASnowflake(false));
              updateCounter();
            }
          });
        }
      }
    }
    snowFlakes(document.body);
  })();
}, true);
