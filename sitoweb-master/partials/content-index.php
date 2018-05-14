<!--<!DOCTYPE html>
<div class="container-fluid" style="padding-right:0%;padding-left:0%">
    
    <div class="container-fluid col" style="background-color:#d34b41;color:#fff;"><br>
        <div style="margin-left:1%;margin-right:1%"><h1>Problems with your code?</h1><br>
            <p>Cannot you find the problem that does not make your code, application web or program to work?</p><br>
            <h4>Share that, so anybody, more or less expert than you, can help to find your bug, fix it, and improve your code.</h4><br><br>
        </div>
    </div>
    
    <div class="container-fluid" style="background-color:#6265e8;color:#fff;"><br>
        <div style="margin-left:1%;margin-right:1%"><h1>Why sharing your code?</h1><br>
            <p>Sharing is not just based on searching help, but also on prevention.</p><br>
            <h4>Your code can always be improved, but in the case could not, it is a resource that can be used by everybody.</h4><br><br>
        </div>
    </div>
    
    <div class="container-fluid" style="background-color:#50bc54;color:#fff;"><br>
        <div style="margin-left:1%;margin-right:1%"><h1>Why doing others' work?</h1><br>
            <p>Doing something free makes no sense, but with the 99% of open source resources sharing is fundamental.</p><br>
            <h4>Correct and improve the code that will serve not only to the user who requires help but also to countless other people in the future, also to you.</h4><br><br>
        </div>
    </div>
    
    <div class="container-fluid" style="background-color:#a171b8;color:#fff;"><br>
        <div style="margin-left:1%;margin-right:1%"><h1>Is it for anybody?</h1><br>
            <p>Whether it is a program for college, school or work because you should not be able to help? Perhaps learning something?</p><br>
            <h4>Who forbids you? We certainly do not, the first step is login. </h4><br><br>
        </div>
    </div>
</div>-->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("img_parallax.jpg");
  min-height: 100%;
}

.bgimg-2 {
  background-image: url("img_parallax2.jpg");
  min-height: 400px;
}

.bgimg-3 {
  background-image: url("img_parallax3.jpg");
  min-height: 400px;
}

.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
</style>
</head>
<body>

<div class="bgimg-1">
  <div class="caption">
    <span class="border">PROBLEMS WITH YOUR CODE?</span>
  </div>
</div>

<div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <h3 style="text-align:center;">Share</h3>
  <p style="text-align:center;">Sharing is not just based on searching help, but also on prevention.</p>
  <h4 style="text-align:center;">Your code can always be improved, but in the case could not, it is a resource that can be used by everybody.</h4>
</div>

<div class="bgimg-2">
  <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">WHY DOING OTHER PEOPLE'S WORK?</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <p style="text-align:center;">Doing something free makes no sense, but with the 99% of open source resources sharing is fundamental.</p>
    <h4 style="text-align:center;">Correct and improve the code that will serve not only to the user who requires help but also to countless other people in the future, also to you.</h4>
  </div>
</div>

<div class="bgimg-3">
  <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">IS IT FOR ANYBODY?</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <p style="text-align:center;">Whether it is a program for college, school or work because you should not be able to help? Perhaps learning something?</p>
    <h4 style="text-align:center;">Who forbids you? We certainly do not, the first step is login. </h4>
  </div>
</div>

<div class="bgimg-1">
  <div class="caption">
    <span class="border">COOL!</span>
  </div>
</div>

</body>
</html>