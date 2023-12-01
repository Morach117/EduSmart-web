<!DOCTYPE html>
<ht lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <!-- Boton para ir arriba -->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <!-- Fin boton para ir arriba -->
        <script>
            // Boton para ir arriba
            //Get the button
            var mybutton = document.getElementById("myBtn");
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () { scrollFunction() };
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
            // Fin boton para ir arriba
        </script>
    </body>


</ht ml>