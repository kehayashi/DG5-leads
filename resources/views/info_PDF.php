<!DOCTYPE html>
<html>
<head>
	<title>| DG5 |</title>

  <style>
  .footer {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    text-align: right;
  }
  </style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
  <body>
    <?php foreach ($proposta as $p) { ?>
  	 <div class="container-fluid" >
  	    <div class="row">
  	    	<br>
  	    </div>

        <div class="row">
            <div class="col-xs-8">
              	<img src="logo_DG5.png" style="width: 125px; height: 66px; margin-left: 1px;"><br>
            </div>
            <div class="col-xs-4">
              	<b class="pull-right" style="font-size: 8px; margin-right: 14px;">DG5 COMUNICAÇÃO</b><br>
              	<font class="pull-right" style="font-size: 7px; margin-right: 14px;">ALESSANDRO MATHIAS DE OLIVEIRA ME</font><br>
              	<font class="pull-right" style="font-size: 7px; margin-right: 14px;">OLAVO BILAC, 379 - LOJA -B. CENTRO</font><br>
                <font class="pull-right" style="font-size: 7px; margin-right: 14px;">Santa Maria/RS - CEP: 97015-440</font><br>
              	<font class="pull-right" style="font-size: 7px; margin-right: 14px;">CNPJ: 15073013000168 Fone: (55)32226217</font>
            </div>
        </div>

        <div class="row">
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>

        <div class="row">
           <div class="col-lg-1"></div>
           <div class="col-lg-10">
           <font style="font-size: 25px;">Proposta de orçamento</font>
             <hr><br>
           </div>
           <div class="col-lg-1"></div>
       </div>

       <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="row">
                  <div class="col-xs-1">
                    <label>Cliente:</label>
                  </div>
                  <div class="col-xs-9">
                    <b><?php echo $p->nome_empresa ?></b><br>
                     <?php echo $p->rua ?>
                     <?php echo $p->logradouro ?>,
                     <?php echo $p->cidade ?> -
                     <?php echo $p->estado ?> -
                     <?php echo $p->pais ?><br>
                    CNPJ/CPF: <?php echo $p->CNPJ_CPF ?>
                  </div>
                  <div class="col-xs-1"></div>
              </div>
            </div>
        </div>

        <div class="row">
          <br>
          <br>
          <br>
          <br>
        </div>

         <div class="row">
             <div class="col-xs-1">
               <label>Título:</label>
             </div>
             <div class="col-xs-9">
               <label><?php echo $p->titulo ?></label>
             </div>
             <div class="col-xs-1"></div>
         </div>

         <div class="row">
           <br>
           <br>
         </div>

         <div class="row">
            <div class="col-xs-1">
              <label>Itens:</label>
            </div>
            <div class="col-xs-9">
              <?php foreach ($itens as $i) { ?>
                <b><?php echo $i->item ?></b>
                <br>descricao<br>
                <br><b>Valor:</b>
                <br>R$<?php echo $i->valor ?><br>
                <hr/>
              <?php } ?>
            </div>
            <div class="col-xs-1"></div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            teste
          </div>
        </div>

      </div>

     <footer class="footer">
         <hr>
         <font style="font-size: 8px;color: grey;">Gerado em: <?php echo date('d/m/Y H:i:s', strtotime($data)) ?></font>
     </footer>
     <?php } ?>
  </body>
</html>

<script src="{{ asset("bower_components/adminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
