<style>
  :root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255, 255, 255, 0.2);
    --border-color: rgba(255, 255, 255, 0.2);
}
    * {
       box-shadow: none !important;
    }
    #globe-container {
        display: flex;
        align-items: center;
        justify-content: center;
        left: 10%;
        z-index: 10000;
        background: transparent !important;
        box-shadow: none !important;
        filter: none !important;
        backdrop-filter: none !important;
        border: none !important;
    }

    #globe-container canvas {
        background: transparent !important;
        box-shadow: none !important;
        filter: none !important;
        border: none !important;
        outline: none !important;
        pointer-events: auto !important;
    }

    .bubble-animate {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }
    #tooltip {
        position: absolute;
        display: none;
        padding: 6px 12px;
        background: rgba(0, 0, 0, 0.75); 
        color: white;
        border-radius: 6px;
        font-family: sans-serif;
        font-size: 14px;
        pointer-events: none;
        white-space: nowrap;
        z-index: 9999;
    }

    /* فقاعة شفافة دائرية فوق السعودية */
    #saudi-bubble {
      position: absolute;
      width: 50px;
      height: 50px;
      background: rgba(244, 168, 53, 0.25);
      border-radius: 50%;
      backdrop-filter: blur(8px);
      box-shadow:
        0 0 15px rgba(244, 168, 53, 0.6),
        inset 0 0 30px rgba(244, 168, 53, 0.3);
      pointer-events: none;
      z-index: 10000;
      overflow: visible; /* لازم عشان يظهر الموجات */
    }

    /* الحلقات الدائرية (الموجات) */
    .ripple-ring {
      position: absolute;
      border: 2px solid rgba(244, 168, 53, 0.6);
      border-radius: 50%;
      width: 50px;
      height: 50px;
      top: 0;
      left: 0;
      animation: rippleExpand 2s ease-out forwards;
      pointer-events: none;
      opacity: 0.8;
    }

    @keyframes rippleExpand {
      0% {
        transform: scale(1);
        opacity: 0.8;
      }
      100% {
        transform: scale(2.5);
        opacity: 0;
      }
    }

    /* سهم ذيل الفقاعة متجه لأسفل */
    #saudi-bubble::after {
      content: '';
      position: absolute;
      top: -18px; /* تحت الفقاعة */
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 15px solid transparent;
      border-right: 15px solid transparent;
      border-top: 18px solid rgba(244, 168, 53, 0.25);
      filter: drop-shadow(0 0 5px rgba(244, 168, 53, 0.4));
    }

    /* حركة نبض الفقاعة */
    @keyframes bubbleScalePulse {
      0%, 100% {
        transform: scale(1);
        box-shadow:
          0 0 15px rgba(244, 168, 53, 0.6),
          inset 0 0 30px rgba(244, 168, 53, 0.3);
      }
      50% {
        transform: scale(1.1);
        box-shadow:
          0 0 25px rgba(244, 168, 53, 0.9),
          inset 0 0 45px rgba(244, 168, 53, 0.5);
      }
    }

    /* ستايل رسالة الـ chat (خلفية برتقالية + ظل) */
    #chat-message {
      position: absolute;
      display: none;
      background: linear-gradient(135deg, #f4a835 0%, #e07b00 100%);
      color: white;
      padding: 14px 22px;
      border-radius: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 14px;
      max-width: 280px;
      box-shadow: 0 6px 18px rgba(244, 168, 53, 0.6);
      z-index: 11000;
      line-height: 1.4;
      user-select: none;
      cursor: default;
      animation: fadeSlideIn 0.5s ease-out forwards;
      opacity: 0;
      pointer-events: none;
    }

    /* سهم الرسالة (الذي يشير للفقاعة) */
    /*#chat-message::after {
      content: '';
      position: absolute;
      bottom: -14px;
      left: 40px;
      width: 0;
      height: 0;
      border-left: 14px solid transparent;
      border-right: 14px solid transparent;
      border-top: 14px solid #e07b00;
      filter: drop-shadow(0 3px 3px rgba(224, 123, 0, 0.3));
    }*/

    /* أنيميشن الدخول والخروج للرسالة */
    @keyframes fadeSlideIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeSlideOut {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(20px);
      }
    }


    html, body {
        overflow-x: hidden !important;
    }


  .animatedLinkk {
      display: inline-block;
      background: var(--orange);
      color: white;
      font-weight: 600;
      padding: 10px 22px;
      border-radius: 50px;
      font-size: 0.95rem;
      text-decoration: none;
      transition: background 0.3s ease;
  }

  .animatedLinkk:hover {
      background: var(--orange);
  }

