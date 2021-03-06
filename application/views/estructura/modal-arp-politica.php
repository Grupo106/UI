<div id="modalArp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalArpLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-body">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="btnCerrarArpTop" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="tituloModal">Seleccionar MAC</h4>
				</div>
				<div class="modal-body">
					<p>Direcciones MAC de equipos conectados.</p>
					<table id="tablaArp" class="table table-striped">
						<thead>
							<tr>
								<th>Dirección física</th>
								<th>Nombre</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($arp as $item) {
							if ($item['mac']) { ?>
							<tr>
								<td><a href="#" id="arpMac" name="arpMac" data-mac="<?=$item['mac']?>" data-for='macO_0' title="Seleccionar"><?=$item['mac']?></a></td>
								<td><?=$item['nombre']?></td>
							</tr>
							<?php }?>
							<?php }?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer center">
			        <button id="btnCerrarArp" class="button button-rounded button-mini">Cerrar</button>
			    </div>
			</div>
		</div>
	</div>
</div>

<div id="modalArpIP" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalArpIPLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-body">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="btnCerrarArpTop" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="tituloModal">Seleccionar IP</h4>
				</div>
				<div class="modal-body">
					<p>Direcciones IP de equipos conectados.</p>
					<table id="tablaArp" class="table table-striped">
						<thead>
							<tr>
								<th>Dirección física</th>
								<th>Dirección IP</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($arp as $item) {
							if ($item['mac']) { ?>
							<tr>
								<td><?=$item['mac']?></td>
								<td><a href="#" id="arpIp" name="arpIp" data-mac="<?=$item['ip']?>" data-for='ipO_0' title="Seleccionar"><?=$item['ip']?></a></td>
							</tr>
							<?php }?>
							<?php }?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer center">
			        <button id="btnCerrarArp" class="button button-rounded button-mini">Cerrar</button>
			    </div>
			</div>
		</div>
	</div>
</div>