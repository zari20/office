<style>

[class^="snip"], [class*=" snip"] {
    direction: rtl;
    font-family: 'Yekan';
}

/******************************** 1562 *****************************************/

.snip1562 {
  background-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border: none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-family: 'BenchNine', Arial, sans-serif;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 12px 40px 10px;
  position: relative;
  text-transform: uppercase;
  font-weight: 700;
}

.snip1562:before,
.snip1562:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}

.snip1562:before {
  border-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border-left-width: 2px;
  border-top-width: 2px;
  left: -5px;
  top: -5px;
}

.snip1562:after {
  border-bottom-width: 2px;
  border-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border-right-width: 2px;
  bottom: -5px;
  right: -5px;
}

.snip1562:hover,
.snip1562.hover {
  background-color: {{$colors->organ_color_1 ?? '#c47135'}};
}

.snip1562:hover:before,
.snip1562.hover:before,
.snip1562:hover:after,
.snip1562.hover:after {
  height: 100%;
  width: 100%;
}


/******************************** 1564 *****************************************/

.snip1564 {
  background-color: #ffffff;
  border: none;
  border-bottom: 6px solid {{$colors->organ_color_1 ?? '#c47135'}};
  border-top: 6px solid {{$colors->organ_color_1 ?? '#c47135'}};
  color: #555;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: 500;
  height: 46px;
  line-height: 34px;
  margin: 15px 40px;
  outline: none;
  padding: 0 10px;
  position: relative;
  text-transform: uppercase;
}

.snip1564:before,
.snip1564:after {
  box-sizing: border-box;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  background-color: #ffffff;
  border-radius: 50%;
  top: -6px;
  content: "";
  height: 46px;
  position: absolute;
  width: 46px;
  border: 6px solid #ddd;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  z-index: -1;
}

.snip1564:before {
  right: -23px;
  border-left-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border-bottom-color: {{$colors->organ_color_1 ?? '#c47135'}};
}

.snip1564:after {
  left: -23px;
  border-right-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border-top-color: {{$colors->organ_color_1 ?? '#c47135'}};
}

.snip1564:hover,
.snip1564.hover {
  background-color: #ffffff;
}

.snip1564:hover:before,
.snip1564.hover:before,
.snip1564:hover:after,
.snip1564.hover:after {
  -webkit-transform: rotate(225deg);
  transform: rotate(225deg);
}


/******************************** 1575 *****************************************/

.snip1575 {
  color: #000;
  cursor: pointer;
  padding: 0px 40px;
  display: inline-block;
  margin: 15px 30px;
  text-transform: uppercase;
  line-height: 2.7em;
  font-size: 1em;
  outline: none;
  position: relative;
  font-size: 16px;
  border: 3px solid #fff;
  background-color: transparent;
  border-radius: 15px 0 15px 15px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  border-color: {{$colors->organ_color_2 ?? '#c47135'}};
}

.snip1575:before {
  content: "";
  position: absolute;
  right: -3px;
  top: -3px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 35px 35px 0;
  border-color: transparent {{$colors->organ_color_2 ?? '#c47135'}} transparent transparent;
  z-index: 1;
}

.snip1575:hover {
  border-color: {{$colors->organ_color_1 ?? '#c47135'}};
}

/******************************** 1582 *****************************************/

.snip1582 {
  background-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border: none;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 12px 40px 10px;
  position: relative;
  text-transform: uppercase;
  font-weight: 700;
}

.snip1582:before,
.snip1582:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}

.snip1582:before {
  border-color: {{$colors->organ_color_1 ?? '#c47135'}};
  border-top-width: 2px;
  left: 0px;
  top: -5px;
}

.snip1582:after {
  border-bottom-width: 2px;
  border-color: {{$colors->organ_color_1 ?? '#c47135'}};
  bottom: -5px;
  right: 0px;
}

.snip1582:hover,
.snip1582.hover {
  background-color: {{$colors->organ_color_1 ?? '#c47135'}};
}

.snip1582:hover:before,
.snip1582.hover:before,
.snip1582:hover:after,
.snip1582.hover:after {
  height: 100%;
  width: 100%;
}


/******************************** 1554 *****************************************/

.snip1554 {
  background-color: #045e78;
  color: #ffffff;
  display: inline-block;
  font-size: 16px;
  margin: 8px;
  max-width: 315px;
  min-width: 230px;
  overflow: hidden;
  position: relative;
  text-align: right;
  width: 100%;
}

.snip1554 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.45s ease;
  transition: all 0.45s ease;
}

.snip1554:after {
  background-color: white;
  opacity: 0.6;
  top: 0;
  bottom: 0;
  content: '';
  left: -100%;
  position: absolute;
  width: 200px;
  box-shadow: 0 0 100px white;
  -webkit-transform: skew(-20deg);
  transform: skew(-20deg);
  -webkit-transition: all 0.6s ease;
  transition: all 0.6s ease;
}

