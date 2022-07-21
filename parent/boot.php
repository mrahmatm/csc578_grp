<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css>
    <title>Document</title>
 
<style>
    html {
  height: 100%;
  perspective: 1000px;
  transform-style: preserver-3d;
  font-family: lato, sans-serif;
}

      body {
          background-image: url("wallpaper1.png");
          background-repeat: no-repeat;
          background-attachment: fixed;  
          background-size: cover;
                  
      }
      a {
  text-decoration: none;
  color: inherit;
}

.cta {
  position: relative;
  margin: auto;
  padding: 19px 22px;
  transition: all 0.2s ease;
  
}
.cta:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  border-radius: 28px;
  background: rgba(255, 171, 157, 0.5);
  width: 56px;
  height: 56px;
  transition: all 0.3s ease;
}
.cta span {
  position: relative;
  font-size: 16px;
  line-height: 18px;
  font-weight: 900;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  vertical-align: middle;
  
}
.cta svg {
  position: relative;
  top: 0;
  margin-left: 10px;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #111;
  stroke-width: 2;
  transform: translateX(-5px);
  transition: all 0.3s ease;
  
}
.cta:hover:before {
  width: 100%;
  background: #ffab9d;

}
.cta:hover svg {
  transform: translateX(0);
  
}
.cta:active {
  transform: scale(0.96);
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
.header{
  background-image: url("head.png");
  color: white;
  padding: 20px ;
  
}

    
</style>
</head>
<body>

    
</body>
</html>