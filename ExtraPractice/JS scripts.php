
<html>
  <script>
        function getSearchResult() {
            var searchResult = document.getElementById("mySearch").value;
            document.getElementById("searchResult").innerHTML = searchResult;
        }
        (function () {
            var input = document.getElementById("mySearch");
            input.addEventListener("keypress", function (event) {

                if (event.keyCode === 13) {
                    event.preventDefault();
                    getSearchResult();
                }
            });
        }());
    </script>
  
    </hmtl>
   