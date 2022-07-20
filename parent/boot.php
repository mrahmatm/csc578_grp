<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
<style>
    html {
  height: 100%;
  perspective: 1000px;
  transform-style: preserver-3d;
  font-family: lato, sans-serif;
}

      body {
          background-image: url("background.png");
          background-repeat: no-repeat;
          background-attachment: fixed;  
          background-size: cover;
                  
      }

ul {
  display: block;
  text-align: left;
  margin: 0 auto;
  padding: 0;
  width: 100%;
  min-width: 535px;
  background-color: #D2691E;
  position: relative;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.5);
}
ul:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: .5;
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpiZmBg6AZiDiBWZ4YyQMCOCcYA4kMAAQYAHyYCCUdxidgAAAAASUVORK5CYII=");
}

li {
  margin: 0 auto;
  display: inline-block;
  list-style: none;
  padding: 0;
}

a {
  display: block;
  padding: 25px;
  text-transform: uppercase;
  position: relative;
  z-index: 2;
  text-shadow: 1px 0px rgba(0, 0, 0, 0.4);
  color: #FFFFFF;
  letter-spacing: .2em;
  text-decoration: none;
  transition: color 200ms;
  transform-style: preserve-3d;
}
a:hover {
  color: #FFFFFF;
}
a:after {
  content: attr(data-title);
  position: absolute;
  display: block;
  text-shadow: none;
  top: 29%;
  left: 18px;
  padding: 5px 7px;
  color: transparent;
  background: #FF4500;
  transform-origin: 50% 0%;
  backface-visibility: hidden;
  transform: translate3d(0px, 105%, 0px) rotateX(-112deg);
  transform-style: preserve-3d;
  transition: all 200ms ease;
  z-index: -1;
}
li:nth-child(2) a:after {
  background: #ecc64b;
}
li:nth-child(3) a:after {
  background: #0b9ea6;
}
li:nth-child(4) a:after {
  background: #f26667;
}
a:hover:after {
  transform: rotateX(0deg) translateZ(0px);
}
.button {
  display: inline-block;
  padding: 5px 10px;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
  outline: none;
  color: #f4a460;
  background-color: #8b4513;
  border: 2px solid #7a7a52;
  border-radius: 20px;
  box-shadow: 0 5px #b8b894;
}


.button:hover {
  background-color: #a9a9a9;
  color: black;
}

.button:active {
  background-color: #088A08;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul>
        <li><a href="dashboard.php" data-title="home">Back</a></li>

</ul>
    </div>
  </div>
</nav>
    
</body>
</html>