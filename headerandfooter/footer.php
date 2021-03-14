  </div>
</main>


<script>

let Control = document.getElementById('main')
let loader = document.getElementById('preloader')
document.onreadystatechange = () => {
    if(document.readyState == "complete"){
        Control.removeAttribute("hidden",false);
        loader.parentElement.removeChild(loader);
    }
}

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    </body>
</html>