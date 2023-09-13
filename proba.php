<?php include("konekcija.php");?>
<select class="selection-2" name="grad" id="grad">
									<?php
									
									$ispis="<option value='0'>Izaberite grad</option>";
										$upit="SELECT * FROM gradovi";
										$rezultat=$konekcija->query($upit);
										var_dump($rezultat);
										$rez=$rezultat->fetchAll(PDO::FETCH_ASSOC);
                                        var_dump($rez);
                                        if(isset($rez)){
										    foreach($rez as $r){
											    $ispis.="<option value='".$r['idGrad']."'>".$r['nazivGrada']."</option>";
										                        }
                                            echo $ispis;}
                                        else{echo"nema";}
										
									//<option>Popularity</option>
									//<option>Price: low to high</option>
									//<option>Price: high to low</option>
									?>
									
								</select>