@media (max-width: 768px) {
  #globe-container {
    width: calc(100vw - 30px);
    max-width: 460px;
    aspect-ratio: 1 / 1;
    height: auto;
    position: relative;
    left: calc(50% + 7px);      /* زودنا 10px يمين عشان نزيحها من ناحية الشمال */
    transform: translateX(-50%);
    margin-top: -5px;             /* رفع الكرة شوي */
    margin-bottom: 10px;
    border-radius: 50%;
    overflow: hidden;
    background: transparent !important;
    box-shadow: none !important;
  }

  #globe-container canvas {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain;
    border-radius: 50%;
    display: block;
    margin: 0 auto;
    position: relative;
    left: 0 !important;
    transform: none !important;
  }

}

</style>
@if (count($sliders)>0)
<section class="mainSection">


    {{--@if (count($sliders)>0)--}}

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                <!-- orbit canvas -->
                <!--<div id="globe">
                    <canvas></canvas>
                </div>-->
                <div id="globe-container"></div>
                <div id="saudi-bubble"></div>
                <div id="tooltip"></div>
                <div id="chat-message">مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد</div>
                <audio id="chat-sound" src="https://cdn.pixabay.com/audio/2022/03/15/audio_b91f44f395.mp3" preload="auto"></audio>
            </div>
            <div class="col-md-5 order-md-1 p-1">
                <!-- main slider -->
                <div class="mainSlider swiperContainer">
                    <div class="swiper mainSliderContainer">
                        <div class="swiper-wrapper">
                            <!-- swiper-slide -->
                            @foreach($sliders as $slider)

                            <div class="swiper-slide mainSlideItem">
                                <div class="info">
                                    <h1 class="sliderTitle" style="color:#D89835"> {{$slider->title}} </h1>
                                    <p class="hint" style="color:#D89835">
                                        {{$slider->desc}}
                                    </p>

                                    <a href="{{route('all-workers')}}" class="animatedLinkk">
                                        طلب استقدام

                                        <i class="fa-regular fa-arrow-up-left ms-2"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- bubble-animate -->
    <div class="bubble-animate">
        <span class="circle small square1"></span>
        <span class="circle small square2"></span>
        <span class="circle small square3"></span>
        <span class="circle small square4"></span>
        <span class="circle small square5"></span>
        <span class="circle medium square1"></span>
        <span class="circle medium square2"></span>
        <span class="circle medium square3"></span>
        <span class="circle medium square4"></span>
        <span class="circle medium square5"></span>
        <span class="circle large square1"></span>
        <span class="circle large square2"></span>
        <span class="circle large square3"></span>
        <span class="circle large square4"></span>
    </div>
