/* jshint esversion: 6 */

import lazysizes from 'lazysizes';
import optimumx from 'lazysizes';
require('../../node_modules/lazysizes/plugins/object-fit/ls.object-fit.js');
import Flickity from 'flickity';
import throttle from 'lodash.throttle';
import debounce from 'lodash.debounce';

const freezeVp = (e) => {
  e.preventDefault();
};

const stopBodyScrolling = (bool) => {
  if (bool === true) {
    document.body.addEventListener("touchmove", freezeVp, false);
  } else {
    document.body.removeEventListener("touchmove", freezeVp, false);
  }
};

const App = {
  header: null,
  siteTitle: null,
  boardSlider: null,
  initialize: () => {
    App.header = document.querySelector("header");
    App.siteTitle = document.querySelector("#site-title");
    App.menu = document.getElementById("menu");
    App.interact.init();
    document.getElementById("loader").style.display = 'none';
  },
  interact: {
    init: () => {
      App.interact.linkTargets()
      App.interact.eventTargets()
      App.interact.embedKirby()
      App.interact.videoPlayers.init()
      App.interact.loadSliders()
    },
    eventTargets: () => {
      App.interact.menuBurger()
    },
    linkTargets: () => {
      document.querySelectorAll("a").forEach(function(element, index) {
        if (element.host !== window.location.host) {
          element.setAttribute('target', '_blank');
        } else {
          element.setAttribute('target', '_self');
        }
      });
    },
    videoPlayers: {
      init: () => {
        const videos = document.getElementsByClassName('video-player');
        if (videos.length < 1) return;

        const hls = [];

        const attachStream = (videoElement) => {
          if (videoElement.getAttribute('data-stream') && Hls.isSupported()) {
            hls[i] = new Hls({
              minAutoBitrate: 1700000
            });
            hls[i].loadSource(videoElement.getAttribute('data-stream'));
            hls[i].attachMedia(videoElement);
          }
        };
        const togglePlay = (videoElement) => {
          if (videoElement.paused) {
            videoElement.play();
            videoElement.classList.add('playing');
          } else {
            videoElement.pause();
            videoElement.classList.remove('playing');
          }
        };

        for (var i = 0; i < videos.length; i++) {
          const videoElement = videos[i].querySelector('video');
          const videoPlayButton = videos[i].querySelector('.play-button');
          videoElement.controls = false;
          attachStream(videoElement);
          videoPlayButton.addEventListener('click', () => {
            togglePlay(videoElement);
          });
        }

        // const options = {
        //   controls: ['play-large'],
        //   clickToPlay: false,
        //   iconUrl: _root + "/assets/images/plyr.svg"
        // };
        // App.players = Array.from(document.querySelectorAll('.js-player')).map(player => new Plyr(player, options));

      },
      pause: () => {
        App.players.forEach((el) => {
          el.pause();
        });
      }
    },
    menuBurger: () => {
      const burger = document.getElementById('burger');
      if (burger) {
        burger.addEventListener('click', () => {
          document.body.classList.toggle("menu-on");
          burger.classList.toggle("opened");

        // if (burger.classList.contains("opened")) {
        //   App.interact.menu.on();
        // } else {
        //   App.interact.menu.off();
        // }
        });
      }
    },
    menu: {
      on: () => {
        stopBodyScrolling(true);
        App.container.style.marginBottom = "0px";
        App.menuOver.classList.add('opened');
        new TimelineLite().set(App.menuOver, {
          autoAlpha: 1,
        }).fromTo(App.menuOver, 0.5, {
          yPercent: 100,
          force3D: true,
        }, {
          yPercent: 0,
          force3D: true,
          ease: Power3.easeInOut
        });
      },
      off: () => {
        stopBodyScrolling(false);
        burger.classList.remove("opened");
        App.menuOver.classList.remove('opened');
        new TimelineLite().fromTo(App.menuOver, 0.5, {
          yPercent: 0,
          force3D: true,
        }, {
          yPercent: 100,
          force3D: true,
          ease: Power3.easeInOut
        }).set(App.menuOver, {
          autoAlpha: 0,
          onComplete: App.sizeSet
        });
      }
    },
    embedKirby: () => {
      var pluginEmbedLoadLazyVideo = function() {
        var e = this.parentNode,
          d = e.children[0];
        d.src = d.dataset.src, e.removeChild(this)
      };
      for (var d = document.getElementsByClassName("embed__thumb"), t = 0; t < d.length; t++) d[t].addEventListener("click", pluginEmbedLoadLazyVideo, !1)
    },
    loadSliders: () => {
      const initFlickity = (element) => {
        var slider = new Flickity(element, {
          cellSelector: '.slide',
          imagesLoaded: true,
          lazyLoad: 1,
          setGallerySize: false,
          adaptiveHeight: false,
          percentPosition: true,
          accessibility: true,
          wrapAround: true,
          prevNextButtons: !Modernizr.touchevents,
          pageDots: false,
          draggable: Modernizr.touchevents,
          dragThreshold: 30
        });
        slider.slidesCount = slider.slides.length;
        if (slider.slidesCount < 1) return; // Stop if no slides
        slider.on('select', function() {
          // $('#slide-number').html((slider.selectedIndex + 1) + '/' + slider.slidesCount);
          if (this.selectedElement) {
            this.element.parentNode.querySelector(".caption").innerHTML = this.selectedElement.getAttribute("data-caption");
          }
          var adjCellElems = this.getAdjacentCellElements(1);
          for (var i = 0; i < adjCellElems.length; i++) {
            var adjCellImgs = adjCellElems[i].querySelectorAll('.lazy:not(.lazyloaded):not(.lazyload)')
            for (var j = 0; j < adjCellImgs.length; j++) {
              adjCellImgs[j].classList.add('lazyload')
            }
          }
        });
        slider.on('staticClick', function(event, pointer, cellElement, cellIndex) {
          if (!cellElement || !Modernizr.touchevents || cellElement.getAttribute('data-media') == "video") {
            return;
          } else {
            this.next();
          }
        });
        let prevNextButtons = slider.element.querySelectorAll(".flickity-prev-next-button");
        prevNextButtons.forEach((el) => {
          let cursor = document.createElement('div');
          cursor.className = "cursor";
          el.appendChild(cursor);
          el.addEventListener('mousemove', () => {
            if (!Modernizr.touchevents) {
              let rect = el.getBoundingClientRect();
              cursor.style.top = event.pageY - rect.top - window.scrollY + "px";
              cursor.style.left = event.pageX - rect.left - window.scrollX + "px";
            }
          });

        })
        if (slider.selectedElement) {
          slider.element.parentNode.querySelector(".caption").innerHTML = slider.selectedElement.getAttribute("data-caption");
        }
      }
      var flickitys = [];
      var elements = document.querySelectorAll('.slider');
      if (elements.length > 0) {
        for (var i = 0; i < elements.length; i++) {
          initFlickity(elements[i]);
        }
      }
    }
  }
}

document.addEventListener("DOMContentLoaded", App.initialize);