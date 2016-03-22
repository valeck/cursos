<?php

$html = '';
foreach ($list as $value) {

	$status = ($value->block == 0)?'Activo':'Bloqueado';
	$html .= '<tr>';
	$html .= '<th>'.$value->username.'</th>';
	$html .= '<th>'.$value->email.'</th>';
	$html .= '<th>'.$value->last_access.'</th>';
	$html .= '<th>'.$value->user_type.'</th>';
	$html .= '<th>'.$status.'</th>';
	$html .= '<th></th>';
	$html .= '<tr>';
}

$formNwAdmin = array(

	'name'   => "nwAdmin",
	'id'     => "nwAdmin",
	'method' => "post",
	'rol'    => "form",
	'class'  => "form-horizontal",
);

?>
<div id="content">

	<div class="outer">
		<div class="inner bg-light lter">
			 		<!--Begin Datatables-->
	        <div class="row">
	        	<div class="text-center">
					<ul class="list-inline" role="tablist">
					    <li role="presentation" class="active"> <a href="#listado" role="tab" data-toggle="tab">Listado de Administradores</a>  </li>
					    <li role="presentation"> <a href="#nwadmin" role="tab" data-toggle="tab">Nuevo Admin</a>  </li>
					</ul>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="listado">
				        <div class="col-lg-12">
				            <div class="box">
								<header>
				                    <div class="icons">
				                      <i class="fa fa-table"></i>
				                    </div>
				                    <h5>Listado Administradores</h5>
				                </header>
				                <div id="collapse4" class="body">
					                <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
				                      <thead>
				                        <tr>
				                          <th>Nombre</th>
				                          <th>Email</th>
				                          <th>Ultimo acceso</th>
				                          <th>Nivel</th>
				                          <th>Status</th>
				                          <th>Acciones</th>
				                        </tr>
				                      </thead>
				                      <tbody>
<?php echo $html;?>
</tbody>
					                </table>
				                </div>
							</div><!--box-->
				        </div><!--log-12-->
			        </div>
			        <div role="tabpanel" class="tab-pane fade" id="nwadmin">
				        <div class="col-lg-12">
				            <div class="box">
								<header>
				                    <div class="icons">
				                      <i class="fa fa-table"></i>
				                    </div>
				                    <h5>Nuevo Administrador</h5>
			                 	</header>
			                 	<div class="body">
			                 	<div id="mensaje"></div>
<?php
echo form_open('index.php/admin/add', $formNwAdmin);
?>
<div class="form-group">
                        <label class="control-label col-lg-4">Nombre Completo</label>
                    	<div class="col-lg-4">
                          <input type="text" id="username" name="username" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>
                        <div class="col-lg-4">
                          <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-lg-4">
                          <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password</label>
                        <div class="col-lg-4">
                          <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>
                    </div>
                    <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Validate" class="btn btn-primary">
                    </div>
<?php
echo form_close();
?>
								</div>
				            </div><!--box-->
				        </div><!--log-12-->
			        </div>
		        </div>
	        </div><!--row-->
	            	<!--End Datatables-->
        </div><!--inner-->
	</div><!--outer-->
 </div>
</div>