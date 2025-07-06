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

    #chat-message {
        position: absolute;
        display: none;
        background: #f1f4f9;
        color: #1a1a1a;
        padding: 12px 16px;
        border-radius: 12px;
        font-family: 'Segoe UI', sans-serif;
        font-size: 14px;
        max-width: 300px;
        z-index: 9999;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        animation: fadeSlideIn 0.7s ease-out forwards;
        opacity: 0;
    }

    #chat-message::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 30px;
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #f1f4f9;
    }

    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateY(20px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    @keyframes fadeSlideOut {
        from { opacity: 1; transform: translateY(0) scale(1); }
        to { opacity: 0; transform: translateY(10px) scale(0.95); }
    }
    html, body {
        overflow-x: hidden !important;
    }

    @media (max-width: 768px) {
      #globe-container {
        margin-top: -60px;
        transform: scale(0.75); /* لو عايز تصغير كمان */
        transform-origin: center;
      }

      #chat-message {
        font-size: 12px;
        max-width: 260px;
      }
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

    function showSaudiMessage() {
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
    }

  </script>