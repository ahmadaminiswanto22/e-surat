                    <?php 
						
						error_reporting(0);
						$s=$ctk->row_array();
					
					?>
					<table>
						<tr>
		                    <th style="width:200px;"></th>
							<th>ID</th>
		                    <th>NIS</th>
		                    <th>Nama Siswa</th>
		                    <th>Kelas</th>
		                </tr>
						<tr>
							<td style="width:200px;"></th>
							<td><input type="text" name="nabar" value="<?php echo $s['id_siswa'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm" readonly></td>
							<td><input type="text" name="nabar" value="<?php echo $s['nis'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="satuan" value="<?php echo $s['nama'];?>" style="width:120px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="stok" value="<?php echo $s['jenjang'];?>" style="width:40px;margin-right:5px;" class="form-control input-sm" readonly>
                                <input type="text" name="stok" value="<?php echo $s['jurusan'];?>" style="width:40px;margin-right:5px;" class="form-control input-sm" readonly>
                            </td>
		            
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>

                    
					