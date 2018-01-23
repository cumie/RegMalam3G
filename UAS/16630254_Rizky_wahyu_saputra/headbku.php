<!DOCTYPE html>
<html>
<head><title>data tamu</title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0AC0B3;;
}

li {
    float: left;
    border-right:1px solid white;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #DEB218;;
}

input.cari[type=text] {
  margin-top: auto;
  margin-right: auto;
    width: 100%;
    box-sizing: border-box;
    border: 2px solid black;
    border-radius: 4px;
    font-size: 14px;
    background-color: white;
    background-image: url('gambar/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input.cari[type=text]:focus {
    width: 110%;
}


</style>
</head>
<body>

<ul>
  <img class="img" src="img/23.png"  width="100%">
  <li><a href="./" onclick="myFunction()">Buku Tamu</a></li>
  <script type="text/javascript">
      function{
        alert(Berikan Saran Dengan Santun);
      }
  </script>
  <li><a href="lihat_tamu1">Lihat</a></li>


   <li class="w3-hide-small w3-right" id="cari" style="float: right;">  <form>
  <input type="text" name="search" class="cari" placeholder="Cari Pesan..">
</form></li>
</ul>



