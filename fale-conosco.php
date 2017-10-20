<?php include 'components/header.php'; ?>

	<section class="vitrine">
		<div class="container">
			<img src="assets/images/cases/clientes_top_natal.png" alt="Art&C - Clientes Top Natal" />
		</div><!-- .container -->
	</section><!-- .vitrine -->

	<div class="borda"></div>
	
	<section class="sobre fale-conosco">
		<div class="container">
            <h1>Fale Conosco</h1>
		</div><!-- .container -->
	</section><!-- .sobre -->

	<section class="como">
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="" />
                </div><!-- .form-group -->

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
		                    <label>E-mail</label>
		                    <input type="text" name="email" id="email" class="form-control" value="" />
		                </div><!-- .form-group -->
                    </div><!-- .md-6 -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" value="" />
                        </div><!-- .form-group -->
                    </div><!-- .md-6 -->
                </div><!-- .row -->

                <div class="form-group">
                    <label>Assunto</label>
                    <input type="text" name="assunto" id="assunto" class="form-control" value="" />
                </div><!-- .form-group -->

                <div class="form-group">
                    <label>Mensagem</label>
                    <textarea name="mensagem" id="mensagem" class="form-control"></textarea>
                </div><!-- .form-group -->

                <input type="submit" class="cadastrar" value="Enviar" />
            </form>
		</div><!-- .container -->
	</section><!-- .como -->

	<?php
		  sleep(1);

		  date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

		  ################# SCRIPT DE ENVIO DE E-MAIL #################
		  if(!empty($_POST)){
		    $nome = $_POST['nome'];
		    $email = $_POST['email'];
		    $telefone = $_POST['telefone'];
		    $assunto = $_POST['assunto'];
		    $mensagem = $_POST['mensagem'];
		    if($nome == "" || $email == ""){ echo 'Algum campo ficou em branco! Por favor, preencha-o.'; exit; }

		    // Destinatário
		    $para = "paulo1rm23@gmail.com";

		    // Assunto do e-mail
		    $assunto = "Formulario de Contato - ARTC";

		    $corpo = '<center><table width="700" border="1" cellpadding="0" cellspacing="0" style="border: 1px #6c3070 solid; border-collapse: collapse;">
		          <tr>
		            <td style="padding: 5px;" bgcolor="#FFF" style="border: 0 !important; bordercolor: #FFF;"  width="210" align="center" ></td>
		            <td width="480" align="center" bgcolor="#6c3070" style=" padding: 15px; font-family: Verdana, Geneva, sans-serif; color: #FFF; font-weight: bold;">FORMULÁRIO DE CONTATO - ARTC</td>
		          </tr>
		          <tr>
		            <td colspan="2" style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Olá,
		              <br /><br />Esta é uma mensagem automática para notificar um contato - Tropical Leve.
		              <br /><br />
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Nome:
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; text-align: justify;">
		              '.$nome.'
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              E-mail:
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; text-align: justify;">
		              '.$email.'
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Telefone:
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; text-align: justify;">
		              '.$telefone.'
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Assunto:
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; text-align: justify;">
		              '.$assunto.'
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Mensagem:
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; text-align: justify;">
		              '.$mensagem.'
		            </td>
		          </tr>
		          <tr>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              INFO
		            </td>
		            <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
		              Enviado em '.date('d/m/Y').' - '.date("H:i:s").'
		            </td>
		          </tr>
		          <tr>
		            <td bgcolor="#6c3070" colspan="2" style="padding: 10px; font-family: Arial; color: #FFF; font-weight: bold; text-align: center;">ARTC</td>
		          </tr>
		          </table></center>';

		    // Cabeçalho do e-mail
		    $header = "MIME-Version: 1.0" . "\r\n".
		    "Content-type: text/html; charset=iso-8859-1" . "\r\n".
		    "From: artc@artc.com.br" . "\r\n" .
		    "Bcc: \n".
		    "Reply-To: naoresponder@artc.com.br";
		    mail($para, $assunto, $corpo, $header);
		    echo '<script> alert("Enviado com sucesso!"); history.back("-1"); </script>';
		  }
		    // Mostra a mensagem acima e redireciona para index.html
		    ################# /SCRIPT DE ENVIO DE E-MAIL #################
		?>

<?php include 'components/footer.php'; ?>