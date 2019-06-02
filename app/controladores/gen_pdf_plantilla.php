<link type="text/css" href="./css/pdf_style.css" rel="stylesheet" />
<page backright="10px" backleft="10px" backtop="125px" backbottom="35px" style="border: 1px solid black;" backimg="./images/pdf_fl_background.png" backimgy="top">

    <page_header>
        <div class="logo">
            <img src="./images/logo_flisol.png">
        </div>
        <h1>Festival Latinoamericano de Instalación de Software Libre FLISoL Bogotá 2019</h1>
    </page_header>
    <page_footer>
        <div class="footer">
            <p>
                Para verificar este certificado, dirijase a <a href="https://certificados.flisolbogota.org/verificar">https://certificados.flisolbogota.org/verificar</a> con el siguiente código: <?php echo $this->cod_validacion; ?> <img class="chk" src="./images/check.png"> <br> Organizó: Comunidades de Software Libre de Bogotá info@flisolbogota.org
            </p>
        </div>
    </page_footer>
    <div class="container">
        <h2>Certifica:</h2>
        <p>
            Que <strong><?php echo ucwords($this->data_user[0]['Nombres']) . ' ' . ucwords($this->data_user[0]['Apellidos']); ?></strong> identificado con <strong><?php echo $this->data_user[0]['Tipo_Documento']; ?></strong> No. <strong><?php echo $this->data_user[0]['Documento']; ?></strong>, participó en el  Festival Latinoamericano de Instalación de Software Libre como: <br><br><a><strong><?php echo $this->data_user[0]['Nombre_Rol']; ?></strong></a><br><br>
            Realizado en la <strong>Universidad Distrital Francisco José de Caldas Facultad de Ingeniería</strong> el dia 27 de abril de 2019.
        </p>
        <!--<div class="organizadores">
            <img src="./images/org/acmud-logo.png">
            <img src="./images/org/glud-logo.png">
            <img src="./images/org/hacklabgirls-logo.png">
            <img src="./images/org/ieee-logo.png">
            <img src="./images/org/mozco-logo.png">
            <img src="./images/org/pyladies-logo.png">
            <img src="./images/org/scratch-logo.png">
            <img src="./images/org/uco-logo.png">
            <img src="./images/org/photo_2019-05-02_08-22-50.jpg">
        </div>-->
    </div>
</page>