.snip1554 img {
  vertical-align: top;
  max-width: 100%;
  backface-visibility: hidden;
}

.snip1554 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  line-height: 1em;
  opacity: 0;
}

.snip1554 h3 {
  position: absolute;
  left: 10px;
  bottom: 10px;
  font-size: 1.4em;
  font-weight: 400;
  line-height: 1.1em;
  margin: 0;
  text-transform: uppercase;
}

.snip1554 h3 span {
  font-weight: 700;
}

.snip1554 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.snip1554:hover > img,
.snip1554.hover > img {
  opacity: 0.4;
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
}

.snip1554:hover:after,
.snip1554.hover:after {
  left: 200%;
}

.snip1554:hover figcaption,
.snip1554.hover figcaption {
  opacity: 1;
}


/******************************** 1557 *****************************************/

.snip1557 {
  position: relative;
  display: inline-block;
  overflow: hidden;
  margin: 8px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000000;
  font-size: 16px;
  line-height: 1.2em;
  text-align: center;
  font-weight: 300;
}

.snip1557 *,
.snip1557 *:before,
.snip1557 *:after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.65s ease;
  transition: all 0.65s ease;
}

.snip1557:after {
  -webkit-transition: all 0.65s ease;
  transition: all 0.65s ease;
  position: absolute;
  height: 0px;
  width: 0px;
  top: -478px;
  left: -478px;
  border-radius: 50%;
  border: 500px solid transparent;
  border-top-color: #000000;
  border-left-color: #000000;
  content: '';
  opacity: 0.8;
}

.snip1557 img {
  max-width: 100%;
  vertical-align: top;
}

.snip1557 i {
  position: absolute;
  top: -5px;
  left: -5px;
  border-radius: 25%;
  color: #000000;
  display: block;
  z-index: 10;
}

.snip1557 i:before,
.snip1557 i:after {
  border-radius: 50%;
}

.snip1557 i:before {
  color: #ddd;
  background-color: #fff;
  font-size: 37.64705882px;
  line-height: 64px;
  text-align: center;
  width: 64px;
}

.snip1557 i:after {
  position: absolute;
  top: -14px;
  bottom: -14px;
  left: -14px;
  right: -14px;
  border: 15px solid #ddd;
  border-top-color: #2980b9;
  border-left-color: #2980b9;
  content: '';
  z-index: -2;
  box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.5);
}

.snip1557 i:hover {
  background-color: #D2B17F;
  cursor: pointer;
}

.snip1557 h3 {
  bottom: 0;
  color: #fff;
  margin: 0;
  opacity: 0;
  padding: 10px 15px;
  position: absolute;
  right: 0;
  text-transform: uppercase;
  z-index: 3;
}

.snip1557 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 9;
}

.snip1557:hover:after,
.snip1557.hover:after {
  -webkit-transform: rotate(-180deg);
  transform: rotate(-180deg);
}