</section>
@else


    <section class="mainSection">


        {{--@if (count($sliders)>0)--}}

        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                    <!-- orbit canvas -->
                    <!--<div id="globe">
                        <canvas></canvas>
                    </div>-->
                    <div id="globe-container"></div>
                    <div id="saudi-bubble"></div>
                    <div id="tooltip"></div>
                    <div id="chat-message">مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد</div>
                    <audio id="chat-sound" src="https://cdn.pixabay.com/audio/2022/03/15/audio_b91f44f395.mp3" preload="auto"></audio>
                </div>
                <div class="col-md-5 order-md-1 p-1">
                    <!-- main slider -->
                    <div class="mainSlider swiperContainer">
                        <div class="swiper mainSliderContainer">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835"> شركة ايجاز للاستقدام  </h1>
                                        <p class="hint" style="color:#D89835">
                                            اكبر شركة للاستقدام في المملكة العربية السعودية
                                        </p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835">خدمات متميزة</h1>
                                        <p class="hint" style="color:#D89835">تعرف علي خدمتنا التي نقدمها لك</p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835">سهولة الاستخدام</h1>
                                        <p class="hint" style="color:#D89835">
                                            ابدأ حجزك واتمم دفعك من خلال الموقع الالكتروني او التواصل معنا
                                            بوقت وجيز وبخطوات مختصرة
                                        </p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- bubble-animate -->
        <div class="bubble-animate">
            <span class="circle small square1"></span>
            <span class="circle small square2"></span>
            <span class="circle small square3"></span>
            <span class="circle small square4"></span>
            <span class="circle small square5"></span>
            <span class="circle medium square1"></span>
            <span class="circle medium square2"></span>
            <span class="circle medium square3"></span>
            <span class="circle medium square4"></span>
            <span class="circle medium square5"></span>
            <span class="circle large square1"></span>
            <span class="circle large square2"></span>
            <span class="circle large square3"></span>
            <span class="circle large square4"></span>
        </div>
    </section>










