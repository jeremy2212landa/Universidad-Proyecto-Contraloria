<style>
  .bordez {
    border: 1px solid #d0d0d0;
  }
  td{
    border: 1px solid #d0d0d0;
  }
  table{
    margin: 25px auto;
  }
  form{
    display: inline-block;
  }
</style>

<style>
  * {
      margin: 0;
      padding: 0;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      color: white;
      text-decoration: none;
  }
  a{
    color: #FFF;
  }

  body {
    background: url(./img/fd.jpg);
      background-size: cover;
      background-attachment: fixed;
      font-family: Roboto;
  }
  /*Barra de navegacion*/
  nav {
    background-color:rgba(0,0,0,.7);
    margin:0px;
    margin-bottom:10px;
    padding:5px 20px;
    display:grid;
    grid-template-columns: 52px repeat(4, 1fr);
    grid-gap: 10px;
  }
  .icon {
    display: flex;
    align-items: center;
    height: 42px;
    width: 42px;
  }
  .icon img {
    width: 100%;
    height: 100%;
  }
  .busqueda {
    display: flex;
    align-items: center;
    /*justify-content: center;*/
    grid-column: 2 / 5;
  }
  .busqueda input[type="search"]{
    outline: none;
      display: block;
      width: 300px;
      padding: 10px 15px;
      margin: 0 0 20px 0;
      background: rgba(0,0,0,.5);
      color: #fff;
      border: none;
      border-radius: 2px;
      border-bottom: 4px solid #ff851b;
      box-sizing: border-box;
      font-family: Roboto;
      font-size: 14px;
      font-weight:normal;
      transition: all .5s ease;
  }
  #separer {
    margin: 0px 15px;
  }
  #separador_buscar {
      background: #FF851B;
      color: #FFF;
      width: 80px;
      border: none;
      padding: 10px 0;
      font-size: 16px;
      font-weight: normal;
      font-family: Roboto;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all .5s ease;
  }
  #separador_buscar:hover {
    background: rgba(0, 117, 217, 0.7);
  }

  .administrador {
    border-radius: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: #FF851B;
    transition: all .5s ease;
  }

  .administrador:hover{
      background: rgba(0, 117, 217, 0.7);
  }

  .administrador span {
    margin:auto;
    padding:auto;
    color: white;
  }
  *{
    color: black;
  }
  /*---Fin de la Barra---*/
</style>

<!-- Inicio de la Barra de navegacion -->
<nav>
  <a href='./'>
    <div class="icon"><img src="./img/CEBM.png"></div>
  </a>

  <form class="busqueda" action="./?r=search">
    <input type="search" name="search" placeholder="Busqueda" id="separer">
    <input type="submit" name="buscar" id="separador_buscar" value="buscar">
  </form>
  <!--<a href="./?r=cursos">Cursos</a>-->
  <a href="./?r=users">Users</a>
  <a href="./?r=salir">Salir</a>
</nav>
<!-- Fin de la Barra de navegacion -->