.snip1557:hover img,
.snip1557.hover img {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.snip1557:hover i:before,
.snip1557.hover i:before {
  color: #2980b9;
}

.snip1557:hover i:after,
.snip1557.hover i:after {
  -webkit-transform: rotate(-180deg);
  transform: rotate(-180deg);
}

.snip1557:hover h3,
.snip1557.hover h3 {
  opacity: 1;
}


/******************************** 1561 *****************************************/

.snip1561 {
  position: relative;
  display: inline-block;
  overflow: hidden;
  margin: 8px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  background: #700877;
  background: -moz-linear-gradient(90deg, #700877 0%, #ff2759 100%, #ff2759 100%);
  background: -webkit-linear-gradient(90deg, #700877 0%, #ff2759 100%, #ff2759 100%);
  background: linear-gradient(90deg, #700877 0%, #ff2759 100%, #ff2759 100%);
}

.snip1561 img,
.snip1561:before,
.snip1561:after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.snip1561 img {
  max-width: 100%;
  backface-visibility: hidden;
  vertical-align: top;
}

.snip1561:before,
.snip1561:after {
  content: '';
  background-color: #fff;
  position: absolute;
  z-index: 1;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.snip1561:before {
  width: 60px;
  height: 1px;
  left: 100%;
}

.snip1561:after {
  height: 60px;
  width: 1px;
  top: 0%;
}

.snip1561 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.snip1561:hover img,
.snip1561.hover img {
  zoom: 1;
  filter: alpha(opacity=50);
  -webkit-opacity: 0.5;
  opacity: 0.5;
}

.snip1561:hover:before,
.snip1561.hover:before,
.snip1561:hover:after,
.snip1561.hover:after {
  opacity: 1;
  top: 50%;
  left: 50%;
}

/******************************** 1576 *****************************************/

.snip1576 {
  background-color: #fff;
  color: #444;
  display: inline-block;
  font-size: 24px;
  margin: 8px;
  max-width: 315px;
  min-width: 230px;
  overflow: hidden;
  position: relative;
  text-align: center;
  width: 100%;
}

.snip1576 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.45s ease;
  transition: all 0.45s ease;
}

.snip1576:after {
  background-color: #359ad8;
  height: 150%;
  bottom: -145%;
  content: '';
  left: 0;
  right: 0;
  position: absolute;
  -webkit-transition: all 0.5s linear;
  transition: all 0.5s linear;
}

.snip1576 img {
  vertical-align: top;
  max-width: 100%;
  backface-visibility: hidden;
}

.snip1576 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  align-items: center;
  z-index: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  line-height: 1.1em;
  opacity: 0;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}

.snip1576 h3 {
  font-size: 1em;
  font-weight: 400;
  margin: 0;
  text-transform: uppercase;
}

.snip1576 h3 span {
  display: block;
  font-weight: 700;
}

.snip1576 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.snip1576:hover > img,
.snip1576.hover > img {
  opacity: 0.1;
}

.snip1576:hover:after,
.snip1576.hover:after {
  bottom: 95%;
}

.snip1576:hover figcaption,
.snip1576.hover figcaption {
  opacity: 1;
  -webkit-transition-delay: 0.4s;
  transition-delay: 0.4s;
}


/******************************** 1536 *****************************************/

.snip1536 {
  background-color: #000000;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  color: #ffffff;
  display:inline-block;
  font-size: 16px;
  line-height: 1.6em;
  margin: 10px 1%;
  max-width: 310px;
  min-width: 250px;
  overflow: hidden;
  position: relative;
  text-align: right;
  width: 100%;
}

.snip1536 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
}

.snip1536 img {
  max-width: 100%;
  opacity: 0.75;
  position: relative;
  vertical-align: top;
}

.snip1536 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.snip1536 h3 {
  -webkit-transform: translateY(100%);
  transform: translateY(100%);
  background-color: #000000;
  bottom: 0;
  font-weight: 800;
  margin: 0;
  padding: 10px 20px;
  position: absolute;
  width: 100%;
  font-size: 18px;
}

.snip1536 p {
  padding: 0px 20px;
  opacity: 0;
  -webkit-transition-delay: 0.15s;
  transition-delay: 0.15s;
}

.snip1536 i {
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 54px;
  -webkit-transform: translate(-50%, -50%) scale(1);
  transform: translate(-50%, -50%) scale(1);
}

.snip1536 .hover {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  align-items: center;
  background-color: rgba(236, 188, 46, 0.75);
  display: flex;
  font-size: 65px;
  justify-content: center;
  opacity: 0;
}

.snip1536 a {
  left: 0;
  bottom: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1;
}

.snip1536:hover .hover,
.snip1536.hover .hover {
  opacity: 1;
}

.snip1536:hover p,
.snip1536.hover p {
  opacity: 1;
}

.snip1536:hover h3,
.snip1536.hover h3 {
  -webkit-transform: translateY(0%);
  transform: translateY(0%);
}

.snip1536:hover i,
.snip1536.hover i {
  -webkit-transform: translate(-50%, -50%) scale(0.1);
  transform: translate(-50%, -50%) scale(0.1);
  opacity: 0;
}


/******************************** 1524 *****************************************/

figure.snip1524 {
  position: relative;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #ffffff;
  text-align: center;
  font-size: 16px;
  background-color: #000000;
  display: inline-block;
}

figure.snip1524 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.45s ease;
  transition: all 0.45s ease;
}

figure.snip1524 img {
  vertical-align: top;
  max-width: 100%;
  backface-visibility: hidden;
}

figure.snip1524 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  padding: 30px;
  background-color: rgba(0, 0, 0, 0.75);
  border: 4px solid rgba(255, 255, 255, 0.05);
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
  -webkit-transform-origin: 0 0%;
  -ms-transform-origin: 0 0%;
  transform-origin: 0 0%;
}

figure.snip1524 h2,
figure.snip1524 p {
  line-height: 1.5em;
  margin: 0;
}

figure.snip1524 h2 {
  font-family: 'Cardo', serif;
  display: inline-block;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

figure.snip1524 p {
  padding: 8px 0 15px;
}

figure.snip1524 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

figure.snip1524:hover > img {
  opacity: 0.2;
}

figure.snip1524:hover figcaption {
  -webkit-transform-origin: 100% 100%;
  -ms-transform-origin: 100% 100%;
  transform-origin: 100% 100%;
  -webkit-transform: rotate(0);
  transform: rotate(0);
}


</style>
