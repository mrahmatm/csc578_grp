<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .header{
  background-image: url("head.png");
  color: beige;
  padding: 30px;
}

.btn {
  background-color:black ;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: #fa8072;
}

.table1 {
  border-collapse: collapse;
  width: 100%;
  color:white;
}

.table1 th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  color:white;
}

.table1 tr:hover {background-color:	black;}

table {
  border-collapse: collapse;
  width: 100%;
  color:white;
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

</style>
</head>