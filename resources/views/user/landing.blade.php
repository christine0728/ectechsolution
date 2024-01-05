<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      
body {
  width: 100%;
  height: 100vh;
  font-family: 'Your Font', sans-serif;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.787);
  
}

button {
  border: none;
  background: none;
  cursor: pointer;
}
button:focus {
  outline: none;
  border: none;
}

.app {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.app__bg {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -5;
  filter: blur(8px);
  pointer-events: none;
  user-select: none;
  overflow: hidden;
}
.app__bg::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000;
  z-index: 1;
  opacity: 0.8;
}
.app__bg__image {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) translateX(var(--image-translate-offset, 0));
  width: 180%;
  height: 180%;
  transition: transform 1000ms ease, opacity 1000ms ease;
  overflow: hidden;
}
.app__bg__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.app__bg__image.current--image {
  opacity: 1;
  --image-translate-offset: 0;
}
.app__bg__image.previous--image, .app__bg__image.next--image {
  opacity: 0;
}
.app__bg__image.previous--image {
  --image-translate-offset: -25%;
}
.app__bg__image.next--image {
  --image-translate-offset: 25%;
}

.cardList {
  position: absolute;
  width: calc(3 * var(--card-width));
  height: auto;
}
.cardList__btn {
  --btn-size: 35px;
  width: var(--btn-size);
  height: var(--btn-size);
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 100;
}
.cardList__btn.btn--left {
  left: -5%;
}
.cardList__btn.btn--right {
  right: -5%;
}
.cardList__btn .icon {
  width: 100%;
  height: 100%;
}
.cardList__btn .icon svg {
  width: 100%;
  height: 100%;
}
.cardList .cards__wrapper {
  position: relative;
  width: 100%;
  height: 100%;
  perspective: 1000px;
}