@endif
<script src="https://unpkg.com/three@0.152.2/build/three.min.js"></script>
<script src="https://unpkg.com/globe.gl"></script>
<script src="https://unpkg.com/topojson@3"></script>
<script>
    
    const emphasizedCountries = {
      231: { iso: 'et', name: 'إثيوبيا', price: '3999' },
      800: { iso: 'ug', name: 'أوغندا', price: '5499' },
      50:  { iso: 'bd', name: 'بنجلاديش', price: '7499' },
      608: { iso: 'ph', name: 'الفلبين', price: '13999' },
      404: { iso: 'ke', name: 'كينيا', price: '5999' },
      356: { iso: 'in', name: 'الهند', price: '3499' },
      144: { iso: 'lk', name: 'سريلانكا', price: '14199' },
      108: { iso: 'bi', name: 'بروندي', price: '4999' },
      682: { iso: 'sa', name: 'المملكة العربية السعودية' }
    };

    const saudiInfo = { id: 682, iso: 'sa', name: 'المملكة العربية السعودية', price: null };

    let backgroundSphere = null;
    let globeBackgroundMaterial = null;
    let currentCountryId = null;
    let firstLoadDone = false;

    const tooltip = document.getElementById('tooltip');
    const chat = document.getElementById('chat-message');
    const sound = document.getElementById('chat-sound');

    const globe = Globe()(document.getElementById('globe-container'))
      .globeImageUrl(null)
      .backgroundColor('white')
      .showAtmosphere(false)
      .globeMaterial(
        new THREE.MeshBasicMaterial({
          color: 0xf4a835,           // برتقالي
          transparent: true,
          opacity: 0.08              // شفافية أخف = أنعم
        })
      )
      .pointAltitude(0.005)
      .pointRadius(0.08)
      .pointColor(() => '#3A60A5')
      .pointsData([]);

    globe.controls().autoRotate = false;
    globe.controls().autoRotateSpeed = 2;


    document.addEventListener('mousemove', e => {
      tooltip.style.left = `${e.pageX + 10}px`;
      tooltip.style.top = `${e.pageY + 10}px`;
    });

    document.addEventListener('click', e => {
      if (!e.target.closest('canvas')) {
        if (backgroundSphere) {
          globe.scene().remove(backgroundSphere);
          backgroundSphere = null;
          currentCountryId = null;
        }
      }
    });

    const dots = [];
    for (let lat = -85; lat <= 85; lat += 2.5) {
      for (let lng = -180; lng <= 180; lng += 2.5) {
        dots.push({ lat, lng });
      }
    }
    globe.pointsData(dots);

    fetch('https://unpkg.com/world-atlas/countries-110m.json')
      .then(res => res.json())
      .then(worldData => {
        const countries = window.topojson.feature(worldData, worldData.objects.countries).features;
        const loader = new THREE.TextureLoader();

        globe
          .polygonsData(countries)
          .polygonCapMaterial(f => {
            const info = emphasizedCountries[parseInt(f.id)];
            if (info) {
              const texture = loader.load(`https://flagcdn.com/w320/${info.iso}.png`);
              return new THREE.MeshBasicMaterial({
                map: texture,
                transparent: true,
                opacity: 0.95,
                side: THREE.DoubleSide
              });
            }
            return new THREE.MeshBasicMaterial({ color: 'white', transparent: true, opacity: 0.01 });
          })
          .polygonStrokeColor(f => emphasizedCountries[f.id] ? '#0a4aad' : '#999')
          .polygonAltitude(f => emphasizedCountries[f.id] ? 0.03 : 0.001)
          .onPolygonHover(f => {
            if (f) {
              const id = parseInt(f.id);
              const info = emphasizedCountries[id];
              if (info && info.price) {
                tooltip.innerText = `${info.name} - سعر الاستقدام: ${info.price} ريال`;
              } else if (id === saudiInfo.id) {
                tooltip.innerText = `مرحباً بكم في المملكة العربية السعودية - شركة إيجاز ترحب بكم`;
              } else {
                tooltip.innerText = f.properties.name || 'غير معروف';
              }
              tooltip.style.display = 'block';
            } else {
              tooltip.style.display = 'none';
            }
          })
          .onPolygonClick(f => {
            const id = parseInt(f.id);
            if (!emphasizedCountries[id]) return;

            if (currentCountryId === id) {
              if (backgroundSphere) globe.scene().remove(backgroundSphere);
              backgroundSphere = null;
              currentCountryId = null;
              return;
            }

            const { iso, name, price } = emphasizedCountries[id];
            const flagTexture = loader.load(`https://flagcdn.com/w320/${iso}.png`, () => {
              if (backgroundSphere) globe.scene().remove(backgroundSphere);
              drawFlagSphere(iso, `${name} - ${price} ريال`);
              currentCountryId = id;
            });
          });

        // تركيز الكاميرا على السعودية عند أول تحميل
        const saudiFeature = countries.find(c => parseInt(c.id) === saudiInfo.id);
        if (saudiFeature && !firstLoadDone) {
          firstLoadDone = true;

          setTimeout(() => {
            globe.pointOfView({ lat: 23.8859, lng: 45.0792, altitude: 1.7 }, 2000);

            setTimeout(() => {
              drawFlagSphere('sa', 'مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد');
              showSaudiMessage();

              setTimeout(() => {
                if (backgroundSphere) globe.scene().remove(backgroundSphere);
                globe.controls().autoRotate = true;
                globe.pointOfView({ lat: 0, lng: 0, altitude: 1.9 }, 2000);
              }, 3000);

            }, 2000);
          }, 1000);
        }
      });

    function drawFlagSphere(iso, messageText) {
      const canvas = document.createElement('canvas');
      canvas.width = 1024;
      canvas.height = 512;
      const ctx = canvas.getContext('2d');

      const img = new Image();
      img.crossOrigin = 'anonymous';
      img.src = `https://flagcdn.com/w320/${iso}.png`;
      img.onload = () => {
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
        ctx.fillRect(0, canvas.height - 80, canvas.width, 80);
        ctx.fillStyle = 'white';
        ctx.font = 'bold 30px sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(messageText, canvas.width / 2, canvas.height - 30);

        const finalTexture = new THREE.CanvasTexture(canvas);
        globeBackgroundMaterial = new THREE.MeshBasicMaterial({
          map: finalTexture,
          transparent: true,
          opacity: 0.8,
          side: THREE.DoubleSide
        });

        backgroundSphere = new THREE.Mesh(
          new THREE.SphereGeometry(globe.getGlobeRadius() * 1.01, 75, 75),
          globeBackgroundMaterial
        );
        globe.scene().add(backgroundSphere);
      };
    }

    /*function showSaudiMessage() {
      const coords = globe.getScreenCoords(23.8859, 45.0792);
      if (!coords) return;

      chat.style.left = `${coords.x - 370}px`;
      chat.style.top = `${coords.y - 100}px`;

      chat.style.display = 'block';
      chat.style.animation = 'fadeSlideIn 0.5s ease-out forwards';

      sound.currentTime = 0;
      sound.play();

      setTimeout(() => {
        chat.style.animation = 'fadeSlideOut 0.5s ease-in forwards';
        setTimeout(() => {
          chat.style.display = 'none';
        }, 500);
      }, 3000);
    }*/

    function showSaudiMessage() {
      const coords = globe.getScreenCoords(23.8859, 45.0792);
      if (!coords) return;

      const bubble = document.getElementById('saudi-bubble');
      const chat = document.getElementById('chat-message');
      const sound = document.getElementById('chat-sound');

      // تحديد إحداثيات حسب نوع الجهاز
      let bubbleLeft, bubbleTop, chatLeft, chatTop;
      console.log('Window width:', window.innerWidth);

      if (window.innerWidth <= 768) {

        console.log('Using mobile coordinates');
        // موبايل - عدل القيم هنا حسب حاجتك
        bubbleLeft = coords.x - 35;
        bubbleTop = coords.y - 150;
        chatLeft = coords.x - 80;
        chatTop = coords.y - 250;
      } else {
        // ديسكتوب
        bubbleLeft = coords.x - 350;
        bubbleTop = coords.y - 30;
        chatLeft = coords.x - 370;
        chatTop = coords.y - 130;
      }

      bubble.style.left = `${bubbleLeft}px`;
      bubble.style.top = `${bubbleTop}px`;
      bubble.style.opacity = '1';
      bubble.style.display = 'block';
      bubble.style.animation = 'bubbleScalePulse 1.5s ease-in-out infinite';

      chat.style.display = 'none';
      chat.style.opacity = '0';
      chat.style.pointerEvents = 'none';

      setTimeout(() => {
        chat.style.left = `${chatLeft}px`;
        chat.style.top = `${chatTop}px`;
        chat.style.display = 'block';
        chat.style.pointerEvents = 'auto';
        chat.style.animation = 'fadeSlideIn 0.6s ease-out forwards';
        chat.style.opacity = '1';

        sound.currentTime = 0;
        sound.play();
      }, 700);

      setTimeout(() => {
        chat.style.animation = 'fadeSlideOut 0.6s ease-in forwards';
        chat.style.opacity = '0';
        chat.style.pointerEvents = 'none';

        bubble.style.transition = 'opacity 0.6s ease-in';
        bubble.style.opacity = '0';

        setTimeout(() => {
          chat.style.display = 'none';
          bubble.style.display = 'none';
          bubble.style.animation = '';
          bubble.style.opacity = '1';
        }, 600);
      }, 3700);
    }


    function createRippleEffect() {
      const bubble = document.getElementById('saudi-bubble');
      if (!bubble) return;

      const ripple = document.createElement('div');
      ripple.className = 'ripple-ring';
      bubble.appendChild(ripple);

      // إزالة الحلقة بعد انتهاء الأنيميشن
      ripple.addEventListener('animationend', () => {
        ripple.remove();
      });
    }

    // تكرار إنشاء الحلقات كل 600ms
    const rippleInterval = setInterval(createRippleEffect, 600);

    // لو حبيت توقف التكرار بعد فترة مثلا:
// setTimeout(() => clearInterval(rippleInterval), 10000);



  </script>