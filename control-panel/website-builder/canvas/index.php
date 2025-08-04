
<style>
    *, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  transition: all 500ms ease-in-out;
  scroll-behavior: smooth;
}
html, body {
  height: 100vh;
  margin:  0;
}
body {
  background: #EAEAEA;
  font-family: Wensley;
}
#app {
  width: 100%;
  width: max(100%, 1100px);
  height: 100%;
  /* overflow: scroll; */
}
.container {
  width: 88.88%;
  margin: 0 auto;
}
a {
  display: block;
  color: inherit;
}



header {
  height: 13%;
  height: clamp(4rem, 13%, 7rem);
  display: flex;
}
.header_content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav {
  width: 540px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav a {
  text-decoration: none;
  font-size: 1.2em;
  position: relative;
}
nav a::after {
  content: "";
  position: absolute;
  bottom: -20%;
  /* left: 0;
  width: 50%; */
  height: 2px;
  background: #000;
}
nav .link:hover a::after {
  animation: underline 700ms cubic-bezier(.85,.23,.4,1.13);
}
@keyframes underline {
  0% {
    left: 0;
    width: 0;
  }
  45% {
    width: 100%;
  }
  55% {
    width: 100%;
  }
  100% {
    right: 0;
    width: 0;
  }
}
nav .link:last-child a {
  background: #000;
  color: #fff;
  padding: .5em .9em;
  border-radius: 4px;
  position: relative;
}
nav .link:last-child a::after {
  content: "";
  position: absolute;
  top: 0;
  height: 100%;
  background: #fff6;
}
nav .link:last-child:hover a::after {
  animation: fill 700ms cubic-bezier(.85,.23,.4,1.13);
}




.hero {
  margin-top: 3%;
  width: 100%;
  height: clamp(733px, 87%, 960px);
}
.hero_content {
  height: 85%;
  position: relative;
}
.hero-description {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.hero-text {
  display: flex;
  align-items: center;
  z-index: 1;
}
.hero h1 {
  width: 50%;
  height: 40.25%;
  font-size: clamp(6.3em, 7.9em, 9vw);
  line-height: .95em;
}
.hero h2 {
  width: 48%;
  height: 35%;
  font-size: clamp(3.5em, 4.2vw, 4.2em);
  font-weight: 500;
}
.hero p {
  width: 38.125%;
  height: 15%;
  font-size: 1.36em;
  line-height: 1.4em;
  color: #000b;
}
.hero img {
  position: absolute;
  object-fit: cover;
}
.hero-1 {
  top: 0;
  right: clamp(40vh, 39%, 23vw);
  height: 100%;
}
.hero-2 {
  right: 0;
  height: 75.305%;
  top: 50%;
  transform: translateY(-50%);
}




.classics-top {
  margin-top: 7%;
  width: 100%;
  height: 800px;
  position: relative;
}
.classics-top-content {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: flex-end;
}
.classics-top img {
  width: 100%;
  object-fit: cover;
}
.classics-top h1 {
  width: 57.66%;
  margin-bottom: 7.5%;
  font-size: 7.9em;
  line-height: .95em;
}
.classics-card {
  width: 42.34%;
  height: 55.56%;
  padding: 2.5em;
  background: #EAEAEA;
}
.classics-card h2 {
  font-size: 4em;
}
.classics-card p {
  font-size: 1.5em;
}




.collection {
  margin-top: 5%;
  height: 700px;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}
card {
  width: 28.6%;
  height: 79.33%;
  display: flex;
  flex-direction: column;
  /* justify-content: space-between; */
  margin-bottom: 5%;
}
card:nth-of-type(2) {
  margin-bottom: 10%;
}
card p {
  margin-top: 1em;
  font-size: 2em;
}
card a {
  margin-top: .4em;
  font-size: 1.25em;
  width: fit-content;
  position: relative;
}
card a::after {
  content: "";
  position: absolute;
  bottom: -20%;
  height: 2px;
  background: #ce964f;
}
card:first-of-type a::after {
  background: #beb8a8;
}
card:last-of-type a::after {
  background: #000;
}
card .link:hover a::after {
  animation: underline 700ms cubic-bezier(.85,.23,.4,1.13);
}




.classics-bottom {
  margin-top: 7%;
  width: 100%;
  height: 603px;
  position: relative;
}
.classics-bottom-content {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  z-index: 1;
}
.classics-bottom h1 {
  width: 57.66%;
  margin-top: 3rem;
  font-size: 7.9em;
  line-height: .95em;
}
.classics-bottom p {
  margin-top: 3.3rem;
  width: 29%;
  font-size: 1.3em;
}
.classics-bottom-images {
  width: 100%;
  display: flex;
  position: absolute;
  bottom: 0;
}
.classics-bottom-images img {
  width: 33.33%;
}




footer {
  height: 40vh;
  display: flex;
  align-items: center;
}
.footer-content {
  height: 40%;
  display: flex;
  justify-content: space-between;
}
footer img {
  align-self: flex-start;
}
footer h3 {
  font-weight: 900;
  font-size: 1.2rem;
}
footer a {
  width: fit-content;
  color: #000b;
  text-decoration: none;
  position: relative;
}
footer a::after {
  content: "";
  position: absolute;
  bottom: -20%;
  height: 2px;
  background: #000b;
}
footer .link:hover a::after {
  animation: underline 700ms cubic-bezier(.85,.23,.4,1.13);
}
footer img ~ * {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.subscribe {
  display: block;
  width: 30%;
}
.subscribe-box {
  margin-top: 1em;
  width: 100%;
  display: flex;
}
.subscribe-box input {
  height: 3rem;
  width: 70%;
  padding: .4em;
  font-size: 1.14em;
  font-family: inherit;
  outline: none;
  border: none;
}
.subscribe-box input::placeholder {
  color: #0005;
}
.subscribe-box .button {
  width: 30%;
  display: flex;
}
button {
  font-size: 1.14em;
  font-family: inherit;
  color: #fff;
  background: #000;
  border-radius: 5px;
  outline: none;
  border: none;
  position: relative;
}
.subscribe-box button::after {
  content: "";
  position: absolute;
  top: 0;
  height: 100%;
  background: #fff4;
}
.subscribe-box .button:hover button::after {
  animation: fill 700ms cubic-bezier(.85,.23,.4,1.13);
}
@keyframes fill {
  0% {
    left: 0;
    width: 0;
  }
  45% {
    width: 100%;
  }
  55% {
    width: 100%;
  }
  100% {
    right: 0;
    width: 0;
  }
}
</style>
<div id="app">
  <header>
    <div class="header_content container">
      <logo><img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571711/zara-Logo_vopc32.png" alt=""></logo>
      <nav>
        <div class="link"><a href="#">New Arrivals</a></div>
        <div class="link"><a href="#">Shop</a></div>
        <div class="link"><a href="#">Blog</a></div>
        <div class="link"><a href="#">About</a></div>
        <div class="link"><a href="#">Cart(1)</a></div>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="hero_content container">
      <div class="hero-description">
        <h1 class="hero-text">New Year Season</h1>
        <h2 class="hero-text">Bringing fashion back to its original and classic form</h2>
        <p class="hero-text">Fashion designers are reviving historical styles and honoring the art of garment design to create a new fashion revolution</p>
      </div>
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571717/hero-1_abcffh.png" alt="" class="hero-1">
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571716/hero-2_v32xws.png" alt="" class="hero-2">
    </div>
  </section>

  <section class="classics-top">
    <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571717/classics-top_tmajmr.png" alt="" class="classics-top-image">
    <div class="classics-top-content container">
      <h1>Back to the Classics</h1>
      <div class="classics-card">
        <h2>You're not a fashion victim</h2>
        <p>The clothes that connect you to the person you are inside. The Perfect Blend of Common-sense Classic & Contemporary</p>
      </div>
    </div>
  </section>

  <div class="collection container">
    <card>
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571717/collection-1_xc30u0.png" alt="">
      <p>Limited edition wool blend cape</p>
      <div class="link"><a href="#">Shop the collection</a></div>
    </card>
    <card>
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571716/collection-2_ryxnes.png" alt="">
      <p>Reversible also Printed Kimono</p>
      <div class="link"><a href="#">Shop the collection</a></div>
    </card>
    <card>
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571714/collection-3_wygqb2.png" alt="">
      <p>Long trench wool coat with hood</p>
      <div class="link"><a href="#">Shop the collection</a></div>
    </card>
  </div>

  <section class="classics-bottom">
    <div class="classics-bottom-content container">
      <h1>Back to the Classics</h1>
      <p>The clothes that connect you to the person you are inside. The Perfect Blend of Common-sense Classic & Contemporary</p>
    </div>
    <div class="classics-bottom-images">
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571712/classics-bottom-1_orv8uk.png" alt="">
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571712/classics-bottom-2_wnjoyq.png" alt="">
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571713/classics-bottom-3_vpe9ds.png" alt="">
    </div>
  </section>

  <footer>
    <div class="footer-content container">
      <img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571711/zara-Logo_vopc32.png" alt="">
      <about>
        <h3>About Us</h3>
        <div class="link"><a href="#">Our Story</a></div>
        <div class="link"><a href="#">Memory</a></div>
        <div class="link"><a href="#">Terms & Privacy</a></div>
      </about>
      <div class="customer">
        <h3>Customer Care</h3>
        <div class="link"><a href="#">FAQ</a></div>
        <div class="link"><a href="#">Contact</a></div>
        <div class="link"><a href="#">Shipping</a></div>
      </div>
      <follow>
        <h3>Follow Us</h3>
        <div class="link"><a href="#">Instagram</a></div>
        <div class="link"><a href="#">Twitter</a></div>
        <div class="link"><a href="#">Linkedin</a></div>
      </follow>
      <div class="subscribe">
        <h3>Stay for future updates from ZARA</h3>
        <div class="subscribe-box">
          <input type="text" placeholder="Enter your email">
          <div class="button"><button>Subscribe</button></div>
        </div>
      </div>
    </div>
  </footer>
</div>

<script>
    // Design from Figma by AKASH SOLANKI

// link to original design "https://www.figma.com/community/file/1058502117720749930"

// link to github repo "https://github.com/EmekaOrji/zara-fashion--figma"

// !Not mobile responsive
</script>