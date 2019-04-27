<link type="text/css" href="./css/pdf_style.css" rel="stylesheet" />
<page backright="10px" backleft="10px" backtop="125px" backbottom="35px" style="border: 1px solid black;">

    <page_header>
        <div class="logo">
            <img src="./images/logo_flisol.png">
        </div>
        <h1>FLISoL Bogotá 2019</h1>
    </page_header>
    <page_footer>
        <div class="footer">
            <p>
                Para verificar estecertificado, dirijase a <a href="https: //certificado.flisolbogota.org/verificar">https://certificado.flisolbogota.org/verificar</a> con el siguiente código: codigocod
            </p>
        </div>
    </page_footer>
    <div class="container">
        <h2>Certifica:</h2>
        <p>
            El señor/a <strong><?php echo ucwords($this->data_user[0]['Nombres']) . ' ' . ucwords($this->data_user[0]['Apellidos']); ?></strong> asistió al Festival Latinoamericano de Instalación de Software Libre como <br><br><a><strong><?php echo $this->data_user[0]['Nombre_Rol']; ?></strong></a><br><br>
            celebrado en la <strong>Universidad Francisco José de Caldas. Facultad de Ingeniería</strong> el dia 27 de abril de 2019.
        </p>

    </div>

</page>