.card {
  --card-translateY-offset: 100vh;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) translateX(var(--card-translateX-offset)) translateY(var(--card-translateY-offset)) rotateY(var(--card-rotation-offset)) scale(var(--card-scale-offset));
  display: inline-block;
  width: var(--card-width);
  height: var(--card-height);
  transition: transform var(--card-transition-duration) var(--card-transition-easing);
  user-select: none;
}
.card::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000;
  z-index: 1;
  transition: opacity var(--card-transition-duration) var(--card-transition-easing);
  opacity: calc(1 - var(--opacity));
}
.card__image {
  position: relative;
  width: 100%;
  height: 100%;
}
.card__image img {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.card.current--card {
  --current-card-rotation-offset: 0;
  --card-translateX-offset: 0;
  --card-rotation-offset: var(--current-card-rotation-offset);
  --card-scale-offset: 1.2;
  --opacity: 0.8;
}
.card.previous--card {
  --card-translateX-offset: calc(-1 * var(--card-width) * 1.1);
  --card-rotation-offset: 25deg;
}
.card.next--card {
  --card-translateX-offset: calc(var(--card-width) * 1.1);
  --card-rotation-offset: -25deg;
}
.card.previous--card, .card.next--card {
  --card-scale-offset: 0.9;
  --opacity: 0.4;
}

.infoList {
  position: absolute;
  width: calc(3 * var(--card-width));
  height: var(--card-height);
  pointer-events: none;
}
.infoList .info__wrapper {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: flex-start;
  align-items: flex-end;
  perspective: 1000px;
  transform-style: preserve-3d;
}

.info {
  margin-bottom: calc(var(--card-height) / 8);
  margin-left: calc(var(--card-width) / 1.5);
  transform: translateZ(2rem);
  transition: transform var(--card-transition-duration) var(--card-transition-easing);
}
.info .text {
  position: relative;
  font-family: "Montserrat";
  font-size: calc(var(--card-width) * var(--text-size-offset, 0.2));
  white-space: nowrap;
  color: #fff;
  width: fit-content;
}
.info .name,
.info .location {
  text-transform: uppercase;
}
.info .location {
  font-weight: 800;
}
.info .location {
  --mg-left: 40px;
  --text-size-offset: 0.12;
  font-weight: 600;
  margin-left: var(--mg-left);
  margin-bottom: calc(var(--mg-left) / 2);
  padding-bottom: 0.8rem;
}
.info .location::before, .info .location::after {
  content: "";
  position: absolute;
  background: #fff;
  left: 0%;
  transform: translate(calc(-1 * var(--mg-left)), -50%);
}
.info .location::before {
  top: 50%;
  width: 20px;
  height: 5px;
}
.info .location::after {
  bottom: 0;
  width: 60px;
  height: 2px;
}
.info .description {
  --text-size-offset: 0.065;
  font-weight: 500;
}
.info.current--info {
  opacity: 1;
  display: block;
}
.info.previous--info, .info.next--info {
  opacity: 0;
  display: none;
}

.loading__wrapper {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: #000;
  z-index: 200;
}
.loading__wrapper .loader--text {
  color: #fff;
  font-family: "Montserrat";
  font-weight: 500;
  margin-bottom: 1.4rem;
}
.loading__wrapper .loader {
  position: relative;
  width: 200px;
  height: 2px;
  background: rgba(255, 255, 255, 0.25);
}
.loading__wrapper .loader span {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: red;
  transform: scaleX(0);
  transform-origin: left;
}

@media only screen and (min-width: 800px) {
  :root {
    --card-width: 250px;
    --card-height: 400px;
  }
  .desc{
    font-size:9px;
  }
  .app__bg__image {
    width: 100%;
    height: 100%;
  }

  .cardList {
    width: calc(3 * var(--card-width));
  }

  .infoList {
    width: calc(3 * var(--card-width));
    height: var(--card-height);
  }
}

.support {
  position: absolute;
  right: 10px;
  bottom: 10px;
  padding: 10px;
  display: flex;
}
.support a {
  margin: 0 10px;
  color: #fff;
  font-size: 1.8rem;
  backface-visibility: hidden;
  transition: all 150ms ease;
}
.support a:hover {
  transform: scale(1.1);
}
.nav-link{
  color: black;
}
    .navbar-nav .nav-link {
      color: white; /* Set the color to gold */
    }
  
    body {
	font-family: sans-serif;
}
.nav-item.active {
    /* Your styling for the active link */
    background-color: #d4af37;
}

nav {
	display: flex;
	align-items: center;
	background: #00A9D4;
	height: 60px;
	position: relative;
}
.icon {
	cursor: pointer;
	margin-right: 50px;
	line-height: 60px;
}
.icon span {
	background: #f00;
	padding: 7px;
	border-radius: 50%;
	color: #fff;
	vertical-align: top;
	margin-left: -25px;
}
.icon img {
	display: inline-block;
	width: 40px;
	margin-top: 20px;
}
.icon:hover {
	opacity: .7;
}

.logo {
	flex: 1;
	margin-left: 50px;
	color: #eee;
	font-size: 20px;
	font-family: monospace;
}

.notifi-box {
	width: 300px;
	height: 0px;
	opacity: 0;
	position: absolute;
	top: 63px;
	right: 35px;
  z-index: 100;
  background:white;
	transition: 1s opacity, 250ms height;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
	font-size: 14px;
	padding: 10px;
	border-bottom: 1px solid #eee;
	color: #999;
}
.notifi-box h2 span {
	color: #f00;
}
.notifi-item {
	display: flex;
	border-bottom: 1px solid #eee;
	padding: 15px 5px;
	margin-bottom: 15px;
	cursor: pointer;
}
.notifi-item:hover {
	background-color: #eee;
}
.notifi-item img {
	display: block;
	width: 50px;
	margin-right: 10px;
	border-radius: 50%;
}
.notifi-item .text h4 {
	color: #777;
	font-size: 16px;
	margin-top: 10px;
}
.notifi-item .text p {
	color: #aaa;
	font-size: 12px;
}
    </style>
</head>
<body>

@include('/user/nav')
    <div class="app">
         <div class="cardList">
        <button class="cardList__btn btn btn--left">
            <div class="icon">
                <svg>
                    <use xlink:href="#arrow-left"></use>
                </svg>
            </div>
        </button>

        <div class="cards__wrapper">
            <div class="card current--card">
                <div class="card__image">
                    <img src="{{ asset('/assets/img/makeup2.jpg') }}"alt="" />
                </div>
            </div>

            <div class="card next--card">
                <div class="card__image">
                    <img src="{{ asset('/assets/img/rebond.jpg') }}" alt="" />
                </div>
            </div>

            <div class="card previous--card">
                <div class="card__image">
                <img src="{{ asset('/assets/img/makeup5.jpg') }}" alt="" />
                </div>
            </div>
        </div>

        <button class="cardList__btn btn btn--right">
            <div class="icon">
                <svg>
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </div>
        </button>
    </div>

    <div class="infoList">
        <div class="info__wrapper">
            <div class="info current--info">
                <h1 class="text name">Make up</h1>
                <h4 class="text location">Elegance</h4>
               
              </div>

            <div class="info next--info">
                <h1 class="text name">Rebond</h1>
                <h4 class="text location">Hair Transformation</h4>
                <!-- <p class="text description" id="desc"> Say goodbye to frizz and unruly locks and say hello to sleek, shiny, and manageable hair. Book your rebonding session with us today and rediscover your hair's natural beauty.</p>
             -->
              </div>

            <div class="info previous--info">
            <h1 class="text name">Make up</h1>
            <h4 class="text location">Elegance</h4>
            <!-- <p class="text description" id="desc">Let us be a part of your beauty journey, and experience the magic of makeup artistry. Book your appointment today and get ready to shine!</p> -->

            </div>
        </div>
    </div>


    <div class="app__bg">
        <div class="app__bg__image current--image">
            <img src="https://media.gettyimages.com/id/1308731271/photo/majestic-viewpoint-of-jodhpur-mehrangarh-fort-and-jaswant-thada-rajasthan-india.jpg?s=612x612&w=0&k=20&c=zG7AezWK8A86RO2lxByeysnRveI-6AOubh8W6BWe_8I=" alt="" />
        </div>
        <div class="app__bg__image next--image">
            <img src="https://w0.peakpx.com/wallpaper/307/324/HD-wallpaper-aerial-of-machu-picchu-peru.jpg" alt="" />
        </div>
        <div class="app__bg__image previous--image">
            <img src="https://source.unsplash.com/m7K4KzL5aQ8" alt="" />
        </div>
    </div>
    </div>
    <div class="loading__wrapper">
        <div class="loader--text">Please Wait...</div>
        <div class="loader">
            <span></span>
        </div>
    </div>
   
    <svg class="icons" style="display: none;">
        <symbol id="arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <polyline points="328 112 184 256 328 400" style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px" />
        </symbol>
        <symbol id="arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <polyline points="184 112 328 256 184 400" style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px" />
        </symbol>
    </svg>
   
</body>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/gsap.min.js"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
