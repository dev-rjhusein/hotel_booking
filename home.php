<?php
$page_title = "Home";
include ("header.inc");
?>

<div id="slideshow">
    <div id="slideshowWindow">
        <div class="slide">
            <img src="https://images.pexels.com/photos/594077/pexels-photo-594077.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            <div class="slideText">
                <h1 class="slideHeading">Slide One</h1>
            </div>
        </div>

        <div class="slide" id ="slide2">
            <img src= "https://images.pexels.com/photos/545034/pexels-photo-545034.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            <div class="slideText">
                <h1 class="slideHeading">Slide Two</h1>
            </div>
        </div>

        <div class="slide">
            <img src="https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            <div class="slideText">
                <h1 class="slideHeading">Slide Three</h1>
            </div>
        </div>
    </div>
</div>

<div id = "main">
    <!-- Page unique content -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.5165245653493!2d-92.32860194870159!3d38.95787217946099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87dcb7dc6b76cca9%3A0x91939e96a14e03db!2sColumbia+College!5e0!3m2!1sen!2sus!4v1544806055938" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="slider.js"></script>


<?php
include ("footer.inc");
?>